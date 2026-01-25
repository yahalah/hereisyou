<?php
$pageTitle = 'Financial Services | Kindly Tech';
$pageDescription = 'Secure digital platforms for regulated finance.';
$pageHeading = 'Financial Services';
$pageIntro = 'Secure digital platforms for regulated finance.';
$headerImage = 'assets/img/people/header.svg';
$breadcrumbs = [
    ['label' => 'Home', 'url' => '/'],
    ['label' => 'Industries', 'url' => '/services/industries/'],
    ['label' => 'Financial Services', 'url' => '/industries/financial/'],
];
$faqs = default_faqs('industry');
require __DIR__ . '/../../partials/page-industry.php';
?>