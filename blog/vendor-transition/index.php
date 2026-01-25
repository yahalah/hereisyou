<?php
$pageTitle = 'Vendor transition and system takeover guide | Kindly Tech insights';
$pageDescription = 'A structured takeover approach for complex estates.';
$pageHeading = 'Vendor transition and system takeover guide';
$pageIntro = 'A structured takeover approach for complex estates.';
$pageUrl = 'https://kindlytech.co.uk/blog/vendor-transition/';
$coverImage = 'assets/img/blog/cover-1.svg';
$inlineImageOne = 'assets/img/blog/inline-1.svg';
$inlineImageTwo = 'assets/img/blog/inline-2.svg';
$breadcrumbs = [
    ['label' => 'Home', 'url' => '/'],
    ['label' => 'Blog', 'url' => '/blog/'],
    ['label' => 'Vendor transition and system takeover guide', 'url' => '/blog/vendor-transition/'],
];
$extraSchema = [
    '@context' => 'https://schema.org',
    '@type' => 'BlogPosting',
    'headline' => 'Vendor transition and system takeover guide',
    'description' => 'A structured takeover approach for complex estates.',
    'author' => [
        '@type' => 'Organization',
        'name' => 'Kindly Tech',
    ],
    'publisher' => [
        '@type' => 'Organization',
        'name' => 'Kindly Tech',
    ],
    'mainEntityOfPage' => 'https://kindlytech.co.uk/blog/vendor-transition/',
];
require __DIR__ . '/../../partials/page-blog-post.php';
?>