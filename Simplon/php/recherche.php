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
  
}
catch(PDOException $e){
    echo 'Impossible de traiter les données. Erreur : '.$e->getMessage();
}

//On determine l'expression a rechercher
if(isset($_GET['recherche']))
{
        $rec = htmlentities($_GET['recherche']);
}
else
{
        $rec = 'php MYSQL';
}
//On determine le type de recherche
if(isset($_GET['type']))
{
        if($_GET['type']=='un')//Un des mots
        {
                $type = 1;
        }
        elseif($_GET['type']=='tout')//Tout les mots
        {
                $type = 2;
        }
        else//L'expression exacte
        {
                $type = 3;
        }
}
else
{
        $type = 1;//type par defaut: L'expression exacte
}
//On determine si on doit surligner les mots dans les resultats
if(!isset($_GET['surligner']) or $_GET['surligner']!='true')
{
        $surligner = false;
}
else
{
        $surligner = true;
}
//On dertermine les identifiants, les noms et les informations des utilisateur
$req = 'SELECT telephoneTuteur, nomApprenant, prenomApprenant,  dateDeNaissance, lieuDeNaissance, genre, ville, etablissement, formation, 
telephoneApprenant, email, photo FROM apprenant WHERE ';
if($type==1)
{//ayant un des mots dans leurs informations
        $mots = explode(' ',$rec);//En separre lexpression en mots cles
        foreach($mots as $mot)
        {
                $req .= ' email LIKE "%'.$mot.'%" OR';
        }
        $req .= ' 1=0';
}
elseif($type==2)
{//ayant tout des mots dans leurs informations
        $mots = explode(' ',$rec);//En separre lexpression en mots cles
        foreach($mots as $mot)
        {
                $req .= ' email LIKE "%'.$mot.'%" AND';
        }
        $req .= ' 1=1';
}
else
{//ayant l'expression exacte dans leurs informations
        $req .= 'email LIKE "%'.$rec.'%"';
}

?>

<h2>R&eacute;sultats</h2>
<table>
        <tr>
                  
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
        </tr>
<?php
//On affiche les resultats
$liste = $connect->query("SELECT * FROM apprenant");
while($donnes=$liste->fetch())

{
?>
        <tr><?php 
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
          echo "<TD>$donnes[photo]</TD>";?><?php
if($surligner)//Si il faut surligner les mots, on les surligne
{
        if($type==3)
        {
                echo preg_replace('#('.preg_quote($rec).')#i', '<strong>$1</strong>', $donnes['email']);//On surligne l'expression exacte
        }
        else
        {
                echo preg_replace('#('.str_replace(' ','|',preg_quote($rec)).')#i', '<strong>$1</strong>', $donnes['email']);//On surligne les mots cles de la recherche
        }
}
else
{
        echo $donnes['</tr>'];//On ne surligne pas
}
?></td>
        </tr>
<?php
}
?>
</table>