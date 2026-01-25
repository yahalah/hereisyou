<?php
return [
    'company' => 'Kindly Tech',
    'company_legal' => 'KINDLY TECH LTD (Company No. 16459346). Registered Office: 71–75 Shelton Street, Covent Garden, London, WC2H 9JQ, United Kingdom. Registered in England & Wales.',
    'phone' => '02035764445',
    'emails' => [
        'info' => 'info@kindlytech.co.uk',
        'support' => 'support@kindlytech.co.uk',
    ],
    'address' => '71–75 Shelton Street, Covent Garden, London, WC2H 9JQ, United Kingdom',
    'site_url' => 'https://kindlytech.co.uk',
    'canonical_host' => 'kindlytech.co.uk',
    'smtp' => [
        'host' => 'smtp.yourhost.co.uk',
        'port' => 587,
        'user' => 'smtp-user@kindlytech.co.uk',
        'pass' => 'change-me',
        'secure' => 'tls',
        'from_email' => 'support@kindlytech.co.uk',
        'from_name' => 'Kindly Tech',
    ],
    'storage' => __DIR__ . '/storage/kindlytech.sqlite',
];
