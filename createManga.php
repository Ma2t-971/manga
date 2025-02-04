<?php

$titre = $_POST['titre'];
$auteur = $_POST['auteur'];
$nbtomes = $_POST['nbtomes'];
$desc = $_POST['desc'];
$img = $_POST['img'];
session_start();

if(trim($titre) !=='' && trim($auteur) !==''):
    try{
        require_once('./config/dbconnect.php');
        $request = "INSERT INTO mangas (titre, description, nbtomes, auteur, img) VALUES ('$titre', '$desc', $nbtomes, '$auteur', '$img');";

        $exec = $conn -> query($request);
        if($exec):
            $_SESSION['message'] = "Utilisateur ajouté avec succès !";
            $_SESSION['message_type'] = "success";
        else:
            $_SESSION['message'] = "Erreur inconnue";
            $_SESSION['message_type'] = "error";
        endif;
    }
    catch(Exception $e){
        $_SESSION['message'] = "Erreur de connexion.";
        $_SESSION['message_type'] = "error";
    }
else:
    $_SESSION['message'] = "Veuillez remplir tous les champs !";
    $_SESSION['message_type'] = "error";
endif;
header("Location: ./index.php");