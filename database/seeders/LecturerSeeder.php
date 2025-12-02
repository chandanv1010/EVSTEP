<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Lecturer;
use Illuminate\Support\Str;

class LecturerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $lecturers = [
            [
                'name' => 'Đoàn Thị Lệ',
                'birth_year' => '2001',
                'position' => 'Giảng viên tiếng Anh',
                'degree' => 'Cử nhân Ngôn ngữ Anh - Đại học Bách Khoa Hà Nội',
                'teaching_certificate' => 'Có',
                'experience' => '<ul>
<li>Có kinh nghiệm giảng dạy từ 2019 cho học sinh trình độ sơ cấp và trung cấp</li>
<li>Giảng dạy TOEIC, IELTS mục tiêu đạt 5.5-6.5</li>
<li>Dạy kèm 1-1 (Phát âm, giao tiếp, ngữ pháp)</li>
</ul>',
                'canonical' => Str::slug('Đoàn Thị Lệ'),
                'publish' => 1,
            ],
            [
                'name' => 'Ngô Thị Yến Nhi',
                'birth_year' => '2002',
                'position' => 'Giảng viên tiếng Anh',
                'degree' => 'Cử nhân Sư phạm Tiếng Anh - Đại học Đồng Nai',
                'teaching_certificate' => 'Có',
                'experience' => '<p>4 năm kinh nghiệm giảng dạy tiếng Anh (từ 2022), từng đảm nhận nhiều vai trò đa dạng:</p>
<ul>
<li>Giảng dạy cho trẻ em, thanh thiếu niên và người lớn (theo chương trình Cambridge, Oxford, tiếng Anh giao tiếp và tiếng Anh thương mại).</li>
<li>Hướng dẫn luyện thi các chứng chỉ quốc tế (PTE, KET, PET, IELTS).</li>
<li>Đóng vai trò giám khảo các kỳ thi đánh giá trình độ tiếng Anh cho học sinh phổ thông.</li>
<li>Tham gia xây dựng học liệu, thiết kế giáo án và quản lý chất lượng giảng dạy trong môi trường học thuật.</li>
</ul>',
                'canonical' => Str::slug('Ngô Thị Yến Nhi'),
                'publish' => 1,
            ],
            [
                'name' => 'Hoàng Phương Nga',
                'birth_year' => '2001',
                'position' => 'Giảng viên tiếng Anh',
                'degree' => 'Cử nhân Ngôn ngữ Anh - Đại học Bách Khoa Hà Nội',
                'teaching_certificate' => 'Có',
                'experience' => '<ul>
<li>Có kinh nghiệm giảng dạy từ 2019 cho học sinh trình độ từ mầm non, tiểu học, trung học</li>
<li>Giảng dạy kèm 1-1 theo chương trình của trung tâm.</li>
</ul>',
                'canonical' => Str::slug('Hoàng Phương Nga'),
                'publish' => 1,
            ],
            [
                'name' => 'Trần Thị Phương Trinh',
                'birth_year' => '2003',
                'position' => 'Giảng viên tiếng Anh',
                'degree' => '- Cử nhân chuyên ngành Sư Phạm Tiếng Anh (loại Xuất sắc Đại học Sài Gòn)
- IELTS 7.5',
                'teaching_certificate' => null,
                'experience' => '<ul>
<li>Giảng dạy IELTS (Reading, Writing, Speaking) cả online và offline, hỗ trợ học viên luyện đề, phát triển kỹ năng và chuẩn bị thi.</li>
<li>Kinh nghiệm gia sư tiếng Anh 1-1 cho nhiều cấp độ (lớp 6–12, luyện thi đại học), xây dựng giáo án phù hợp năng lực học sinh.</li>
<li>Trợ giảng cho giáo viên nước ngoài trong các chương trình tiếng Anh A2–B1, ôn luyện IELTS và luyện thi tuyển sinh lớp 10.</li>
</ul>',
                'canonical' => Str::slug('Trần Thị Phương Trinh'),
                'publish' => 1,
            ],
        ];

        foreach ($lecturers as $lecturer) {
            Lecturer::create($lecturer);
        }
    }
}
