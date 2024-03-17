<?php

class gestionAnnonce{
    private $idReference;
    private $image;
    private $intitule;
    private $nomSociete;
    private $datePublication;
    private $dateMaj;
    private $libelleVille;
    private $libelleContrat;
    private $libelleMetier;
    private $description;
    
    private $codePostal;
    private $nbrAnnonces;


    public function getIdReference(){
        return $this->idReference;
    }

    public function getImage(){
        return $this->image;
    }

    public function getIntitule(){
        return $this->intitule;
    }

    public function getSociete(){
        return $this->nomSociete;
    }

    public function getDatePublication(){
        return $this->datePublication;
    }

    public function getDateMaj(){
        return $this->dateMaj;
    }

    public function getLieu(){
        return $this->libelleVille;
    }

    public function getContrat(){
        return $this->libelleContrat;
    }

    public function getMetier(){
        return $this->libelleMetier;
    }

    public function getDescription(){
        return $this->description;
    }

    public function getCodePostal(){
        return $this->codePostal;
    }
    public function getNbrAnnonces(){
        return $this->nbrAnnonces;
    }

    //Affiche la liste de toutes les annnonces
    public static function listeAnnonces(){
        $req= MonPdo::getInstance()->prepare("SELECT image, intitule, datePublication, A.id AS dateP, A.id AS idReference, S.nom AS nomSociete, C.libelle AS libelleContrat, M.libelle AS libelleMetier, V.libelle AS libelleVille, V.codePostal
                                                FROM annonces A
                                                JOIN societes S ON A.societe = S.id
                                                JOIN contrats C ON A.contrat = C.id
                                                JOIN metiers M ON A.metier = M.id
                                                JOIN villes V ON A.lieu = V.id
                                                ORDER BY datePublication DESC
                                                LIMIT 0,10 ");
        $req->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,'gestionAnnonce');
        $req->execute();
        $annonces = $req->fetchAll();

        return $annonces;
    }

    //Affiche la liste des annonces suite à une recherche
    public static function listeRecherche($intitule, $libelleMetier, $libelleVille, $libelleContrat, $filtres){
        $libMetier= "";
        $libVille="";
        $libContrat="";
        $filtreApplique="";

        if($libelleMetier != "Tous les métiers"){
            $libMetier = " AND M.libelle= :libelleMetier ";
        }

        if($libelleVille != "Toutes les villes"){
            $libVille = " AND V.libelle= :libelleVille ";
        }

        if($libelleContrat != "Tous les contrats"){
            $libContrat = " AND C.libelle= :libelleContrat ";
        }

        if($filtres == "dateDesc"){
            $filtreApplique = " ORDER BY datePublication DESC ";
        }
        else if($filtres == "dateAsc"){
            $filtreApplique = " ORDER BY datePublication ";
        }
        else if($filtres == "alphAZ"){
            $filtreApplique = " ORDER BY intitule ";
        }
        else{
            $filtreApplique= " ORDER BY intitule DESC ";
        }

        $req= MonPdo::getInstance()->prepare("SELECT image, intitule, datePublication, A.id AS idReference, S.nom AS nomSociete, C.libelle AS libelleContrat, M.libelle AS libelleMetier, V.libelle AS libelleVille, V.codePostal
                                                FROM annonces A
                                                JOIN societes S ON A.societe = S.id
                                                JOIN contrats C ON A.contrat = C.id
                                                JOIN metiers M ON A.metier = M.id
                                                JOIN villes V ON A.lieu = V.id
                                                WHERE A.intitule LIKE '%' :intitule '%'
                                                ". $libMetier ."
                                                ". $libVille ."
                                                ". $libContrat ."
                                                ". $filtreApplique ." ");
        $req->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,'gestionAnnonce');
        $req->bindParam('intitule', $intitule);

        if($libelleMetier != "Tous les métiers"){
            $req->bindParam('libelleMetier', $libelleMetier);
        }

        if($libelleVille != "Toutes les villes"){
            $req->bindParam('libelleVille', $libelleVille);
        }

        if($libelleContrat != "Tous les contrats"){
            $req->bindParam('libelleContrat', $libelleContrat);
        }

        $req->execute();
        $annoncesRecherche = $req->fetchAll();

        return $annoncesRecherche;
    }
    
    //Affiche le nombre d'annonces total
    public static function nbrAnnonces(){
        $req= MonPdo::getInstance()->prepare("SELECT COUNT(*) AS nbrAnnonces
                                                FROM annonces");
        $req->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,'gestionAnnonce');
        $req->execute();
        $nombreAnnonces = $req->fetchAll();
        
        return $nombreAnnonces;
    }

    //Affiche la liste de toutes les annnonces en appuyant sur le bouton suivant
    public static function listeAnnoncesSuivante($numPageCalcul){

        $req= MonPdo::getInstance()->prepare("SELECT image, intitule, datePublication, A.id AS idReference, S.nom AS nomSociete, C.libelle AS libelleContrat, M.libelle AS libelleMetier, V.libelle AS libelleVille, V.codePostal
                                                FROM annonces A
                                                JOIN societes S ON A.societe = S.id
                                                JOIN contrats C ON A.contrat = C.id
                                                JOIN metiers M ON A.metier = M.id
                                                JOIN villes V ON A.lieu = V.id
                                                LIMIT numPageCalcul, 10");
        $req->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,'gestionAnnonce');
        $req->bindParam('numPageCalcul', $numPageCalcul, PDO::PARAM_INT);
        $req->execute();
        $annonces = $req->fetchAll();

        return $annonces;
    }

    //Affiche la liste de toutes les annnonces en appuyant sur le bouton précédent
    public static function listeAnnoncesPrecendente($numPageCalcul){
        $req= MonPdo::getInstance()->prepare("SELECT image, intitule, datePublication, A.id AS idReference, S.nom AS nomSociete, C.libelle AS libelleContrat, M.libelle AS libelleMetier, V.libelle AS libelleVille, V.codePostal
                                                FROM annonces A
                                                JOIN societes S ON A.societe = S.id
                                                JOIN contrats C ON A.contrat = C.id
                                                JOIN metiers M ON A.metier = M.id
                                                JOIN villes V ON A.lieu = V.id
                                                LIMIT :numPageCalcul, 10");
        $req->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,'gestionAnnonce');
        $req->bindParam('numPageCalcul', $numPageCalcul, PDO::PARAM_INT);
        $req->execute();
        $annonces = $req->fetchAll();

        return $annonces;
    }
}