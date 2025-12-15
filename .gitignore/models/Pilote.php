<?php
// models/Pilote.php

class Pilote {
    private $pdo;
    
    public function __construct() {
        $this->pdo = Database::getInstance()->getConnection();
    }
    
    public function getAll() {
        $stmt = $this->pdo->query("SELECT * FROM pilote ORDER BY idpilote DESC");
        return $stmt->fetchAll();
    }
    
    public function getById($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM pilote WHERE idpilote = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }
    
    public function create($data) {
        $hashedPassword = password_hash($data['mdp'], PASSWORD_DEFAULT);
        
        $stmt = $this->pdo->prepare("
            INSERT INTO pilote (nom, prenom, email, mdp, bip, statut) 
            VALUES (?, ?, ?, ?, ?, ?)
        ");
        
        return $stmt->execute([
            $data['nom'],
            $data['prenom'],
            $data['email'],
            $hashedPassword,
            $data['bip'],
            $data['statut']
        ]);
    }
    
    public function update($id, $data) {
        if (!empty($data['mdp'])) {
            $hashedPassword = password_hash($data['mdp'], PASSWORD_DEFAULT);
            
            $stmt = $this->pdo->prepare("
                UPDATE pilote 
                SET nom = ?, prenom = ?, email = ?, mdp = ?, bip = ?, statut = ?
                WHERE idpilote = ?
            ");
            
            return $stmt->execute([
                $data['nom'],
                $data['prenom'],
                $data['email'],
                $hashedPassword,
                $data['bip'],
                $data['statut'],
                $id
            ]);
        } else {
            $stmt = $this->pdo->prepare("
                UPDATE pilote 
                SET nom = ?, prenom = ?, email = ?, bip = ?, statut = ?
                WHERE idpilote = ?
            ");
            
            return $stmt->execute([
                $data['nom'],
                $data['prenom'],
                $data['email'],
                $data['bip'],
                $data['statut'],
                $id
            ]);
        }
    }
    
    public function delete($id) {
        $stmt = $this->pdo->prepare("DELETE FROM pilote WHERE idpilote = ?");
        return $stmt->execute([$id]);
    }
}