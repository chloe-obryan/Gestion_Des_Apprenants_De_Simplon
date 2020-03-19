<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>LISTE APPRENANTS</title>
    <link rel="stylesheet"  href="../dist/css/bootstrap.css" />
    <link rel="stylesheet"  href="../CSS/CSS.css" />
    <link rel="stylesheet"  href="../CSS/style.css" />
    <link rel="stylesheet"  href="../font-awesome-4.7.0/css/font-awesome.css" />
    
</head>
<body onload="window.print()">




                                       <!-- L'entete de l'interface -->
<div class="container "> <!-- Le div général du body -->


                                              <!-- La barre de navigation -->
<DIV class="div-du-header">
  
 <nav class="navbar navbar-expand-lg  div-du-header">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

         <div class="collapse navbar-collapse" id="navbarSupportedContent">
   <button type="button" class="navbar-nav mr-auto diffrent"  title="Voir la liste">
      <a class=" nav-item active les-liens" href="../index.html" class=""> Accueil<span class="sr-only ecritures2">voir la liste</span>
   <img src="../images/liste.jpg" alt="" width="20" height="20" title="Voir la liste"></a>
 </div>
                                              
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
   <button type="button" class="navbar-nav mr-auto diffrent"  title="Voir la liste">
      <a class="nav-item active les-liens" href="../php/imprimer.php">Imprimer<span class="sr-only ecritures2">voir la liste</span>
   <img src="../images/imprimer.png" alt="" width="20" height="20" title="imprimer la liste"></a>
 </div>
                                              
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <button type="button" class="navbar-nav mr-auto diffrent"  title="Voir la liste">
       <a class=" nav-item active les-liens" href="../index.html">Apprenants<span class="sr-only ecritures2">voir la liste</span>
    <img src="" alt="" width="20" height="20" title="Voir la liste"></a>
    </div>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <form class="form-inline">
   <input class="form-control la-barre-de-recherche " size="" type="text" placeholder="Search" >
    <button class=" btn btn-outline-info my-2 my-sm-0  l-icone-de-recherche "  type="submit champ-de-recherche2"> <i class="fa fa-search 1x"></i></button>
  </form> 

  
</div>
  </nav>
 </DIV> 







 <br><h3 class="titre">LISTE DES APPRENANTS SIMPLON BURKINA</h3> <br> 
         
<div class="container table-responsive{-sm|-md|-lg|-xl}" id="list_de_trucs">
      <table class="table table-bordered table-hover">
      <thead class="entete">
    <TR>
        <TH>nomApprenant</TH>
        <TH>prenomApprenant</TH>
        <TH>genre</TH>
        <TH>ville</TH>
        <TH>telephoneApprenant</TH>
    </TR>
      </thead>
         
      </div> 
      <?php 
          $serveur = "localhost";
          $dbname = "simplon";
          $user = "root";
      
              //On se connecte à la BDD
          $connect = new PDO("mysql:host=$serveur;dbname=$dbname",$user,'');
          $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      
      $liste = $connect->query("SELECT * FROM apprenant");
      while($donnes=$liste->fetch())
      {
          echo "<tr>";
          echo "<TD>$donnes[nomApprenant]</TD>";
          echo "<TD>$donnes[prenomApprenant]</TD>";
          echo "<TD>$donnes[genre]</TD>";
          echo "<TD>$donnes[ville]</TD>";
          echo "<TD>$donnes[telephoneApprenant]</TD>";
          echo "</tr>";
      }
   $liste->closeCursor();
      ?> 
       </table> 
   
</body>

</div>
</html>