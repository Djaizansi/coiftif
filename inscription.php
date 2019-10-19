<?php                        
/** 
 * Script de contr�le et d'affichage du cas d'utilisation "Ajouter"
 * @package default
 * @todo  RAS
 */
 
// Initialise les ressources n�cessaires au fonctionnement de l'application
$repVues = './vues/';
require("./include/_init.inc.php");
$connexion=connecterServeurBD();
if (count($_POST)!=0){
  if (isset($_POST['pseudo'], $_POST['email']))
  {                                                                                                         
   
  // Alors dans ce cas on met saisie du $_POST['pseudo'] dans la variable $pseudo
      $pseudo = htmlentities($_POST['pseudo']);                                                                                         
      $mail = htmlentities($_POST['email']);
      
       
      // On ins�re la variable pseudo qui correspond � la saisie de l'utilisateur dans la requ�te SQL
      $sql_pseudo = $connexion->prepare('SELECT pseudo FROM utilisateur WHERE pseudo = \''.$pseudo.'\';');
      $sql_pseudo->execute(array('.$pseudo.' => $_POST['pseudo']));
      $sql_mail = $connexion->prepare('SELECT mail FROM utilisateur WHERE mail = \''.$mail.'\';');
      $sql_mail->execute(array('.$mail.' => $_POST['email']));
   
      // recherche de r�sultat
      $res_pseudo = $sql_pseudo->fetch();
      $res_mail= $sql_mail->fetch();
   
      if ($res_pseudo or $res_mail)
      {
          // S'il y a un r�sultat, c'est � dire qu'il existe d�j� un pseudo ou un mail, alors "Ce pseudo est d�j� utilis� ou bien le mail est d�j� utilis�"
          ?>
          <div class="limiter">
		              <div class="container-login100" style="background-image: url('./assets/login/images/bg-01.jpg');">
                    <center><h2 class="text-warning">OUPS ! Une erreur est survenue.</h2></center><br />
                    <br /> 
                    &nbsp;&nbsp;            
                    <br /><center><h2 class="text-info">Il semble que le mot de passe ou l email est deja utilise</h2></center><br />
                    <br />                                      
                    &nbsp;&nbsp;<br /><center><h2><br />Pour reesayer, cliquez ici  <a href="inscription.php"><button type="button" class="btn btn-danger">S'inscrire</button></a></h2></center>
                  </div> 
                </div> 
       <?php
       include($repVues."interface.php");
      }
      // Sinon le r�sultat est nul ce qui veut donc dire qu'il ne contient aucun pseudo, donc on ins�re
      else
      {
        if (count($_POST)>=2){ 
          if ($_POST["pass"] == $_POST["pass_t"] and  $_POST["email"] == $_POST["email_t"] ){
            ?>
             
              <div class="limiter">
	             	<div class="container-login100" style="background-image: url('./assets/login/images/bg-01.jpg');">
                  <center><h1 class="text-success">FELICITATION ! Vous faites partie des fideles client de Coif Tif.</h1></center><br />
                  <br />
                  <br /><center><h1>Pour vous connectez, cliquez ici  <a href="connecter.php"><button type="button" class="btn btn-success">Se connecter</button></a></h1></center>
                  </div>
                  </div>   
              
              <?php
              inscription($_POST["pseudo"], $_POST["nom"], $_POST["prenom"], $_POST["pass"], $_POST["email"], $tabErreurs);
              include($repVues."interface.php");
            }
          else{
                ?>
                <div class="limiter">
		              <div class="container-login100" style="background-image: url('./assets/login/images/bg-01.jpg');">
                    <center><h2 class="text-warning">OUPS ! Une erreur est survenue.</h2></center><br />
                    <br />            
                    &nbsp;&nbsp;<br /><center><h2 class="text-info">Il semble que les mots de passe et les emails ne correspondent pas</h2></center><br /> 
                    <br />                                     
                    <br /><center><h2><br />Pour reesayer, cliquez ici  <a href="inscription.php"><button type="button" class="btn btn-danger">S'inscrire</button></a></h2></center>
                  </div> 
                </div> 
              
       <?php
       include($repVues."interface.php");
       }
      
      }
        
      
  } 
}
}




// D�but de l'affichage (les vues)
include($repVues."erreur.php");
if (count($_POST)==0){
  include($repVues."vInscription.php");  
}
include($repVues."pied.php");
?>
  
        
