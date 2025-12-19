<?php
namespace App\Classes;

class System{

    public function config(){
        $data['homepage'] = [
            'label' => 'Thông tin chung',
            'description' => 'Cài đặt đầy đủ thông tin chung của website. Tên thương hiệu hiệu website, Logo, Favicon, vv...',
            'value' => [
                'company' => ['type' => 'text', 'label' => 'Tên công ty'],
                'brand' => ['type' => 'text', 'label' => 'Tên thương hiệu'],
                'slogan' => ['type' => 'text', 'label' => 'Slogan'],
                'logo' => ['type' => 'images', 'label' => 'Logo Website', 'title' => 'Click vào ô phía dưới để tải logo'],
                'logo_mobile' => ['type' => 'images', 'label' => 'Logo Mobile', 'title' => 'Click vào ô phía dưới để tải logo'],
                'favicon' => ['type' => 'images', 'label' => 'Favicon', 'title' => 'Click vào ô phía dưới để tải logo'],
                'copyright' => ['type' => 'text', 'label' => 'Copyright'],
                'flashSale' => ['type' => 'text', 'label' => 'Khuyến mãi'],
                'website' => [
                    'type' => 'select', 
                    'label' => 'Tình trạng website',
                    'option' => [
                        'open' => 'Mở cửa website',
                        'close' => 'Website đang bảo trì'
                    ]
                ],
                'video_youtube_pc' => [
                    'type' => 'textarea', 
                    'label' => 'Video youtube(pc)', 
                ],
                'viettelpost_email' => ['type' => 'text', 'label' => 'Email Viettel Post'],
                'viettelpost_password' => ['type' => 'text', 'label' => 'Password Viettel Post'],
            ]
        ];

        $data['contact'] = [
            'label' => 'Thông tin liên hệ',
            'description' => 'Cài đặt thông tin liên hệ của website ví dụ: Địa chỉ công ty, Văn phòng giao dịch, Hotline, Bản đồ, vv...',
            'value' => [
                'office' => ['type' => 'text', 'label' => 'Địa chỉ công ty'],
                'office_map' => [
                    'type' => 'textarea', 
                    'label' => 'Bản đồ công ty',
                    'link' => [
                        'text' => 'Hướng dẫn thiết lập bản đồ',
                        'href' => 'https://manhan.vn/hoc-website-nang-cao/huong-dan-nhung-ban-do-vao-website/',
                        'target' => '_blank'
                    ]
                ],
                'address' => ['type' => 'text', 'label' => 'Văn phòng giao dịch'],
                'hotline' => ['type' => 'text', 'label' => 'Hotline'],
                'technical_phone' => ['type' => 'text', 'label' => 'Hotline kỹ thuật'],
                'sell_phone' => ['type' => 'text', 'label' => 'Hotline kinh doanh'],
                'phone' => ['type' => 'text', 'label' => 'Số cố định'],
                'zalo' => ['type' => 'text', 'label' => 'Số Zalo'],
                'mess' => ['type' => 'text', 'label' => 'Mess'],
                'fax' => ['type' => 'text', 'label' => 'Fax'],
                'email' => ['type' => 'text', 'label' => 'Email'],
                'website' => ['type' => 'text', 'label' => 'Website'],
                'map' => [
                    'type' => 'textarea', 
                    'label' => 'Bản đồ', 
                    'link' => [
                        'text' => 'Hướng dẫn thiết lập bản đồ',
                        'href' => 'https://manhan.vn/hoc-website-nang-cao/huong-dan-nhung-ban-do-vao-website/',
                        'target' => '_blank'
                    ]
                ],
                'intro' => ['type' => 'textarea', 'label' => 'Giới thiệu'],
            ]
        ];
      
        $data['seo'] = [
            'label' => 'Cấu hình SEO dành cho trang chủ',
            'description' => 'Cài đặt đầy đủ thông tin về SEO của trang chủ website. Bao gồm tiêu đề SEO, Từ Khóa SEO, Mô Tả SEO, Meta images',
            'value' => [
                'meta_title' => ['type' => 'text', 'label' => 'Tiêu đề SEO'],
                'meta_keyword' => ['type' => 'text', 'label' => 'Từ khóa SEO'],
                'meta_description' => ['type' => 'textarea', 'label' => 'Mô tả SEO'],
                'meta_images' => ['type' => 'images', 'label' => 'Ảnh SEO'],
            ]
        ];

        $data['social'] = [
            'label' => 'Cấu hình Mạng xã hội dành cho trang chủ',
            'description' => 'Cài đặt đầy đủ thông tin về Mạng xã hội của trang chủ website. Bao gồm tiêu đề Mạng xã hội, Từ Khóa SEO, Mô Tả SEO, Meta images',
            'value' => [
                'facebook' => ['type' => 'text', 'label' => 'Facebook'],
                'google' => ['type' => 'text', 'label' => 'Google'],
                'tiktok' => ['type' => 'text', 'label' => 'Tiktok'],
                'twitter' => ['type' => 'text', 'label' => 'Twitter'],
                'messenger' => ['type' => 'text', 'label' => 'Messenger'],
                'zalo' => ['type' => 'text', 'label' => 'Zalo'],
                'youtube' => ['type' => 'text', 'label' => 'Youtube'],
                'instagram' => ['type' => 'text', 'label' => 'Instagram'],
                'lazada' => ['type' => 'text', 'label' => 'Lazada'],
                'shopee' => ['type' => 'text', 'label' => 'Shopee'],
            ]
        ];

        // $data['background'] = [
        //     'label' => 'Cấu hình background',
        //     'description' => '',
        //     'value' => [
        //         '1' => ['type' => 'images', 'label' => 'Background (banner)'],
        //         '2' => ['type' => 'images', 'label' => 'Background (đăng ký)'],
        //         '3' => ['type' => 'images', 'label' => 'Background (logo)'],
        //     ]
        // ];

        // $data['text'] = [
        //     'label' => 'Cấu hình text',
        //     'description' => '',
        //     'value' => [
        //         '1' => ['type' => 'text', 'label' => 'Text_1'],
        //         '2' => ['type' => 'text', 'label' => 'Text_2'],
        //         '3' => ['type' => 'textarea', 'label' => 'Text_3'],
        //         '4' => ['type' => 'text', 'label' => 'Text_4'],
        //         '5' => ['type' => 'text', 'label' => 'Text_5'],
        //         '6' => ['type' => 'textarea', 'label' => 'Text_6'],
        //         '7' => ['type' => 'text', 'label' => 'Text_7'],
        //         '8' => ['type' => 'text', 'label' => 'Text_8'],
        //         '9' => ['type' => 'text', 'label' => 'Text_9'],
        //         '10' => ['type' => 'text', 'label' => 'Text_10'],
        //         '11' => ['type' => 'text', 'label' => 'Text_11'],
        //         '12' => ['type' => 'text', 'label' => 'Text_12'],
        //     ]
        // ];

        
        $data['script'] = [
            'label' => 'Cấu hình script',
            'description' => '',
            'value' => [
                '1' => ['type' => 'textarea', 'label' => 'Script Head'],
                '2' => ['type' => 'textarea', 'label' => 'Script Body'],
            ]
        ];

        // $data['bank'] = [
        //     'label' => 'Cấu hình thanh toán',
        //     'description' => '',
        //     'value' => [
        //         '1' => ['type' => 'text', 'label' => 'Ngân hàng'],
        //         '2' => ['type' => 'text', 'label' => 'Số tài khoản'],
        //         '3' => ['type' => 'text', 'label' => 'Chủ tài khoản'],
        //         '4' => ['type' => 'images', 'label' => 'QR code'],
        //     ]
        // ];

        $data['lecturer'] = [
            'label' => 'Cấu hình Giảng viên',
            'description' => 'Cấu hình ảnh và nội dung hiển thị trên trang danh sách giảng viên',
            'value' => [
                'featured_image' => ['type' => 'images', 'label' => 'Ảnh giảng viên nổi bật', 'title' => 'Click để tải ảnh giảng viên'],
                'intro_text_1' => ['type' => 'textarea', 'label' => 'Giới thiệu dòng 1'],
                'intro_text_2' => ['type' => 'textarea', 'label' => 'Giới thiệu dòng 2'],
                'feature_1_title' => ['type' => 'text', 'label' => 'Tính năng 1 - Tiêu đề'],
                'feature_1_content' => ['type' => 'textarea', 'label' => 'Tính năng 1 - Nội dung'],
                'feature_2_title' => ['type' => 'text', 'label' => 'Tính năng 2 - Tiêu đề'],
                'feature_2_content' => ['type' => 'textarea', 'label' => 'Tính năng 2 - Nội dung'],
                'feature_3_title' => ['type' => 'text', 'label' => 'Tính năng 3 - Tiêu đề'],
                'feature_3_content' => ['type' => 'textarea', 'label' => 'Tính năng 3 - Nội dung'],
                'grid_title' => ['type' => 'text', 'label' => 'Tiêu đề danh sách giảng viên'],
                'grid_description' => ['type' => 'textarea', 'label' => 'Mô tả danh sách giảng viên'],
            ]
        ];

        $data['product_cta'] = [
            'label' => 'Cấu hình CTA Sản phẩm',
            'description' => 'Cấu hình nội dung hiển thị trong khối CTA sidebar bên phải trang chi tiết sản phẩm',
            'value' => [
                'cta_button_text' => ['type' => 'text', 'label' => 'Text nút CTA (ví dụ: Nhắn VSTEP EASY ngay)'],
                'cta_button_link' => ['type' => 'text', 'label' => 'Link nút CTA'],
                'overview_title' => ['type' => 'text', 'label' => 'Tiêu đề tổng quan (ví dụ: Tổng quan khóa Xây dựng nền tảng)'],
                'overview_item_1' => ['type' => 'textarea', 'label' => 'Mục 1 - Đầu ra'],
                'overview_item_2' => ['type' => 'textarea', 'label' => 'Mục 2 - Học online'],
                'overview_item_3' => ['type' => 'textarea', 'label' => 'Mục 3 - Nội dung khóa học'],
                'overview_item_4' => ['type' => 'textarea', 'label' => 'Đặc biệt - Ưu đãi'],
            ]
        ];

        $data['data_cta'] = [
            'label' => 'Cấu hình CTA VSTEP',
            'description' => 'Cấu hình nội dung hiển thị trong khối CTA VSTEP trên trang chủ',
            'value' => [
                'title' => ['type' => 'text', 'label' => 'Tiêu đề dòng 1 (ví dụ: Sẵn sàng đạt chứng chỉ VSTEP chỉ sau)'],
                'title_highlight' => ['type' => 'text', 'label' => 'Tiêu đề dòng 2 - Highlight (ví dụ: 6-12 tuần?)'],
                'subtitle' => ['type' => 'textarea', 'label' => 'Mô tả phụ (ví dụ: Đăng ký ngay để nhận tư vấn miễn phí...)'],
                'button_1_text' => ['type' => 'text', 'label' => 'Text nút 1 (ví dụ: Đăng ký tư vấn)'],
                'button_1_link' => ['type' => 'text', 'label' => 'Link nút 1 (để # nếu mở popup)'],
                'button_2_text' => ['type' => 'text', 'label' => 'Text nút 2 (ví dụ: Đặt mua khóa học)'],
                'button_2_link' => ['type' => 'text', 'label' => 'Link nút 2'],
            ]
        ];
       
        return $data;
    }
	
}
