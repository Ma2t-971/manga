<?php require_once("./assets/header.php"); 
try{
    require_once './config/dbconnect.php' ;
    $request = "SELECT * FROM mangas";
    $prepare = $conn -> prepare($request);
    $prepare -> execute();   
    $result = $prepare->fetchAll();?>
    <main>
        <div class="container2">
        <?php foreach($result as $key => $value):?>
            <?php

// Si la valeur existe, alors on enlève les espaces et on convertit les caractères interdit, sinon on passe 0
$titre = (isset($value['titre'])) ? htmlspecialchars(trim($value['titre'])) : 0;
$auteur = (isset($value['auteur'])) ? htmlspecialchars(trim($value['auteur'])) : 0;
//on ne cast par directement nbtomes en int pour éviter des erreurs - on teste seulement par la suite si c'est bien une chaine numérique
$nbtomes = (isset($value['nbtomes'])) ? htmlspecialchars(trim($value['nbtomes'])) : 0;
$desc = (isset($value['description'])) ? htmlspecialchars(trim($value['description'])) : 0;
$img = (isset($value['img'])) ? htmlspecialchars(trim($value['img'])) : 0;

$patternAuteur = "/^[A-Z]{1}[a-z]*$/";
$tableauErreurs = [];

// Si $titre existe, alors il aura une valeur différente de false. Sinon il sera à 0 qui est évaluée comme égale à FALSE. On rajoute donc un ! pour inverser la valeur de la condition
if(!$titre):
    $tableauErreurs["titre"] = "N'existe pas." ;
else:
    if(empty($titre)|| strlen($titre)<=1 || strlen($titre)>=256) :
        $tableauErreurs["titre"] = "Valeur incorrecte" ;
    endif;
endif;
if(!$auteur):
    $tableauErreurs["auteur"] = "N'existe pas." ;
else:
    if(empty($auteur)|| strlen($auteur) <= 1 || strlen($auteur) >= 256 || preg_match($patternAuteur, $auteur)):
        $tableauErreurs["auteur"] = "Valeur incorrecte" ;
    endif;
endif;
if(!$nbtomes):
    $tableauErreurs["nbtomes"] = "N'existe pas." ;
else:
    // is_numeric détermine si une variable est un nombre ou une chaîne numérique
    if(empty($nbtomes)|| $nbtomes <= 0 ||$nbtomes >= 1000 ||!is_numeric($nbtomes)):
        $tableauErreurs["nbtomes"] = "Valeur incorrecte" ;
    endif;
endif;
if(!$desc):
    $tableauErreurs["desc"] = "N'existe pas." ;
else:
    if(empty($desc)|| strlen($desc)<=19  || strlen($desc)>=1001):
        $tableauErreurs["desc"] = "Valeur incorrecte" ;
    endif;
endif;
if(!$img):
    $tableauErreurs["img"] = "N'existe pas." ;
else:
    if(empty($img) || !filter_var($img, FILTER_VALIDATE_URL)):
        $tableauErreurs["img"] = "Valeur incorrecte" ;
    endif;
endif; 
if(empty($tableauErreurs)):
?>
            <p><?=$value["titre"]?></p>
            <p><?=$value["description"]?></p>
            <p><?=$value["nbtomes"]?></p>
            <p><?=$value["auteur"]?></p>
            <img src="<?=$value["img"]?>" alt="img manga">
            <form class="formulaire" action="<?= $cssPath?>C_UD/delete.php" method="post">
                <input type="hidden" name="id" value="<?= $value["id"]; ?>">
                <input type="submit" value="Supprimer le manga">
            </form>
            <form class="formulaire" action="<?= $cssPath?>form/formUpdate.php" method="post">
                <input type="hidden" name="id" value="<?= $value["id"]; ?>">
                <input type="submit" value="Modifier le manga">
            </form>
        <?php 
        else:
            foreach($tableauErreurs as $key => $value): ?>
                <p>Erreur sur le champ <?=$key?>: <?=$value?></p>
        <?php endforeach; 
    endif;
    endforeach;?>
        </div>
    </main>
    <?php }
        catch(Exception $e){
            var_dump($e);
        };
require_once("./assets/footer.php")?>
