<?php
// views/layout/header.php
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Air France - Gestion des Vols</title>
    <link rel="stylesheet" href="public/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>
    <header class="header">
        <div class="container">
            <h1 class="site-title">
                <i class="fas fa-plane"></i>
                Gestion des Affectations Air France
            </h1>
            
            <nav class="nav">
                <a href="index.php" class="nav-item <?= !isset($_GET['page']) ? 'active' : '' ?>">
                    <i class="fas fa-home nav-icon"></i>
                    <span>Accueil</span>
                </a>
                <a href="index.php?page=vols" class="nav-item <?= ($_GET['page'] ?? '') === 'vols' ? 'active' : '' ?>">
                    <i class="fas fa-plane-departure nav-icon"></i>
                    <span>Vols</span>
                </a>
                <a href="index.php?page=avions" class="nav-item <?= ($_GET['page'] ?? '') === 'avions' ? 'active' : '' ?>">
                    <i class="fas fa-plane-circle-check nav-icon"></i>
                    <span>Avions</span>
                </a>
                <a href="index.php?page=pilotes" class="nav-item <?= ($_GET['page'] ?? '') === 'pilotes' ? 'active' : '' ?>">
                    <i class="fas fa-user-pilot nav-icon"></i>
                    <span>Pilotes</span>
                </a>
            </nav>
        </div>
    </header>
    
    <main class="main">