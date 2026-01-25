<?php
$pageTitle = 'Insurance | Kindly Tech';
$pageDescription = 'Automation and analytics for claims and underwriting.';
$pageHeading = 'Insurance';
$pageIntro = 'Automation and analytics for claims and underwriting.';
$headerImage = 'assets/img/people/header.svg';
$breadcrumbs = [
    ['label' => 'Home', 'url' => '/'],
    ['label' => 'Industries', 'url' => '/services/industries/'],
    ['label' => 'Insurance', 'url' => '/industries/insurance/'],
];
$faqs = default_faqs('industry');
require __DIR__ . '/../../partials/page-industry.php';
?>