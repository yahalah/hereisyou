<?php
$pageTitle = 'Product discovery workshops that reduce risk | Kindly Tech insights';
$pageDescription = 'How discovery workshops align stakeholders and delivery.';
$pageHeading = 'Product discovery workshops that reduce risk';
$pageIntro = 'How discovery workshops align stakeholders and delivery.';
$pageUrl = 'https://kindlytech.co.uk/blog/product-discovery/';
$coverImage = 'assets/img/blog/cover-1.svg';
$inlineImageOne = 'assets/img/blog/inline-1.svg';
$inlineImageTwo = 'assets/img/blog/inline-2.svg';
$breadcrumbs = [
    ['label' => 'Home', 'url' => '/'],
    ['label' => 'Blog', 'url' => '/blog/'],
    ['label' => 'Product discovery workshops that reduce risk', 'url' => '/blog/product-discovery/'],
];
$extraSchema = [
    '@context' => 'https://schema.org',
    '@type' => 'BlogPosting',
    'headline' => 'Product discovery workshops that reduce risk',
    'description' => 'How discovery workshops align stakeholders and delivery.',
    'author' => [
        '@type' => 'Organization',
        'name' => 'Kindly Tech',
    ],
    'publisher' => [
        '@type' => 'Organization',
        'name' => 'Kindly Tech',
    ],
    'mainEntityOfPage' => 'https://kindlytech.co.uk/blog/product-discovery/',
];
require __DIR__ . '/../../partials/page-blog-post.php';
?>