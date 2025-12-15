<?php
// controllers/VolController.php

require_once 'models/Vol.php';

class VolController {
    private $model;
    
    public function __construct() {
        $this->model = new Vol();
    }
    
    public function index() {
        $vols = $this->model->getAll();
        $vol = null;
        $message = '';
        
        // Récupération des données pour les selects
        $pilotes = $this->model->getPilotes();
        $avions = $this->model->getAvions();
        
        // Suppression
        if (isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['id'])) {
            if ($this->model->delete($_GET['id'])) {
                $message = "Vol supprimé avec succès";
                header("Location: index.php?page=vols");
                exit;
            }
        }
        
        // Édition
        if (isset($_GET['action']) && $_GET['action'] === 'edit' && isset($_GET['id'])) {
            $vol = $this->model->getById($_GET['id']);
        }
        
        // Création
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
            if ($_POST['action'] === 'create') {
                if ($this->model->create($_POST)) {
                    $message = "Vol ajouté avec succès";
                    header("Location: index.php?page=vols");
                    exit;
                }
            }
            
            // Modification
            if ($_POST['action'] === 'update' && isset($_POST['idvol'])) {
                if ($this->model->update($_POST['idvol'], $_POST)) {
                    $message = "Vol modifié avec succès";
                    header("Location: index.php?page=vols");
                    exit;
                }
            }
        }
        
        require 'views/vols/index.php';
    }
}