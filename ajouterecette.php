<?php
/** 
 * Script de contrôle et d'affichage du cas d'utilisation "Ajouter"
 * @package default
 * @todo  RAS
 */
 
$repInclude = './include/';
$repVues = './vues/';

require($repInclude . "_init.inc.php");
  

$lenom=lireDonneePost("nom", "");
$leprenom=lireDonneePost("prenom", "");
$lesexe=lireDonneePost("sexe", "");
$letype=lireDonneePost("type", "");
$leprix=lireDonneePost("prix", "");
$ladate=lireDonneePost("date", "");
$lheure=lireDonneePost("heure", "");


if (count($_POST)==0)
{
  $etape = 1;  
}
else
{
  $etape = 2;
  if($lenom==null || $leprenom==null || $leprix==null || $ladate==null || $lheure==null){
  
 ?>
      <div class="bg-contact2" style="background-image: url('./assets/ajouter/images/bg-01.jpg');">
		            <div class="container-contact2">
			             <div class="wrap-contact2">
                      <center><h1 class="text-danger"><strong>Erreur survenue.</strong></h1></center><br />
                      <br />
                      <br /><center><h1>Veuillez recommencez votre saisie, cliquez ici  <a href="ajouterecette.php"><button type="button" class="btn btn-danger">Retour</button></a></h1></center>
                     </div>
                  </div>
     
   <?php
   include($repVues."interfaceAjouter.php"); 
  }
  else{
    
     ?>
              <div class="bg-contact2" style="background-image: url('./assets/ajouter/images/bg-01.jpg');">
		            <div class="container-contact2">
			             <div class="wrap-contact2">
                      <center><h1 class="text-success">Ajout reussi.</h1></center><br />
                      <br />
                      <br /><center><h1>Retour a laccueil, cliquez ici  <a href="indexzz.php"><button type="button" class="btn btn-success">Accueil</button></a></h1></center>
                     </div>
                  </div> 
                <?php
                ajouter($_SESSION["id"],$lenom,$leprenom,$lesexe,$letype,$leprix,$ladate,$lheure,$tabErreurs); 
    include($repVues."interfaceAjouter.php");  
  }
}           
              

// Construction de la page Rechercher
// pour l'affichage (appel des vues)
if($etape==1){
include($repVues."vAjouter.php") ;
}
?>
  