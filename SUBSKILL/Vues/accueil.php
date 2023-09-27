<?php session_start();
?>

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

                <form action="index.php?uc=accueil&page=recherche" method="POST">
                    <input type="text" name="recherche" class="inputRecherche" placeholder="Votre métier de rêve"> </input>
                    
                    <select name="metiersList" placeholder="Métier">
                        <?php foreach($metiers as $metier){ ?>
                            <option> <?php echo $metier->getLibelle() ?></option>
                        <?php } ?>
                    </select>
                    
                    <select name="contratsList" placeholder="Contrats">
                        <?php foreach($contrats as $contrat){ ?>
                            <option> <?php echo $contrat->getLibelle() ?></option>
                        <?php } ?>
                    </select>

                    <select name="villesList" placeholder="Villes (en France)">
                        <?php foreach($villes as $ville){ ?>
                            <option> <?php echo $ville->getLibelle() ?></option>
                        <?php } ?>
                    </select>

                    <select name="filtres" placeholder="Filtres">
                        <option value="dateAsc">Date de publication (Plus récente)</option>
                        <option value="dateDesc">Date de publication (Plus ancienne)</option>
                        <option value="alphAZ">A à Z</option>
                        <option value="alphZA">Z à A</option>
                    </select>

                    <?php
                    if(isset($metierList)){
                        $_SESSION['metier']=$metierList;
                    }
                    else{
                        
                    }

                    if(isset($villeList)){
                        $_SESSION['ville']=$villeList;
                    }
                    
                    if(isset($contratsList)){
                        $_SESSION['contrat']=$contratsList;
                    }?>

                    <input type="hidden" name="sessionMetier" value="<?php if(isset($metierList)){ echo $_SESSION['metier']; } ?>">
                    <input type="hidden" name="sessionContrat" value="<?php if(isset($villeList)){ echo $_SESSION['contrat']; } ?>">
                    <input type="hidden" name="sessionVille" value="<?php if(isset($contratsList)){ echo $_SESSION['ville']; } ?>">

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
                        $response = file_get_contents('https://random.imagecdn.app/v1/image?width=100&height=100&category=buildings&format=json'); 
                        $decoded_json=json_decode($response); ?>

                        <img src="<?php echo $decoded_json->url ?>" class="jobImg" alt="">
                        <?php
                        echo $annonce->getSociete() . " · " . $annonce->getIntitule(). "<br/>" ;
                        echo $annonce->getContrat() .", ". $annonce->getMetier(). "<br/>" ;
                        echo $annonce->getLieu(). "<br/>" ?>
                        Publiée le <?php echo $annonce->getDatePublication(). "<br/>" ?>
                        Référence : <?php echo $annonce->getIdReference(). "<br/> <br/>" ?>
                    </div>
                    <?php }
                } ?>
            </div>
        </div>
        
        <div class="flexNav">
            <form action="index.php?uc=accueil&page=precedent" method="POST">
                <input type="hidden" name="currentPage" value="<?php echo $currentPage ?>">
                <button type="submit" class="buttonNav">Page précédente</button>
            </form>

            <form action="index.php?uc=accueil&page=suivant" method="POST">
                <input type="hidden" name="currentPage" value="<?php echo $currentPage ?>">
                <button type="submit" class="buttonNav">Page suivante</button>
            </form>
        </div>
    </body>