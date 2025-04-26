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
            if (!$mysqli->set_charset("utf8")) {
                printf("Pb de chargement du jeu de car. utf8 : %s\n", $mysqli->error);
                exit();
            }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

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
    <link href="../css/style_fiche.css" rel="stylesheet">
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
                <a href="recapitulatif.php" class="nav-item nav-link">RÉCAPITULATIF</a>
                <a href="../pages/courses.html" class="nav-item nav-link">Permis 2 conduire</a>
                <a href="../pages/formations.html" class="nav-item nav-link">Formations</a>
                <a href="../pages/contact.html" class="nav-item nav-link">Contact & RDV</a>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#!" id="accountDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">RÉCAPITULATIF</a>
                    <ul class="dropdown-menu border-0 shadow bsb-zoomIn" aria-labelledby="accountDropdown">
                    <li><a class="dropdown-item" href="recapitulatif1.php">récapitulatif Niveau 1</a></li>
                    <li><a class="dropdown-item" href="recapitulatif2.php">récapitulatif Niveau 2</a></li>
                    <li><a class="dropdown-item" href="recapitulatif3.php">récapitulatif Niveau 3</a></li>
                    </ul>
                </li>
                <a href="../inscription/inscription.php" class="nav-item nav-link">Inscription</a>
                <a href="../connexion/session.php" class="btn btn-primary py-4 px-lg-5">SE CONNECTER <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
                </svg></a>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->

    <div class="container">
        <?php
        $requet_donnees_fiche_N2 = "
        SELECT * 
        FROM t_fiche_fic
        WHERE fic_Code = '".$_GET['code']."';";
        $info_requet_donnees_fiche_N2 = $mysqli->query($requet_donnees_fiche_N2);
        while($data_N2 = $info_requet_donnees_fiche_N2->fetch_assoc()){ ?>
            <div class="card">
                <div class="py-10 d-flex justify-content-center">
                    <h2> Fiche : <?php echo($data_N2['fic_Label']."\n"); ?></h2>
                </div>
                <div class="py-10 d-flex justify-content-center">
                    <img src="../images/<?php echo($data_N2['fic_Fichier_Img']."\n");?>" class="img-fluid rounded-start" style="width:400px">
                </div>
                <div class="py-10 d-flex justify-content-center">
                    <?php
                        $requet_sujet_fiche = "
                            SELECT *
                            FROM t_sujet_suj
                            WHERE suj_Numero = '".$data_N2['suj_Numero']."'"; 
                        $info_requet_sujet_fiche = $mysqli->query($requet_sujet_fiche);
                        $data_info_requet_sujet_fiche = $info_requet_sujet_fiche->fetch_assoc();
                    ?>
                    <h4> Sujet : <?php echo($data_info_requet_sujet_fiche['suj_Intitule']."\n"); ?></h4>
                </div>
                <div class="row">
                    <div class="col-2"></div>
                    <div class="col py-10 d-flex justify-content-center">
                        <p class="card-text"><?php echo($data_N2['fic_Contenu']."\n"); ?></p>
                    </div>
                    <div class="col-2"></div>
                </div>
                <div class="row">
                    <div class="col-1"></div>
                    <div class="col">
                        <div class="container py-10 d-flex justify-content-center">
                            <h6>Informations complémentaires - hyperliens vers d’autres pages Web : </h6>
                        </div>
                        <div class="container py-10 d-flex justify-content-center">
                            <ul>
                                <?php
                                // requete des hyperlines
                                $requet_hyperlien ="
                                    SELECT * 
                                    FROM t_hyperlien_hyp
                                    JOIN t_association_asso USING(hyp_Numero)
                                    WHERE fic_Numero = '".$data_N2['fic_Numero']."';";
                                $info_requet_hyperlien = $mysqli->query($requet_hyperlien);

                                if($info_requet_hyperlien ->num_rows == 0){
                                    echo("Aucun hyperlien pour le moment !");
                                }
                                while($data_hyperlien = $info_requet_hyperlien->fetch_assoc()){?>
                                    <li><a href="<?php echo($data_hyperlien['hyp_URL']); ?>"><?php echo($data_hyperlien['hyp_Nom']) ?></a></li>
                            <?php }
                                ?>
                            </ul>
                        </div>
                        
                    </div>
                    <div class="col-1"></div>
                </div>
            </div>
        <?php  
        }
        $mysqli->close();
        ?>
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

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
    
</body>
</html>