<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Au2Kar - inscription</title>
	<link rel="icon" type="image/png" href="https://img.icons8.com/cotton/64/car-rental--v2.png">

	<!-- Favicon -->
    <link href="../img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;500;600;700&display=swap" rel="stylesheet"> 

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="../lib/animate/animate.min.css" rel="stylesheet">
    <link href="../lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="../css/style_inscription.css" rel="stylesheet">
</head>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Custom Theme files -->
<link href="../css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- //Custom Theme files -->
<!-- web font -->
<link href="//fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,700,700i" rel="stylesheet">
<link rel="stylesheet" href="../css/style_inscription.css">
<!-- //web font -->
</head>
<body>
	<!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top p-0">
        <a href="../index.php" class="navbar-brand d-flex align-items-center border-end px-4 px-lg-5">
            <h2 class="m-0"><i class="fa fa-car text-primary me-2"></i><span style="color: #0bac00;">A</span>u2<span  style="color: #0bac00;">K</span>ar</h2>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="../index.php" class="nav-item nav-link active">Accueil</a>
                <a href="../pages/courses.html" class="nav-item nav-link">Permis 2 conduire</a>
                <a href="../pages/formations.html" class="nav-item nav-link">Formations</a>
                <a href="../pages/contact.html" class="nav-item nav-link">Contact & RDV</a>
				<a href="../recapitulatif/recapitulatif3.php" class="nav-item nav-link">récapitulatif</a>
				<a href="inscription.php" class="nav-item nav-link">Inscription</a>
                <a href="../connexion/session.php" class="btn btn-primary py-4 px-lg-5">SE CONNECTER <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
                </svg></a>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->

	<div class="main-w3layouts wrapper">
		<h1>INSCRIPTION</h1>
		<div class="main-agileinfo">
			<div class="agileits-top">
	
		<?php
			$mysqli = new mysqli('localhost','e22201191sql','hd1KWUco','e22201191_db1');
			if ($mysqli->connect_errno) 
				{
				// Affichage d'un message d'erreur
				echo "Error: Problème de connexion à la BDD \n";
				echo "Errno: " . $mysqli->connect_errno . "\n";
				echo "Error: " . $mysqli->connect_error . "\n";
				// Arrêt du chargement de la page
				exit();
				}
				// Instructions PHP à ajouter pour l'encodage utf8 du jeu de caractères
				if (!$mysqli->set_charset("utf8")) 
					{
					printf("Pb de chargement du jeu de car. utf8 : %s\n", $mysqli->error);
					exit();
				}
				//isset() pour vérifier si le formulaire a été soumis et si le bouton a été cliqué. 
				// Si c'est le cas, nous pouvons effectuer le traitement nécessaire. 
				if(isset($_POST['creer'])){
					$nom = htmlspecialchars(addslashes($_POST['nom_formulaire']));
					$prenom = htmlspecialchars(addslashes($_POST['prenom_formulaire']));
					$email = htmlspecialchars(addslashes($_POST['email_formualire']));
					$mdp = htmlspecialchars(addslashes($_POST['password_fromuliare']));
					$mdp_confirm = htmlspecialchars(addslashes($_POST['password_for_confimation']));

					// si l'utilisateur essaie d'envoyer le formulaire alors qu'il est vide, il sera demandé de remplir le formumaire et il est généré en meme temps 
					if(empty($nom) && empty($prenom) && empty($email) && empty($mdp) && empty($mdp_confirm)){?>
						<div class="d-flex justify-content-center" id="bg_error">
							<h4 style="color: red;"><?php echo "Veuillez remplir le fromulaire "; ?></h4>
						</div>
						<form method="post">
							<label class="badge bg-primary" for="">Nom *</label>
							<input class="text" type="text" value="<?php echo($_POST['nom_formulaire'])?>" name="nom_formulaire" placeholder="Nom *" >
							<label class="badge bg-primary" for="">Prénom *</label>
							<input class="text" type="text" value="<?php echo($_POST['prenom_formulaire'])?>" name="prenom_formulaire" placeholder="Prénom *" >
							<label class="badge bg-primary" for="">Email *</label>
							<input class="text" type="email" value="<?php echo($_POST['email_formualire'])?>" name="email_formualire" placeholder="Email *" >
							<label class="badge bg-primary" for="">mot de passe *</label>
							<input class="text" type="password" value="<?php echo($_POST['password_fromuliare'])?>" name="password_fromuliare" placeholder="mot de passe *" >
							<label class="badge bg-primary" for="">Confimer votre mot de passe *</label>
							<input class="text" type="password" value="<?php echo($_POST['password_for_confimation'])?>" name="password_for_confimation" placeholder="Confimer votre mot de passe *" >
							<input type="submit" name="creer" class="btn btn-success" value="Valider">	
						</form> 
						
			 <?php }else{
						// sinon, on vérifie a nouveau que tous les champs sont bien remplis ensuite on compare les 2 mots de passe, s'ils sont les memes,
						// alors on insére le compte , ensuite on insére le profil et on teste s'il a été bien inséré, si oui on affiche un message de réussite 
						// sinon, on supprime le profil ensuite le compte et on affiche un message indiqant l'échec de l'opération.
						if(!empty($nom)){
							if(!empty($prenom)){
								if(!empty($email)){
									if(!empty($mdp)){
										if(!empty($mdp_confirm)){
											if(strcmp($mdp,$mdp_confirm) == 0){
												// si tout va bien, alors, on insère le compte et le profil ensuite on affiche un message de bienvenue
												// preparer la requete d'insertion
												$requet_insertion_compte = "
													INSERT INTO t_compte_cpt 
													VALUES ('".$email."',MD5('".$mdp."'))";
												$info_requet_insertion_compte = $mysqli->query($requet_insertion_compte);
												// tester si l'Exécution de la requête est bonne, si tout va bien, alors on insère le profil
												if ($info_requet_insertion_compte == false)
												{ 
													echo "Error: La requête a echoué \n";
													echo "Errno: " . $mysqli->errno . "\n";
													echo "Error: " . $mysqli->error . "\n";
													exit();
												}else{
													// ICI on prépare la requete d'insertion du profil ensuite on l'exécute 
													$requet_insertion_profil = "
													INSERT INTO t_profil_pfl 
													VALUES ('".$nom."','".$prenom."','D','M',CURRENT_DATE,'".$email."')";
													$info_requet_insertion_profil = $mysqli->query($requet_insertion_profil);
													// tester si l'Exécution de la requête est bonne
													// iciiiii

													if($info_requet_insertion_profil == true){?>
														<h6><?php
															echo("Bonjour ".$email."");
															echo "<br>";
															echo("mot de pass choisi est : ".$mdp."\n");
															echo "<br>";
															echo (" insertion du compte & du profil réussie");
															echo "<br>";
															echo (" votre compte a été bien creé"); 
															echo "<br>";
															?>
														</h6>
														<?php
											  	 	}else{
															// si l'insertion du profil se passe mal, il faut aller supprimer le compte inéré
															// tester si l'Exécution de la requête est bonne sinon, supprimer 
															$requet_supression_compte = "
																DELETE FROM t_compte_cpt
																WHERE cpt_Pseudo ='".$email."'";
															$info_requet_supression_compte = $mysqli->query($requet_supression_compte);
															// tester si l'Exécution de la requête est bonne
															if ($info_requet_supression_compte == false)
															{ 
																echo "Error: La requête a echoué \n";
																echo "Errno: " . $mysqli->errno . "\n";
																echo "Error: " . $mysqli->error . "\n";
																//exit();
															}
															echo "<h4>Désolé, l'inscription a échoué</h4>";
															
														}
											  	}
												
											}else{ ?>
												<div class="d-flex justify-content-center">
													<h6 style="color: red;"><?php echo "Veuillez saisir le meme mot de passe"; ?></h6>
												</div>
												<form method="post">
													<label class="badge bg-primary" for="">Nom *</label>
													<input class="text" type="text" value="<?php echo($_POST['nom_formulaire'])?>" name="nom_formulaire" placeholder="Nom *" >
													<label class="badge bg-primary" for="">Prénom *</label>
													<input class="text" type="text" value="<?php echo($_POST['prenom_formulaire'])?>" name="prenom_formulaire" placeholder="Prénom *" >
													<label class="badge bg-primary" for="">Email *</label>
													<input class="text" type="email" value="<?php echo($_POST['email_formualire'])?>" name="email_formualire" placeholder="Email *" >
													<label class="badge bg-primary" for="">mot de passe *</label>
													<input class="text" type="password" value="<?php echo($_POST['password_fromuliare'])?>" name="password_fromuliare" placeholder="mot de passe *" >
													<label class="badge bg-primary" for="">Confimer votre mot de passe *</label>
													<input class="text" type="password" value="<?php echo($_POST['password_for_confimation'])?>" name="password_for_confimation" placeholder="Confimer votre mot de passe *" >
													<input type="submit" name="creer" class="btn btn-success" value="Valider">	
												</form> 
									<?php	}
										}else{ ?>
											<div class="d-flex justify-content-center">
												<h6 style="color: red;"><?php echo "Veuillez saisir le meme mot de passe pour confirmer"; ?></h6>
											</div>
											<form method="post">
												<label class="badge bg-primary" for="">Nom *</label>
												<input class="text" type="text" value="<?php echo($_POST['nom_formulaire'])?>" name="nom_formulaire" placeholder="Nom *" >
												<label class="badge bg-primary" for="">Prénom *</label>
												<input class="text" type="text" value="<?php echo($_POST['prenom_formulaire'])?>" name="prenom_formulaire" placeholder="Prénom *" >
												<label class="badge bg-primary" for="">Email *</label>
												<input class="text" type="email" value="<?php echo($_POST['email_formualire'])?>" name="email_formualire" placeholder="Email *" >
												<label class="badge bg-primary" for="">mot de passe *</label>
												<input class="text" type="password" value="<?php echo($_POST['password_fromuliare'])?>" name="password_fromuliare" placeholder="mot de passe *" >
												<label class="badge bg-primary" for="">Confimer votre mot de passe *</label>
												<input class="text" type="password" value="<?php echo($_POST['password_for_confimation'])?>" name="password_for_confimation" placeholder="Confimer votre mot de passe *" >
												<input type="submit" name="creer" class="btn btn-success" value="Valider">	
											</form> 
								  <?php }
									}else{ ?>
										<div class="d-flex justify-content-center">
											<h6 style="color: red;"><?php echo "Veuillez saisir votre mot de passe"; ?></h6>
										</div>
										<form method="post">
											<label class="badge bg-primary" for="">Nom *</label>
											<input class="text" type="text" value="<?php echo($_POST['nom_formulaire'])?>" name="nom_formulaire" placeholder="Nom *" >
											<label class="badge bg-primary" for="">Prénom *</label>
											<input class="text" type="text" value="<?php echo($_POST['prenom_formulaire'])?>" name="prenom_formulaire" placeholder="Prénom *" >
											<label class="badge bg-primary" for="">Email *</label>
											<input class="text" type="email" value="<?php echo($_POST['email_formualire'])?>" name="email_formualire" placeholder="Email *" >
											<label class="badge bg-primary" for="">mot de passe *</label>
											<input class="text" type="password" value="<?php echo($_POST['password_fromuliare'])?>" name="password_fromuliare" placeholder="mot de passe *" >
											<label class="badge bg-primary" for="">Confimer votre mot de passe *</label>
											<input class="text" type="password" value="<?php echo($_POST['password_for_confimation'])?>" name="password_for_confimation" placeholder="Confimer votre mot de passe *" >
											<input type="submit" name="creer" class="btn btn-success" value="Valider">	
										</form> 
							  <?php }
								}else{ ?>
									<div class="d-flex justify-content-center">
										<h6 style="color: red;"><?php echo "veuillez saisir votre e-mail"; ?></h6>
									</div>
									<form method="post">
										<label class="badge bg-primary" for="">Nom *</label>
										<input class="text" type="text" value="<?php echo($_POST['nom_formulaire'])?>" name="nom_formulaire" placeholder="Nom *" >
										<label class="badge bg-primary" for="">Prénom *</label>
										<input class="text" type="text" value="<?php echo($_POST['prenom_formulaire'])?>" name="prenom_formulaire" placeholder="Prénom *" >
										<label class="badge bg-primary" for="">Email *</label>
										<input class="text" type="email" value="<?php echo($_POST['email_formualire'])?>" name="email_formualire" placeholder="Email *" >
										<label class="badge bg-primary" for="">mot de passe *</label>
										<input class="text" type="password" value="<?php echo($_POST['password_fromuliare'])?>" name="password_fromuliare" placeholder="mot de passe *" >
										<label class="badge bg-primary" for="">Confimer votre mot de passe *</label>
										<input class="text" type="password" value="<?php echo($_POST['password_for_confimation'])?>" name="password_for_confimation" placeholder="Confimer votre mot de passe *" >
										<input type="submit" name="creer" class="btn btn-success" value="Valider">	
									</form> 
						 <?php }
							}else{ ?>
								<div class="d-flex justify-content-center">
								<h6 style="color: red;"><?php echo "veuillez saisir votre prénom"; ?></h6>
								</div>
								<form method="post">
									<label class="badge bg-primary" for="">Nom *</label>
									<input class="text" type="text" value="<?php echo($_POST['nom_formulaire'])?>" name="nom_formulaire" placeholder="Nom *" >
									<label class="badge bg-primary" for="">Prénom *</label>
									<input class="text" type="text" value="<?php echo($_POST['prenom_formulaire'])?>" name="prenom_formulaire" placeholder="Prénom *" >
									<label class="badge bg-primary" for="">Email *</label>
									<input class="text" type="email" value="<?php echo($_POST['email_formualire'])?>" name="email_formualire" placeholder="Email *" >
									<label class="badge bg-primary" for="">mot de passe *</label>
									<input class="text" type="password" value="<?php echo($_POST['password_fromuliare'])?>" name="password_fromuliare" placeholder="mot de passe *" >
									<label class="badge bg-primary" for="">Confimer votre mot de passe *</label>
									<input class="text" type="password" value="<?php echo($_POST['password_for_confimation'])?>" name="password_for_confimation" placeholder="Confimer votre mot de passe *" >
									<input type="submit" name="creer" class="btn btn-success" value="Valider">	
								</form>
					  <?php }
						}else{ ?>
							<div class="d-flex justify-content-center">
								<h6 style="color: red;"><?php echo "veuillez saisir votre nom"; ?></h6>
							</div>
							<form method="post">
								<label class="badge bg-primary" for="">Nom *</label>
								<input class="text" type="text" value="<?php echo($_POST['nom_formulaire'])?>" name="nom_formulaire" placeholder="Nom *" >
								<label class="badge bg-primary" for="">Prénom *</label>
								<input class="text" type="text" value="<?php echo($_POST['prenom_formulaire'])?>" name="prenom_formulaire" placeholder="Prénom *" >
								<label class="badge bg-primary" for="">Email *</label>
								<input class="text" type="email" value="<?php echo($_POST['email_formualire'])?>" name="email_formualire" placeholder="Email *" >
								<label class="badge bg-primary" for="">mot de passe *</label>
								<input class="text" type="password" value="<?php echo($_POST['password_fromuliare'])?>" name="password_fromuliare" placeholder="mot de passe *" >
								<label class="badge bg-primary" for="">Confimer votre mot de passe *</label>
								<input class="text" type="password" value="<?php echo($_POST['password_for_confimation'])?>" name="password_for_confimation" placeholder="Confimer votre mot de passe *" >
								<input type="submit" name="creer" class="btn btn-success" value="Valider">	
							</form>
					<?php }
					}
				}
			// fermiture de la connexion à la bdd
			$mysqli->close();
			?>	
			</div>
		</div>
	</div>

	<!-- Footer Start -->
    <div class="container-fluid bg-dark text-light footer my-6 mb-0 py-6 wow fadeIn" data-wow-delay="0.1s">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-4">Get In Touch</h4>
                    <h2 class="text-primary mb-4"><i class="fa fa-car text-white me-2"></i>Au2Kar</h2>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>123 Street, New York, USA</p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+012 345 67890</p>
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i>info@example.com</p>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-light mb-4">Quick Links</h4>
                    <a class="btn btn-link" href="">About Us</a>
                    <a class="btn btn-link" href="">Contact Us</a>
                    <a class="btn btn-link" href="">Our Services</a>
                    <a class="btn btn-link" href="">Terms & Condition</a>
                    <a class="btn btn-link" href="">Support</a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-light mb-4">Popular Links</h4>
                    <a class="btn btn-link" href="">About Us</a>
                    <a class="btn btn-link" href="">Contact Us</a>
                    <a class="btn btn-link" href="">Our Services</a>
                    <a class="btn btn-link" href="">Terms & Condition</a>
                    <a class="btn btn-link" href="">Support</a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-light mb-4">Newsletter</h4>
                    <form action="">
                        <div class="input-group">
                            <input type="text" class="form-control p-3 border-0" placeholder="Your Email Address">
                            <button class="btn btn-primary">Sign Up</button>
                        </div>
                    </form>
                    <h6 class="text-white mt-4 mb-3">Follow Us</h6>
                    <div class="d-flex pt-2">
                        <a class="btn btn-square btn-outline-light me-1" href=""><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-square btn-outline-light me-1" href=""><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-square btn-outline-light me-1" href=""><i class="fab fa-youtube"></i></a>
                        <a class="btn btn-square btn-outline-light me-0" href=""><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


	<!-- JavaScript Libraries -->
	<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../lib/wow/wow.min.js"></script>
    <script src="../lib/easing/easing.min.js"></script>
    <script src="../lib/waypoints/waypoints.min.js"></script>
    <script src="../lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="../js/main.js"></script>
</body>
</html>