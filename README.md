<p align="center">
  <a href="https://laravel.com" target="_blank">
    <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo">
  </a>
</p>

# Event Booking Form Generator

**Event Booking Form Generator** is a Laravel-based application for managing bookings,  
validating participant age rules, and generating pre-filled PDF participation forms for both **adults** and **minors**.

---

## Features

- Auto-generate unique booking IDs:
  - `MA_####` → Adults (Maggiorenne)
  - `MI_####` → Minors (Minorenne)
- Age validation rules:
  - **Under 6** → Not allowed (`Il minore non è ammesso`)
  - **6–10** → Auto-assigned `"FUNE DEDICATA AI BAMBINI"`
  - **11+** → Standard booking
- Separate **PDF templates** for minors and adults using **FPDI**.
- Bulk PDF download by **date** and **type (adult/minor)**.
- Inline **error handling** with Blade validation messages.

---

## Requirements

- PHP >= 8.1  
- Composer  
- Laravel 10+  
- Database: MySQL / PostgreSQL  
- PHP extensions: `mbstring`, `openssl`, `pdo`, `tokenizer`, `xml`, `gd`

---

## Installation

1. Clone repository:

   ```bash
   git clone https://github.com/your-username/event-booking-form-generator.git
   cd event-booking-form-generator
