
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
$prixTotal=0;
$unecoiffure=0;                                                        
?>
</caption>
   <br><br><br><br>

   <h1><strong><span class="yellow">Recette <br><?php echo $titleDate;?></span></strong></h1>
        <div class="container">
          <button id="datePrecedente" style="float:left;" class="btn btn-danger">Date Précédente</button>
          <button id="dateSuivante" style="float:right;" class="btn btn-primary">Date Suivante</button>
        </div>
   <br>
   <table class="container"> 
    <link rel="stylesheet" href="./assets/tableau/style.css">   
      <thead>
        <tr>
          <th><h1>Employer</h1></th>
          <th><h1>Nom du client</h1></th>
          <th><h1>Prenom du client</h1></th>
          <th><h1>Sexe</h1></th>
          <th><h1>Type demande</h1></th>
          <th><h1>Prix</h1></th>
          <th><h1>Date</h1></th>
          <th><h1>Heure</h1></th>
          <th></th>
        </tr>
      </thead>
      <tbody>  
<?php
    $i = 0;
    while($i < count($lacoiffure))
    { 
 ?>     
        <tr>
            <td><?php echo $lacoiffure[$i]["utilisateur_id"]?></td>
            <td><?php echo $lacoiffure[$i]["nom"]?></td>
            <td><?php echo $lacoiffure[$i]["prenom"]?></td>
            <td><?php echo $lacoiffure[$i]["sexe"]?></td>
            <td><?php echo $lacoiffure[$i]["type"]?></td>
            <td><?php echo $lacoiffure[$i]["prix"]?></td>
            <td><?php echo $lacoiffure[$i]["date"]?></td>
            <td><?php echo $lacoiffure[$i]["heure"]?></td> 
            <?php
            if(estDansCategorie("employe")){
            ?>
               <td><a href="modifierecette.php?id=<?php echo $lacoiffure[$i]['id']; ?>"<button type="button" class="btn btn-warning">Modifier</button></a></td>
            <?php
            }
            $unecoiffure=$lacoiffure[$i]["prix"]; 
            $prixTotal+=$unecoiffure; //Recupere le prix total du panier ?>                                                                                                                          
        </tr>
<?php
        $i = $i + 1;
        }
        ?>

    
       </tbody>       
     </table>
        
       <br />
       
     <table class="container">
        <td><?php echo 'Total : '.$prixTotal ?></td>
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
            window.location="employer.php?date="+dateCounrante.format("YYYY-MM-DD"); 
        });
        
        $("#datePrecedente").on("click",function(){
            var duration = moment.duration(1, 'd');
            dateCounrante.subtract(duration).days();
            window.location="employer.php?date="+dateCounrante.format("YYYY-MM-DD"); 
        });
        
     </script>