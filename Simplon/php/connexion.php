<?php
        $serveur = "localhost";
        $dbname = "simplon";
        $user = "root";

  
    
    try{
        //On se connecte à la BDD
        $connect = new PDO("mysql:host=$serveur;dbname=$dbname",$user,'');
        $connect->query("SET NAMES UTF8");
        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    

        //On renvoie l'utilisateur vers la page de remerciement
        header("Location:remerciement.html");
    }
    catch(PDOException $e){
        echo 'Impossible de traiter les données. Erreur : '.$e->getMessage();
    }
?>