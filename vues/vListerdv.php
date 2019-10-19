
<caption>
<?php
    setlocale (LC_TIME, 'fr_FR.utf8','fra'); 
    
    $date= "";
    if(isset($_GET['date'])){
       $date = $_GET['date'];
    }
    
    $titleDate = "";
    if($date != ""){
            $titleDate = date("d M Y", strtotime($date));
    }else{
        $titleDate = date("d M Y", time());
    }
      
    $heure = date("H:i");
    if (isset($cat))
    {
?>
        <h3><?php echo $cat;?></h3>
<?php    
    }                                                         
?>
</caption>
   <br><br><br><br>

   <?php
   if(estDansCategorie("employe")){
   ?>
      <h1><strong><span class="yellow">Les RDV des Client<br><?php echo $titleDate;?></span></strong></h1>
   <?php
   }
   if(estDansCategorie("client")){
   ?>
      <h1><strong><span class="yellow">Mes RDV <br><?php echo $titleDate;?></span></strong></h1>
   <?php
   }
   ?>
        <div class="container">
          <button id="datePrecedente" style="float:left;" class="btn btn-danger">Date Précédente</button>
          <button id="dateSuivante" style="float:right;" class="btn btn-primary">Date Suivante</button>
        </div>
   <br>
   <table class="container"> 
    <link rel="stylesheet" href="./assets/tableau/style.css">   
      <thead>
        <tr>
         <?php
          if(estDansCategorie("employe")){
          ?>
            <th><h1>Employer</h1></th>
          <?php
          }
          
          if(estDansCategorie("client")){
          ?>
            <th><h1>Client</h1></th>
          <?php
          }
          ?> 
          <th><h1>Nom du client</h1></th>
          <th><h1>Prenom du client</h1></th>
          <th><h1>Date</h1></th>
          <th><h1>Heure</h1></th>
          <?php
          if (estDansCategorie("employe")){
          ?>
             <th><h1>Etat</h1></th>
          <?php
          }
          ?>
          <th></th>
        </tr>
      </thead>
      <tbody>  
<?php
    $i = 0;
    while($i < count($lacoiffure))
    { 
    $utilisateur;
    $utilisateurs;
    if(estDansCategorie('client')){
       $utilisateur = getUtilisateur($lacoiffure[$i]["id_utilisateur"]);
         
    }
     if(estDansCategorie('employe')){
       $utilisateur = getUtilisateur($lacoiffure[$i]["id_employer"]);
    } 
    
   
    $utilisateurs=getUtilisateur($lacoiffure[$i]["id_utilisateur"]);
    $nom=$utilisateurs["nom"];
    $prenom=$utilisateurs["prenom"];
    
 ?>     
        <tr>
            <?php
            if(estDansCategorie('client')){
            ?>
              <td><?php echo $lacoiffure[$i]["id_utilisateur"]?></td>
            <?php
            }
            if(estDansCategorie('employe')){
            ?>
              <td><?php echo $lacoiffure[$i]["id_employer"]?></td>
            <?php
            }
            
            ?>
            <td><?php echo $nom?></td>
            <td><?php echo $prenom?></td>
            <td><?php echo $lacoiffure[$i]["date"]?></td>
            <td><?php echo $lacoiffure[$i]["heure"]?></td> 
            <?php
            if(estDansCategorie("client")){
              if($lacoiffure[$i]['etat']=='prendre'){
               ?>
               <td><a href="listerdv.php?id_rdv=<?php echo $lacoiffure[$i]['id_rdv']; ?>"><img src="./images/corbeille.png" border="0" title="Annuler le RDV" onclick="javascript:if(!confirm('Etes-vous sûr de vouloir annuler le RDV ?')) return false;"></a></td>
            <?php
              }
               if($lacoiffure[$i]['etat']=='en cours'){
               ?>
                 <td>En cours</td>
              <?php  
              }
              
              if($lacoiffure[$i]['etat']=='terminer'){
               ?>
                 <td>Terminer</td>
              <?php  
              }
              
            }
            if(estDansCategorie("employe")){
              if($lacoiffure[$i]['etat']=='prendre'){
            ?>                
            <td>
               <form method="POST">
                  <input id="id" name="id" value="<?php echo $lacoiffure[$i]['id_rdv']; ?>" type="hidden">
                  <button type="submit" class="btn btn-warning">Prendre</button>
                </form>
                </td>
            <?php
            }
            
            if($lacoiffure[$i]['etat']=='en cours'){
            ?>
            <td>
                <form method="POST">
                  <input id="id" name="id" value="<?php echo $lacoiffure[$i]['id_rdv']; ?>" type="hidden">
                  <button type="submit" class="btn btn-warning">En cours</button>
                </form>
                </td>
            <?php
            }
            
              if($lacoiffure[$i]['etat']=='terminer'){
              ?>
               <td>Terminer</td>
            <?php
              }
            } 
            ?>                                                                                                                        
        </tr>
<?php
        $i = $i + 1;
        }
        ?>

    
       </tbody>       
     </table>
        
     
       
     <script type="text/javascript">
     
        
      var dateCounrante;
        
        $(function(){
             var dateString= '<?php echo $date; ?>';
              if(dateString != ""){
                  dateCounrante = moment(dateString);
              } else{
                  dateCounrante = moment();
              }
        })
        
        $("#dateSuivante").on("click",function(){
            var duration = moment.duration(1, 'd');
            dateCounrante.add(duration).days();
            window.location="listerdv.php?date="+dateCounrante.format("YYYY-MM-DD"); 
        });
        
        $("#datePrecedente").on("click",function(){
            var duration = moment.duration(1, 'd');
            dateCounrante.subtract(duration).days();
            window.location="listerdv.php?date="+dateCounrante.format("YYYY-MM-DD"); 
        });
     </script>