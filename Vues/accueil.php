<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Jobboard by Subskill</title>
        <link href="Vues/index.css" rel="stylesheet" type="text/css" media="all">
    </head>

    <body>
        <div class="headBar">
            <h1>JOBBOARD</h1>

            <div class="containerInput">
                <form action="index.php?uc=accueil" method="POST">
                    <button type="submit" name="buttonReset" class="buttonReset"> Réinitialiser les champs </button>
                </form>

                <form action="index.php" method="GET">
                    <input type="hidden" name="uc" value="accueil" />
                    <input type="hidden" name="page" value="recherche" />
                    <input <?= (isset($_GET['inputRecherche']))?'value="<?php echo $recherche ?>"':'' ?> type="text" name="recherche" class="inputRecherche" placeholder="Votre métier de rêve"> </input>
                    
                    <select name="metiersList" placeholder="Métier">
                    <?php foreach($metiers as $metier){?>
                            <!-- Check (isset) pour savoir si il y a une valeur dans contratsList, récupération (GET) de la donnée et set (selected) de celle-ci pour la garder -->
                            <option <?= (isset($_GET['metiersList']) && $_GET['metiersList']==$metier->getLibelle())?'selected="selected"':'' ?> value="<?php echo $metier->getLibelle()?>"> <?php echo $metier->getLibelle() ?></option>
                        <?php } ?>
                    </select>
                    
                    <select name="contratsList" placeholder="Contrats">
                        <?php foreach($contrats as $contrat){ ?>
                            <option <?= (isset($_GET['contratsList']) && $_GET['contratsList']==$contrat->getLibelle())?'selected="selected"':'' ?> value="<?php echo $contrat->getLibelle()?>"> <?php echo $contrat->getLibelle() ?></option>
                        <?php } ?>
                    </select>

                    <select name="villesList" placeholder="Villes (en France)">
                        <?php foreach($villes as $ville){ ?>
                            <option <?= (isset($_GET['villesList']) && $_GET['villesList']==$ville->getLibelle())?'selected="selected"':'' ?> value="<?php echo $ville->getLibelle() ?>"> <?php echo $ville->getLibelle() ?></option>
                        <?php } ?>
                    </select>

                    <select name="filtres" placeholder="Filtres">
                        <?php if(isset($_GET['filtres']) && $_GET['filtres']=='dateAsc') { ?>
                            <option value="dateDesc">Date de publication (Plus récente)</option>
                            <option value="dateAsc" selected>Date de publication (Plus ancienne)</option>
                            <option value="alphAZ">A à Z</option>
                            <option value="alphZA">Z à A</option>
                        <?php }
                        else if(isset($_GET['filtres']) && $_GET['filtres']=='alphAZ') { ?>
                            <option value="dateDesc">Date de publication (Plus récente)</option>
                            <option value="dateAsc">Date de publication (Plus ancienne)</option>
                            <option value="alphAZ" selected>A à Z</option>
                            <option value="alphZA">Z à A</option>
                        <?php }
                        else if(isset($_GET['filtres']) && $_GET['filtres']=='alphZA'){ ?>
                            <option value="dateDesc">Date de publication (Plus récente)</option>
                            <option value="dateAsc">Date de publication (Plus ancienne)</option>
                            <option value="alphAZ">A à Z</option>
                            <option value="alphZA" selected>Z à A</option>
                        <?php } 
                        else {?>
                            <option value="dateDesc" selected>Date de publication (Plus récente)</option>
                            <option value="dateAsc">Date de publication (Plus ancienne)</option>
                            <option value="alphAZ">A à Z</option>
                            <option value="alphZA">Z à A</option>
                        <?php } ?>
                    </select>

                    <button type="submit" class="buttonSearch"> <img src="Vues/img/loupe.png" class="searchImg"> </button>
                </form>
            </div>
        </div>
        
        
        <div class="flexContainer">
            <div class="containerList">
                <?php
                if(empty($annonces)){ ?>
                    <div>Aucune annonce n'est publiée pour le moment</div>
                <?php }
                else{
                    foreach($annonces as $annonce){ ?>
                    <div class="jobBox">
                        <?php
                        $dateP = $annonce->getDatePublication();
                        $datePFinal = new DateTimeImmutable($dateP);
                        $datePFinal = $datePFinal->format('d/m/Y');
                        
                        $response = file_get_contents('https://random.imagecdn.app/v1/image?width=100&height=100&category=buildings&format=json'); 
                        $decoded_json=json_decode($response); ?>

                        <img src="<?php echo $decoded_json->url ?>" class="jobImg" alt="">
                        <?php
                        echo $annonce->getSociete() . " · " . $annonce->getIntitule(). "<br/>" ;
                        echo $annonce->getContrat() .", ". $annonce->getMetier(). "<br/>" ;
                        echo $annonce->getLieu(). "<br/>" ?>
                        Publiée le <?php echo $datePFinal. "<br/>" ?>
                        Référence : <?php echo $annonce->getIdReference(). "<br/> <br/>" ?>
                    </div>
                    <?php }
                } ?>
            </div>
        </div>
        
        <div class="flexNav">
            <form action="index.php?uc=accueil&page=precedent" method="POST">
                <input type="hidden" name="numPage" value="<?php echo $numPage?>">
                <input type="hidden" name="currentPage" value="<?php echo $currentPage ?>">
                <button type="submit" class="buttonNav">Page précédente</button>
            </form>

            <form action="index.php?uc=accueil&page=suivant" method="POST">
                <input type="hidden" name="numPage" value="<?php echo $numPage?>">
                <input type="hidden" name="currentPage" value="<?php echo $currentPage ?>">
                <button type="submit" class="buttonNav">Page suivante</button>
            </form>
        </div>
    </body>