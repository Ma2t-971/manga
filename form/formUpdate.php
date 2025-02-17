<?php require_once '../assets/header.php';


try{
    // si id n'existe pas ou n'est pas un nombre positif entier, on interrompt le script.
    if (!isset($_POST["id"]) || !ctype_digit($_POST["id"]))
        die("ID invalide");
    require_once("../config/dbconnect.php");
    $mangaId = htmlspecialchars($_POST["id"]);
    $request = "SELECT * FROM mangas WHERE id = :mangaId";
    $prepare = $conn->prepare($request);
    $prepare -> bindParam(':mangaId', $mangaId, PDO::PARAM_INT);
    $prepare -> execute();
    $result = $prepare -> fetch();?>
    <main>
        <div class="container">
            <form class="formulaire" action="/C_UD/update.php" method="post">
                <input type="text" name="titre" value="<?= $result["titre"]; ?>">
                <input type="text" name="auteur" value="<?= $result["auteur"]; ?>">
                <input type="number" name="nbtomes" value="<?= $result["nbtomes"]; ?>">                
                <textarea name="desc"><?= $result["description"]; ?></textarea>
                <input type="text" name="img" value="<?= $result["img"]; ?>">
                <input type="hidden" name="id" value="<?= $result["id"]; ?>">
                <input type="submit" value="Modifier le manga">
            </form>
        </div>
    </main>
<?php }
catch(Exception $e){
    echo "<pre>";
    var_dump($e);
    echo "</pre>";
};