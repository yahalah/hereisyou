<?php
$pageTitle = 'Data platform readiness for AI programmes | Kindly Tech insights';
$pageDescription = 'Preparing data foundations for responsible AI adoption.';
$pageHeading = 'Data platform readiness for AI programmes';
$pageIntro = 'Preparing data foundations for responsible AI adoption.';
$pageUrl = 'https://kindlytech.co.uk/blog/data-platform-readiness/';
$coverImage = 'assets/img/blog/cover-1.svg';
$inlineImageOne = 'assets/img/blog/inline-1.svg';
$inlineImageTwo = 'assets/img/blog/inline-2.svg';
$breadcrumbs = [
    ['label' => 'Home', 'url' => '/'],
    ['label' => 'Blog', 'url' => '/blog/'],
    ['label' => 'Data platform readiness for AI programmes', 'url' => '/blog/data-platform-readiness/'],
];
$extraSchema = [
    '@context' => 'https://schema.org',
    '@type' => 'BlogPosting',
    'headline' => 'Data platform readiness for AI programmes',
    'description' => 'Preparing data foundations for responsible AI adoption.',
    'author' => [
        '@type' => 'Organization',
        'name' => 'Kindly Tech',
    ],
    'publisher' => [
        '@type' => 'Organization',
        'name' => 'Kindly Tech',
    ],
    'mainEntityOfPage' => 'https://kindlytech.co.uk/blog/data-platform-readiness/',
];
require __DIR__ . '/../../partials/page-blog-post.php';
?>