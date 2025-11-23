<?php

require __DIR__.'/vendor/autoload.php';

$app = require_once __DIR__.'/bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use App\Models\Post;
use App\Models\PostCatalogue;
use App\Models\Language;
use App\Models\Router;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

// Lấy language_id = 1 (tiếng Việt)
$language = Language::where('canonical', 'vn')->first();
if (!$language) {
    die("Không tìm thấy language với canonical = 'vn'\n");
}
$languageId = $language->id;
$userId = 1; // User ID mặc định

// Tìm catalogue "Cập nhật mới nhất về VSTEP & lịch thi"
$newsCatalogue = PostCatalogue::whereHas('languages', function($query) use ($languageId) {
    $query->where('post_catalogue_language.canonical', 'cap-nhat-moi-nhat-ve-vstep-lich-thi')
          ->where('post_catalogue_language.language_id', $languageId);
})->where('publish', 2)->first();

if (!$newsCatalogue) {
    die("Không tìm thấy catalogue 'Cập nhật mới nhất về VSTEP & lịch thi'\n");
}

echo "Tìm thấy catalogue: {$newsCatalogue->id}\n\n";

// Nội dung demo cho các bài viết tin tức
$newsPosts = [
    [
        'name' => 'Trọn bộ tài liệu ôn thi B1 VSTEP 2025 cho người mất gốc',
        'canonical' => 'tron-bo-tai-lieu-on-thi-b1-vstep-2025-cho-nguoi-mat-goc',
        'description' => 'Trọn bộ tài liệu ôn thi B1 VSTEP 2025 được biên soạn dành riêng cho người mất gốc, giúp bạn nắm vững ngữ pháp, từ vựng và kỹ năng làm bài theo định dạng đề thi mới nhất của Bộ GD&ĐT.',
        'content' => '<h2>Đối tượng nên sử dụng bộ tài liệu này</h2>
<p>Bộ tài liệu ôn thi <strong>chứng chỉ tiếng Anh B1</strong> VSTEP được xây dựng đặc biệt cho người học mất gốc, tức là những người gần như không có nền tảng tiếng Anh: phát âm yếu, từ vựng dưới 500 từ, ngữ pháp mơ hồ hoặc học rồi nhưng "trả hết cho thầy cô". Với những trường hợp như vậy, việc tiếp cận các đề thi thật hoặc giáo trình nâng cao sẽ gây hoang mang và không hiệu quả.</p>
<p>Tài liệu còn phù hợp với sinh viên cần chứng chỉ B1 để tốt nghiệp, giáo viên cần chuẩn hóa năng lực ngoại ngữ, hoặc người đi làm cần chứng chỉ tiếng Anh B1 để bổ sung hồ sơ xin việc, nâng bậc hoặc xét tuyển công chức.</p>

<h2>Cấu trúc bài thi B1 VSTEP mới nhất 2025</h2>
<p>Bài thi B1 VSTEP 2025 gồm 4 kỹ năng chính: Nghe, Nói, Đọc, Viết – theo khung năng lực ngoại ngữ 6 bậc dùng cho Việt Nam. Mỗi kỹ năng có trọng số riêng và được thiết kế nhằm đánh giá toàn diện khả năng sử dụng tiếng Anh trong bối cảnh học thuật, đời sống và công việc.</p>

<h3>Kỹ năng Nghe (Listening)</h3>
<p>Gồm 4 phần, tổng cộng 35 câu. Các dạng bài phổ biến gồm: nghe hội thoại ngắn, nghe bài giảng học thuật, nghe thông báo. Lưu ý: thí sinh cần luyện phản xạ nghe nhanh và ghi chú thông tin trọng tâm.</p>

<h3>Kỹ năng Đọc (Reading)</h3>
<p>Gồm 4 phần, khoảng 40 câu. Chủ đề bài đọc đa dạng, thường là văn bản học thuật, thông báo, bài báo ngắn.</p>

<h3>Kỹ năng Viết (Writing)</h3>
<p>Gồm 2 task. Task 1 yêu cầu viết thư hoặc email, Task 2 là bài luận (120–150 từ).</p>

<h3>Kỹ năng Nói (Speaking)</h3>
<p>Thi trực tiếp với giám khảo. Gồm 3 phần: giới thiệu bản thân, thảo luận tình huống, trình bày quan điểm.</p>

<h2>Lộ trình học hiệu quả cấp tốc cho người mất gốc</h2>
<p>Để đạt chứng chỉ tiếng Anh B1 VSTEP trong thời gian ngắn, người học mất gốc cần có lộ trình học tập khoa học và tài liệu ôn thi B1 VSTEP phù hợp.</p>

<h2>Tổng kết</h2>
<p>Hy vọng qua bài viết chia sẻ về tài liệu ôn thi B1 VSTEP sẽ mang đến cho bạn thông tin bổ ích.</p>',
    ],
    [
        'name' => 'Bộ GD&ĐT công bố 36 trường được phép tổ chức thi VSTEP 2025',
        'canonical' => 'bo-gddt-cong-bo-36-truong-duoc-phep-to-chuc-thi-vstep-2025',
        'description' => 'Bộ Giáo dục và Đào tạo vừa công bố danh sách 36 trường đại học, học viện được phép tổ chức kỳ thi đánh giá năng lực tiếng Anh theo Khung năng lực ngoại ngữ 6 bậc dùng cho Việt Nam (VSTEP) năm 2025.',
        'content' => '<h2>Danh sách 36 trường được phép tổ chức thi VSTEP</h2>
<p>Bộ Giáo dục và Đào tạo vừa công bố danh sách 36 trường đại học, học viện được phép tổ chức kỳ thi đánh giá năng lực tiếng Anh theo Khung năng lực ngoại ngữ 6 bậc dùng cho Việt Nam (VSTEP) năm 2025.</p>

<h3>Khu vực Hà Nội</h3>
<ul>
<li>Đại học Hà Nội</li>
<li>Đại học Ngoại ngữ - ĐHQG Hà Nội</li>
<li>Đại học Thương mại</li>
<li>Học viện Ngoại giao</li>
</ul>

<h3>Khu vực TP. Hồ Chí Minh</h3>
<ul>
<li>Đại học Sư phạm TP.HCM</li>
<li>Đại học Kinh tế TP.HCM</li>
<li>Đại học Công nghệ TP.HCM</li>
</ul>

<h2>Lịch thi VSTEP 2025</h2>
<p>Các trường được phép tổ chức thi VSTEP sẽ công bố lịch thi cụ thể trên website của từng trường. Thí sinh cần theo dõi thông tin để đăng ký thi đúng thời hạn.</p>

<h2>Lưu ý khi đăng ký thi</h2>
<p>Thí sinh cần chuẩn bị đầy đủ hồ sơ theo quy định của từng trường và đăng ký thi trước thời hạn để đảm bảo có chỗ thi.</p>',
    ],
    [
        'name' => 'Cập nhật lịch thi VSTEP Quý 1/2026 tại các trường đại học',
        'canonical' => 'cap-nhat-lich-thi-vstep-quy-1-2026-tai-cac-truong-dai-hoc',
        'description' => 'Thông tin mới nhất về lịch thi VSTEP Quý 1/2026 tại các trường đại học trên toàn quốc. Cập nhật thường xuyên để không bỏ lỡ cơ hội đăng ký thi.',
        'content' => '<h2>Lịch thi VSTEP Quý 1/2026</h2>
<p>Dưới đây là lịch thi VSTEP Quý 1/2026 tại các trường đại học trên toàn quốc:</p>

<h3>Tháng 1/2026</h3>
<ul>
<li><strong>Đại học Hà Nội:</strong> 15/01, 22/01, 29/01</li>
<li><strong>Đại học Ngoại ngữ - ĐHQG Hà Nội:</strong> 10/01, 17/01, 24/01, 31/01</li>
<li><strong>Đại học Sư phạm TP.HCM:</strong> 12/01, 19/01, 26/01</li>
</ul>

<h3>Tháng 2/2026</h3>
<ul>
<li><strong>Đại học Hà Nội:</strong> 05/02, 12/02, 19/02, 26/02</li>
<li><strong>Đại học Ngoại ngữ - ĐHQG Hà Nội:</strong> 07/02, 14/02, 21/02, 28/02</li>
<li><strong>Đại học Sư phạm TP.HCM:</strong> 09/02, 16/02, 23/02</li>
</ul>

<h3>Tháng 3/2026</h3>
<ul>
<li><strong>Đại học Hà Nội:</strong> 05/03, 12/03, 19/03, 26/03</li>
<li><strong>Đại học Ngoại ngữ - ĐHQG Hà Nội:</strong> 07/03, 14/03, 21/03, 28/03</li>
<li><strong>Đại học Sư phạm TP.HCM:</strong> 09/03, 16/03, 23/03, 30/03</li>
</ul>

<h2>Hướng dẫn đăng ký thi</h2>
<p>Thí sinh có thể đăng ký thi trực tuyến trên website của từng trường hoặc đến trực tiếp tại phòng đào tạo của trường để đăng ký.</p>',
    ],
    [
        'name' => 'Lộ trình đạt B2 VSTEP trong 6 tháng từ con số 0',
        'canonical' => 'lo-trinh-dat-b2-vstep-trong-6-thang-tu-con-so-0',
        'description' => 'Chia sẻ lộ trình học tập chi tiết để đạt chứng chỉ B2 VSTEP trong 6 tháng dành cho người mất gốc tiếng Anh, từ con số 0 đến đạt mục tiêu.',
        'content' => '<h2>Lộ trình 6 tháng đạt B2 VSTEP</h2>
<p>Để đạt chứng chỉ B2 VSTEP trong 6 tháng từ con số 0, bạn cần có lộ trình học tập khoa học và kiên trì thực hiện.</p>

<h3>Tháng 1-2: Xây dựng nền tảng</h3>
<ul>
<li>Học ngữ pháp cơ bản: thì hiện tại, quá khứ, tương lai</li>
<li>Học từ vựng: 500-800 từ cơ bản</li>
<li>Luyện phát âm: bảng phiên âm IPA</li>
<li>Làm quen với format đề thi VSTEP</li>
</ul>

<h3>Tháng 3-4: Phát triển kỹ năng</h3>
<ul>
<li>Luyện kỹ năng Reading: skimming, scanning</li>
<li>Luyện kỹ năng Listening: nghe hiểu hội thoại</li>
<li>Luyện kỹ năng Writing: viết email, bài luận</li>
<li>Luyện kỹ năng Speaking: giới thiệu bản thân, thảo luận</li>
</ul>

<h3>Tháng 5-6: Luyện đề và tăng tốc</h3>
<ul>
<li>Làm đề thi thử full 4 kỹ năng</li>
<li>Phân tích lỗi sai và cải thiện</li>
<li>Luyện tập với giám khảo</li>
<li>Chuẩn bị tâm lý cho kỳ thi thật</li>
</ul>

<h2>Bí quyết thành công</h2>
<p>Kiên trì, có lộ trình rõ ràng và lựa chọn tài liệu học tập phù hợp là những yếu tố quan trọng để đạt được mục tiêu.</p>',
    ],
    [
        'name' => 'Mẹo Speaking VSTEP - Đạt điểm tối đa từng tiêu chí',
        'canonical' => 'meo-speaking-vstep-dat-diem-toi-da-tung-tieu-chi',
        'description' => 'Chia sẻ các mẹo và chiến thuật để đạt điểm tối đa trong phần thi Speaking VSTEP, bao gồm cách xử lý từng phần thi và các tiêu chí chấm điểm.',
        'content' => '<h2>Tiêu chí chấm điểm Speaking VSTEP</h2>
<p>Phần thi Speaking VSTEP được chấm theo 4 tiêu chí chính:</p>
<ul>
<li><strong>Fluency and Coherence:</strong> Độ trôi chảy và mạch lạc</li>
<li><strong>Lexical Resource:</strong> Từ vựng</li>
<li><strong>Grammatical Range and Accuracy:</strong> Ngữ pháp</li>
<li><strong>Pronunciation:</strong> Phát âm</li>
</ul>

<h2>Mẹo cho từng phần thi</h2>

<h3>Part 1: Giới thiệu bản thân</h3>
<ul>
<li>Chuẩn bị sẵn câu trả lời về tên, tuổi, nghề nghiệp, sở thích</li>
<li>Nói rõ ràng, tự tin</li>
<li>Tránh câu trả lời quá ngắn hoặc quá dài</li>
</ul>

<h3>Part 2: Trình bày chủ đề</h3>
<ul>
<li>Sử dụng thời gian chuẩn bị hiệu quả</li>
<li>Ghi chú các ý chính</li>
<li>Nói đủ thời gian quy định</li>
</ul>

<h3>Part 3: Thảo luận</h3>
<ul>
<li>Thể hiện quan điểm rõ ràng</li>
<li>Sử dụng từ nối để liên kết ý</li>
<li>Đưa ra ví dụ cụ thể</li>
</ul>

<h2>Lưu ý quan trọng</h2>
<p>Luyện tập thường xuyên với bạn bè hoặc giáo viên, ghi âm lại để tự đánh giá và cải thiện phát âm là cách hiệu quả để nâng cao điểm số.</p>',
    ],
];

// Cập nhật hoặc tạo các bài viết tin tức
echo "Đang tạo/cập nhật các bài viết tin tức...\n";
foreach ($newsPosts as $index => $postData) {
    // Kiểm tra xem bài viết đã tồn tại chưa
    $existingPost = Post::whereHas('languages', function($query) use ($postData, $languageId) {
        $query->where('post_language.canonical', $postData['canonical'])
              ->where('post_language.language_id', $languageId);
    })->first();
    
    if ($existingPost) {
        // Cập nhật bài viết hiện có
        $post = $existingPost;
        echo "Cập nhật bài viết: {$postData['name']} (ID: {$post->id})\n";
    } else {
        // Tạo bài viết mới
        $post = Post::create([
            'post_catalogue_id' => $newsCatalogue->id,
            'image' => '',
            'publish' => 2,
            'order' => $index + 1,
            'user_id' => $userId,
        ]);
        echo "Tạo bài viết mới: {$postData['name']} (ID: {$post->id})\n";
    }
    
    // Cập nhật hoặc tạo language pivot
    $post->languages()->syncWithoutDetaching([
        $languageId => [
            'name' => $postData['name'],
            'canonical' => $postData['canonical'],
            'meta_title' => $postData['name'],
            'meta_keyword' => 'VSTEP, tiếng Anh, chứng chỉ',
            'meta_description' => $postData['description'],
            'description' => $postData['description'],
            'content' => $postData['content'],
        ]
    ]);
    
    // Đảm bảo post thuộc về catalogue
    $post->post_catalogues()->syncWithoutDetaching([$newsCatalogue->id]);
    
    // Tạo hoặc cập nhật router
    $controllerName = 'App\Http\Controllers\Frontend\PostController';
    $router = Router::where('module_id', $post->id)
        ->where('controllers', $controllerName)
        ->where('language_id', $languageId)
        ->first();
    
    if ($router) {
        $router->update(['canonical' => $postData['canonical']]);
        echo "  - Cập nhật router (ID: {$router->id})\n";
    } else {
        Router::create([
            'canonical' => $postData['canonical'],
            'module_id' => $post->id,
            'controllers' => $controllerName,
            'language_id' => $languageId,
        ]);
        echo "  - Tạo router mới\n";
    }
}

echo "\nHoàn thành! Đã tạo/cập nhật " . count($newsPosts) . " bài viết tin tức.\n";

