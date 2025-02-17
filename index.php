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
            <p><?=$value["titre"]?></p>
            <p><?=$value["description"]?></p>
            <p><?=$value["nbtomes"]?></p>
            <p><?=$value["auteur"]?></p>
            <img src="<?=$value["img"]?>" alt="img manga">
            <form class="formulaire" action="/C_UD/delete.php" method="post">
                <input type="hidden" name="id" value="<?= $value["id"]; ?>">
                <input type="submit" value="Supprimer le manga">
            </form>
            <form class="formulaire" action="/form/formUpdate.php" method="post">
                <input type="hidden" name="id" value="<?= $value["id"]; ?>">
                <input type="submit" value="Modifier le manga">
            </form>
        <?php endforeach;?>
        </div>
    </main>
    <?php }
        catch(Exception $e){
            var_dump($e);
        };
require_once("./assets/footer.php")?>
