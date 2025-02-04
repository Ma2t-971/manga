<?php 
    
    require_once("./config/dbconnect.php");

    $mangasId = $_POST["id"];

    if($conn):?>
         <?php 
            $requete = "DELETE FROM mangas WHERE id = $mangasId";
            $exec = $conn->query($requete);

        if($exec):
        ?>
            <h1>Suppression effectuée</h1>
            <a href="./index.php">Retourner</a>
        <?php endif; ?>
    
<?php endif;
header("Location: ./index.php");
?>