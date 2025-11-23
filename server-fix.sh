#!/bin/bash

# Script chạy trên server sau khi git pull
# Chỉ cần clear cache, không cần build lại

echo "Fixing Vite assets on server..."

# Clear Laravel cache
echo "Clearing Laravel cache..."
php artisan cache:clear
php artisan config:clear
php artisan view:clear
php artisan route:clear

# Fix permissions (nếu cần)
echo "Fixing permissions..."
chmod -R 755 public/build 2>/dev/null || true

# Kiểm tra file build
echo "Checking build files..."
if [ -f "public/build/manifest.json" ]; then
    echo "✓ manifest.json exists"
else
    echo "✗ ERROR: manifest.json not found!"
    echo "Please run: git pull (to get build files)"
    exit 1
fi

if [ -d "public/build/assets" ]; then
    echo "✓ assets directory exists"
    echo "Found $(ls -1 public/build/assets/*.js 2>/dev/null | wc -l) JS files"
    echo "Found $(ls -1 public/build/assets/*.css 2>/dev/null | wc -l) CSS files"
else
    echo "✗ ERROR: assets directory not found!"
    exit 1
fi

echo ""
echo "Done! Please check your website now."
echo "If still not working, check DEBUG_VITE.md for more troubleshooting steps."

