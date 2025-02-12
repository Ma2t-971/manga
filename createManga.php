<?php

$titre = htmlspecialchars($_POST['titre']);
$auteur = htmlspecialchars($_POST['auteur']);
$nbtomes = (int)htmlspecialchars($_POST['nbtomes']);
$desc = htmlspecialchars($_POST['desc']);
$img = htmlspecialchars($_POST['img']);

//var_dump($nbtomes);

$pattern = "/^[A-Z]{1}[a-z]*$/";

$tableauErreurs = [];

if(!isset($titre) || empty(trim($titre))|| strlen($titre)<=1 || strlen($titre)>=256):
    $tableauErreurs["titre"] = TRUE ;
endif;
if(!isset($auteur) || empty(trim($auteur))|| strlen($auteur)<=1 || strlen($auteur)>=256 || preg_match($pattern, $auteur)):
    $tableauErreurs["auteur"] = TRUE ;
endif;
if(!isset($nbtomes) || empty(trim($nbtomes))|| $nbtomes<=0 ||$nbtomes>=1000):
    $tableauErreurs["nbtomes"] = TRUE ;
endif;
if(!isset($desc) || empty(trim($desc))|| strlen($desc)<=19  || strlen($desc)>=1000):
    $tableauErreurs["desc"] = TRUE ;
endif;
if(!isset($img) || empty(trim($img)) || !filter_var($img, FILTER_VALIDATE_URL)):
    $tableauErreurs["img"] = TRUE ;
endif;

if(empty($tableauErreurs)):
        
        try{
            require_once('./config/dbconnect.php');
            $request = "INSERT INTO mangas (titre, description, nbtomes, auteur, img) VALUES (':titre', ':desc', :nbtomes, ':auteur', ':img');";

            $prepare = $conn -> prepare($request);
            $prepare -> bindParam(':titre', $titre, PDO::PARAM_STR);
            $prepare -> bindParam(':desc', $desc, PDO::PARAM_STR);
            $prepare -> bindParam(':nbtomes', $nbtomes, PDO::PARAM_INT);
            $prepare -> bindParam(':auteur', $auteur, PDO::PARAM_STR);
            $prepare -> bindParam(':img', $img, PDO::PARAM_STR);

            $result = $prepare -> execute(); 


            header("Location: ./index.php");
        }
        catch(Exception $e){
            var_dump($e);
        } ;

else:
    foreach($tableauErreurs as $key => $value): ?>
        <p> <?=$key?>: <?=$value?></p>
<?php  endforeach;    
endif; ?>
        