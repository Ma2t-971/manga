<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="J'adore les mangas 💕!!!">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php 
        $fullFilePath = $_SERVER["PHP_SELF"];
        $fullWithoutFileName = dirname($fullFilePath);
        $pos = strrpos($fullWithoutFileName, '/');
        $folderName = substr($fullWithoutFileName, $pos + 1);

        $cssPath = "../";

        if($folderName === "manga"):
            $cssPath = "./";
        endif;

    ?>
    <link rel="stylesheet" href="<?= $cssPath?>assets/css/style.css">
    <link rel="shortcut icon" href="/assets/img/favicon.png" type="image/png">
    <title>Mangas</title>
</head>
<body>
    <header>
        <nav>
            <a href="<?= $cssPath?>index.php">Accueil</a>
            <a href="<?= $cssPath?>form/formCreate.php">Ajouter manga</a>
        </nav>
    </header>
    