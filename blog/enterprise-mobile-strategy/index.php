<?php
$pageTitle = 'Enterprise mobile strategy for multi-brand services | Kindly Tech insights';
$pageDescription = 'Building mobile platforms that scale across UK business units.';
$pageHeading = 'Enterprise mobile strategy for multi-brand services';
$pageIntro = 'Building mobile platforms that scale across UK business units.';
$pageUrl = 'https://kindlytech.co.uk/blog/enterprise-mobile-strategy/';
$coverImage = 'assets/img/blog/cover-1.svg';
$inlineImageOne = 'assets/img/blog/inline-1.svg';
$inlineImageTwo = 'assets/img/blog/inline-2.svg';
$breadcrumbs = [
    ['label' => 'Home', 'url' => '/'],
    ['label' => 'Blog', 'url' => '/blog/'],
    ['label' => 'Enterprise mobile strategy for multi-brand services', 'url' => '/blog/enterprise-mobile-strategy/'],
];
$extraSchema = [
    '@context' => 'https://schema.org',
    '@type' => 'BlogPosting',
    'headline' => 'Enterprise mobile strategy for multi-brand services',
    'description' => 'Building mobile platforms that scale across UK business units.',
    'author' => [
        '@type' => 'Organization',
        'name' => 'Kindly Tech',
    ],
    'publisher' => [
        '@type' => 'Organization',
        'name' => 'Kindly Tech',
    ],
    'mainEntityOfPage' => 'https://kindlytech.co.uk/blog/enterprise-mobile-strategy/',
];
require __DIR__ . '/../../partials/page-blog-post.php';
?>