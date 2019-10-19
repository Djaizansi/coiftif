<?php
/** 
 * Script de contrôle et d'affichage du cas d'utilisation "Rechercher"
 * @package default
 * @todo  RAS
 */
$repInclude = './include/';
  $repVues = './vues/';
  require($repInclude . "_init.inc.php"); 
 
 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    updateEtatRdv(lireDonneePost("id", ""));
}

  
  
  if (isset($_GET["id_rdv"])) {
    supprimer($_GET["id_rdv"], $tabErrs);
  }
  
  $cat="";
  if (isset($_GET['categ']))
  {
  $cat = $_GET['categ'];
  }
  
  $date= "";
    if(isset($_GET['date'])){
       $date = $_GET['date'];
    }else{
      $date = date("Y-m-d", time());
    }
    
    $lacoiffure = listerRDV($cat, $_SESSION["id"], $date);
   
 
  // Construction de la page Accueil
  // pour l'affichage (appel des vues) 
  include($repVues."entete.php") ;
  include($repVues."menu2.php") ;
  include($repVues."vListerdv.php");
  include($repVues."pied.php") ;
?>