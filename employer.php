<?php
 
  $repInclude = './include/';
  $repVues = './vues/';
  
  require($repInclude . "_init.inc.php");
  
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
  
  if(estDansCategorie("admin")){
    $lacoiffure = listerfactureAdmin($cat, $date);
  }
  else{
    $lacoiffure = listerfacture($cat, $_SESSION["id"], $date);
  }    
 
  include($repVues."entete.php") ;
  include($repVues."menu2.php") ;
  include($repVues."vEmploye.php");
  include($repVues."pied.php") ;
?>