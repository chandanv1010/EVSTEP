<?php

require __DIR__.'/vendor/autoload.php';

$app = require_once __DIR__.'/bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

echo "Bắt đầu sửa canonical thành slug không dấu...\n\n";

// Danh sách các bảng cần sửa
$tables = [
    'post_catalogue_language' => [
        'controller' => 'PostCatalogueController',
        'module_field' => 'post_catalogue_id',
    ],
    'post_language' => [
        'controller' => 'PostController',
        'module_field' => 'post_id',
    ],
    'product_catalogue_language' => [
        'controller' => 'ProductCatalogueController',
        'module_field' => 'product_catalogue_id',
    ],
    'product_language' => [
        'controller' => 'ProductController',
        'module_field' => 'product_id',
    ],
];

$totalUpdated = 0;
$totalRoutersUpdated = 0;

foreach ($tables as $tableName => $config) {
    echo "Đang xử lý bảng: {$tableName}...\n";
    
    // Lấy tất cả các bản ghi có canonical
    $records = DB::table($tableName)
        ->whereNotNull('canonical')
        ->where('canonical', '!=', '')
        ->get();
    
    $updated = 0;
    $routersUpdated = 0;
    
    foreach ($records as $record) {
        $oldCanonical = $record->canonical;
        
        // Chuyển đổi thành slug không dấu
        $newCanonical = Str::slug($oldCanonical);
        
        // Nếu canonical không thay đổi, bỏ qua
        if ($oldCanonical === $newCanonical) {
            continue;
        }
        
        $moduleId = $record->{$config['module_field']};
        $languageId = $record->language_id;
        
        // Kiểm tra xem canonical mới đã tồn tại chưa (trong cùng bảng, khác record)
        $exists = DB::table($tableName)
            ->where('canonical', $newCanonical)
            ->where($config['module_field'], '!=', $moduleId)
            ->where('language_id', '!=', $languageId)
            ->exists();
        
        if ($exists) {
            // Nếu đã tồn tại, thêm module_id vào cuối để tránh trùng
            $newCanonical = $newCanonical . '-' . $moduleId;
        }
        
        // Cập nhật canonical trong bảng language
        DB::table($tableName)
            ->where($config['module_field'], $moduleId)
            ->where('language_id', $languageId)
            ->update(['canonical' => $newCanonical]);
        
        $updated++;
        
        // Cập nhật bảng routers
        $controllerName = 'App\Http\Controllers\Frontend\\' . $config['controller'];
        
        // Tìm router tương ứng
        $router = DB::table('routers')
            ->where('module_id', $moduleId)
            ->where('controllers', $controllerName)
            ->where('language_id', $languageId)
            ->first();
        
        if ($router) {
            // Kiểm tra xem canonical mới đã tồn tại trong routers chưa
            $routerExists = DB::table('routers')
                ->where('canonical', $newCanonical)
                ->where('id', '!=', $router->id)
                ->exists();
            
            if ($routerExists) {
                // Nếu đã tồn tại, thêm ID vào cuối
                $newCanonical = $newCanonical . '-' . $router->id;
                
                // Cập nhật lại trong bảng language nếu đã thay đổi
                DB::table($tableName)
                    ->where($config['module_field'], $moduleId)
                    ->where('language_id', $languageId)
                    ->update(['canonical' => $newCanonical]);
            }
            
            // Cập nhật router
            DB::table('routers')
                ->where('id', $router->id)
                ->update(['canonical' => $newCanonical]);
            
            $routersUpdated++;
            
            echo "  - Đã cập nhật: {$oldCanonical} -> {$newCanonical} (Module ID: {$moduleId}, Router ID: {$router->id})\n";
        } else {
            echo "  - Đã cập nhật: {$oldCanonical} -> {$newCanonical} (Module ID: {$moduleId}, Router: không tìm thấy)\n";
        }
    }
    
    echo "  Tổng cộng: {$updated} bản ghi trong {$tableName}, {$routersUpdated} router đã cập nhật\n\n";
    
    $totalUpdated += $updated;
    $totalRoutersUpdated += $routersUpdated;
}

echo "Hoàn thành!\n";
echo "Tổng số bản ghi đã cập nhật: {$totalUpdated}\n";
echo "Tổng số router đã cập nhật: {$totalRoutersUpdated}\n";

