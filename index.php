<?php require_once("./assets/header.php"); 
require_once("./config/dbconnect.php");
   if($conn):
    $requete = "SELECT * FROM mangas";
    
    $exec = $conn->query($requete);
    
    $result = $exec->fetchAll(PDO::FETCH_ASSOC);
    if($exec):
    foreach($result as $key => $value):
?>
<p><?=$value?></p>
<?php endforeach;
endif; 
endif;?>
