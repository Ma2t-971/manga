<?php
require_once '../validation/validation.php';
var_dump($_POST);
if(empty($tableauErreurs)):     
    try{
        // si id n'existe pas ou n'est pas un nombre positif entier, on interrompt le script.
        if (!isset($_POST["id"]) || !ctype_digit($_POST["id"]) || !password_verify($_POST["id"], $_POST["hashIdUpdate"]))
            die("ID invalide");
        require_once("../config/dbconnect.php");
        $mangaId = htmlspecialchars($_POST["id"]);
        $request = "UPDATE mangas SET titre = :titre, description = :desc, nbtomes = :nbtomes , auteur = :auteur, img = :img WHERE id = :mangaId";
        $prepare = $conn -> prepare($request);
        $prepare -> bindParam('titre', $titre, PDO::PARAM_STR);
        $prepare -> bindParam('desc', $desc, PDO::PARAM_STR);
        // PDO::PARAM_INT caste la chaine numérique en INT
        $prepare -> bindParam('nbtomes', $nbtomes, PDO::PARAM_INT);
        $prepare -> bindParam('auteur', $auteur, PDO::PARAM_STR);
        $prepare -> bindParam('img', $img, PDO::PARAM_STR);
        $prepare -> bindParam('mangaId', $mangaId, PDO::PARAM_INT);
        $result = $prepare -> execute();

        header("Location: ../index.php");
    }
    catch(Exception $e){
        echo "<pre>";
        var_dump($e);
        echo "</pre>";
    };
else:
    foreach($tableauErreurs as $key => $value): ?>
        <p>Erreur sur le champ <?=$key?>: <?=$value?></p>
<?php endforeach;    
endif;?>
<a href="../index.php" aria-label="Revenir à la page d'accueil">Retourner</a>