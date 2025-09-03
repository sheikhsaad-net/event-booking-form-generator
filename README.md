<p align="center">
  <a href="https://laravel.com" target="_blank">
    <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo">
  </a>
</p>

<p align="center">
  <a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
  <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
  <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
  <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
  <img src="https://img.shields.io/badge/Laravel-12-red" alt="Laravel Version">
  <img src="https://img.shields.io/badge/PHP-8.2+-blue" alt="PHP Version">
</p>

# Event Booking Form Generator

**Event Booking Form Generator** is a Laravel 12 application for managing event bookings.  
It validates participant ages, enforces rules, and generates **official participation PDFs** for both **adults** and **minors**.

---

## Features

- Auto-generate unique booking IDs:
  - `MA_####` → Adults (Maggiorenne)
  - `MI_####` → Minors (Minorenne)
- Age validation rules:
  - **Under 6** → Not allowed (`Il minore non è ammesso`)
  - **6–10** → Auto-assigned `"FUNE DEDICATA AI BAMBINI"`
  - **11+** → Standard booking
- Separate **PDF templates** for minors and adults using **FPDI**
- Bulk PDF download by **date** and **type (adult/minor)**
- Inline **error handling** with Blade validation messages

---

## Requirements

- PHP >= 8.2  
- Composer  
- Laravel 12  
- MySQL / PostgreSQL  
- Extensions: `mbstring`, `openssl`, `pdo`, `tokenizer`, `xml`, `gd`

---

## Installation

```bash
# Clone repository
git clone https://github.com/your-username/event-booking-form-generator.git
cd event-booking-form-generator

# Install dependencies
composer install
npm install && npm run build

# Configure environment
cp .env.example .env
php artisan key:generate

# Run migrations
php artisan migrate

# Start server
php artisan serve
