<?php
$pageTitle = 'Education | Kindly Tech';
$pageDescription = 'Learning platforms with analytics and accessibility.';
$pageHeading = 'Education';
$pageIntro = 'Learning platforms with analytics and accessibility.';
$headerImage = 'assets/img/people/header.svg';
$breadcrumbs = [
    ['label' => 'Home', 'url' => '/'],
    ['label' => 'Industries', 'url' => '/services/industries/'],
    ['label' => 'Education', 'url' => '/industries/education/'],
];
$faqs = default_faqs('industry');
require __DIR__ . '/../../partials/page-industry.php';
?>