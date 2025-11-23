<?php
namespace App\Classes;

class Introduce{

    public function config(){
        // Khối 1: Hero với số liệu thống kê
        $data['block_1'] = [
            'label' => 'Khối 1: Hero Section',
            'description' => 'Phần hero với tiêu đề, mô tả, số liệu thống kê và nút CTA',
            'value' => [
                'label' => ['type' => 'text', 'label' => 'Label (màu cam)'],
                'title' => ['type' => 'text', 'label' => 'Tiêu đề chính'],
                'description' => ['type' => 'textarea', 'label' => 'Mô tả'],
                'number_1' => ['type' => 'text', 'label' => 'Số liệu 1 (ví dụ: 5200+)'],
                'text_1' => ['type' => 'text', 'label' => 'Text số liệu 1'],
                'number_2' => ['type' => 'text', 'label' => 'Số liệu 2 (ví dụ: 35)'],
                'text_2' => ['type' => 'text', 'label' => 'Text số liệu 2'],
                'number_3' => ['type' => 'text', 'label' => 'Số liệu 3 (ví dụ: 92%)'],
                'text_3' => ['type' => 'text', 'label' => 'Text số liệu 3'],
                'button_1' => ['type' => 'text', 'label' => 'Nút 1'],
                'button_1_link' => ['type' => 'text', 'label' => 'Link Nút 1'],
                'button_2' => ['type' => 'text', 'label' => 'Nút 2'],
                'button_2_link' => ['type' => 'text', 'label' => 'Link Nút 2'],
                'background' => ['type' => 'images', 'label' => 'Ảnh nền'],
            ]
        ];
        
        // Khối 2: Sứ mệnh (có editor cho phần tích xanh)
        $data['block_2'] = [
            'label' => 'Khối 2: Sứ mệnh',
            'description' => 'Phần sứ mệnh với tiêu đề, mô tả, danh sách tính năng, 2 box số liệu và ảnh',
            'value' => [
                'label' => ['type' => 'text', 'label' => 'Label (màu cam)'],
                'title' => ['type' => 'text', 'label' => 'Tiêu đề khối'],
                'description' => ['type' => 'textarea', 'label' => 'Mô tả'],
                'content' => ['type' => 'editor', 'label' => 'Nội dung (danh sách tích xanh - dùng ul)'],
                'number_1' => ['type' => 'text', 'label' => 'Số liệu 1 (ví dụ: 5.200+)'],
                'text_1' => ['type' => 'text', 'label' => 'Text số liệu 1'],
                'number_2' => ['type' => 'text', 'label' => 'Số liệu 2 (ví dụ: 92%)'],
                'text_2' => ['type' => 'text', 'label' => 'Text số liệu 2'],
                'image' => ['type' => 'images', 'label' => 'Ảnh bên phải'],
                'overlay_label' => ['type' => 'text', 'label' => 'Label overlay (ví dụ: CAM KẾT ĐẦU RA)'],
                'overlay_title' => ['type' => 'text', 'label' => 'Tiêu đề overlay'],
                'overlay_description' => ['type' => 'textarea', 'label' => 'Mô tả overlay'],
            ]
        ];
        
        // Khối 3: Lộ trình
        $data['block_3'] = [
            'label' => 'Khối 3: Lộ trình',
            'description' => 'Phần lộ trình học tập theo tuần',
            'value' => [
                'label' => ['type' => 'text', 'label' => 'Label (màu cam)'],
                'title' => ['type' => 'text', 'label' => 'Tiêu đề khối'],
                'image' => ['type' => 'images', 'label' => 'Ảnh bên trái'],
                'overlay_prefix' => ['type' => 'text', 'label' => 'Text prefix overlay (ví dụ: Áp dụng cho hơn)'],
                'overlay_number' => ['type' => 'text', 'label' => 'Số trong overlay (ví dụ: 985/1000)'],
                'overlay_text' => ['type' => 'text', 'label' => 'Text overlay (ví dụ: Học viên B2 - tháng 11/2025)'],
                'week_0' => ['type' => 'textarea', 'label' => 'Tuần 0'],
                'week_1_2' => ['type' => 'textarea', 'label' => 'Tuần 1-2'],
                'week_3_4' => ['type' => 'textarea', 'label' => 'Tuần 3-4'],
                'week_5_6' => ['type' => 'textarea', 'label' => 'Tuần 5-6'],
                'week_7' => ['type' => 'textarea', 'label' => 'Tuần 7'],
                'week_8' => ['type' => 'textarea', 'label' => 'Tuần 8'],
            ]
        ];
        
        // Khối 4: Ảnh thực tế
        $data['block_4'] = [
            'label' => 'Khối 4: Ảnh thực tế',
            'description' => 'Phần hiển thị ảnh thực tế lớp học (tối đa 5 ảnh)',
            'value' => [
                'label' => ['type' => 'text', 'label' => 'Label (màu cam)'],
                'title' => ['type' => 'text', 'label' => 'Tiêu đề khối'],
                'image_1' => ['type' => 'images', 'label' => 'Ảnh 1'],
                'text_1' => ['type' => 'text', 'label' => 'Text ảnh 1'],
                'image_2' => ['type' => 'images', 'label' => 'Ảnh 2'],
                'text_2' => ['type' => 'text', 'label' => 'Text ảnh 2'],
                'image_3' => ['type' => 'images', 'label' => 'Ảnh 3'],
                'text_3' => ['type' => 'text', 'label' => 'Text ảnh 3'],
                'image_4' => ['type' => 'images', 'label' => 'Ảnh 4'],
                'text_4' => ['type' => 'text', 'label' => 'Text ảnh 4'],
                'image_5' => ['type' => 'images', 'label' => 'Ảnh 5'],
                'text_5' => ['type' => 'text', 'label' => 'Text ảnh 5'],
            ]
        ];
        
        // Khối 5: Lịch khai giảng & giữ chỗ thi
        $data['block_5'] = [
            'label' => 'Khối 5: Lịch khai giảng & giữ chỗ thi',
            'description' => 'Phần lịch khai giảng và timeline giữ chỗ thi',
            'value' => [
                'label' => ['type' => 'text', 'label' => 'Label (màu cam)'],
                'title' => ['type' => 'text', 'label' => 'Tiêu đề khối'],
                'subtitle' => ['type' => 'textarea', 'label' => 'Mô tả phụ'],
                'schedule_title' => ['type' => 'text', 'label' => 'Tiêu đề bảng lịch'],
                'schedule_table' => ['type' => 'editor', 'label' => 'Bảng lịch học (HTML table)'],
                'timeline_title' => ['type' => 'text', 'label' => 'Tiêu đề timeline'],
                'timeline_1_text_1' => ['type' => 'text', 'label' => 'Timeline 1 - Text 1 (ví dụ: Tuần -2)'],
                'timeline_1_text_2' => ['type' => 'textarea', 'label' => 'Timeline 1 - Text 2 (mô tả)'],
                'timeline_2_text_1' => ['type' => 'text', 'label' => 'Timeline 2 - Text 1 (ví dụ: Tuần -1)'],
                'timeline_2_text_2' => ['type' => 'textarea', 'label' => 'Timeline 2 - Text 2 (mô tả)'],
                'timeline_3_text_1' => ['type' => 'text', 'label' => 'Timeline 3 - Text 1 (ví dụ: Tuần 0)'],
                'timeline_3_text_2' => ['type' => 'textarea', 'label' => 'Timeline 3 - Text 2 (mô tả)'],
                'timeline_4_text_1' => ['type' => 'text', 'label' => 'Timeline 4 - Text 1 (ví dụ: Tuần 6)'],
                'timeline_4_text_2' => ['type' => 'textarea', 'label' => 'Timeline 4 - Text 2 (mô tả)'],
            ]
        ];
        
        // Khối 6: CTA Section (Sẵn sàng đạt chứng chỉ)
        $data['block_6'] = [
            'label' => 'Khối 6: CTA Section',
            'description' => 'Phần call-to-action với tiêu đề và nút đăng ký',
            'value' => [
                'title' => ['type' => 'text', 'label' => 'Tiêu đề dòng 1'],
                'title_highlight' => ['type' => 'text', 'label' => 'Tiêu đề dòng 2 (highlight)'],
                'subtitle' => ['type' => 'textarea', 'label' => 'Mô tả'],
                'button_1' => ['type' => 'text', 'label' => 'Nút 1'],
                'button_1_link' => ['type' => 'text', 'label' => 'Link Nút 1'],
                'button_2' => ['type' => 'text', 'label' => 'Nút 2'],
                'button_2_link' => ['type' => 'text', 'label' => 'Link Nút 2'],
            ]
        ];
        
        // Khối 7: Form đăng ký
        $data['block_7'] = [
            'label' => 'Khối 7: Form đăng ký',
            'description' => 'Phần form đăng ký với logo, tiêu đề và các tính năng',
            'value' => [
                'title_line1' => ['type' => 'text', 'label' => 'Tiêu đề dòng 1'],
                'title_line2' => ['type' => 'text', 'label' => 'Tiêu đề dòng 2'],
                'form_title' => ['type' => 'text', 'label' => 'Tiêu đề form'],
                'form_subtitle' => ['type' => 'text', 'label' => 'Mô tả form'],
            ]
        ];
        
        // Khối 8: Giảng viên (dữ liệu từ post_catalogues)
        $data['block_8'] = [
            'label' => 'Khối 8: Giảng viên',
            'description' => 'Phần hiển thị giảng viên (dữ liệu từ post_catalogues)',
            'value' => [
                'label' => ['type' => 'text', 'label' => 'Label (màu cam)'],
                'title' => ['type' => 'text', 'label' => 'Tiêu đề khối'],
                'subtitle' => ['type' => 'textarea', 'label' => 'Mô tả'],
            ]
        ];
        
        return $data;
    }
	
}
