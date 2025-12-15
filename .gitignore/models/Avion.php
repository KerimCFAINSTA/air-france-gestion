<?php
// models/Avion.php

class Avion {
    private $pdo;
    
    public function __construct() {
        $this->pdo = Database::getInstance()->getConnection();
    }
    
    public function getAll() {
        $stmt = $this->pdo->query("SELECT * FROM avion ORDER BY idavion DESC");
        return $stmt->fetchAll();
    }
    
    public function getById($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM avion WHERE idavion = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }
    
    public function create($data) {
        $stmt = $this->pdo->prepare("
            INSERT INTO avion (designation, constructeur, nbplaces) 
            VALUES (?, ?, ?)
        ");
        
        return $stmt->execute([
            $data['designation'],
            $data['constructeur'],
            $data['nbplaces']
        ]);
    }
    
    public function update($id, $data) {
        $stmt = $this->pdo->prepare("
            UPDATE avion 
            SET designation = ?, constructeur = ?, nbplaces = ?
            WHERE idavion = ?
        ");
        
        return $stmt->execute([
            $data['designation'],
            $data['constructeur'],
            $data['nbplaces'],
            $id
        ]);
    }
    
    public function delete($id) {
        $stmt = $this->pdo->prepare("DELETE FROM avion WHERE idavion = ?");
        return $stmt->execute([$id]);
    }
}