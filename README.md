# Academy Portfolio

A Laravel-based web application for showcasing an academy's portfolio, including courses, projects, achievements, tools, FAQs, and features. Built with Filament for the admin panel.

## Features

- **Courses Management**: Display and manage academy courses with pricing.
- **Projects Showcase**: Highlight completed projects with videos.
- **Achievements**: Track and display academy achievements.
- **Tools & Features**: Manage tools and features offered.
- **FAQs**: Provide answers to common questions.
- **Admin Panel**: Powered by Filament for easy content management.
- **Responsive Design**: Mobile-friendly frontend.

## Requirements

- PHP ^8.2
- Composer
- MySQL or PostgreSQL database

## Installation on Server

Follow these steps to install the project on a production server:

### 1. Upload Files
Upload all project files to your web server' public_html directory

### 2. Install Dependencies
Navigate to the project directory and install PHP dependencies:
```bash
composer install --no-dev --optimize-autoloader
```

### 3. Environment Configuration
Copy the example environment file and configure it:
```bash
cp .env.example .env
```

Edit `.env` with your server settings:
- Set `APP_ENV=production`
- Set `APP_URL` to your domain (e.g., `https://yourdomain.com`)
- Generate application key: `php artisan key:generate`


### 4. Storage Link
Create symbolic link for public storage:
```bash
php artisan storage:link
```

### 5. Cache Optimization
Optimize the application for production:
```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

### 6. Web Server Configuration
Ensure your web server points to the `public/` directory as the document root.


### 7. Permissions
Set proper permissions for storage and bootstrap/cache directories:
```bash
chmod -R 755 storage bootstrap/cache
chown -R www-data:www-data storage bootstrap/cache
```

## Usage

- **Frontend**: Visit your domain to view the portfolio.
- **Admin Panel**: Access `/manager` to log in and manage content using Filament. Use the following credentials:
  - Username: undercontrol@gmail.com
  - Password: undercontrol


# Undercontrol
