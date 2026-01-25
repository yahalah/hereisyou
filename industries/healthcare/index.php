<?php
$pageTitle = 'Healthcare | Kindly Tech';
$pageDescription = 'Patient-centric systems with privacy by design.';
$pageHeading = 'Healthcare';
$pageIntro = 'Patient-centric systems with privacy by design.';
$headerImage = 'assets/img/people/header.svg';
$breadcrumbs = [
    ['label' => 'Home', 'url' => '/'],
    ['label' => 'Industries', 'url' => '/services/industries/'],
    ['label' => 'Healthcare', 'url' => '/industries/healthcare/'],
];
$faqs = default_faqs('industry');
require __DIR__ . '/../../partials/page-industry.php';
?>