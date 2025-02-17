<?php require_once('../assets/header.php');?>
    <h1>Ajout d'un nouveau manga</h1>
    <main>
        <div class="container">
            <form class="formulaire" action="../C_UD/create.php" method="post">
                <input type="text" name="titre" placeholder="Titre">
                <input type="text" name="auteur" placeholder="Auteur">
                <input type="number" min="1" name="nbtomes" placeholder="Nombre tomes">
                <input type="text" name="img" placeholder="Url de l'image">
                <textarea rows="10" name="desc" placeholder="Description"></textarea>
                <div class="buttons"><a href="/index.php"><input type="button" class="btn" value="Retour"></a><input class="btn" type="submit" value="Ajouter manga"></div>
            </form>
        </div>
    </main>
</body>
</html>