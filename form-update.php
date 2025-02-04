<?php
require_once("./assets/header.php");
require_once("./config/dbconnect.php");
var_dump($_POST);
$mangaId = $_POST["identifiant"];

if($conn):

    $requeteFind = "SELECT * FROM mangas WHERE id = $mangaId";

        $exec = $conn->query($requeteFind);

        $result = $exec->fetch(PDO::FETCH_ASSOC);

?>

<form action="./update.php" method="post">
    <input type="text" name="title" value="<?php echo $result["titre"]; ?>">
    <input type="text" name="description" value="<?php echo $result["description"]; ?>">
    <input type="number" name="nbtomes" value="<?php echo $result["nbtomes"]; ?>">
    <input type="text" name="author" value="<?php echo $result["auteur"]; ?>">
    <input type="text" name="img" value="<?php echo $result["img"]; ?>">
    <input type="hidden" name="id" value="<?php echo $result["id"]; ?>">
    <input type="submit" value="Modifier l'utilisateur">
</form>

<?php endif; 

require_once("./assets/footer.php");

?>