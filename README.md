# Hereisyou Digital Website

Production-ready static site with PHP endpoints for forms and chat, ready for Hostinger Shared (LiteSpeed) deployment.

## What’s included
- Multi-page enterprise website with services, technologies, industries, case studies, blog posts, and careers.
- Legal pages (Privacy, Cookies, Terms, Accessibility, Security/Disclosure).
- Working contact form and chat endpoints with validation, CSRF, honeypot spam protection, and rate limiting.
- Cookie banner with preference storage.
- SEO metadata, JSON-LD, sitemap.xml, robots.txt, and social preview image.
- Production .htaccess for HTTPS enforcement, non-www normalisation, caching, and compression.

## Deploy to Hostinger hPanel (Shared, LiteSpeed)
1. **Prepare the archive**
   - Zip the repository contents (not the parent folder).
2. **Upload the site**
   - In Hostinger hPanel, open **Files** → **File Manager**.
   - Upload the zip to `/public_html`.
   - Extract the archive into `/public_html`.
3. **Set site configuration**
   - Open `/public_html/config/site.php`.
   - Update company details, email addresses, and base URL.
   - Toggle `maintenance_mode` if required.
4. **Enable maintenance mode (optional)**
   - Create an empty file named `maintenance.flag` in `/public_html` to enable maintenance mode.
   - Remove the file to bring the site back online.
5. **Verify form and chat endpoints**
   - Visit `/contact.html` and submit a test form.
   - Open the chat widget and send a test message.
   - Check `/public_html/data/submissions.log` and `/public_html/data/chat.log` for entries.
6. **Go live checks**
   - Confirm HTTPS redirect and non-www redirect.
   - Validate sitemap at `https://your-domain/sitemap.xml`.
   - Review robots.txt at `https://your-domain/robots.txt`.
   - Test pages on mobile and desktop.

## Local testing (optional)
- Serve the site with PHP so the API endpoints work:
  ```bash
  php -S localhost:8080 -t .
  ```

## Support
For support, contact hello@hereisyou.co.uk.
