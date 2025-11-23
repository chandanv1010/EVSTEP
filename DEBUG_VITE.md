# Debug Vite Assets không load trên Server

## Checklist kiểm tra:

### 1. Kiểm tra file build có được pull về server không:
```bash
# Trên server, kiểm tra:
ls -la public/build/
ls -la public/build/assets/
ls -la public/build/manifest.json
```

### 2. Kiểm tra permissions:
```bash
# Đảm bảo web server có quyền đọc
chmod -R 755 public/build
chown -R www-data:www-data public/build  # hoặc user của web server
```

### 3. Clear Laravel cache:
```bash
php artisan cache:clear
php artisan config:clear
php artisan view:clear
php artisan route:clear
```

### 4. Kiểm tra APP_ENV trong .env:
```bash
# Trên server, kiểm tra file .env
cat .env | grep APP_ENV

# Phải là:
APP_ENV=production
# hoặc
APP_ENV=local
```

### 5. Kiểm tra manifest.json có đúng không:
```bash
# Trên server
cat public/build/manifest.json

# Kiểm tra xem file assets có tồn tại không:
ls -la public/build/assets/app-*.js
ls -la public/build/assets/app-*.js.map
```

### 6. Kiểm tra @vite directive có render đúng không:
- Mở source code trang web (Ctrl+U)
- Tìm kiếm "app-" trong HTML
- Phải thấy link đến file CSS/JS trong public/build/assets/

### 7. Kiểm tra đường dẫn asset:
```bash
# Trên server, kiểm tra xem asset() helper có đúng không
php artisan tinker
>>> asset('build/assets/app-4ed993c7.js')
```

### 8. Nếu vẫn không được, thử force commit lại:
```bash
# Trên local
git add -f public/build/
git commit -m "Force commit build assets"
git push

# Trên server
git pull
```

## Giải pháp nhanh:

```bash
# Trên server, chạy tất cả lệnh này:
cd /path/to/project
git pull
chmod -R 755 public/build
php artisan cache:clear
php artisan config:clear
php artisan view:clear
```

## Kiểm tra trong browser:

1. Mở Developer Tools (F12)
2. Tab Network
3. Reload trang
4. Tìm file CSS/JS từ `/build/assets/`
5. Xem có lỗi 404 không

## Lưu ý:

- File build phải được commit vào git
- Không nên ignore `public/build` trong .gitignore
- Sau mỗi lần build mới, phải commit lại `public/build` và `public/build/manifest.json`

