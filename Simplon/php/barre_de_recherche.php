<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>BARRE DE recherche</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet"  href="../dist/css/bootstrap.css" />
    <link rel="stylesheet"  href="../font-awesome-4.7.0/css/font-awesome.css" />
    
    <script src="../dist/js/jquery.slim.min.js"></script>
            <script src="../dist/js/bootstrap.min.js"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
<div class="container">
  <div class="row">
    <div class="col-sm-0 col-md-2 col-lg-3"></div>
    <div class="col-sm-12 col-md-8 col-lg-6">
      <h1 style="text-align: center">Mon site à moi</h1>
      <div class="form-group">
        <input class="form-control" type="text" id="search-user" value="" placeholder="Rechercher un ou plusieurs utilisateurs"/>
      </div>
      <div style="margin-top: 20px">
        <div id="result-search"></div> <!-- C'est ici que nous aurons nos résultats de notre recherche -->
      </div>
    </div>
  </div>
</div>






<?php
  session_start();
  require_once('connexion.php');
 
  if(isset($_GET['user'])){
    $user = (String) trim($_GET['user']);
 
    $req =  $connect->query("SELECT *
      FROM apprenant
      WHERE nomApprenant LIKE ?
      LIMIT 10",
      array("$user%"));
 
    $req = $req->fetchALL();
  
    foreach($req as $nomApprenant){
      ?>   
        <div style="margin-top: 20px 0; border-bottom: 2px solid #ccc">
          <?= $nomApprenant['nomApprenant'] . " " . $prenomApprenant['prenomApprenant'] ?>
          </div>
          <?php    
    }
  } 
?>

</body>
</html>

