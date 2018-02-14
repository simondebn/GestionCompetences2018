<?php
/**
 * Created by PhpStorm.
 * User: cdi
 * Date: 08/02/2018
 * Time: 16:34
 */

class personneModelDb
{

    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getOne($id){
        $stmt = $this->db->prepare("SELECT * FROM personne WHERE id = :id");
        $stmt->execute([
            'id' => $id
        ]);
        return $stmt->fetch();
    }

    public function getFromEmail($email){
        $stmt = $this->db->prepare("SELECT * FROM personne WHERE email = :email");
        $stmt->execute([
            'email' => $email
        ]);
        return $stmt->fetch();
    }

    public function getAll() {
        $stmt = $this->db->prepare("SELECT * FROM personne WHERE active = 1");
        $stmt->execute();

        $personnes = [];
        foreach ($stmt as $p) {
            $personnes[$p['id']] = $p;
        }
        return $personnes;
    }
    
    public function getCompetences($id){
        $stmt = $this->db->prepare("SELECT competence.nom FROM lien_personne_comptence 
                        LEFT JOIN competence ON competence.id = id_competence WHERE id_personne = :id");
        $stmt->execute([
            'id' => $id
        ]);
        $skills = [];
        foreach ($stmt as $p) {
            $skills[] = $p['nom'];
        }
        return $skills;
    }
    
    public function add($newPersonne) {
        $request = ("INSERT INTO personne (nom, prenom, email, telephone, description_competences, nom_entreprise, ville_entreprise, description_projets, password, active, compte_admin)  VALUES (:nom, :prenom, :email, :telephone, :description_competences, :nom_entreprise, :ville_entreprise, :description_projets, :password, 1, 0)");
        $stmt = $this->db->prepare($request);
        return $stmt->execute($newPersonne);
    }

    public function delete($id) {
        $stmt = $this->db->prepare("UPDATE personne SET active = 0 WHERE id = :id");
        $stmt->execute([
            'id' => $id
        ]);
    }

    public function modify($modif) {
        $request = ("UPDATE personne SET nom = :nom, prenom = :prenom, email = :email, telephone = :telephone, description_competences = :description_competences, nom_entreprise = :nom_entreprise, ville_entreprise = :ville_entreprise, description_projets = :description_projets, password = :password WHERE id = :id ");
        $stmt = $this->db->prepare($request);
        $stmt->execute($modif);
    }

    public function checkPassword($email, $password) {
        $stmt = $this->db->prepare("SELECT password FROM personne WHERE email = :email");
        $stmt->execute([
            'email' => $email,
        ]);
        $hash = $stmt->fetch()['password'];
        return $hash == sha1($password);
    }

    public function getRecherche($string){
        // quand le champ actif sera sur la table competence :
        //$stmt = $this->db->prepare("SELECT * FROM competence WHERE nom LIKE :string AND actif = 1");
        $stmt = $this->db->prepare("SELECT lien_personne_comptence.id_personne FROM competence
        LEFT JOIN lien_personne_comptence ON lien_personne_comptence.id_competence = competence.id
        LEFT JOIN personne ON lien_personne_comptence.id_personne = personne.id
        WHERE competence.nom LIKE :string AND lien_personne_comptence.id_personne IS NOT NULL;");
        $stmt->execute([
            'string' => '%'.$string.'%'
        ]);
        $personnes = [];
        foreach ($stmt as $c) {
            $personne = $this->getOne($c['id_personne']);
            $personnes[$c['id_personne']] = $personne;
        }

        return $personnes;
    }
}