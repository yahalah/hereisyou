# Ababeel Hotel Website (PHP + MySQL + Stripe)

Production-ready website for **Ababeel Hotel**, a UK 3-star hotel.

## Tech Stack
- HTML5
- CSS3
- Vanilla JavaScript
- PHP 8+
- MySQL
- Stripe Checkout (GBP)

## Project Structure

```text
/ababeelhotel
  /css/style.css
  /js/main.js
  /images/
  /includes/header.php
  /includes/footer.php
  /admin/login.php
  /admin/dashboard.php
  /admin/logout.php
  config.php
  index.php
  rooms.php
  facilities.php
  gallery.php
  booking.php
  booking_success.php
  contact.php
  policies.php
  database.sql
  README.md
```

## Setup Instructions

### 1) MySQL Setup
1. Create a database and tables by importing `database.sql`:
   ```bash
   mysql -u root -p < database.sql
   ```
2. This creates:
   - `rooms`
   - `bookings`
   - `admin_users`
3. Default admin account created:
   - Username: `admin`
   - Password: `Admin@123`

### 2) Configure PHP Database Credentials
Edit `config.php` and update:
- `$dbHost`
- `$dbName`
- `$dbUser`
- `$dbPass`

### 3) Install Stripe PHP SDK via Composer
From `/ababeelhotel`:
```bash
composer require stripe/stripe-php
```
This generates `vendor/autoload.php`, which is loaded in booking/payment files.

### 4) Add Stripe API Keys
In `config.php`, set:
- `$stripeSecretKey`
- `$stripePublishableKey`

Use Stripe test keys in development and live keys in production.

### 5) Run Locally
From project root:
```bash
php -S localhost:8000
```
Open:
- `http://localhost:8000/ababeelhotel/index.php`

## Stripe Payment Flow
1. User submits booking form on `booking.php`.
2. Booking is inserted with `payment_status = unpaid` and `booking_status = pending`.
3. Stripe Checkout Session is created in **GBP**.
4. On successful payment, Stripe redirects to `booking_success.php?session_id=...`.
5. The session is verified using Stripe API.
6. Booking is updated to:
   - `payment_status = paid`
   - `booking_status = confirmed`

## Security Notes
- Uses PDO prepared statements for DB queries.
- Uses `password_hash` / `password_verify` for admin auth.
- Session-based admin authentication.
- Input sanitization and validation with `filter_input` and escaping via `htmlspecialchars`.
- Stripe secret key is loaded server-side only.

## Shared Hosting Deployment Guide
1. Upload the `ababeelhotel` folder to `public_html` (or equivalent web root).
2. Ensure PHP 8+ is enabled.
3. Create MySQL DB + user from hosting control panel.
4. Import `database.sql` via phpMyAdmin.
5. Update DB credentials and Stripe keys in `config.php`.
6. Run Composer on server (SSH):
   ```bash
   composer install --no-dev --optimize-autoloader
   ```
   If SSH is unavailable, run Composer locally and upload `vendor/`.
7. Ensure HTTPS is enabled for secure checkout redirects.

## Admin URLs
- Login: `/ababeelhotel/admin/login.php`
- Dashboard: `/ababeelhotel/admin/dashboard.php`
