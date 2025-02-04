<?php require_once("./assets/header.php"); 
require_once("./config/dbconnect.php");
   if($conn):
    $requete = "SELECT * FROM mangas";
    $exec = $conn->query($requete);   
    $result = $exec->fetchAll(PDO::FETCH_ASSOC);
    if($exec):?>
        <main>
        <div class="container2">
        <?php foreach($result as $key => $value):?>
            <p><?=$value["titre"]?></p>
            <p><?=$value["description"]?></p>
            <p><?=$value["nbtomes"]?></p>
            <p><?=$value["auteur"]?></p>
            <img src="<?=$value["img"]?>" alt="img manga">
            <form class="formulaire" action="./delete.php" method="post">
                <input type="hidden" name="id" value="<?php echo $value["id"]; ?>">
                <input type="submit" value="Supprimer le manga">
            </form>
            <form class="formulaire" action="form-update.php" method="post">
                <input type="hidden" name="id" value="<?php echo $value["id"]; ?>">
                <input type="submit" value="Modifier le manga">
            </form>
        <?php endforeach;?>
        </div>
    <?php endif; 
endif;
require_once("./assets/footer.php")?>
