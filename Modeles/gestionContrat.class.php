<?php

class gestionContrat{
    private $id;
    private $libelle;

    public function getId(){
        return $this->id;
    }

    public function getLibelle(){
        return $this->libelle;
    }


    //Affiche la liste des contrats
    public static function listeContrats(){
        $req= MonPdo::getInstance()->prepare("SELECT libelle
                                                FROM contrats");
        $req->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,'gestionContrat');
        $req->execute();
        $contrats = $req->fetchAll();

        return $contrats;
    }
}