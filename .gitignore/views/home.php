<?php
// views/home.php
require_once 'views/layout/header.php';
?>

<div class="container">
    <div class="home-hero">
        <h2 class="home-title">Bienvenue chez Air France</h2>
        <p class="home-subtitle">Système de gestion des affectations de vols</p>
        
        <div class="home-content">
            <div class="home-card">
                <i class="fas fa-info-circle card-icon"></i>
                <h3>À propos</h3>
                <p>Cette application permet de gérer efficacement les affectations des vols d'Air France, en associant les avions et les pilotes aux différents vols.</p>
            </div>
            
            <div class="home-stats">
                <div class="stat-card">
                    <div class="stat-icon">
                        <i class="fas fa-plane-departure"></i>
                    </div>
                    <div class="stat-content">
                        <h4>Vols</h4>
                        <p>Gérez les affectations</p>
                    </div>
                </div>
                
                <div class="stat-card">
                    <div class="stat-icon">
                        <i class="fas fa-plane-circle-check"></i>
                    </div>
                    <div class="stat-content">
                        <h4>Avions</h4>
                        <p>Administrez la flotte</p>
                    </div>
                </div>
                
                <div class="stat-card">
                    <div class="stat-icon">
                        <i class="fas fa-user-pilot"></i>
                    </div>
                    <div class="stat-content">
                        <h4>Pilotes</h4>
                        <p>Suivez le personnel</p>
                    </div>
                </div>
            </div>
            
            <div class="home-link">
                <a href="https://wwws.airfrance.fr/" target="_blank" class="btn btn-primary">
                    <i class="fas fa-external-link-alt"></i>
                    Visiter le site d'Air France
                </a>
            </div>
        </div>
    </div>
</div>

<?php require_once 'views/layout/footer.php'; ?>