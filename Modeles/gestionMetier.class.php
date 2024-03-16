<?php

class gestionMetier{
    private $id;
    private $libelle;

    public function getId(){
        return $this->id;
    }

    public function getLibelle(){
        return $this->libelle;
    }

    //Affiche la liste des métiers
    public static function listeMetiers(){
        $req= MonPdo::getInstance()->prepare("SELECT libelle
                                                FROM metiers");
        $req->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,'gestionMetier');
        $req->execute();
        $metiers = $req->fetchAll();

        return $metiers;
    }
}