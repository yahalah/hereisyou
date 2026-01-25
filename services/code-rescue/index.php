<?php
$pageTitle = 'Code Rescue | Kindly Tech';
$pageDescription = 'Recovering distressed codebases and restoring delivery momentum.';
$pageHeading = 'Code Rescue';
$pageIntro = 'Recovering distressed codebases and restoring delivery momentum.';
$headerImage = 'assets/img/people/header.svg';
$breadcrumbs = [
    ['label' => 'Home', 'url' => '/'],
    ['label' => 'Services', 'url' => '/services/'],
    ['label' => 'Code Rescue', 'url' => '/services/code-rescue/'],
];
$faqs = default_faqs('service');
require __DIR__ . '/../../partials/page-service.php';
?>