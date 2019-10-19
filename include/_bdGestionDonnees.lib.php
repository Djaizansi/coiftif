<?php

// MODIFs A FAIRE
// Ajouter en têtes 
// Voir : jeu de caractères à la connection

/** 
 * Se connecte au serveur de données                     
 * Se connecte au serveur de données à partir de valeurs
 * prédéfinies de connexion (hôte, compte utilisateur et mot de passe). 
 * Retourne l'identifiant de connexion si succès obtenu, le booléen false 
 * si problème de connexion.
 * @return resource identifiant de connexion
 */
function connecterServeurBD() 
{
    $PARAM_hote='localhost'; // le chemin vers le serveur
    $PARAM_port='3306';
    $PARAM_nom_bd='coiftif'; // le nom de votre base de données
    $PARAM_utilisateur='root'; // nom d'utilisateur pour se connecter
    $PARAM_mot_passe=''; // mot de passe de l'utilisateur pour se connecter
    $connect = new PDO('mysql:host='.$PARAM_hote.';port='.$PARAM_port.';dbname='.$PARAM_nom_bd, $PARAM_utilisateur, $PARAM_mot_passe);
    return $connect;

    //$hote = "localhost";
    // $login = "root";
    // $mdp = "";
    // return mysql_connect($hote, $login, $mdp);
}


/** 
 * Ferme la connexion au serveur de données.
 * Ferme la connexion au serveur de données identifiée par l'identifiant de 
 * connexion $idCnx.
 * @param resource $idCnx identifiant de connexion
 * @return void  
 */
function deconnecterServeurBD($idCnx) {

}


function getCategory($id)
{
    $connexion = connecterServeurBD();
    $requete="select * from `utilisateur` where `id` = '".$id."';";
    $jeuResultat=$connexion->query($requete);
    $ligne = $jeuResultat->fetch();
    $jeuResultat->closeCursor();
    return $ligne['cat'];
} 

function identifier($lePseudo,$leMdp, &$tabErr)
{
  if(TRUE){
  
    $ligne=false;
    $connexion = connecterServeurBD();
    $requete="select * from `utilisateur` where `pseudo` = '".$lePseudo."' and `mdp`='".$leMdp."';";
    $jeuResultat=$connexion->query($requete);
    
    
    
    $ligne = $jeuResultat->fetch();
    if ($ligne) {}
    else
    {
      $messageErreur="ERREUR LORS DE LA CONNEXION";
      ajouterErreur($tabErr,$messageErreur);
    }
    $jeuResultat->closeCursor();   // fermer le jeu de résultat
  
  return $ligne;
  }
}  

function inscription($lePseudo,$leNom,$lePrenom,$leMdp,$leMail, &$tabErr)
{
    $connexion = connecterServeurBD();
    if(TRUE){
    
      $requete ="insert into `utilisateur`(`pseudo`,`nom`,`prenom`,`mdp`,`mail`,`cat`) 
      values('".$lePseudo."','".$leNom."','".$lePrenom."','".md5($leMdp)."','".$leMail."','client');"; 
      $jeuResultat=$connexion->query($requete);
      if($jeuResultat)
      {  
        
       }
    else
      {
        $message="Erreur lors de la création du compte";
        ajouterErreur($tabErr,$message);

      }
   }
}
function listerfacture($categ, $utilisateur_id, $date)
{
  $connexion = connecterServeurBD();
  $coiffure = array();
  // Si la connexion au SGBD à réussi
  if (TRUE) 
  {
             
      $requete="select * from facture where utilisateur_id = '".$utilisateur_id."' and date='".$date."';";
      $jeuResultat=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant

      $jeuResultat->setFetchMode(PDO::FETCH_OBJ); // on dit qu'on veut que le résultat soit récupérable sous forme d'objet     
      $i = 0;
      $ligne = $jeuResultat->fetch();
      while($ligne)
      {             
          // A gauche : dans la vue | a droite : dans la base de donnée
          $coiffure[$i]['id']=$ligne->id;
          $coiffure[$i]['utilisateur_id']=$ligne->utilisateur_id;
          $coiffure[$i]['nom']=$ligne->nom;
          $coiffure[$i]['prenom']=$ligne->prenom;
          $coiffure[$i]['sexe']=$ligne->sexe;
          $coiffure[$i]['type']=$ligne->type;
          $coiffure[$i]['prix']=$ligne->prix;
          $coiffure[$i]['date']=$ligne->date;
          $coiffure[$i]['heure']=$ligne->heure;
          $ligne=$jeuResultat->fetch();
          $i = $i + 1;
      }
  }
  $jeuResultat->closeCursor();   // fermer le jeu de résultat
  // deconnecterServeurBD($idConnexion);
  return $coiffure;
}


function listerUtilisateurParCat($cat)
{
  $connexion = connecterServeurBD();
  $utilisateurs = array();
        
      $requete="select * from utilisateur where cat = '".$cat."';";
      $jeuResultat=$connexion->query($requete);
      $jeuResultat->setFetchMode(PDO::FETCH_OBJ);
      $i = 0;     
      $ligne = $jeuResultat->fetch();
      while($ligne)
      {             
          $utilisateurs[$i]['id']=$ligne->id;
          $utilisateurs[$i]['pseudo']=$ligne->pseudo;
          $utilisateurs[$i]['nom']=$ligne->nom;
          $utilisateurs[$i]['prenom']=$ligne->prenom;
          $utilisateurs[$i]['mail']=$ligne->mail;
          $utilisateurs[$i]['cat']=$ligne->cat;
          $ligne=$jeuResultat->fetch();
          $i = $i + 1;
      }
  
  $jeuResultat->closeCursor();   // fermer le jeu de résultat
  // deconnecterServeurBD($idConnexion);
  return $utilisateurs;
}

function getUtilisateur($id)
{
  $connexion = connecterServeurBD();
  $utilisateur;
        
      $requete="select * from utilisateur where id = '".$id."';";
      $jeuResultat=$connexion->query($requete);
      $jeuResultat->setFetchMode(PDO::FETCH_OBJ);     
      $ligne = $jeuResultat->fetch();
      if($ligne)
      {             
          $utilisateur['id']=$ligne->id;
          $utilisateur['pseudo']=$ligne->pseudo;
          $utilisateur['nom']=$ligne->nom;
          $utilisateur['prenom']=$ligne->prenom;
          $utilisateur['mail']=$ligne->mail;
          $utilisateur['cat']=$ligne->cat;
          $ligne=$jeuResultat->fetch();
      }
  
  $jeuResultat->closeCursor();
  return $utilisateur;
}

function listerfactureAdmin($categ, $date)
{
  $connexion = connecterServeurBD();
  $coiffure = array();
  // Si la connexion au SGBD à réussi
  if (TRUE) 
  {
             
      $requete="select * from facture where date='".$date."';";
      $jeuResultat=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant

      $jeuResultat->setFetchMode(PDO::FETCH_OBJ); // on dit qu'on veut que le résultat soit récupérable sous forme d'objet     
      $i = 0;
      $ligne = $jeuResultat->fetch();
      while($ligne)
      {             
          // A gauche : dans la vue | a droite : dans la base de donnée
          $coiffure[$i]['id']=$ligne->id;
          $coiffure[$i]['utilisateur_id']=$ligne->utilisateur_id;
          $coiffure[$i]['nom']=$ligne->nom;
          $coiffure[$i]['prenom']=$ligne->prenom;
          $coiffure[$i]['sexe']=$ligne->sexe;
          $coiffure[$i]['type']=$ligne->type;
          $coiffure[$i]['prix']=$ligne->prix;
          $coiffure[$i]['date']=$ligne->date;
          $coiffure[$i]['heure']=$ligne->heure;
          $ligne=$jeuResultat->fetch();
          $i = $i + 1;
      }
  }
  $jeuResultat->closeCursor();   // fermer le jeu de résultat
  // deconnecterServeurBD($idConnexion);
  return $coiffure;
}

function ajouter($unEmployer,$unNom,$unPrenom,$unSexe,$unType,$unPrix,$uneDate,$uneHeure,&$tabErr)
{
  // Ouvrir une connexion au serveur mysql en s'identifiant
  $connexion = connecterServeurBD();
  
  // Si la connexion au SGBD à réussi
  if (TRUE) 
  {
    
    $requete="select * from facture where utilisateur_id='".$unEmployer."';";
    $jeuResultat=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant

    $jeuResultat->setFetchMode(PDO::FETCH_OBJ); // on dit qu'on veut que le résultat soit récupérable sous forme d'objet     
    $ligne = $jeuResultat->fetch();
    if($ligne)
    { 
      // Créer la requête d'ajout 
      
       $requete="insert into facture (utilisateur_id,nom,prenom,sexe,type,prix,date,heure) values ('"
       .$unEmployer."','"
       .$unNom."','"
       .$unPrenom."','"
       .$unSexe."','"
       .$unType."',"
       .$unPrix.",'"
       .$uneDate."','"
       .$uneHeure."');";
       
        // Lancer la requête d'ajout 
        $ok=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissan
        // Si la requête a réussi
        if ($ok)
        {
          $message = "Le visiteur a ete correctement ajoutee";
          ajouterErreur($tabErr, $message);
        }
        else
        {
          $message = "Attention, l'ajout du visiteur a échoue !!!";
          ajouterErreur($tabErr, $message);
        } 

    }
    // fermer la connexion
    // deconnecterServeurBD($idConnexion);
  }
  else
  {
    $message = "probleme à la connexion <br />";
    ajouterErreur($tabErr, $message);
  }
}


function modifier($id,$unNom,$unPrenom,$unSexe,$unType,$unPrix,$uneDate,$uneHeure, &$tabErreurs)
{
  // Ouvrir une connexion au serveur mysql en s'identifiant
   $connexion = connecterServeurBD();
    
    // Vérifier que la référence saisie n'existe pas déja
    $requete="select * from facture where id=".$id.";";
    $jeuResultat=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant
  
    $jeuResultat->setFetchMode(PDO::FETCH_OBJ); // on dit qu'on veut que le résultat soit récupérable sous forme d'objet     
    $ligne = $jeuResultat->fetch();
    if($ligne)
    {
      // Créer la requête d'ajout 
        $requete="UPDATE facture set nom = '".$unNom."', prenom = '".$unPrenom."', sexe = '".$unSexe."', type = '".$unType."', prix = ".$unPrix.", date = '".$uneDate."', heure = '".$uneHeure."' WHERE id=".$id.";";
        

        // Lancer la requête d'ajout 
        $ok=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissan
          
        // Si la requête a réussi
        if ($ok)
        {   
          
          $message = "modifier";
          ajouterErreur($tabErr, $message);
        }
        else
        { 
          $message = "modification echoue !!!";
          ajouterErreur($tabErr, $message);
        } 
    }
    else
    { 
      $message="Echec de la modification : l'id ne fonctionne pas !";
      ajouterErreur($tabErr, $message);
  
    } 
    echo $requete;
    
}

function get_information($unId, &$tabErreurs)
{
  $connexion = connecterServeurBD();
  // Si la connexion au SGBD à réussi
  if (TRUE) 
  {        
      $requete="select * from facture where id =".$unId.";";
      $jeuResultat=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant
      $jeuResultat->setFetchMode(PDO::FETCH_OBJ); // on dit qu'on veut que le résultat soit récupérable sous forme d'objet     
      $ligne = $jeuResultat->fetch();
      
      if($ligne)
      {    
          $coiffure['id']=$ligne->id;
          $coiffure['nom']=$ligne->nom;
          $coiffure['prenom']=$ligne->prenom;
          $coiffure['sexe']=$ligne->sexe;
          $coiffure['type']=$ligne->type;
          $coiffure['prix']=$ligne->prix;
          $coiffure['date']=$ligne->date;
          $coiffure['heure']=$ligne->heure;
          

          $ligne=$jeuResultat->fetch();
      }
  }
  $jeuResultat->closeCursor();   // fermer le jeu de résultat
  // deconnecterServeurBD($idConnexion);
  if (!isset($coiffure)) $coiffure = array();
  return $coiffure;
}

function ajouterRDV($id_utilisateur,$id_employer,$uneDate,$uneHeure)
{
  $connexion = connecterServeurBD();
  $connexion->query("insert into rdv (id_utilisateur,id_employer,date,heure) values ("
   .$id_utilisateur.","
   .$id_employer.",'"
   .$uneDate."','"
   .$uneHeure."');");
}

function listerRDV($categ, $id_utilisateur, $date)
{
  $connexion = connecterServeurBD();
  $coiffure = array();
  // Si la connexion au SGBD à réussi
  if (TRUE) 
  {
       
      if(estDansCategorie('client')){
        $requete="select * from RDV where id_utilisateur='".$id_utilisateur."' and date='".$date."';";
      } 
      if(estDansCategorie('employe')){
        $requete="select * from RDV where id_employer='".$id_utilisateur."' and date='".$date."';";
      }     
      $jeuResultat=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant

      $jeuResultat->setFetchMode(PDO::FETCH_OBJ); // on dit qu'on veut que le résultat soit récupérable sous forme d'objet     
      $i = 0;
      $ligne = $jeuResultat->fetch();
      while($ligne)
      {             
          // A gauche : dans la vue | a droite : dans la base de donnée
          $coiffure[$i]['id_rdv']=$ligne->id_rdv;
          $coiffure[$i]['id_utilisateur']=$ligne->id_utilisateur;
          $coiffure[$i]['id_employer']=$ligne->id_employer;
          $coiffure[$i]['date']=$ligne->date;
          $coiffure[$i]['heure']=$ligne->heure;
          $coiffure[$i]['etat']=$ligne->etat;
          $ligne=$jeuResultat->fetch();
          $i = $i + 1;
      }
  }
  $jeuResultat->closeCursor();   // fermer le jeu de résultat
  // deconnecterServeurBD($idConnexion);
  return $coiffure;
}

function supprimer($id, &$tabErr)
{
  $connexion = connecterServeurBD();
  $connexion->query("delete from rdv where id_rdv=".$id.";"); 
}

function supprimerUser($id)
{
  $connexion = connecterServeurBD();
  $connexion->query("delete from utilisateur where id=".$id.";"); 
}


function getRDV($id){
  $connexion = connecterServeurBD();
  $rdv;
        
      $requete="select * from rdv where id_rdv = '".$id."';";
      $jeuResultat=$connexion->query($requete);
      $jeuResultat->setFetchMode(PDO::FETCH_OBJ);     
      $ligne = $jeuResultat->fetch();
      if($ligne)
      {             
          $rdv['id_rdv']=$ligne->id_rdv;
          $rdv['id_utilisateur']=$ligne->id_utilisateur;
          $rdv['id_employer']=$ligne->id_employer;
          $rdv['date']=$ligne->date;
          $rdv['heure']=$ligne->heure;
          $rdv['etat']=$ligne->etat;
          $ligne=$jeuResultat->fetch();
      }
  
  $jeuResultat->closeCursor();
  return $rdv;
}

function updateEtatRdv($id){
  
  $rdv=getRDV($id);
  
  $nouveletat="";
  if($rdv['etat']=='prendre'){
    $nouveletat='en cours';
  }
  else if($rdv['etat']=='en cours'){
    $nouveletat='terminer';
  }
  
  $connexion= connecterServeurBD();
  $connexion->query("Update rdv set etat='".$nouveletat."' where id_rdv=".$id.";");

}
