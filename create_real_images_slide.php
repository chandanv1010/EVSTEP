<?php

require __DIR__.'/vendor/autoload.php';

$app = require_once __DIR__.'/bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use App\Models\Slide;
use App\Models\Language;
use Illuminate\Support\Facades\DB;

// Lấy language_id = 1 (tiếng Việt)
$language = Language::where('canonical', 'vn')->first();
if (!$language) {
    die("Không tìm thấy language với canonical = 'vn'\n");
}
$languageId = $language->id;

// Kiểm tra xem slide đã tồn tại chưa
$existingSlide = Slide::where('keyword', 'real-images')->first();

if ($existingSlide) {
    echo "Slide 'real-images' đã tồn tại. Xóa slide cũ...\n";
    $existingSlide->delete();
}

// Tạo slide mới
$slideItems = [
    $languageId => [
        [
            'image' => 'frontend/resources/img/real-image-1.jpg',
            'name' => 'Feedback Writing Task 2 trực tiếp',
            'description' => '',
            'canonical' => '#',
            'alt' => 'Feedback Writing Task 2 trực tiếp',
            'window' => '',
        ],
        [
            'image' => 'frontend/resources/img/real-image-2.jpg',
            'name' => 'Feedback Writing Task 2 trực tiếp',
            'description' => '',
            'canonical' => '#',
            'alt' => 'Feedback Writing Task 2 trực tiếp',
            'window' => '',
        ],
        [
            'image' => 'frontend/resources/img/real-image-3.jpg',
            'name' => 'Speaking lab với giám khảo VSTEP',
            'description' => '',
            'canonical' => '#',
            'alt' => 'Speaking lab với giám khảo VSTEP',
            'window' => '',
        ],
        [
            'image' => 'frontend/resources/img/real-image-4.jpg',
            'name' => 'Coaching nhóm 6 học viên / mentor',
            'description' => '',
            'canonical' => '#',
            'alt' => 'Coaching nhóm 6 học viên / mentor',
            'window' => '',
        ],
        [
            'image' => 'frontend/resources/img/real-image-5.jpg',
            'name' => 'Thi thử tổng duyệt trước ngày thi',
            'description' => '',
            'canonical' => '#',
            'alt' => 'Thi thử tổng duyệt trước ngày thi',
            'window' => '',
        ],
    ]
];

$slide = Slide::create([
    'name' => 'Ảnh thực tế',
    'keyword' => 'real-images',
    'description' => 'Slide hiển thị ảnh thực tế lớp học',
    'item' => $slideItems,
    'setting' => [],
    'short_code' => '',
    'publish' => 2,
]);

echo "Đã tạo slide 'real-images' với ID: {$slide->id}\n";
echo "Hoàn thành!\n";

