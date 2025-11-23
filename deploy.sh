#!/bin/bash

# Deploy script for Laravel + Vite
echo "Starting deployment..."

# Check if Node.js is installed
if ! command -v node &> /dev/null; then
    echo "ERROR: Node.js is not installed!"
    echo "Please install Node.js first:"
    echo "  curl -fsSL https://deb.nodesource.com/setup_20.x | sudo -E bash -"
    echo "  sudo apt-get install -y nodejs"
    exit 1
fi

# Check if npm is installed
if ! command -v npm &> /dev/null; then
    echo "ERROR: npm is not installed!"
    echo "Please install npm: sudo apt install npm"
    exit 1
fi

echo "Node.js version: $(node --version)"
echo "npm version: $(npm --version)"

# Pull latest code
echo "Pulling latest code..."
git pull origin main

# Install/update dependencies
echo "Installing dependencies..."
npm install

# Build assets
echo "Building assets..."
npm run build

# Clear Laravel cache
echo "Clearing Laravel cache..."
php artisan cache:clear
php artisan config:clear
php artisan view:clear
php artisan route:clear

# Optimize (optional, for production)
# php artisan config:cache
# php artisan route:cache
# php artisan view:cache

echo "Deployment completed!"

