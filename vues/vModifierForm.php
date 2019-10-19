<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="./assets/ajouter/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="./assets/ajouter/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="./assets/ajouter/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="./assets/ajouter/vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="./assets/ajouter/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="./assets/ajouter/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="./assets/ajouter/css/util.css">
	<link rel="stylesheet" type="text/css" href="./assets/ajouter/css/main.css">
<!--===============================================================================================-->
</head>
<body>

	<div class="bg-contact2" style="background-image: url('./assets/ajouter/images/bg-01.jpg');">
		<div class="container-contact2">
			<div class="wrap-contact2">
				<form class="contact2-form validate-form" method="post">
					<span class="contact2-form-title">
						Modifier une recette
					</span>
          
          
         <label><strong>Id :</strong></label>
         
					<div class="wrap-input2 validate-input">
						<input type="text" name="id" value="<?php echo $lacoiffure["id"]; ?>" readonly/>
						<span class="focus-input2"></span>
					</div>
          
          <label><strong>Nom :</strong></label>
          
          <div class="wrap-input2 validate-input" data-validate = "Nom requiert">
						<input type="text" name="nom" value="<?php echo $lacoiffure["nom"]; ?>">
						<span class="focus-input2"></span>
					</div>
          
          <label><strong>Prenom :</strong></label>
          
          <div class="wrap-input2 validate-input" data-validate = "Prenom requiert">
						<input type="text" name="prenom" value="<?php echo $lacoiffure["prenom"]; ?>">
						<span class="focus-input2"></span>
					</div>
          
          <label><strong>Sexe : </strong></label>
          
          <br>
          
          <select class="wrap-input2 validate-input" name="sexe"> 
            <option value="<?php echo $lacoiffure["sexe"]; ?>" selected="selected"><?php echo $lacoiffure["sexe"]; ?></option>
            <option value="Homme">Homme</option>
            <option value="Femme">Femme</option>           
           </select>

          <label><strong>Requete : </strong></label>
          
          <br>
          
          <select class="wrap-input2 validate-input" name="type">
            <option value="<?php echo $lacoiffure["type"]; ?>" selected="selected"><?php echo $lacoiffure["type"]; ?></option> 
            <option value="Homme : Coiffure + Shampoing">Homme : Coiffure + Shampoing</option>
            <option value="Homme : Coiffure + Barbe + Shampoing">Homme : Coiffure + Barbe + Shampoing</option>
            <option value="Homme : Barbe">Homme : Barbe</option>
            <option value="Femme : Coiffure + Shampoing + Brushing" >Femme : Coiffure + Shampoing + Brushing</option> 
            <option value="Femme : Brushing">Femme : Brushing</option> 
            <option value="Enfant -8 ans : Coiffure + Shampoing">Enfant -8 ans : Coiffure + Shampoing</option>         
           </select>
           
           <label><strong>Prix :</strong></label>
           
           <div class="wrap-input2 validate-input" data-validate = "Prix requiert">
						<input type="text" name="prix" value="<?php echo $lacoiffure["prix"]; ?>">
						<span class="focus-input2"></span>
					</div>
          
          <label><strong>Date :</strong></label>
          
          <div class="wrap-input2 validate-input" data-validate = "Date requiert">
						<input type="date" name="date" value="<?php echo $lacoiffure["date"]; ?>">
						<span class="focus-input2"></span>
					</div>
          
          <label><strong>Heure :</strong></label>
          
          <div class="wrap-input2 validate-input" data-validate = "Heure requiert">
					  <input type="time" name="heure" value="<?php echo $lacoiffure["heure"]; ?>">
						<span class="focus-input2"></span>
					</div>

					

					<div class="container-contact2-form-btn">
						<div class="wrap-contact2-form-btn">
							<div class="contact2-form-bgbtn"></div>
							<button class="contact2-form-btn">
								Modifier
							</button> 
						</div>
					</div>
          <br><br>
          <a href="indexzz.php">
							Retour Accueil
						</a>
				</form>
			</div>
		</div>
	</div>




<!--===============================================================================================-->
	<script src="./assets/ajouter/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="./assets/ajouter/vendor/bootstrap/js/popper.js"></script>
	<script src="./assets/ajouter/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="./assets/ajouter/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="./assets/ajouter/js/main.js"></script>

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-23581568-13');
	</script>

</body>
</html>
