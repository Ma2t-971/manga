<?php
require_once '../validation/validation.php';
if(empty($tableauErreurs)):     
        try{
            require_once('../config/dbconnect.php');
            // pas de quotes autour des placeholder (comme ':titre')  dans VALUES sinon erreur
            $request = "INSERT INTO mangas (titre, description, nbtomes, auteur, img) VALUES (:titre, :desc, :nbtomes, :auteur, :img);";

            $prepare = $conn -> prepare($request);
            $prepare -> bindParam('titre', $titre, PDO::PARAM_STR);
            $prepare -> bindParam('desc', $desc, PDO::PARAM_STR);
            // PDO::PARAM_INT caste la chaine numérique en INT
            $prepare -> bindParam('nbtomes', $nbtomes, PDO::PARAM_INT);
            $prepare -> bindParam('auteur', $auteur, PDO::PARAM_STR);
            $prepare -> bindParam('img', $img, PDO::PARAM_STR);
            $result = $prepare -> execute(); 

            header("Location: ../index.php");
        }
        catch(Exception $e){
            var_dump($e);
        };
else:
    foreach($tableauErreurs as $key => $value): ?>
        <p>Erreur sur le champ <?=$key?>: <?=$value?></p>
<?php endforeach;    
endif;?>
<a href="../form/formCreate.php" aria-label="Revenir à la page d'ajout de Manga">Retourner</a>
        