<p align="center">
  <a href="https://laravel.com" target="_blank">
    <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo">
  </a>
</p>

# Booking Application

This is a **Laravel-based booking management system**.  
It allows users to register **minors** and **adults (maggiorenne)**, generate **PDF participation forms**, and handle age-based rules for activities.

---

## Features

- User registration with validation and booking ID generation (`MA_####` or `MI_####`).
- Different form templates for **minors** and **adults**.
- Age rules:
  - **Under 6**: Not allowed (`Il minore non è ammesso`).
  - **6–10**: Auto-assigned to `"FUNE DEDICATA AI BAMBINI"`.
  - **11+**: Normal registration.
- PDF generation with **FPDI** based on booking data.
- Bulk **download of PDFs** filtered by date and minor/adult.
- Error handling with inline validation messages in Blade.

---

## Requirements

- PHP >= 8.1  
- Composer  
- MySQL or PostgreSQL  
- Laravel 10+  
- Extensions: `mbstring`, `openssl`, `pdo`, `tokenizer`, `xml`, `gd`

---

## Installation

1. Clone the repository:

   ```bash
   git clone https://github.com/your-username/booking-app.git
   cd booking-app
