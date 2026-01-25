<?php
return [
    'company' => [
        'name' => 'Hereisyou Digital Ltd',
        'registration' => 'Registered in England & Wales No. 11824591',
        'vat' => 'VAT GB 214 8890 39',
        'address' => "12 Farringdon Lane, London EC1R 3AU, United Kingdom",
        'phone' => '+44 (0)20 7946 0921',
        'email' => 'hello@hereisyou.co.uk',
        'support_email' => 'support@hereisyou.co.uk',
        'security_email' => 'security@hereisyou.co.uk',
    ],
    'site' => [
        'base_url' => 'https://hereisyou.co.uk',
        'default_locale' => 'en-GB',
        'maintenance_mode' => false,
        'csrf_token_name' => 'csrf_token',
    ],
    'smtp' => [
        'enabled' => false,
        'host' => 'smtp.hostinger.com',
        'port' => 587,
        'username' => 'smtp-user@hereisyou.co.uk',
        'password' => 'replace-with-strong-password',
        'encryption' => 'tls',
        'from_email' => 'no-reply@hereisyou.co.uk',
        'from_name' => 'Hereisyou Digital',
    ],
];
