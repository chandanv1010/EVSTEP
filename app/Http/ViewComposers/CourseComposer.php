<?php  

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Models\Product;
use App\Models\Language;

class CourseComposer
{
    public function compose(View $view)
    {
        // Lấy language hiện tại
        $language = Language::where('canonical', app()->getLocale())->first();
        $languageId = $language ? $language->id : 1;
        
        // Lấy danh sách khóa học (products) để hiển thị trong dropdown
        $courses = Product::whereHas('languages', function($query) use ($languageId) {
            $query->where('product_language.language_id', $languageId);
        })
        ->where('publish', 2)
        ->orderBy('order', 'desc')
        ->orderBy('id', 'desc')
        ->with(['languages' => function($query) use ($languageId) {
            $query->where('product_language.language_id', $languageId);
        }])
        ->take(20) // Giới hạn 20 khóa học
        ->get();
        
        $view->with('headerCourses', $courses);
    }
}

