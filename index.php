<?php require_once("./assets/header.php"); 
require_once("./config/dbconnect.php");
   if($conn):
    $requete = "SELECT * FROM mangas";
    
    $exec = $conn->query($requete);
    
    $result = $exec->fetchAll(PDO::FETCH_ASSOC);
    if($exec):
    foreach($result as $key => $value):
?>
<p><?=$value["titre"]?></p>
<p><?=$value["description"]?></p>
<p><?=$value["nbtomes"]?></p>
<p><?=$value["auteur"]?></p>
<p><?=$value["img"]?></p>
<?php endforeach;
endif; 
endif;
require_once("./assets/footer.php")?>
