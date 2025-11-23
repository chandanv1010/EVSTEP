<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\FrontendController;
use Illuminate\Http\Request;
use App\Repositories\PostCatalogueRepository;
use App\Services\PostCatalogueService;
use App\Services\PostService;
use App\Services\WidgetService;
use App\Services\SlideService;
use App\Models\System;
use App\Enums\SlideEnum;
use Jenssegers\Agent\Facades\Agent;
use App\Models\Introduce;

class PostCatalogueController extends FrontendController
{
    protected $language;
    protected $system;
    protected $postCatalogueRepository;
    protected $postCatalogueService;
    protected $postService;
    protected $widgetService;
    protected $slideService;

    public function __construct(
        PostCatalogueRepository $postCatalogueRepository,
        PostCatalogueService $postCatalogueService,
        PostService $postService,
        WidgetService $widgetService,
        SlideService $slideService,
    ) {
        $this->postCatalogueRepository = $postCatalogueRepository;
        $this->postCatalogueService = $postCatalogueService;
        $this->postService = $postService;
        $this->widgetService = $widgetService;
        $this->slideService = $slideService;
        parent::__construct();
    }


    public function index($id, $request, $page = 1)
    {
        $postCatalogue = $this->postCatalogueRepository->getPostCatalogueById($id, $this->language);
        $postCatalogue->children = $this->postCatalogueRepository->findByCondition(
            [
                ['publish', '=', 2],
                ['parent_id', '=', $postCatalogue->id]
            ],
            true,
            [],
            ['order', 'desc']
        );
        

        $breadcrumb = $this->postCatalogueRepository->breadcrumb($postCatalogue, $this->language);
        $posts = $this->postService->paginate(
            $request,
            $this->language,
            $postCatalogue,
            $page,
            ['path' => $postCatalogue->canonical],
        );

        $widgets = $this->widgetService->getWidget([
            ['keyword' => 'students', 'object' => true],
            ['keyword' => 'product-catalogue', 'object' => true],
            
        ], $this->language);

        $slides = $this->slideService->getSlide(
            [SlideEnum::MAIN, SlideEnum::REAL_IMAGES],
            $this->language
        );

        if($postCatalogue->canonical === 'gioi-thieu'){
            $template = 'frontend.post.catalogue.intro';
            // Lấy dữ liệu giảng viên từ post_catalogues
            $lecturerCatalogue = \App\Models\PostCatalogue::whereHas('languages', function($query) {
                $query->where('post_catalogue_language.canonical', 'giang-vien')
                      ->where('post_catalogue_language.language_id', $this->language);
            })
            ->where('publish', 2)
            ->first();
            
            $lecturers = collect();
            if($lecturerCatalogue) {
                // Lấy tất cả posts từ catalogue (không phân trang)
                $lecturerPosts = \App\Models\Post::whereHas('post_catalogues', function($query) use ($lecturerCatalogue) {
                    $query->where('post_catalogues.id', $lecturerCatalogue->id);
                })
                ->whereHas('languages', function($query) {
                    $query->where('post_language.language_id', $this->language);
                })
                ->where('publish', 2)
                ->orderBy('order', 'desc')
                ->orderBy('id', 'desc')
                ->get();
                
                $lecturers = $lecturerPosts;
            }
        }else{
            $template = 'frontend.post.catalogue.index';
            $lecturers = collect();
        }

        $config = $this->config();
        $system = $this->system;
        $seo = seo($postCatalogue, $page);
        $introduce = convert_array(Introduce::where('language_id', $this->language)->get(), 'keyword', 'content');
        $schema = $this->schema($postCatalogue, $posts, $breadcrumb);
        return view($template, compact(
            'config',
            'seo',
            'system',
            'breadcrumb',
            'postCatalogue',
            'posts',
            'widgets',
            'schema',
            'slides',
            'introduce',
            'lecturers'
        ));
    }

    private function schema($postCatalogue, $posts, $breadcrumb)
    {

        $cat_name = $postCatalogue->languages->first()->pivot->name;

        $cat_canonical = write_url($postCatalogue->languages->first()->pivot->canonical);

        $cat_description = strip_tags($postCatalogue->languages->first()->pivot->description);

        $itemListElements = '';

        $position = 1;

        foreach ($posts as $post) {
            $name = $post->languages->first()->pivot->name;
            $canonical = write_url($post->languages->first()->pivot->canonical);
            $itemListElements .= "
                {
                    \"@type\": \"BlogPosting\",
                    \"headline\": \" " . $name . " \",
                    \"url\": \" " . $canonical . " \",
                    \"datePublished\": \" " . convertDateTime($post->created_at, 'd-m-Y') . " \",
                    \"author\": {
                        \"@type\": \" Person  \",
                        \"name\": \" An Hưng \",
                    }
                },";
            $position++;
        }

        $itemListElements = rtrim($itemListElements, ',');

        $itemBreadcrumbElements = '';

        $positionBreadcrumb = 2;

        foreach ($breadcrumb as $key => $item) {
            $name = $item->languages->first()->pivot->name;
            $canonical = write_url($item->languages->first()->pivot->canonical);
            $itemBreadcrumbElements .= "
                {
                    \"@type\": \"ListItem\",
                    \"position\": $positionBreadcrumb,
                    \"name\": \"" . $name . "\",
                    \"item\": \"" . $canonical . "\",
                },";
            $positionBreadcrumb++;
        }

        $itemBreadcrumbElements = rtrim($itemBreadcrumbElements, ',');

        $schema = "<script type='application/ld+json'>
            [
                {
                    \"@context\": \"https://schema.org\",
                    \"@type\": \"BreadcrumbList\",
                    \"itemListElement\": [
                        {
                            \"@type\": \"ListItem\",
                            \"position\": 1,
                            \"name\": \"Trang chủ\",
                            \"item\": \"" . config('app.url') . "\"
                        }" . ($itemBreadcrumbElements ? ',' . $itemBreadcrumbElements : '') . "
                    ]
                },
                {
                    \"@context\": \"https://schema.org\",
                    \"@type\": \"Blog\",
                    \"name\": \"" . addslashes($cat_name) . "\",
                    \"description\": \"" . addslashes($cat_description) . "\",
                    \"url\": \"" . $cat_canonical . "\",
                    \"publisher\": {
                        \"@type\": \"Organization\",
                        \"name\": \"EVSTEP\",
                        \"logo\": {
                            \"@type\": \"ImageObject\",
                            \"url\": \"" . config('app.url') . "/" . ($this->system['homepage_logo'] ?? '') . "\"
                        }
                    },
                    \"blogPost\": [" . ($itemListElements ?: '') . "]
                }
            ]
            </script>";
        return $schema;
    }


    private function config()
    {
        return [
            'language' => $this->language,
            'css' => [
                'frontend/resources/plugins/OwlCarousel2-2.3.4/dist/assets/owl.carousel.min.css',
                'frontend/resources/plugins/OwlCarousel2-2.3.4/dist/assets/owl.theme.default.min.css',
                'frontend/resources/css/custom.css'
            ],
            'js' => [
                'frontend/resources/plugins/OwlCarousel2-2.3.4/dist/owl.carousel.min.js',
                'frontend/resources/library/js/carousel.js',
                'https://getuikit.com/v2/src/js/components/sticky.js'
            ]
        ];
    }

}