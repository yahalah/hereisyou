<?php
$pageTitle = 'Cloud migration playbook for regulated sectors | Kindly Tech insights';
$pageDescription = 'A practical view of cloud & DevOps UK controls for regulated teams.';
$pageHeading = 'Cloud migration playbook for regulated sectors';
$pageIntro = 'A practical view of cloud & DevOps UK controls for regulated teams.';
$pageUrl = 'https://kindlytech.co.uk/blog/cloud-migration-playbook/';
$coverImage = 'assets/img/blog/cover-1.svg';
$inlineImageOne = 'assets/img/blog/inline-1.svg';
$inlineImageTwo = 'assets/img/blog/inline-2.svg';
$breadcrumbs = [
    ['label' => 'Home', 'url' => '/'],
    ['label' => 'Blog', 'url' => '/blog/'],
    ['label' => 'Cloud migration playbook for regulated sectors', 'url' => '/blog/cloud-migration-playbook/'],
];
$extraSchema = [
    '@context' => 'https://schema.org',
    '@type' => 'BlogPosting',
    'headline' => 'Cloud migration playbook for regulated sectors',
    'description' => 'A practical view of cloud & DevOps UK controls for regulated teams.',
    'author' => [
        '@type' => 'Organization',
        'name' => 'Kindly Tech',
    ],
    'publisher' => [
        '@type' => 'Organization',
        'name' => 'Kindly Tech',
    ],
    'mainEntityOfPage' => 'https://kindlytech.co.uk/blog/cloud-migration-playbook/',
];
require __DIR__ . '/../../partials/page-blog-post.php';
?>