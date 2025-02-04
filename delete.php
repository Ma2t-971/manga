<?php 
    
    require_once("../config/dbconnect.php");

    $mangasId = $_POST["identifiant"];

    if($conn):?>
         <?php 
            $requete = "DELETE FROM mangas WHERE id = $prodId";
            $exec = $conn->query($requete);

        if($exec):
        ?>
            <h1>Suppression effectuée</h1>
        <?php endif; ?>
    
<?php endif;?>