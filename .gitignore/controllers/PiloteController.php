<?php
// controllers/PiloteController.php

require_once 'models/Pilote.php';

class PiloteController {
    private $model;
    
    public function __construct() {
        $this->model = new Pilote();
    }
    
    public function index() {
        $pilotes = $this->model->getAll();
        $pilote = null;
        $message = '';
        
        // Suppression
        if (isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['id'])) {
            if ($this->model->delete($_GET['id'])) {
                $message = "Pilote supprimé avec succès";
                header("Location: index.php?page=pilotes");
                exit;
            }
        }
        
        // Édition
        if (isset($_GET['action']) && $_GET['action'] === 'edit' && isset($_GET['id'])) {
            $pilote = $this->model->getById($_GET['id']);
        }
        
        // Création
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
            if ($_POST['action'] === 'create') {
                if ($this->model->create($_POST)) {
                    $message = "Pilote ajouté avec succès";
                    header("Location: index.php?page=pilotes");
                    exit;
                }
            }
            
            // Modification
            if ($_POST['action'] === 'update' && isset($_POST['idpilote'])) {
                if ($this->model->update($_POST['idpilote'], $_POST)) {
                    $message = "Pilote modifié avec succès";
                    header("Location: index.php?page=pilotes");
                    exit;
                }
            }
        }
        
        require 'views/pilotes/index.php';
    }
}