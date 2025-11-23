# Hướng dẫn cài đặt Node.js và npm trên Server Linux

## Cách 1: Cài đặt Node.js từ NodeSource (Khuyến nghị - phiên bản mới nhất)

```bash
# Cài đặt Node.js 20.x LTS (Long Term Support)
curl -fsSL https://deb.nodesource.com/setup_20.x | sudo -E bash -
sudo apt-get install -y nodejs

# Kiểm tra phiên bản
node --version
npm --version
```

## Cách 2: Cài đặt từ Ubuntu repository (phiên bản cũ hơn)

```bash
# Cập nhật package list
sudo apt update

# Cài đặt Node.js và npm
sudo apt install nodejs npm

# Kiểm tra phiên bản
node --version
npm --version
```

## Cách 3: Sử dụng NVM (Node Version Manager) - Linh hoạt nhất

```bash
# Cài đặt NVM
curl -o- https://raw.githubusercontent.com/nvm-sh/nvm/v0.39.0/install.sh | bash

# Reload shell hoặc chạy:
source ~/.bashrc

# Cài đặt Node.js phiên bản mới nhất LTS
nvm install --lts
nvm use --lts

# Kiểm tra
node --version
npm --version
```

## Sau khi cài đặt xong:

```bash
# Di chuyển đến thư mục project
cd /path/to/your/project

# Cài đặt dependencies
npm install

# Build assets
npm run build

# Clear Laravel cache
php artisan cache:clear
php artisan config:clear
php artisan view:clear
```

## Lưu ý:

- **Cách 1** (NodeSource): Khuyến nghị cho production, phiên bản mới nhất và ổn định
- **Cách 2** (Ubuntu repo): Đơn giản nhưng phiên bản có thể cũ
- **Cách 3** (NVM): Tốt nhất nếu cần quản lý nhiều phiên bản Node.js

## Kiểm tra yêu cầu:

Project này yêu cầu:
- Node.js >= 14.x (khuyến nghị 18.x hoặc 20.x)
- npm >= 6.x

Sau khi cài đặt, chạy `node --version` và `npm --version` để xác nhận.

