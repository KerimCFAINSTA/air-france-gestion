<?php
// models/Vol.php

class Vol {
    private $pdo;
    
    public function __construct() {
        $this->pdo = Database::getInstance()->getConnection();
    }
    
    public function getAll() {
        $stmt = $this->pdo->query("
            SELECT 
                v.idvol,
                v.designation,
                v.datevol,
                v.heurevol,
                CONCAT(p1.nom, ' ', p1.prenom) as pilote1_nom,
                CONCAT(p2.nom, ' ', p2.prenom) as pilote2_nom,
                a.designation as avion_designation
            FROM vol v
            INNER JOIN pilote p1 ON v.idpilote1 = p1.idpilote
            INNER JOIN pilote p2 ON v.idpilote2 = p2.idpilote
            INNER JOIN avion a ON v.idavion = a.idavion
            ORDER BY v.datevol DESC, v.heurevol DESC
        ");
        return $stmt->fetchAll();
    }
    
    public function getById($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM vol WHERE idvol = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }
    
    public function create($data) {
        $stmt = $this->pdo->prepare("
            INSERT INTO vol (designation, datevol, heurevol, idpilote1, idpilote2, idavion) 
            VALUES (?, ?, ?, ?, ?, ?)
        ");
        
        return $stmt->execute([
            $data['designation'],
            $data['datevol'],
            $data['heurevol'],
            $data['idpilote1'],
            $data['idpilote2'],
            $data['idavion']
        ]);
    }
    
    public function update($id, $data) {
        $stmt = $this->pdo->prepare("
            UPDATE vol 
            SET designation = ?, datevol = ?, heurevol = ?, idpilote1 = ?, idpilote2 = ?, idavion = ?
            WHERE idvol = ?
        ");
        
        return $stmt->execute([
            $data['designation'],
            $data['datevol'],
            $data['heurevol'],
            $data['idpilote1'],
            $data['idpilote2'],
            $data['idavion'],
            $id
        ]);
    }
    
    public function delete($id) {
        $stmt = $this->pdo->prepare("DELETE FROM vol WHERE idvol = ?");
        return $stmt->execute([$id]);
    }
    
    public function getPilotes() {
        $stmt = $this->pdo->query("SELECT idpilote, nom, prenom FROM pilote ORDER BY nom");
        return $stmt->fetchAll();
    }
    
    public function getAvions() {
        $stmt = $this->pdo->query("SELECT idavion, designation, constructeur FROM avion ORDER BY designation");
        return $stmt->fetchAll();
    }
}