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
  $employes = listerUtilisateurParCat("client");
  include($repVues."vSupprimerUser.php");
}

else if ($_SERVER['REQUEST_METHOD'] === 'POST'){                        
  
  $id=lireDonneePost("id", "");
  supprimerUser($id);
  
  ?>
    <div class="bg-contact2" style="background-image: url('./assets/ajouter/images/bg-01.jpg');">
      <div class="container-contact2">
         <div class="wrap-contact2">
            <center><h1 class="text-success">Suppression : OK</h1></center><br />
            <br />
            <br /><center><h1>Retour accueil <a href="indexzz.php"><button type="button" class="btn btn-primary">Accueil</button></a></h1></center>
           </div>
        </div>   
    
    <?php
    
    include($repVues."interfaceAjouter.php");
 } 

?>
  