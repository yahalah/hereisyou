# Kindly Tech Enterprise Website

## Brand details
- **Brand:** Kindly Tech
- **Phone:** 02035764445
- **Emails:** info@kindlytech.co.uk, support@kindlytech.co.uk
- **Website:** https://kindlytech.co.uk

## Colour palettes (three options)
1) **Midnight Navy** (chosen)
   - #0F172A (primary navy)
   - #1E293B (slate)
   - #334155 (steel)
   - #38BDF8 (accent sky)
   - #F59E0B (accent gold)
   - #F8FAFC (surface white)

2) **Oxford Green**
   - #0B1F1A, #11332A, #1E4D3B, #CBB26A, #F8F5F0

3) **Royal Plum**
   - #1A1230, #2F1D52, #43346F, #8FD3FF, #F8F7FF

The build uses palette 1 with CSS variables in `/assets/css/style.css`.

## Hostinger hPanel deployment
1. Zip the repository contents.
2. Upload the zip into `public_html` using hPanel File Manager.
3. Extract the zip so `index.php`, `.htaccess`, `assets/`, `partials/`, `config/` and other folders sit directly inside `public_html`.
4. Edit `config/site.php` with your live SMTP credentials and site URL.
5. Ensure the SQLite storage directory is writable: `config/storage`.
6. Visit the site and test contact/careers forms and the chat widget.

## SMTP configuration
Update `config/site.php`:
- `smtp.host`
- `smtp.port`
- `smtp.user`
- `smtp.pass`
- `smtp.secure` (`tls`, `ssl`, or `none`)
- `smtp.from_email` / `smtp.from_name`

## File tree
```
.
├── .htaccess
├── 404.php
├── README.md
├── api
│   ├── careers.php
│   ├── chat.php
│   └── contact.php
├── assets
│   ├── brand
│   │   ├── android.svg
│   │   ├── apple.svg
│   │   ├── aws.svg
│   │   ├── docker.svg
│   │   ├── github.svg
│   │   ├── googlecloud.svg
│   │   ├── ios.svg
│   │   ├── kubernetes.svg
│   │   ├── linux.svg
│   │   ├── macos.svg
│   │   ├── microsoft.svg
│   │   ├── microsoftazure.svg
│   │   └── windows.svg
│   ├── css
│   │   └── style.css
│   ├── icons
│   │   ├── cloud.svg
│   │   ├── data.svg
│   │   ├── delivery.svg
│   │   ├── design.svg
│   │   ├── discovery.svg
│   │   ├── engineering.svg
│   │   ├── governance.svg
│   │   ├── integration.svg
│   │   ├── leadership.svg
│   │   ├── linkedin.svg
│   │   ├── mobile.svg
│   │   ├── qa.svg
│   │   ├── quality.svg
│   │   ├── secure.svg
│   │   ├── support.svg
│   │   ├── timeline.svg
│   │   ├── twitter.svg
│   │   ├── uk.svg
│   │   ├── web.svg
│   │   └── youtube.svg
│   ├── img
│   │   ├── blog
│   │   │   ├── cover-1.svg
│   │   │   ├── cover-2.svg
│   │   │   ├── cover-3.svg
│   │   │   ├── inline-1.svg
│   │   │   ├── inline-2.svg
│   │   │   └── inline-3.svg
│   │   ├── diagrams
│   │   │   └── architecture.svg
│   │   ├── logo
│   │   │   ├── concept-circuit-dark.svg
│   │   │   ├── concept-circuit-light.svg
│   │   │   ├── concept-kindly-dark.svg
│   │   │   ├── concept-kindly-light.svg
│   │   │   ├── concept-kt-dark.svg
│   │   │   ├── concept-kt-light.svg
│   │   │   ├── favicon.svg
│   │   │   ├── icon-only.svg
│   │   │   ├── primary-logo-dark.svg
│   │   │   └── primary-logo.svg
│   │   └── people
│   │       ├── delivery.svg
│   │       ├── discovery.svg
│   │       ├── engineering.svg
│   │       ├── header.svg
│   │       ├── hero.svg
│   │       ├── leadership.svg
│   │       ├── qa.svg
│   │       └── support.svg
│   └── js
│       ├── chat.js
│       └── main.js
├── about
│   └── index.php
├── accessibility
│   └── index.php
├── ai-software-development-services
│   └── index.php
├── blog
│   ├── governed-delivery-uk
│   │   └── index.php
│   ├── modernise-legacy-platforms
│   │   └── index.php
│   ├── cloud-migration-playbook
│   │   └── index.php
│   ├── enterprise-mobile-strategy
│   │   └── index.php
│   ├── data-platform-readiness
│   │   └── index.php
│   ├── security-by-design
│   │   └── index.php
│   ├── product-discovery
│   │   └── index.php
│   ├── vendor-transition
│   │   └── index.php
│   └── index.php
├── careers
│   └── index.php
├── case-studies
│   ├── healthcare-interop
│   │   └── index.php
│   ├── industrial-iot-visibility
│   │   └── index.php
│   ├── mobile-banking-modernisation
│   │   └── index.php
│   ├── secure-cloud-portfolio
│   │   └── index.php
│   └── index.php
├── config
│   ├── site.php
│   └── storage
├── contact
│   └── index.php
├── cookie-policy
│   └── index.php
├── engagement-models
│   └── index.php
├── faqs
│   └── index.php
├── how-we-work
│   └── index.php
├── industries
│   ├── education
│   │   └── index.php
│   ├── financial
│   │   └── index.php
│   ├── gaming
│   │   └── index.php
│   ├── healthcare
│   │   └── index.php
│   ├── insurance
│   │   └── index.php
│   ├── maritime
│   │   └── index.php
│   ├── oil-and-gas
│   │   └── index.php
│   ├── pharmaceutical
│   │   └── index.php
│   └── index.php
├── outsourcing
│   ├── index.php
│   └── cto-as-a-service
│       └── index.php
├── pages
├── partials
│   ├── footer.php
│   ├── functions.php
│   ├── header.php
│   ├── page-blog-post.php
│   ├── page-case-study.php
│   ├── page-generic.php
│   ├── page-industry.php
│   ├── page-service.php
│   └── page-technology.php
├── privacy-policy
│   └── index.php
├── robots.txt
├── security
│   └── index.php
├── services
│   ├── code-rescue
│   │   └── index.php
│   ├── digital-transformation
│   │   └── index.php
│   ├── legacy-software-modernisation
│   │   └── index.php
│   ├── mobile-app-development
│   │   └── index.php
│   ├── mvp-software-development
│   │   └── index.php
│   ├── software-cybersecurity
│   │   └── index.php
│   ├── system-takeover
│   │   └── index.php
│   ├── technologies
│   │   └── index.php
│   ├── industries
│   │   └── index.php
│   ├── web-application-development
│   │   └── index.php
│   └── index.php
├── sitemap
│   └── index.php
├── sitemap.xml
├── terms
│   └── index.php
└── technologies
    ├── artificial-intelligence-machine-learning
    │   └── index.php
    ├── augmented-reality-and-virtual-reality
    │   └── index.php
    ├── blockchain-cryptocurrency
    │   └── index.php
    ├── cad-and-3d-visualisation
    │   └── index.php
    ├── cloud-solutions
    │   └── index.php
    ├── digital-transformation-and-it-consulting
    │   └── index.php
    ├── e-commerce-payment-gateway-integration
    │   └── index.php
    ├── internet-of-things-iot
    │   └── index.php
    ├── mobile-application
    │   └── index.php
    └── web-application
        └── index.php
```
