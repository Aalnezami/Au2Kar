<?php
   	session_start(); 
    $mysqli = new mysqli('localhost','e22201191sql','hd1KWUco','e22201191_db1');
    if ($mysqli->connect_errno) {
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
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="https://img.icons8.com/cotton/64/car-rental--v2.png">

  <title>
    Au2Kar - Espace Admin
  </title>
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- Nucleo Icons -->
  <link href="assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <link id="pagestyle" href="assets/css/material-dashboard.css?v=3.0.0" rel="stylesheet" />
  <!-- bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</head>

<body class="g-sidenav-show  bg-gray-200">
    <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
        <div class="sidenav-header">
            <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
            <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/material-dashboard/pages/dashboard " target="_blank">
            <img src="assets/img/logo-ct.png" class="navbar-brand-img h-100" alt="main_logo">
            <span class="ms-1 font-weight-bold text-white">Dashboard</span>
            </a>
        </div>
        <hr class="horizontal light mt-0 mb-2">
        <div class="collapse navbar-collapse  w-auto  max-height-vh-100" id="sidenav-collapse-main">
            <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link text-white" href="admin_accueil.php">
                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="material-icons opacity-10">dashboard</i>
                </div>
                <span class="nav-link-text ms-1">Comptes & Profils</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white active bg-gradient-primary" href="admin_sujets.php">
                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="material-icons opacity-10">dashboard</i>
                </div>
                <span class="nav-link-text ms-1">Sujets & Fiches</span>
                </a>
            </li>
            </ul>
        </div>
    </aside>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
        <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
                <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Dashboard</li>
                </ol>
                <h1 class="font-weight-bolder mb-0">Espace Admin</h1>
            </nav>
            <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                <div class="input-group input-group-outline">
                    <label class="form-label">Type here...</label>
                    <input type="text" class="form-control">
                </div>
                </div>
                <ul class="navbar-nav  justify-content-end">
                    <li class="nav-item d-flex align-items-center">
                      <form action="comptes_action.php" method="POST" class="nav-link text-body font-weight-bold px-0">
                        <button type="submit" name="btn_deconection" class="d-sm-inline d-none btn-dark">Se déconnecter</button>
                      </form>
                    </li>
                <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                    <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                    <div class="sidenav-toggler-inner">
                        <i class="sidenav-toggler-line"></i>
                        <i class="sidenav-toggler-line"></i>
                        <i class="sidenav-toggler-line"></i>
                    </div>
                    </a>
                </li>
                <li class="nav-item px-3 d-flex align-items-center">
                    <a href="javascript:;" class="nav-link text-body p-0">
                    <i class="fa fa-cog fixed-plugin-button-nav cursor-pointer"></i>
                    </a>
                </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->
    <div class="container-fluid py-4">
        <!-- start statistiques && outils de gestion---------------------------------------------------------------------------------->
        <div class="row py-4">
            <!-- start statistiques---------------------------------------------------------------------------------->
            <div class="col-6">
                <div class="row justify-content-start">
                    <h2 class="py-4">statistiques</h2>
                    <div class="col-xl col-sm-6 mb-xl-0 mb-4">
                        <div class="card">
                        <div class="card-header p-3 pt-2">
                            <div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                            <img width="64" height="64" src="https://img.icons8.com/cute-clipart/64/user-male-circle.png" alt="user-male-circle"/>
                            </div>
                            <?php                         
                                $requet4_nobre_sujet = "
                                    SELECT COUNT(*)
                                    AS nb_sujets
                                    FROM t_sujet_suj ";
                                    // Exécution de la requtte
                                $info_requet4_nobre_sujet = $mysqli->query($requet4_nobre_sujet);
                                // tester si l'Exécution de la requête est bonne
                                if ($info_requet4_nobre_sujet == false)
                                { 
                                    echo "Error: La requête a echoué \n";
                                    echo "Errno: " . $mysqli->errno . "\n";
                                    echo "Error: " . $mysqli->error . "\n";
                                    exit();
                                }
                                $nbSujets = $info_requet4_nobre_sujet->fetch_assoc();
                           ?>
                            <div class="text-end pt-1">
                            <p class="text-sm mb-0 text-capitalize">Nombre de Sujets</p>
                            <h4 class="mb-0"><?php echo($nbSujets['nb_sujets']); ?></h4>
                            </div>
                        </div>
                        <hr class="dark horizontal my-0">
                        </div>
                    </div>
                    <div class="col-xl col-sm-6 mb-xl-0 mb-4">
                        <div class="card">
                        <div class="card-header p-3 pt-2">
                            <div class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                            <img width="48" height="48" src="https://img.icons8.com/fluency/48/checked-user-male.png" alt="checked-user-male"/>
                            </div>
                            <?php
                                $requet3_nobre_fiche = "
                                SELECT COUNT(*)
                                AS nb_fiches
                                FROM t_fiche_fic
                                WHERE fic_Etat = 'en ligne' ";
                                    
                                $info_requet3_nobre_fiche = $mysqli->query($requet3_nobre_fiche);
                                // tester si l'Exécution de la requête est bonne
                                if ($info_requet3_nobre_fiche == false)
                                { 
                                    echo "Error: La requête a echoué \n";
                                    echo "Errno: " . $mysqli->errno . "\n";
                                    echo "Error: " . $mysqli->error . "\n";
                                    exit();
                                }
                                $nbFiches = $info_requet3_nobre_fiche->fetch_assoc();
                            ?>
                            <div class="text-end pt-1">
                            <p class="text-sm mb-0 text-capitalize">Nombre de Fiches</p>
                            <h4 class="mb-0"><?php echo($nbFiches['nb_fiches']); ?></h4>
                            </div>
                        </div>
                        <hr class="dark horizontal my-0">
                        </div>
                    </div>  
                </div>
            </div>
            <!-- end statistiques----------------------------------------------------------------------------------> 
            <!-- start outils ---------------------------------------------------------------------------------->
            <div class="col-6">
                <div class="row justify-content-start">
                    <h2 class="py-4">Outils de gestion </h2>
                    <div class="col-12" style="heigth:40px">
                        <div class="row">
                            <div class="col-3">
                                <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">ajouter un sujet</button>
                                <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
                                    <div class="offcanvas-header">
                                        <h5 id="offcanvasRightLabel">Ajout d'un sujet</h5>
                                        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                                    </div>
                                    <div class="offcanvas-body">
                                        <form action="session_action.php" method="POST">
                                            <div class="form-group">
                                                <label for="formGroupExampleInput">titre du sujet :</label>
                                                <input type="text" name="titr_suj" class="form-control" id="formGroupExampleInput" placeholder="Example input">
                                            </div>
                                            <div class="form-group">
                                                <input type="hidden" name="pseudo_ajout_suj" value="<?php echo($_SESSION['id']); ?>" class="form-control" id="formGroupExampleInput2" placeholder="Another input">
                                            </div>
                                            <div class="form-group d-flex justify-content-center py-4">
                                                <button type="submit" name="btn_ajout_suj" class="btn btn-primary">valider</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3">
                                <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">ajouter une fiche</button>
                                <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
                                <div class="offcanvas-header">
                                    <h5 id="offcanvasRightLabel">Offcanvas right</h5>
                                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                                </div>
                                <div class="offcanvas-body">
                                    ...
                                </div>
                                </div>
                            </div>
                            <div class="col"></div>
                            <div class="col"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end outils ---------------------------------------------------------------------------------->
        </div>
        <!-- end statistiques && outils ----------------------------------------------------------------------------------> 
        <!-- start table des sujets et fiches---------------------------------------------------------------------------------->
        <?php
        // un peu de php pour afficher les sujets, leurs fiches et leurs auteurs
        // cette requete vient du tuto ( les 43 requets , req n 21)
        $req_suj_fiche = "
            SELECT *
            FROM t_sujet_suj ;";
        $exec_req_suj_fiche = $mysqli->query($req_suj_fiche);
        if($exec_req_suj_fiche == false){
            echo("erreur d'exécution (req suj. fic.)");
            exit();
        }
        ?>
        <div class="row">
        <?php
        if($exec_req_suj_fiche ->num_rows == 0){
            echo("Aucun suejt pour le moment");
        }else{
            while($data_req_suj_fiche = $exec_req_suj_fiche->fetch_assoc()){ 
                ?>
                <div class="col-12">
                    <div class="card my-4">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 ">
                            <div class="row bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3" style="height: 80px;">
                                <div class="col-10 ">
                                    <h4 class="text-white text-capitalize ps-3"><?php echo($data_req_suj_fiche['suj_Intitule']); ?></h4>
                                </div> 
                                <div class="col">
                                    <form action="session_action.php" method="POST">
                                        <input type="hidden" name="id_suj_choisi" value="<?php echo($data_req_suj_fiche['suj_Numero']); ?>">
                                        <button type="submit" name="btn_sup_suj" class="btn btn-danger">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                                <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5"/>
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                                <div class="col">
                                    <form action="session_action.php" method="POST">
                                        <input type="hidden" name="" value="<?php echo($data_req_suj_fiche['suj_Numero']); ?>">
                                        <button type="submit" name="" class="btn btn-light">
                                            <img width="25" height="25" src="https://img.icons8.com/metro/26/edit.png" alt="edit"/>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-10"><h4>Auteur.e</h4></th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-10"><h4>Fiches</h4></th>
                                    </tr>
                                </thead>
                                <th class="text-secondary opacity-0"></th>
                            </table>
                        </div>
                        <div class="card-body px-0 pb-2">
                            <div class="row">
                                <div class="col">
                                    <div class="table-responsive p-0">
                                        <table class="table align-items-center mb-0">
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <ul>
                                                            <?php
                                                                // un peu de php pour aller chercher le profil du auteur du sujet 
                                                                $req_auteur = "
                                                                    SELECT * FROM t_profil_pfl WHERE cpt_Pseudo ='".$data_req_suj_fiche['cpt_Pseudo']."';";
                                                                $exec_req_auteur = $mysqli->query($req_auteur);
                                                                if($exec_req_auteur == false){
                                                                    echo("erreur d'exécution ( req auteur )");
                                                                    exit();
                                                                }
                                                                $data_auteur = $exec_req_auteur->fetch_assoc();
                                                            ?>
                                                            <li>Nom : <?php if($exec_req_auteur->num_rows == 0){
                                                                                echo('innconu pour le moment');
                                                                            }else{
                                                                                echo($data_auteur['pfl_Nom']);
                                                                            } ?></li>

                                                            <li>Prénom : <?php  if($exec_req_auteur->num_rows == 0){
                                                                                    echo('innconu pour le moment');
                                                                                }else{
                                                                                    echo($data_auteur['pfl_Prenom']);
                                                                                } ?></li>

                                                            <li>Date d'adhésion : <?php if($exec_req_auteur->num_rows == 0){
                                                                                            echo('innconue pour le moment');
                                                                                        }else{
                                                                                            echo($data_auteur['pfl_Date_Crt']);
                                                                                        } ?></li>

                                                            <li>Pseudo : <?php if($exec_req_auteur->num_rows == 0){
                                                                                    echo('innconue pour le moment');
                                                                                }else{
                                                                                    echo($data_auteur['cpt_Pseudo']);
                                                                                } ?></li>
                                                        </ul>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="table-responsive p-0">
                                        <table class="table align-items-center mb-0">
                                            <?php
                                            // requete pour aller chercher les fiches du sujet
                                                $req_fic = "
                                                    SELECT * FROM t_fiche_fic WHERE suj_Numero = '".$data_req_suj_fiche['suj_Numero']."';";
                                                $exec_req_fic = $mysqli->query($req_fic);
                                                if($exec_req_fic == false){
                                                    echo("erreur d'exécution (req fic.)");
                                                    exit();
                                                }
                                            ?>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <ul>
                                                            <?php
                                                            if($exec_req_fic->num_rows == 0){
                                                                echo("<li>Aucune fiche pour le moment</li>");
                                                            }else{
                                                                while($data_req_fic = $exec_req_fic->fetch_assoc()){ ?>
                                                                    <li><?php echo($data_req_fic['fic_Label']); ?></li>
                                                                <?php
                                                                }
                                                            }
                                                            ?>
                                                        </ul>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                       
                    </div>
                </div>
                <?php 
            } 
        }
        $mysqli->close(); 
        ?>
        <!----fin de la boucle------------------------------------------------------------------------------------------------------>
        </div> 
        <!-- end table des sujets et fiches---------------------------------------------------------------------------------->      
    </div>
</main>
<!--   Core JS Files   -->
<script src="assets/js/core/popper.min.js"></script>
  <script src="assets/js/core/bootstrap.min.js"></script>
  <script src="assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="assets/js/plugins/chartjs.min.js"></script>
  
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="assets/js/material-dashboard.min.js?v=3.0.0"></script>
  <?php
    $mysqli->close();
  ?>
</body>
</html>