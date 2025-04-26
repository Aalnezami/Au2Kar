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
  <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="https://img.icons8.com/cotton/64/car-rental--v2.png">
  <title>
    Au2Kar - Espace Privée
  </title>
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- Nucleo Icons -->
  <link href="./assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="./assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <link id="pagestyle" href="./assets/css/material-dashboard.css?v=3.0.0" rel="stylesheet" />
  <!-- bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</head>

<body class="g-sidenav-show  bg-gray-200">
      <?php
        // un peu de php pour récupérer les infos du profil de la personne connectée
        $requet_profil_connecte = "SELECT * FROM t_profil_pfl WHERE cpt_Pseudo = '".$_SESSION['id']."';";
        $info_profil_connecte = $mysqli->query($requet_profil_connecte);
        $data_profil_connecte = $info_profil_connecte->fetch_assoc();

        if($_SESSION['role'] == 'G' && $data_profil_connecte['pfl_Validite'] == 'A'){
      ?>
          <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
            <div class="sidenav-header">
              <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
              <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/material-dashboard/pages/dashboard " target="_blank">
                <img src="./assets/img/logo-ct.png" class="navbar-brand-img h-100" alt="main_logo">
                <span class="ms-1 font-weight-bold text-white">Dashboard</span>
              </a>
            </div>
            <hr class="horizontal light mt-0 mb-2">
            <div class="collapse navbar-collapse  w-auto  max-height-vh-100" id="sidenav-collapse-main">
              <ul class="navbar-nav">
                <li class="nav-item">
                  <a class="nav-link text-white active bg-gradient-primary" href="admin_accueil.php">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                      <i class="material-icons opacity-10">dashboard</i>
                    </div>
                    <span class="nav-link-text ms-1">Comptes & Profils</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link text-white" href="admin_sujets.php">
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
                  <ul class="navbar-nav justify-content-end">
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
              <!-- start Profil ---->
              <div class="card mb-4"  style="border-radius: 15px;">
                <div class="card-body p-4">
                  <div class="d-flex text-black">
                    <div class="flex-shrink-0">
                      <img width="150" height="150" src="https://img.icons8.com/stickers/100/name.png" alt="name"/>
                    </div>
                    <div class="flex-grow-1 ms-3">
                      <h5 class="mb-1"><?php echo($data_profil_connecte['pfl_Nom']." ". $data_profil_connecte['pfl_Prenom']); ?></h5>
                      <p class="mb-2 pb-1" style="color: #2b2a2a;">Vous êtes Administrateur.e</p>
                      <div class="d-flex justify-content-start rounded-3 p-2 mb-2"
                        style="background-color: #efefef;">
                        <div>
                          <p class="small text-muted mb-1">Pseudo </p>
                          <p class="mb-0"><?php echo($data_profil_connecte['cpt_Pseudo']); ?></p>
                        </div>
                        <div class="px-3">
                          <p class="small text-muted mb-1">Création</p>
                          <p class="mb-0"><?php echo($data_profil_connecte['pfl_Date_Crt']); ?></p>
                        </div>
                        <div>
                          <p class="small text-muted mb-1">Statut</p>
                          <p class="mb-0"><?php echo($data_profil_connecte['pfl_statut']); ?></p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!--- end Profil---->
              <div class="row justify-content-start">
                <h2 class="py-4">statistiques</h2>
                <div class="col-xl col-sm-6 mb-xl-0 mb-4">
                  <div class="card">
                    <div class="card-header p-3 pt-2">
                      <div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                        <img width="64" height="64" src="https://img.icons8.com/cute-clipart/64/user-male-circle.png" alt="user-male-circle"/>
                      </div>
                      <?php
                      // requete pour le nombre de comptes
                        $requet_nb_comptes = "
                          SELECT COUNT(cpt_Pseudo) 
                          AS nb_comptes 
                          FROM t_compte_cpt ";
                        $info_requet_nb_comptes = $mysqli->query($requet_nb_comptes);
                        if($info_requet_nb_comptes == false){
                          echo("erreur d'exécution");
                          exit();
                        }
                        $data_requet_nb_comptes = $info_requet_nb_comptes->fetch_assoc();
                      ?>
                      <div class="text-end pt-1">
                        <p class="text-sm mb-0 text-capitalize">Nombre de Comptes</p>
                        <h4 class="mb-0"><?php echo($data_requet_nb_comptes['nb_comptes']); ?></h4>
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
                      // requete pour le nombre de profils
                        $requet_nb_profils = "
                          SELECT COUNT(cpt_Pseudo) 
                          AS nb_profils 
                          FROM t_profil_pfl ";
                        $info_requet_nb_profils = $mysqli->query($requet_nb_profils);
                        if($info_requet_nb_profils == false){
                          echo("erreur d'exécution");
                          exit();
                        }
                        $data_requet_nb_profils = $info_requet_nb_profils->fetch_assoc();
                      ?>
                      <div class="text-end pt-1">
                        <p class="text-sm mb-0 text-capitalize">Nombre de Profils</p>
                        <h4 class="mb-0"><?php echo($data_requet_nb_profils['nb_profils']); ?></h4>
                      </div>
                    </div>
                    <hr class="dark horizontal my-0">
                  </div>
                </div>  
              </div>
              <!-- début table des comptes ---------------------------------------------------------------------------------------------------------->
              <div class="row mt-4 mb-4">
                <div class="container">
                  <div class="card">
                    <div class="card-header pb-0 px-3">
                      <h3 class="mb-0">Liste des Comptes</h3>
                    </div>
                    <div class="card-body pt-4 p-3">
                      <table class="table">
                        <thead class="table-light">
                          <tr>
                            <th>Pseudo</th>
                            <th class="text-center">Nom</th>
                            <th class="text-center">Prénom</th>
                            <th class="text-center">Role</th>
                            <th class="text-center">Validité</th>
                            <th class="text-center">Changer Role</th>
                            <th class="text-center">Activer / Désactiver</th>
                          </tr>
                        </thead>
                        <tbody method="post">
                          <?php
                            // requete pour afficher tous les profils pour un gestionnaire
                            $requet_profils = "
                              SELECT *
                              FROM t_profil_pfl";
                            $info_requet_profils = $mysqli->query($requet_profils);
                            if($info_requet_profils == false){
                              echo("erreur d'exécution");
                            }else{
                              while($data_profils = $info_requet_profils->fetch_assoc()){ ?> 
                                <tr>
                                  <th><h6 class="mb-3 text-sm"><?php echo($data_profils['cpt_Pseudo']); ?></h6></th>
                                  <th class="text-center"><h6 class="mb-3 text-sm"><?php echo($data_profils['pfl_Nom']); ?></h6></th>
                                  <th class="text-center"><h6 class="mb-3 text-sm"><?php echo($data_profils['pfl_Prenom']); ?></h6></th>
                                  <th class="text-center"><h6 class="mb-3 text-sm"><?php echo($data_profils['pfl_statut']); ?></h6></th>
                                  <th class="text-center"><h6 class="mb-3 text-sm"><?php echo($data_profils['pfl_Validite']); ?></h6></th>
                                  <th class="text-center">
                                    <form action="comptes_action.php" method="POST">
                                      <input type="hidden" name="pseudo_chang_etat" value="<?php echo($data_profils['cpt_Pseudo']); ?>">
                                      <button type="submit" name ="changer" class="btn btn-warning">Changer</button>
                                    </form>
                                  </th>
                                  <th class="text-center">
                                    <form action="comptes_action.php" method="POST">
                                      <input type="hidden" name="pseudo_chang_vali" value="<?php echo($data_profils['cpt_Pseudo']); ?>">
                                      <button type="submit" name="des_Act" class="btn btn-success">Activer / Désactiver</button>
                                    </form>
                                  </th> 
                                </tr>
                                <?php
                              }
                            }
                          ?>
                        </tbody>
                      </table>
                    </div> 
                  </div>
                </div>
              </div>
              <!--fin table des comptes--------------------------------------------------------------------------------------------------------------------------->
            </div>
          </main>
    <!----ICI c'est la fin de if pour G--------------------------------------------------------------------------------------------------------------------------->
          <?php
        }else{
          if($_SESSION['role'] == 'M' && $data_profil_connecte['pfl_Validite'] == 'A'){
        ?>
              <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
                <div class="sidenav-header">
                  <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
                  <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/material-dashboard/pages/dashboard " target="_blank">
                    <img src="./assets/img/logo-ct.png" class="navbar-brand-img h-100" alt="main_logo">
                    <span class="ms-1 font-weight-bold text-white">Espace Perso.</span>
                  </a>
                </div>
                <hr class="horizontal light mt-0 mb-2">
                <div class="collapse navbar-collapse  w-auto  max-height-vh-100" id="sidenav-collapse-main">
                  <ul class="navbar-nav">
                    <li class="nav-item">
                      <a class="nav-link text-white active bg-gradient-primary" href="admin_accueil.php"> Profil 
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
                        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Profil</li>
                      </ol>
                      <h1 class="font-weight-bolder mb-0">Espace Personnel - Profil</h1>
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
                <!-- start profil------------------------------------------------------------------------->
                <section class="h-100 gradient-custom-2">
                  <div class="container py-5 h-100">
                    <div class="row d-flex justify-content-center align-items-center h-100">
                      <div class="col col-lg-9 col-xl-7">
                        <div class="card">
                          <div class="rounded-top text-white d-flex flex-row" style="background-color: #000; height:200px;">
                            <div class="ms-4 mt-5 d-flex flex-column" style="width: 150px;">
                            <img width="150" height="150" src="https://img.icons8.com/stickers/100/name.png" alt="name"/>
                            </div>
                            <div class="ms-3" style="margin-top: 130px;">
                              <h3 style="color: white;"><?php echo($data_profil_connecte['pfl_Prenom'] ." ". $data_profil_connecte['pfl_Nom']); ?></h3>
                              <p>France - Brest </p>
                            </div>
                          </div>
                          <div class="card-body p-4 text-black">
                            <div class="mb-5">
                              <h2 class="lead fw-normal mb-1 pb-4">Vos Coordonnées : </h2>
                                <ul class="list-group">
                                  <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Pseudo : </strong> &nbsp; <?php echo($data_profil_connecte['cpt_Pseudo']); ?></li>
                                  <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Nom : </strong> &nbsp;  <?php echo($data_profil_connecte['pfl_Nom']); ?></li>
                                  <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Prénom : </strong> &nbsp;  <?php echo($data_profil_connecte['pfl_Prenom']); ?></li>
                                  <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Date de Création : </strong> &nbsp; <?php echo($data_profil_connecte['pfl_Date_Crt']); ?></li>
                                  <li class="list-group-item border-0 ps-0 pb-0">
                                    <strong class="text-dark text-sm">Social:</strong> &nbsp;
                                    <a class="btn btn-facebook btn-simple mb-0 ps-1 pe-2 py-0" href="javascript:;">
                                      <i class="fab fa-facebook fa-lg"></i>
                                    </a>
                                    <a class="btn btn-twitter btn-simple mb-0 ps-1 pe-2 py-0" href="javascript:;">
                                      <i class="fab fa-twitter fa-lg"></i>
                                    </a>
                                    <a class="btn btn-instagram btn-simple mb-0 ps-1 pe-2 py-0" href="javascript:;">
                                      <i class="fab fa-instagram fa-lg"></i>
                                    </a>
                                  </li>
                                </ul>
                            </div>
                            <!--
                          SELECT * FROM t_sujet_suj JOIN t_fiche_fic USING(suj_Numero) JOIN t_association_asso USING(fic_Numero) JOIN t_hyperlien_hyp USING(hyp_Numero) WHERE cpt_Pseudo = "john_doe@gmail.com"                             -->
                            <div class="container">
                              <div class="row py-3"><p class="lead fw-normal mb-0">Vos Activités : </p></div>
                              <div class="row">
                                <div class="col-6">
                                    <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">ajouter un sujet</button>
                                    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
                                        <div class="offcanvas-header">
                                            <h5 id="offcanvasRightLabel">Ajout d'un sujet</h5>
                                            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                                        </div>
                                        <div class="offcanvas-body">
                                            <form action="comptes_action.php" method="POST">
                                                <div class="form-group">
                                                    <label for="formGroupExampleInput">titre du sujet :</label>
                                                    <input type="text" name="titr_suj" class="form-control" id="formGroupExampleInput" placeholder="Example input">
                                                </div>
                                                <div class="form-group">
                                                    <input type="hidden" name="pseudo_ajout_suj" value="<?php echo($data_profil_connecte['cpt_Pseudo']); ?>" class="form-control" id="formGroupExampleInput2" placeholder="Another input">
                                                </div>
                                                <div class="form-group d-flex justify-content-center py-4">
                                                    <button type="submit" name="btn_ajout_suj" class="btn btn-primary">valider</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                              </div>
                              <?php
                                // un peu de php pour récupérer les activité du profil
                                $req_activite_suj = "
                                  SELECT * FROM t_sujet_suj 
                                  WHERE cpt_Pseudo = '".$_SESSION['id']."'";
                                $exec_req_activite_suj = $mysqli->query($req_activite_suj);
                                if($exec_req_activite_suj == false){
                                  echo("erreur d'exécution (req_activite_suj)");
                                  exit();
                                }else{
                                  if($exec_req_activite_suj->num_rows == 0){
                                    echo("Aucune activité pour vous");
                                  }else{
                                    while($data_req_activite_suj = $exec_req_activite_suj->fetch_assoc()){ ?>
                                    <div class="row">
                                      <div class="card">
                                        <div class="card-header">
                                          <?php echo($data_req_activite_suj['suj_Intitule']); ?>
                                        </div>
                                        <div class="card-body">
                                          <?php
                                            $req_activite_fic = "
                                              SELECT * 
                                              FROM t_fiche_fic 
                                              WHERE suj_Numero = '".$data_req_activite_suj['suj_Numero']."'";
                                            $exec_req_activite_fic = $mysqli->query($req_activite_fic);
                                            if($exec_req_activite_fic == false){
                                              echo("erreru d'exécution (req_activite_fic)");
                                              exit();
                                            }else{
                                              if($exec_req_activite_fic->num_rows == 0){
                                                echo("Aucune Fiche Pour le moment");
                                              }else{
                                                //echo"<ul>";
                                                while($data_req_activite_fic = $exec_req_activite_fic->fetch_assoc()){ ?>
                                                  <ul>
                                                    <li>
                                                      <h6><?php echo($data_req_activite_fic['fic_Label']) ?></h6>
                                                    </li>
                                                  </ul>
                                          <?php
                                                //echo"</ul>";
                                                }
                                              }
                                            }
                                          ?>
                                        </div>
                                      </div>
                                    </div>
                              <?php
                                    }
                                  }
                                }
                              ?>
                            </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </section>
              </main>
          <!-- end profil--->
          <?php
          }else{
            echo("Oooopsiii, votre compte est désactivé !");
          }
        } ?>
    <!--ICI c'est la fin de if M--->
  <!--   Core JS Files   -->
  <script src="./assets/js/core/popper.min.js"></script>
  <script src="./assets/js/core/bootstrap.min.js"></script>
  <script src="./assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="./assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="./assets/js/plugins/chartjs.min.js"></script>
  
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="./assets/js/material-dashboard.min.js?v=3.0.0"></script>
  <?php
    $mysqli->close();
  ?>
</body>
</html>