<?php
// controllers/AvionController.php

require_once 'models/Avion.php';

class AvionController {
    private $model;
    
    public function __construct() {
        $this->model = new Avion();
    }
    
    public function index() {
        $avions = $this->model->getAll();
        $avion = null;
        $message = '';
        
        // Suppression
        if (isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['id'])) {
            if ($this->model->delete($_GET['id'])) {
                $message = "Avion supprimé avec succès";
                header("Location: index.php?page=avions");
                exit;
            }
        }
        
        // Édition
        if (isset($_GET['action']) && $_GET['action'] === 'edit' && isset($_GET['id'])) {
            $avion = $this->model->getById($_GET['id']);
        }
        
        // Création
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
            if ($_POST['action'] === 'create') {
                if ($this->model->create($_POST)) {
                    $message = "Avion ajouté avec succès";
                    header("Location: index.php?page=avions");
                    exit;
                }
            }
            
            // Modification
            if ($_POST['action'] === 'update' && isset($_POST['idavion'])) {
                if ($this->model->update($_POST['idavion'], $_POST)) {
                    $message = "Avion modifié avec succès";
                    header("Location: index.php?page=avions");
                    exit;
                }
            }
        }
        
        require 'views/avions/index.php';
    }
}