<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style.css">
    <title>Mangas</title>
</head>
<body>
    <header>
        <nav>
            <a href="./index.php">Accueil</a>
            <a href="./select.php">Liste des mangas</a>
            <a class="active" href="./formAddManga.php">Ajouter manga</a>
        </nav>
    </header>
    <h1>Ajout d'un nouveau manga</h1>
    <main>
        <div class="container">
            <form class="formulaire" action="./createManga.php" method="post">
                <input type="text" name="titre" placeholder="Titre">
                <input type="text" name="auteur" placeholder="Auteur">
                <input type="number" min="1" name="nbtomes" placeholder="Nombre tomes">
                <input type="text" name="img" placeholder="Url de l'image">
                <textarea rows="10" name="desc" placeholder="Description"></textarea>
                <div class="buttons"><a href="./index.php"><input type="button" class="btn" value="Retour"></a><input class="btn" type="submit" value="Ajouter le nouvel utilisateur"></div>
            </form>
        </div>
    </main>
</body>
</html>