<?php 
try{
    // si id n'existe pas ou ce n'est pas un nombre positif entier, on interrompt le script.
    if (!isset($_POST["id"]) || !ctype_digit($_POST["id"]) || !password_verify($_POST["id"], $_POST["hashIdDelete"]))
        die("ID invalide");
    require_once("../config/dbconnect.php");
    $mangaId = htmlspecialchars($_POST["id"]);
    $request = "DELETE FROM mangas WHERE id = :mangaId";
    $prepare = $conn -> prepare($request);
    $prepare -> bindParam('mangaId', $mangaId, PDO::PARAM_INT);
    $result = $prepare -> execute();?>
    <h1>Suppression effectuée</h1>
    <a href="../index.php" aria-label="Revenir à la page d'accueil">Retourner</a>
<?php }
catch(Exception $e){
    var_dump($e);
} 
