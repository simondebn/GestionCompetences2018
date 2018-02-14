<?php

class compModelDb
{

    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getOne($id){
        $stmt = $this->db->prepare("SELECT * FROM competence WHERE id = :id");
        $stmt->execute([
            'id' => $id
        ]);
        return $stmt->fetch();
    }
    
    public function getAll() {
        $stmt = $this->db->prepare("SELECT * FROM competence");
        $stmt->execute();

        $competences = [];
        foreach ($stmt as $p) {
            $competences[$p['id']] = $p;
        }
        return $competences;
    }
    
    /* retourne les dix compétences les plus recensées en base */
    public function getMostUsed(){
        $stmt = $this->db->prepare("SELECT id_competence, competence.nom, count(*) AS nb  FROM groupe_wittgenstein.lien_personne_comptence, competence  WHERE competence.id = id_competence GROUP BY id_competence
             ORDER BY nb LIMIT 10"); 
             $stmt->execute();
        $competences = [];
        foreach ($stmt as $p) {
            $competences[$p['id_competence']] = $p;
        }
        return $competences;
    }
    
    /* renvoie les noms et les id des compétences enfants d'une compétence parent*/
    public function getChildren($id){
        $stmt = $this->db->prepare("SELECT id, nom FROM competence WHERE id_parent = :id"); 
             $stmt->execute([
            'id' => $id
        ]);
        $children = [];
        foreach ($stmt as $p) {
            $children[$p['id']] = $p;
        }
        return $children;
    }

    public function getRecherche($string){
        $stmt = $this->db->prepare("SELECT * FROM competence WHERE nom LIKE :string AND actif = 1");
        $stmt->execute([
            'string' => '%'.$string.'%'
        ]);
        $competences = [];
        foreach ($stmt as $c) {
            $competences[] = $c['nom'];
        }
        return $competences;
    }
    
    public function add($newComp) {
        $request = ("INSERT INTO competence (nom, id_parent)  VALUES (:nom, :id_parent)");
        $stmt = $this->db->prepare($request);
        return $stmt->execute($newComp);
    }

    public function delete($id) {
        /* $stmt = $this->db->prepare("DELETE FROM competence WHERE id = :id");
        $stmt->execute([
            'id' => $id
        ]);*/
        
        $request = ("UPDATE competence SET actif = 0 WHERE id = :id");
        $stmt = $this->db->prepare($request);
        $stmt->execute($modif);
        $request = ("UPDATE competence SET id_parent = 0 WHERE id_parent = :id");
        $stmt = $this->db->prepare($request);
        $stmt->execute([
            'id' => $id
        ]);
    }

    public function modify($modif) {
        $request = ("UPDATE competence SET nom = :nom, id_parent = :id_parent WHERE id = :id");
        $stmt = $this->db->prepare($request);
        $stmt->execute($modif);
    }
}

