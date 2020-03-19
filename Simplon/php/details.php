<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>LISTE APPRENANTS</title>
    <link rel="stylesheet"  href="../dist/css/bootstrap.css" />
    <link rel="stylesheet"  type="text/css" href="../CSS/CSS.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="../CSS/style.css" />
    <link rel="stylesheet"  href="../font-awesome-4.7.0/css/font-awesome.css" />
</head>
<body>
    
                                         <!-- L'entete de l'interface -->
 <div class="container "> <!-- /*Le div général du body*/ -->
<div class="row logo-et-titre">
    
    <div class="col-11" ><h1 class="titre "> SIMPLON BURKINA</h1></div>
</div>

                                              <!-- La barre de navigation -->
<DIV class="div-du-header">
  
 <nav class="navbar navbar-expand-lg  div-du-header">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

         <div class="collapse navbar-collapse" id="navbarSupportedContent">
   <button type="button" class="navbar-nav mr-auto diffrent"  title="Voir la liste" >
      <a class=" nav-item active les-liens" href="../index.html" class=""> Accueil<span class="sr-only ecritures2">voir la liste</span>
   <img src="../images/liste.jpg" alt="" width="20" height="20" title="Voir la liste"></a>
 </div>
                                              
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
   <button type="button" class="navbar-nav mr-auto diffrent"  title="Voir la liste" onclick="myfunction()">
      <a class="nav-item active les-liens" href="../php/details.php">Imprimer<span class="sr-only ecritures2">voir la liste </span>
   <img src="../images/imprimer.png" alt="" width="20" height="20" title="imprimer la liste"></a>
 </div>
                                              
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <button type="button" class="navbar-nav mr-auto diffrent"  title="Voir la liste">
       <a class=" nav-item active les-liens" href="../index.html">Apprenants<span class="sr-only ecritures2">voir la liste</span>
    <img src="" alt="" width="20" height="20" title="Voir la liste"></a>
    </div>
  </nav>
 </DIV> 



 <br><h3 class="titre"> DETAILS  SUR  L'APPRENANT</h3> <br>       
 <div class="container table-responsive{-sm|-md|-lg|-xl}" id="list_de_trucs">
<table class="table table-bordered table-hover">
<thead class="entete">
<TR>    
    <TH>telephoneTuteur</TH>
    <TH>NomApprenant</TH>
    <TH>prenomApprenant</TH>
    <TH>dateDeNaissance</TH>
    <TH>lieuDeNaissance</TH>
    <TH>genre</TH>
    <TH>ville</TH>
    <TH>etablissement</TH>
    <TH>formation</TH>
    <TH>telephoneApprenant</TH>
    <TH>email</TH>
     <TH>photo</TH>
    
     
     

 
</TR>
</thead>

</tbody>
         
         
      </div> 
      <?php 
          $serveur = "localhost";
          $dbname = "simplon";
          $user = "root";
      
              //On se connecte à la BDD
              $connect = new PDO("mysql:host=$serveur;dbname=$dbname",$user,'');
              $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      
      $detail = $connect->query("SELECT * FROM apprenant WHERE email='bandaogoabdoulfatao@gmail.com'  ");
      while($donnes=$detail->fetch())
      {
          echo "<tr>";
          echo "<TD>$donnes[telephoneTuteur]</TD>";
          echo "<TD>$donnes[nomApprenant]</TD>";
          echo "<TD>$donnes[prenomApprenant]</TD>";
          echo "<TD>$donnes[dateDeNaissance]</TD>";
          echo "<TD>$donnes[lieuDeNaissance]</TD>";
          echo "<TD>$donnes[genre]</TD>";
          echo "<TD>$donnes[ville]</TD>";
          echo "<TD>$donnes[etablissement]</TD>";
          echo "<TD>$donnes[formation]</TD>";
          echo "<TD>$donnes[telephoneApprenant]</TD>";
          echo "<TD>$donnes[email]</TD>";
          echo "<TD>$donnes[photo]</TD>";
           echo "</tr>";
      }
                 $detail->closeCursor();

      ?> 
         
       </table>
    





       
</body>
        <script>
            function myfunction(){
            window.print();
                }
        </script>
       
        <script src="../dist/js/jquery.slim.min.js"></script>
        <script src="../dist/js/bootstrap.min.js"></script>


</html>