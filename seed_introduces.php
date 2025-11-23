<?php

require __DIR__.'/vendor/autoload.php';

$app = require_once __DIR__.'/bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use App\Models\Introduce;
use App\Models\Language;
use Illuminate\Support\Facades\DB;

// Xóa toàn bộ dữ liệu trong bảng introduces
echo "Xóa dữ liệu cũ trong bảng introduces...\n";
DB::table('introduces')->truncate();
echo "Đã xóa xong.\n\n";

// Lấy language_id = 1 (tiếng Việt)
$language = Language::where('canonical', 'vn')->first();
if (!$language) {
    die("Không tìm thấy language với canonical = 'vn'\n");
}
$languageId = $language->id;
$userId = 1; // User ID mặc định

// Dữ liệu mẫu cho các khối - mỗi field là một record riêng
$introduces = [
    // Khối 1: Hero Section
    'block_1_label' => 'Trung tâm luyện thi EVSTEP bậc 3/6',
    'block_1_title' => 'Chúng tôi giúp người Việt chinh phục chứng chỉ VSTEP nhanh – gọn – hiệu quả',
    'block_1_description' => 'EVSTEP kết hợp công nghệ học tập cá nhân hóa, đội ngũ giám khảo giàu kinh nghiệm và quy trình mentor nghiêm ngặt để đảm bảo tất cả học viên đạt chuẩn đầu ra.',
    'block_1_number_1' => '5200+',
    'block_1_text_1' => 'Học viên đạt VSTEP',
    'block_1_number_2' => '35',
    'block_1_text_2' => 'Giám khảo đồng hành',
    'block_1_number_3' => '92%',
    'block_1_text_3' => 'Đạt mục tiêu ngay lần đầu',
    'block_1_button_1' => 'Xem giải pháp',
    'block_1_button_1_link' => '#',
    'block_1_button_2' => 'Hành trình 10 năm',
    'block_1_button_2_link' => '#',
    'block_1_background' => '',
    
    // Khối 2: Sứ mệnh
    'block_2_label' => 'SỨ MỆNH',
    'block_2_title' => 'Mang chứng chỉ VSTEP đến gần hơn với người đi làm và sinh viên Việt Nam',
    'block_2_description' => 'Chúng tôi tin rằng chuẩn ngoại ngữ quốc gia phải đơn giản, minh bạch và dễ tiếp cận với tất cả mọi người, bất kể họ có lịch trình bận rộn hay thiếu nền tảng tiếng Anh.',
    'block_2_content' => '<p>EVSTEP được thành lập năm 2013, khởi đầu bằng các lớp luyện thi trực tiếp tại Hà Nội. Sau đại dịch, chúng tôi số hóa toàn bộ chương trình, đưa 100% lộ trình lên nền tảng trực tuyến để học viên toàn quốc có thể tham gia.</p><ul><li>Hệ sinh thái học trực tuyến với hơn 450 video bài giảng, 180 đề luyện chuẩn cấu trúc.</li><li>Đội ngũ 35 giám khảo Speaking - Writing, từng trực tiếp chấm thi tại 12 đơn vị được cấp phép.</li><li>Quy trình mentor kèm cặp 1-1 cho từng học viên, báo cáo tiến độ tự động qua dashboard.</li></ul>',
    'block_2_number_1' => '5.200+',
    'block_2_text_1' => 'Học viên đỗ VSTEP A1 - B2',
    'block_2_number_2' => '92%',
    'block_2_text_2' => 'Đạt mục tiêu ngay lần thi đầu tiên',
    'block_2_image' => '',
    'block_2_overlay_label' => 'CAM KẾT ĐẦU RA',
    'block_2_overlay_title' => 'Hợp đồng rõ ràng – hoàn phí nếu không đạt',
    'block_2_overlay_description' => '100% học viên ký cam kết với mục tiêu điểm cụ thể trước khi bắt đầu.',
    
    // Khối 3: Lộ trình
    'block_3_label' => 'LỘ TRÌNH',
    'block_3_title' => 'Chia nhỏ từng tuần, đảm bảo tiến độ từng kỹ năng',
    'block_3_image' => '',
    'block_3_overlay_number' => '985/1000',
    'block_3_overlay_text' => 'Học viên B2 – tháng 11/2025',
    'block_3_week_0' => 'Onboarding: Diagnostic test + ký cam kết đầu ra, cài đặt app luyện phát âm & hướng dẫn dashboard.',
    'block_3_week_1_2' => 'Nền tảng ngữ âm & từ vựng: Listening shadowing, SRS từ vựng, bắt đầu viết đoạn 80 từ theo form.',
    'block_3_week_3_4' => 'Skill Lab: Speaking Part 2-3, Writing Task 2, chiến thuật phân bố thời gian Reading.',
    'block_3_week_5_6' => 'Intensive: 3 mock full skill/tuần, feedback 6 giờ, sửa từng câu nối và grammar band 4+.',
    'block_3_week_7' => 'Exam sprint: Duyệt hồ sơ thi, đặt lịch giữ chỗ, tập trung vào điểm yếu qua drills 15 phút/ngày.',
    'block_3_week_8' => 'Sim test & coaching cá nhân: Thi thử format chuẩn, mentor review performance và lên chiến thuật thi thật.',
    
    // Khối 4: Ảnh thực tế
    'block_4_label' => 'ẢNH THỰC TẾ',
    'block_4_title' => 'Đây là lớp chúng tôi đang vận hành',
    
    // Khối 5: Lịch khai giảng & giữ chỗ thi
    'block_5_label' => 'LỊCH KHAI GIẢNG & GIỮ CHỖ THI',
    'block_5_title' => 'Chọn ca học phù hợp – giữ chỗ chứng chỉ ngay',
    'block_5_subtitle' => 'EVSTEP mở lớp mới hàng tháng. Bảng dưới là các ca đang tuyển học viên, kèm timeline giữ chỗ thi VSTEP tại trường đối tác.',
    'block_5_schedule_title' => 'Lịch mở lớp tháng 11 – 01',
    'block_5_schedule_table' => '<table class="schedule-table">
<thead>
<tr>
<th>Lớp</th>
<th>Khai giảng</th>
<th>Lịch học</th>
<th>Ghi chú</th>
</tr>
</thead>
<tbody>
<tr>
<td>Tăng tốc 6 tuần</td>
<td>25/11/2025</td>
<td>Tối T2-4-6 (19:30-21:30)</td>
<td>Chỉ nhận 18 HV • Có speaking lab</td>
</tr>
<tr>
<td>Foundation 8 tuần</td>
<td>09/12/2025</td>
<td>Sáng T3-5-7 (08:30-10:30)</td>
<td>Cho HV mất gốc • kèm 1-1 2 buổi</td>
</tr>
<tr>
<td>Weekend Hybrid</td>
<td>04/01/2026</td>
<td>Chiều T7 & CN (14:00-16:30)</td>
<td>Lớp kết hợp online + offline</td>
</tr>
</tbody>
</table>',
    'block_5_timeline_title' => 'Timeline giữ chỗ chứng chỉ',
    'block_5_timeline_1_text_1' => 'Tuần -2',
    'block_5_timeline_1_text_2' => 'Nộp hồ sơ scan, EVSTEP kiểm tra điều kiện thi & tư vấn trường phù hợp.',
    'block_5_timeline_2_text_1' => 'Tuần -1',
    'block_5_timeline_2_text_2' => 'Đặt cọc giữ chỗ lịch thi (Hà Nội / HCM / Đà Nẵng), xác nhận bằng email chính thức.',
    'block_5_timeline_3_text_1' => 'Tuần 0',
    'block_5_timeline_3_text_2' => 'Nộp hồ sơ gốc, nhận giấy hẹn thi & hướng dẫn quy chế phòng thi.',
    'block_5_timeline_4_text_1' => 'Tuần 6',
    'block_5_timeline_4_text_2' => 'Chốt band mục tiêu, mô phỏng buổi thi thật cùng giám khảo để tránh tâm lý.',
    
    // Khối 6: CTA Section
    'block_6_title' => 'Sẵn sàng đạt chứng chỉ VSTEP chỉ sau',
    'block_6_title_highlight' => '6 – 12 tuần?',
    'block_6_subtitle' => 'Đăng ký ngay để nhận tư vấn miễn phí, test trình độ đầu vào và ưu đãi học phí lên tới 20% trong tháng 11.',
    'block_6_button_1' => 'Đăng ký tư vấn',
    'block_6_button_1_link' => '#',
    'block_6_button_2' => 'Đặt mua khóa học',
    'block_6_button_2_link' => '#',
    
    // Khối 7: Form đăng ký
    'block_7_title_line1' => 'Ôn luyện VSTEP',
    'block_7_title_line2' => 'ngay hôm nay',
    'block_7_form_title' => 'Đăng ký ngay',
    'block_7_form_subtitle' => 'Tư vấn miễn phí',
    
    // Khối 8: Giảng viên
    'block_8_label' => 'ĐỘI NGŨ',
    'block_8_title' => 'Giảng viên & cố vấn chuyên môn',
    'block_8_subtitle' => 'Đội ngũ giám khảo, giáo viên lâu năm trực tiếp huấn luyện và chấm chữa bài thi.',
];

// Thêm dữ liệu vào bảng introduces - mỗi field là một record
echo "Thêm dữ liệu mới vào bảng introduces...\n";
foreach ($introduces as $keyword => $content) {
    Introduce::create([
        'keyword' => $keyword,
        'content' => $content,
        'language_id' => $languageId,
        'user_id' => $userId,
    ]);
    echo "Đã thêm: {$keyword}\n";
}

echo "\nHoàn thành!\n";

