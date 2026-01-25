<?php
$pageTitle = 'Governed delivery models for UK enterprises | Kindly Tech insights';
$pageDescription = 'How UK organisations can structure delivery governance for predictable outcomes.';
$pageHeading = 'Governed delivery models for UK enterprises';
$pageIntro = 'How UK organisations can structure delivery governance for predictable outcomes.';
$pageUrl = 'https://kindlytech.co.uk/blog/governed-delivery-uk/';
$coverImage = 'assets/img/blog/cover-1.svg';
$inlineImageOne = 'assets/img/blog/inline-1.svg';
$inlineImageTwo = 'assets/img/blog/inline-2.svg';
$breadcrumbs = [
    ['label' => 'Home', 'url' => '/'],
    ['label' => 'Blog', 'url' => '/blog/'],
    ['label' => 'Governed delivery models for UK enterprises', 'url' => '/blog/governed-delivery-uk/'],
];
$extraSchema = [
    '@context' => 'https://schema.org',
    '@type' => 'BlogPosting',
    'headline' => 'Governed delivery models for UK enterprises',
    'description' => 'How UK organisations can structure delivery governance for predictable outcomes.',
    'author' => [
        '@type' => 'Organization',
        'name' => 'Kindly Tech',
    ],
    'publisher' => [
        '@type' => 'Organization',
        'name' => 'Kindly Tech',
    ],
    'mainEntityOfPage' => 'https://kindlytech.co.uk/blog/governed-delivery-uk/',
];
require __DIR__ . '/../../partials/page-blog-post.php';
?>