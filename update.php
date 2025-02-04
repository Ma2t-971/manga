<?php

$title = $_POST["title"];
$description = $_POST["description"];
$nbtomes = $_POST["nbtomes"];
$author = $_POST["auteur"]; 
$img = $_POST["img"]; 
$mangaId = $_POST["id"];

require_once("./config/dbconnect.php");

if($conn):

    $requete = "UPDATE mangas SET title = '$title', description = '$description', nbtomes = $nbtomes , auteur = '$author', img = '$img' WHERE id = $mangaId";

    $exec = $conn->query($requete);

    if($exec):
        ?>
            <h1>Modification effectuée</h1>

        <?php endif;
endif; 
?>