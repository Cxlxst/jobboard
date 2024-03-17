<?php

if(empty($_GET["page"])){
    $page = "page1";
}
else{
    $page = $_GET["page"];
}

switch($page){
    case "page1":
        $nbrAnnonces=gestionAnnonce::nbrAnnonces();
        $annonces=gestionAnnonce::listeAnnonces();
        $metiers=gestionMetier::listeMetiers();
        $villes=gestionVille::listeVilles();
        $contrats=gestionContrat::listeContrats();

        include "Vues/accueil.php";
        break;

    case "suivant":
        $numPage = $_POST['numPage'];
        $numPage += 1;

        $numPageCalcul = ($numPage-1)*10;

        $nbrAnnonces=gestionAnnonce::nbrAnnonces();
        $annonces=gestionAnnonce::listeAnnoncesSuivante($numPageCalcul);
        $metiers=gestionMetier::listeMetiers();
        $villes=gestionVille::listeVilles();
        $contrats=gestionContrat::listeContrats();

        include "Vues/accueil.php";
        break;

    case "precedent":
        $numPage = $_POST['numPage'];
        $numPage -= 1;

        $numPageCalcul = ($numPage-1)*10;

        $nbrAnnonces=gestionAnnonce::nbrAnnonces();
        $annonces=gestionAnnonce::listeAnnoncesPrecendente($numPageCalcul);
        $metiers=gestionMetier::listeMetiers();
        $villes=gestionVille::listeVilles();
        $contrats=gestionContrat::listeContrats();

        include "Vues/accueil.php";
        break;

    case "recherche":
        $recherche = $_GET['recherche'];
        $metierList = $_GET['metiersList'];
        $villeList = $_GET['villesList'];
        $contratsList = $_GET['contratsList'];
        $filtres = $_GET['filtres'];
        
        $sessionMetier = $_GET['sessionMetier'];
        $sessionContrat = $_GET['sessionContrat'];
        $sessionVille = $_GET['sessionVille'];
        
        $annonces=gestionAnnonce::listeRecherche($recherche, $metierList, $villeList, $contratsList, $filtres);
        $metiers=gestionMetier::listeMetiers();
        $villes=gestionVille::listeVilles();
        $contrats=gestionContrat::listeContrats();
        
        include "Vues/accueil.php";
        break;
}