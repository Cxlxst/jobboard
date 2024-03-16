<?php

class gestionVille{
    private $id;
    private $libelle;
    private $codePostal;

    public function getId(){
        return $this->id;
    }

    public function getLibelle(){
        return $this->libelle;
    }

    public function getCodePostal(){
        return $this->codePostal;
    }


    //Affiche la liste de toutes les villes
    public static function listeVilles(){
        $req= MonPdo::getInstance()->prepare("SELECT libelle, codePostal
                                                FROM villes");
        $req->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,'gestionVille');
        $req->execute();
        $villes = $req->fetchAll();

        return $villes;
    }
}