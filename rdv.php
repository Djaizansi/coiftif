<?php
/** 
 * Script de contrôle et d'affichage du cas d'utilisation "Ajouter"
 * @package default
 * @todo  RAS
 */
 
$repInclude = './include/';
$repVues = './vues/';
require($repInclude . "_init.inc.php");
  

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
  $employes = listerUtilisateurParCat("employe");
  include($repVues."vRdv.php");
}else if ($_SERVER['REQUEST_METHOD'] === 'POST'){                        
  
  $id_employer=lireDonneePost("id_employer", "");
  $ladate=lireDonneePost("date", "");
  $lheure=lireDonneePost("heure", "");
  
  if($ladate==null || $lheure==null){
     ?>
      <div class="bg-contact2" style="background-image: url('./assets/ajouter/images/bg-01.jpg');">
		            <div class="container-contact2">
			             <div class="wrap-contact2">
                      <center><h1 class="text-danger"><strong>Erreur survenue.</strong></h1></center><br />
                      <br />
                      <br /><center><h1>Veuillez recommencez votre saisie, cliquez ici  <a href="rdv.php"><button type="button" class="btn btn-danger">Retour</button></a></h1></center>
                     </div>
                  </div>
     
   <?php
   include($repVues."interfaceAjouter.php"); 
  }
  
  else{
  
  
            ajouterRDV($_SESSION["id"],$id_employer,$ladate,$lheure);
  
  ?>
    <div class="bg-contact2" style="background-image: url('./assets/ajouter/images/bg-01.jpg');">
      <div class="container-contact2">
         <div class="wrap-contact2">
            <center><h1 class="text-success">Le RDV a bien été pris en compte pour le <?php echo $ladate; ?> a <?php echo $lheure; ?>.</h1></center><br />
            <br />
            <br /><center><h1>Retour accueil <a href="indexzz.php"><button type="button" class="btn btn-primary">Accueil</button></a></h1></center>
           </div>
        </div>   
    
    <?php
    
    include($repVues."interfaceAjouter.php");
  }
}

?>
  