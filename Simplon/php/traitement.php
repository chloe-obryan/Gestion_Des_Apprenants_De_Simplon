<?php
    session_start();
    require('connexion.php');




    //Tuteur
    $nomTuteur = $_POST['nomTuteur'];
    $prenomTuteur = $_POST['prenomTuteur'];
    $profession = $_POST['profession'];
    $telephoneTuteur = $_POST['telephoneTuteur'];

    // //Apprenant
    
    $telephoneTuteur = $_POST['telephoneTuteur'];
    $nomApprenant = $_POST['nomApprenant'];
    $prenomApprenant = $_POST['prenomApprenant'];
    $dateDeNaissance = $_POST['dateDeNaissance'];
    $lieuDeNaissance = $_POST['lieuDeNaissance'];
    $genre = $_POST['genre'];
    $ville = $_POST['ville'];
    $etablissement = $_POST['etablissement'];
    $formation = $_POST['formation'];
    $telephoneApprenant = $_POST['telephoneApprenant'];
    $email = $_POST['email'];
    $photo = $_FILES['photo'];
   


    //On insère les données reçues du tuteur
    
    $insert = $connect->prepare("
    INSERT INTO tuteur (nomTuteur, prenomTuteur, profession, telephoneTuteur)
    VALUES(?, ?, ?, ?)");

    $insert->execute(array($nomTuteur, $prenomTuteur, $profession,$telephoneTuteur));
    

   //On insère les données reçues de l'apprenant
   move_uploaded_file($photo['tmp_name'], 'photosapprenants/'.$telephoneApprenant.'photo.jpg');
   $insert = $connect->prepare("
   INSERT INTO apprenant ( telephoneTuteur, nomApprenant, prenomApprenant,  dateDeNaissance, lieuDeNaissance, genre, ville, 
   etablissement, formation, 
   telephoneApprenant, email, photo)
   VALUES(?,?,?,?,?,?,?,?,?,?,?,?)");

   $insert->execute(array($telephoneTuteur, $nomApprenant, $prenomApprenant, $dateDeNaissance, $lieuDeNaissance, $genre, $ville, 
   $etablissement, $formation,$telephoneApprenant, $email, 'photosapprenants/'.$telephoneApprenant.'photo.jpg')); 
?>