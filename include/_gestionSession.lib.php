<?php
/** 
 * Regroupe les fonctions de gestion d'une session utilisateur.
 * @package default
 * @todo  RAS
 */

/** 
 * Démarre ou poursuit une session.                     
 *
 * @return void
 */
function initSession() {
    session_start();
}

/** 
 * Fournit l'id du visiteur connecté.                     
 *
 * Retourne l'id du visiteur connecté, une chaîne vide si pas de visiteur connecté.
 * @return string id du visiteur connecté
 */
function obtenirIdUserConnecte() {
    $ident="";
    if ( isset($_SESSION["loginUser"]) ) {
        $ident = (isset($_SESSION["idUser"])) ? $_SESSION["idUser"] : '';   
    }  
    return $ident ;
}

/*
 * Conserve en variables session les informations du visiteur connecté
 * 
 * Conserve en variables session l'id $id et le login $login du visiteur connecté
 * @param string id du visiteur
 * @param string login du visiteur
 * @return void    



/* 
 * Déconnecte le visiteur qui s'est identifié sur le site.                     
 *
 * @return void
 */
 
 function affecterInfosConnecte($id) {
    $_SESSION["id"] = $id;
}

function estDansCategorie($cat) 
{ 
  if(estConnecte()){
       return getCategory($_SESSION["id"]) == $cat;
    }
    return false;
    
}

function deconnecter() 
{
    unset($_SESSION["id"]);
}
function estConnecte() {
    return isset($_SESSION["id"]);
}

