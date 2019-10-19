
  <!-- Navbar
    ================================================== -->
    
    
  <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand page-scroll" href="#page-top">
                    <i class="fa fa-play-circle"></i> <span class="light">Coif</span> Tif
                </a>
            </div>
          

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
                <ul class="nav navbar-nav">
                    <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                    
                    <li>
                        <a href="indexzz.php">Accueil</a>
                    </li>
                   
                    <?php
                     if(!estConnecte()){
              ?>
                    <li><a href="connecter.php">Utilisateur</a></li>
                  <?php
                 }
                
                if(estDansCategorie("admin")){
                ?>
                    <li><a href="gestion.php">Gerer Employer</a></li>
                    <li><a href="supprimeruser.php">Supprimer Utilisateur</a></li>
                <?php
                
                }
                
                if(estDansCategorie("employe")){
                ?>   
                    
                        <li><a href="employer.php">Ma Journee</a></li>
                        <li><a href="ajouterecette.php">Ajouter Recette</a></li>
                        <li><a href="listerdv.php">Les RDV</a></li>
                <?php 
                }
                
                 if(estDansCategorie("client")){
                ?>   
                        <li><a href="rdv.php">Prendre RDV</a></li>
                        <li><a href="listerdv.php">Mes RDV</a></li>
                <?php 
                }
                
              
                
                if(estConnecte()){
                 ?>
                    <li><a href="deconnecter.php">Deconnexion</a></li>
                <?php
                }
                
                ?>
                
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
    