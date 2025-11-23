<?php

require __DIR__.'/vendor/autoload.php';

$app = require_once __DIR__.'/bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use App\Models\PostCatalogue;
use App\Models\Post;
use App\Models\Language;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

// Lấy language_id = 1 (tiếng Việt)
$language = Language::where('canonical', 'vn')->first();
if (!$language) {
    die("Không tìm thấy language với canonical = 'vn'\n");
}
$languageId = $language->id;
$userId = 1; // User ID mặc định

// Kiểm tra xem catalogue đã tồn tại chưa
$existingCatalogue = PostCatalogue::whereHas('languages', function($query) use ($languageId) {
    $query->where('post_catalogue_language.canonical', 'giang-vien')
          ->where('post_catalogue_language.language_id', $languageId);
})->first();

if ($existingCatalogue) {
    echo "Post catalogue 'giang-vien' đã tồn tại. Xóa catalogue cũ và các posts liên quan...\n";
    // Xóa các posts liên quan
    $existingCatalogue->posts()->detach();
    $existingCatalogue->languages()->detach();
    $existingCatalogue->delete();
}

// Tạo post catalogue mới
$catalogue = PostCatalogue::create([
    'parent_id' => 0,
    'lft' => 1,
    'rgt' => 2,
    'level' => 0,
    'publish' => 2,
    'order' => 0,
    'user_id' => $userId,
]);

// Thêm language cho catalogue
$catalogue->languages()->attach($languageId, [
    'name' => 'Giảng Viên & Cố vấn chuyên môn',
    'canonical' => 'giang-vien',
    'meta_title' => 'Giảng Viên & Cố vấn chuyên môn',
    'meta_keyword' => 'giảng viên, cố vấn, VSTEP',
    'meta_description' => 'Đội ngũ giảng viên và cố vấn chuyên môn VSTEP',
    'description' => 'Đội ngũ giám khảo, giáo viên lâu năm trực tiếp huấn luyện và chấm chữa bài thi.',
    'content' => '',
]);

echo "Đã tạo post catalogue 'giang-vien' với ID: {$catalogue->id}\n";

// Dữ liệu giảng viên (5 người)
$lecturers = [
    [
        'name' => 'ThS. Mai Lan',
        'description' => 'Giám khảo Speaking VSTEP - ĐH Hà Nội',
        'content' => '12 năm chấm thi, phụ trách xây dựng ngân hàng câu hỏi speaking và huấn luyện phản xạ giao tiếp.',
        'image' => '',
    ],
    [
        'name' => 'ThS. Đức Minh',
        'description' => 'Chủ nhiệm bộ môn Writing - EVSTEP',
        'content' => 'Từng là thành viên hội đồng ra đề, chuyên huấn luyện viết học thuật, xây dựng rubric chấm chữa 4 tiêu chí.',
        'image' => '',
    ],
    [
        'name' => 'ThS. Hồng Anh',
        'description' => 'Chuyên gia Listening & Reading',
        'content' => 'Phát triển bộ mock test cập nhật sát nhất với đề thật, hướng dẫn chiến thuật quản lý thời gian hiệu quả.',
        'image' => '',
    ],
    [
        'name' => 'Mentor Quang',
        'description' => 'Lead Coach - Data Driven Program',
        'content' => 'Quản lý hệ thống theo dõi tiến độ, đảm bảo học viên nhận coaching và feedback kịp thời theo cam kết.',
        'image' => '',
    ],
    [
        'name' => 'ThS. Văn Hùng',
        'description' => 'Giám khảo Writing VSTEP - ĐH Ngoại Ngữ',
        'content' => '15 năm kinh nghiệm chấm thi, chuyên sâu về academic writing và phát triển tư duy phản biện cho học viên.',
        'image' => '',
    ],
];

// Tạo các posts
foreach ($lecturers as $index => $lecturer) {
    $post = Post::create([
        'post_catalogue_id' => $catalogue->id,
        'image' => $lecturer['image'],
        'publish' => 2,
        'order' => $index + 1,
        'user_id' => $userId,
    ]);
    
    // Thêm language cho post
    $canonical = Str::slug($lecturer['name']);
    $post->languages()->attach($languageId, [
        'name' => $lecturer['name'],
        'canonical' => $canonical,
        'meta_title' => $lecturer['name'],
        'meta_keyword' => 'giảng viên, VSTEP',
        'meta_description' => $lecturer['description'],
        'description' => $lecturer['description'],
        'content' => '<p>' . $lecturer['content'] . '</p>',
    ]);
    
    // Gắn post vào catalogue
    $catalogue->posts()->attach($post->id);
    
    echo "Đã tạo post: {$lecturer['name']} (ID: {$post->id})\n";
}

echo "\nHoàn thành! Đã tạo {$catalogue->id} catalogue và " . count($lecturers) . " posts.\n";

