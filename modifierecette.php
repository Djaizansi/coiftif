<?php
/** 
 * Script de contrôle et d'affichage du cas d'utilisation "Ajouter"
 * @package default
 * @todo  RAS
 */
 
// Initialise les ressources nécessaires au fonctionnement de l'application
$repVues = './vues/';
require("./include/_init.inc.php");


$unId=lireDonneeUrl("id", "");
$unNom=lireDonneePost("nom", "");
$unPrenom=lireDonneePost("prenom", "");
$unSexe=lireDonneePost("sexe", "");
$unType=lireDonneePost("type", "");
$unPrix=lireDonneePost("prix", "");
$uneDate=lireDonneePost("date", "");
$uneHeure=lireDonneePost("heure", "");

     

// DEBUT du contrôleur modifier.php
if (count($_POST)==0)
{
  $etape = 1;
}
if(count($_POST)>1)
  # code...
{     
  $etape = 2;
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
  $lacoiffure = modifier($unId,$unNom,$unPrenom,$unSexe,$unType,$unPrix,$uneDate,$uneHeure,$tabErreurs);
  include($repVues."interfaceAjouter.php");
  
}


// Début de l'affichage (les vues)

include($repVues."erreur.php");
if($etape==1)
{ 
  $lacoiffure=get_information($unId, $tabErreurs);
  include($repVues."vModifierForm.php");  
}

?>