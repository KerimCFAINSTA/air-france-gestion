<?php
// index.php

require_once 'config/database.php';

// Récupération de la page demandée
$page = $_GET['page'] ?? 'home';

// Routage sécurisé
switch ($page) {
    case 'home':
        require_once 'controllers/HomeController.php';
        $controller = new HomeController();
        $controller->index();
        break;
        
    case 'vols':
        require_once 'controllers/VolController.php';
        $controller = new VolController();
        $controller->index();
        break;
        
    case 'avions':
        require_once 'controllers/AvionController.php';
        $controller = new AvionController();
        $controller->index();
        break;
        
    case 'pilotes':
        require_once 'controllers/PiloteController.php';
        $controller = new PiloteController();
        $controller->index();
        break;
        
    default:
        http_response_code(404);
        echo "Page non trouvée";
        break;
}