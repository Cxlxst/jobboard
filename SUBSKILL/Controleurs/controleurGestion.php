<?php

if(empty($_GET["page"])){
    $page = "page1";
}
else{
    $page = $_GET["page"];
}

switch($page){
    case "page1":
        $currentPage = 1;

        $nbrAnnonces=gestionAnnonce::nbrAnnonces();
        $annonces=gestionAnnonce::listeAnnonces();
        $metiers=gestionMetier::listeMetiers();
        $villes=gestionVille::listeVilles();
        $contrats=gestionContrat::listeContrats();

        include "Vues/accueil.php";
        break;

    case "suivant":
        $currentPage = $_POST['currentPage'];
        $premiere = ((int)$currentPage * 2);
        $derniere= $currentPage * 2;
        $currentPage += 1;

        $nbrAnnonces=gestionAnnonce::nbrAnnonces();
        $annonces=gestionAnnonce::listeAnnoncesSuivante($premiere, $derniere);
        $metiers=gestionMetier::listeMetiers();
        $villes=gestionVille::listeVilles();
        $contrats=gestionContrat::listeContrats();

        include "Vues/accueil.php";
        break;

    case "precedent":
        $currentPage = $_POST['currentPage']-1;
        $premiere = ((int)$currentPage * 2);
        $derniere= $premiere - 2;
        $currentPage -= 1;

        $nbrAnnonces=gestionAnnonce::nbrAnnonces();
        $annonces=gestionAnnonce::listeAnnoncesPrecendente($premiere, $derniere);
        $metiers=gestionMetier::listeMetiers();
        $villes=gestionVille::listeVilles();
        $contrats=gestionContrat::listeContrats();

        include "Vues/accueil.php";
        break;

    case "recherche":
        $recherche = $_POST['recherche'];
        $metierList = $_POST['metiersList'];
        $villeList = $_POST['villesList'];
        $contratsList = $_POST['contratsList'];
        $filtres = $_POST['filtres'];
        
        $sessionMetier = $_POST['sessionMetier'];
        $sessionContrat = $_POST['sessionContrat'];
        $sessionVille = $_POST['sessionVille'];
        
        $annonces=gestionAnnonce::listeRecherche($recherche, $metierList, $villeList, $contratsList, $filtres);
        $metiers=gestionMetier::listeMetiers();
        $villes=gestionVille::listeVilles();
        $contrats=gestionContrat::listeContrats();
        
        include "Vues/accueil.php";
        break;
}