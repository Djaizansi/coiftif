<?php
/** 
 * Script de contrôle et d'affichage du cas d'utilisation "Rechercher"
 * @package default
 * @todo  RAS
 */
 
// Initialise les ressources nécessaires au fonctionnement de l'application

  $repVues = './vues/';
  
  require("./include/_init.inc.php");
  
$unNom=lireDonneePost("pseudo","");
$unMdp=lireDonneePost("mdp","");  
  
if (count($_POST)==0)
{
  $etape = 1;  
  
}
else
  # code...
{
  
  $etape = 2;
  $utilisateur = identifier($unNom, md5($unMdp), $tabErreurs);
  affecterInfosConnecte($utilisateur['id']);
}

include($repVues."erreur.php");

if($etape==1)
{
  include($repVues."vConnecter.php");
}
if($etape==2)
{ 
  include($repVues."menu.php");
  include($repVues."entete.php");
  include($repVues."vAccueil.php");
  include($repVues."pied.php");
}


?>
    