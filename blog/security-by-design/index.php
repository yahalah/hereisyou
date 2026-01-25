<?php
$pageTitle = 'Security-by-design for custom software development UK | Kindly Tech insights';
$pageDescription = 'Embedding security in delivery workflows from discovery to support.';
$pageHeading = 'Security-by-design for custom software development UK';
$pageIntro = 'Embedding security in delivery workflows from discovery to support.';
$pageUrl = 'https://kindlytech.co.uk/blog/security-by-design/';
$coverImage = 'assets/img/blog/cover-1.svg';
$inlineImageOne = 'assets/img/blog/inline-1.svg';
$inlineImageTwo = 'assets/img/blog/inline-2.svg';
$breadcrumbs = [
    ['label' => 'Home', 'url' => '/'],
    ['label' => 'Blog', 'url' => '/blog/'],
    ['label' => 'Security-by-design for custom software development UK', 'url' => '/blog/security-by-design/'],
];
$extraSchema = [
    '@context' => 'https://schema.org',
    '@type' => 'BlogPosting',
    'headline' => 'Security-by-design for custom software development UK',
    'description' => 'Embedding security in delivery workflows from discovery to support.',
    'author' => [
        '@type' => 'Organization',
        'name' => 'Kindly Tech',
    ],
    'publisher' => [
        '@type' => 'Organization',
        'name' => 'Kindly Tech',
    ],
    'mainEntityOfPage' => 'https://kindlytech.co.uk/blog/security-by-design/',
];
require __DIR__ . '/../../partials/page-blog-post.php';
?>