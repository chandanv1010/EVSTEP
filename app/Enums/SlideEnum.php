<?php 
namespace App\Enums;


enum SlideEnum: string {
    
    const MAIN = 'main-slide';
    const TECHSTAFF = 'teaching-staff';
    const PARTNER = 'partner';
    const WHYCHOOSE = 'why-choose-us';
    const MOBILE = 'mobile-slide';
    const REAL_IMAGES = 'real-images';

    public static function toArray(){
        return [
            self::MAIN => 'main-slide',
            self::MOBILE => 'mobile-slide',
            self::TECHSTAFF => 'teaching-staff',
            self::PARTNER => 'partner',
            self::WHYCHOOSE => 'why-choose-us',
            self::REAL_IMAGES => 'real-images',
        ];
    }

}