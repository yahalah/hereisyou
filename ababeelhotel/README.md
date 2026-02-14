# Ababeel Hotel Website

Production-ready PHP/Tailwind website for a UK 3-star hotel with Stripe Checkout integration (GBP), room booking flow, and admin dashboard.

## Stack
- HTML5 + Tailwind CSS (CDN)
- Vanilla JavaScript
- PHP 8+
- MySQL
- Stripe Checkout API

## Setup
1. Import `database.sql` into MySQL.
2. Configure environment variables:
   - `DB_HOST`, `DB_NAME`, `DB_USER`, `DB_PASS`
   - `STRIPE_SECRET_KEY`
   - `APP_URL` (e.g. `http://localhost/ababeelhotel`)
3. Serve project root using PHP/Apache/Nginx.

## Admin Login
- URL: `/ababeelhotel/admin/login.php`
- Default credentials: `admin` / `admin123`
- Change credentials immediately after setup.

## Stripe Notes
- Booking creates pending booking record, creates Stripe Checkout Session in GBP, stores `stripe_session_id`, then redirects to Stripe.
- On successful return to `booking_success.php`, payment status is marked `paid` when session id matches.
