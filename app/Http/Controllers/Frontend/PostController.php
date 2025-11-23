<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\FrontendController;
use Illuminate\Http\Request;
use App\Repositories\PostCatalogueRepository;
use App\Services\PostCatalogueService;
use App\Services\PostService;
use App\Repositories\PostRepository;
use App\Services\WidgetService;
use Jenssegers\Agent\Facades\Agent;
use App\Models\Post;
use App\View\Components\TableOfContents;
use App\Repositories\ProductRepository;

class postController extends FrontendController
{
    protected $language;
    protected $system;
    protected $postCatalogueRepository;
    protected $postCatalogueService;
    protected $postService;
    protected $postRepository;
    protected $widgetService;
    protected $productRepository;

    public function __construct(
        PostCatalogueRepository $postCatalogueRepository,
        PostCatalogueService $postCatalogueService,
        PostService $postService,
        PostRepository $postRepository,
        WidgetService $widgetService,
        ProductRepository $productRepository,
    ){
        $this->postCatalogueRepository = $postCatalogueRepository;
        $this->postCatalogueService = $postCatalogueService;
        $this->postService = $postService;
        $this->postRepository = $postRepository;
        $this->widgetService = $widgetService;
        $this->productRepository = $productRepository;
        parent::__construct(); 
    }


    public function index($id, $request){
        $language = $this->language;
        $post = $this->postRepository->getPostById($id, $this->language, config('apps.general.defaultPublish'));
        $viewed = $post->viewed;
        $updateViewed = Post::where('id', $id)->update(['viewed' => $viewed + 1]); 
        if(is_null($post)){
            abort(404);
        }
        $postCatalogue = $this->postCatalogueRepository->getPostCatalogueById($post->post_catalogue_id, $this->language);
        if($postCatalogue->id == 22 || $postCatalogue->id == 24 || $postCatalogue->id === 44){
            $postCatalogue->children = $this->postCatalogueRepository->findByCondition(
                [
                    ['publish' , '=', 2],
                    ['parent_id', '=', 21]
                ],
                true,
                [],
                ['order', 'desc']
            );
        }

        // dd(123);

        $breadcrumb = $this->postCatalogueRepository->breadcrumb($postCatalogue, $this->language);

        $asidePost = $this->postService->paginate(
            $request, 
            $this->language, 
            $postCatalogue, 
            1,
            ['path' => $postCatalogue->canonical],
        );


        $widgets = $this->widgetService->getWidget([
            ['keyword' => 'product-catalogue', 'object' => true],
            
        ], $this->language);

        /* ------------------- */
        
        $config = $this->config();
        $system = $this->system;
        $seo = seo($post);
        


        $template = 'frontend.post.post.index';

        $schema = $this->schema($post, $postCatalogue, $breadcrumb);
        $content = $post->languages->first()->pivot->content;
        // dd($content);
        // dd($content, $cont);
        $items = TableOfContents::extract($content);
        $contentWithToc = null;
        $contentWithToc = TableOfContents::injectIds($content, $items);
        // dd($contentWithToc);

        // Lấy danh sách bài viết mới nhất chỉ từ 2 mục: "tin tức - sự kiện" và "cập nhật lịch thi"
        // Tìm 2 catalogue này
        $newsCatalogues = \App\Models\PostCatalogue::whereHas('languages', function($query) {
            $query->whereIn('post_catalogue_language.canonical', [
                'tin-tuc',
                'tin-tuc-su-kien',
                'cap-nhat-moi-nhat-ve-vstep-lich-thi',
                'cap-nhat-lich-thi'
            ])
            ->where('post_catalogue_language.language_id', $this->language);
        })
        ->where('publish', 2)
        ->get();
        
        $catalogueIds = $newsCatalogues->pluck('id')->toArray();
        
        // Lấy bài viết mới nhất từ 2 catalogue này (trừ bài viết hiện tại)
        $latestPosts = \App\Models\Post::whereHas('post_catalogues', function($query) use ($catalogueIds) {
            $query->whereIn('post_catalogues.id', $catalogueIds);
        })
        ->whereHas('languages', function($query) {
            $query->where('post_language.language_id', $this->language);
        })
        ->where('publish', 2)
        ->where('id', '!=', $post->id)
        ->orderBy('order', 'desc')
        ->orderBy('id', 'desc')
        ->with(['languages' => function($query) {
            $query->where('post_language.language_id', $this->language);
        }])
        ->take(5)
        ->get();

        // Lấy danh sách khóa học (products) để hiển thị trong dropdown
        $courses = \App\Models\Product::whereHas('languages', function($query) {
            $query->where('product_language.language_id', $this->language);
        })
        ->where('publish', 2)
        ->orderBy('order', 'desc')
        ->orderBy('id', 'desc')
        ->with(['languages' => function($query) {
            $query->where('product_language.language_id', $this->language);
        }])
        ->get();

        return view($template, compact(
            'config',
            'seo',
            'system',
            'breadcrumb',
            'postCatalogue',
            'post',
            'asidePost',
            'widgets',
            'schema',
            'contentWithToc',
            'latestPosts',
            'courses'
        ));
    }

    private function schema($post, $postCatalogue, $breadcrumb){

        $image = $post->image;

        $name = $post->languages->first()->pivot->name;

        $description = strip_tags($post->languages->first()->pivot->description);

        $canonical = write_url($post->languages->first()->pivot->canonical);

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

        $imageUrl = !empty($image) ? (strpos($image, 'http') === 0 ? $image : config('app.url') . '/' . $image) : '';
        $postCatalogueName = $postCatalogue->languages->first()->pivot->name ?? '';
        $datePublished = $post->created_at ? date('Y-m-d', strtotime($post->created_at)) : '';
        $dateModified = $post->updated_at ? date('Y-m-d', strtotime($post->updated_at)) : ($datePublished ?: date('Y-m-d'));
        
        $schema = "
            <script type=\"application/ld+json\">
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
                    \"@type\": \"BlogPosting\",
                    \"headline\": \"" . addslashes($name) . "\",
                    \"description\": \"" . addslashes($description) . "\",
                    \"image\": \"" . $imageUrl . "\",
                    \"url\": \"" . $canonical . "\",
                    \"datePublished\": \"" . $datePublished . "\",
                    \"dateModified\": \"" . $dateModified . "\",
                    \"author\": {
                        \"@type\": \"Person\",
                        \"name\": \"EVSTEP\"
                    },
                    \"publisher\": {
                        \"@type\": \"Organization\",
                        \"name\": \"EVSTEP\",
                        \"logo\": {
                            \"@type\": \"ImageObject\",
                            \"url\": \"" . config('app.url') . "/" . ($this->system['homepage_logo'] ?? '') . "\"
                        }
                    },
                    \"mainEntityOfPage\": {
                        \"@type\": \"WebPage\",
                        \"@id\": \"" . $canonical . "\"
                    },
                    \"articleSection\": \"" . addslashes($postCatalogueName) . "\"
                }
            ]
            </script>
        ";
        return $schema;

    } 

    private function config(){
        return [
            'language' => $this->language,
            'js' => [
                'frontend/core/library/cart.js',
                'frontend/core/library/product.js',
                'frontend/core/library/review.js',
                'https://prohousevn.com/scripts/fancybox-3/dist/jquery.fancybox.min.js'
            ],
            'css' => [
                'frontend/core/css/product.css',
                'https://prohousevn.com/scripts/fancybox-3/dist/jquery.fancybox.min.css'
            ]
        ];
    }

}
