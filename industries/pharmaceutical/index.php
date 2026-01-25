<?php
$pageTitle = 'Pharmaceutical | Kindly Tech';
$pageDescription = 'Regulated digital platforms for R&D and supply chains.';
$pageHeading = 'Pharmaceutical';
$pageIntro = 'Regulated digital platforms for R&D and supply chains.';
$headerImage = 'assets/img/people/header.svg';
$breadcrumbs = [
    ['label' => 'Home', 'url' => '/'],
    ['label' => 'Industries', 'url' => '/services/industries/'],
    ['label' => 'Pharmaceutical', 'url' => '/industries/pharmaceutical/'],
];
$faqs = default_faqs('industry');
require __DIR__ . '/../../partials/page-industry.php';
?>