<?php
        session_start();
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


        //--------- debut traitement d'ajout d'un sujet -------------------------------------------------------->
        if(isset($_POST['btn_ajout_suj'])){
            $titr_suj = $_POST['titr_suj'];
            $pseudo_ajout_suj = $_POST['pseudo_ajout_suj'];
            // requete pour insérer le sujet
            // INSERT INTO t_sujet_suj VALUES (null,'hello',CURRENT_DATE,'john_doe@gmail.com')
            $req_inser_suj ="
            INSERT INTO t_sujet_suj 
            VALUES (null,'".$titr_suj."',CURRENT_DATE,'".$pseudo_ajout_suj."')";

            $exec_req_inser_suj = $mysqli->query($req_inser_suj);
            if($exec_req_inser_suj == 0){
                echo("insertion ko");
                echo($req_inser_suj);
                exit();
            }else{
                if(!headers_sent()){
                    header("Location:admin_accueil.php");
                }else {
                    echo('<script>window.location.href="admin_accueil.php"</script>');
                }
            }
        }

    //--------- fin traitement d'ajout d'un sujet -------------------------------------------------------->
        // --------- Début traitement du changement de statut --------------------------------------->
         if(isset($_POST['changer'])){
            $pseudo_choisi = $_POST['pseudo_chang_etat'];
            $req_chang_etat;
            $req_etat = "
                SELECT pfl_statut
                FROM t_profil_pfl
                WHERE cpt_Pseudo ='".$pseudo_choisi."';";
            $info_req_etat = $mysqli->query($req_etat);

            if($info_req_etat == false){
                echo("erreur d'exécution (req etat)");
                exit();
            }
            $data_etet = $info_req_etat->fetch_assoc();
            $statut = $data_etet['pfl_statut'];
            // tester l'etat
            if($statut == 'G'){
                $req_chang_etat = "
                    UPDATE t_profil_pfl
                    SET pfl_statut ='M'
                    WHERE cpt_Pseudo = '".$pseudo_choisi."';";
            }else{
                if ($statut == 'M') {
                $req_chang_etat = "
                    UPDATE t_profil_pfl
                    SET pfl_statut ='G'
                    WHERE cpt_Pseudo = '".$pseudo_choisi."';";
                }
            }
            $exec_req_chang_etat = $mysqli->query($req_chang_etat);
            if($exec_req_chang_etat == false){
                echo("erreur d'exécution(req etat)");
            }else{
                if(!headers_sent()){
                    header("Location:admin_accueil.php");
                }else {
                    echo('<script>window.location.href="admin_accueil.php"</script>');
                }
            }
        }
    //--------- fin traitement du changement de statut --------------------------------------->
    //--------- début traitement de Activation et désactivation d'un profil --------------------------------------->
        if(isset($_POST['des_Act'])){
            // pseudo choisi pour activer ou désactiver
            $pseudo_des_act = $_POST['pseudo_chang_vali'];
            // requete changement de validité
            $req_chang_vali;
            // requete pour récupérer la validité actuelle
            $req_validite = "
                SELECT pfl_Validite
                FROM t_profil_pfl
                WHERE cpt_Pseudo ='".$pseudo_des_act."';";
            $exec_req_validite = $mysqli->query($req_validite);

            if($exec_req_validite == false){
                echo("erreur d'exécution (req validité)");
                exit();
            }
            $data_vali = $exec_req_validite->fetch_assoc();
            if($data_vali['pfl_Validite'] == 'A'){
                $req_chang_vali ="
                    UPDATE t_profil_pfl
                    SET pfl_Validite ='D'
                    WHERE cpt_Pseudo = '".$pseudo_des_act."';"; 
            }else{
                $req_chang_vali ="
                    UPDATE t_profil_pfl
                    SET pfl_Validite ='A'
                    WHERE cpt_Pseudo = '".$pseudo_des_act."';"; 
            }
            $exec_req_chang_vali = $mysqli->query($req_chang_vali);
            if($exec_req_chang_vali == false){
                echo("erreur d'exécution(req chang. validité)");
                exit();
            }else{
                if(!headers_sent()){
                    header("Location:admin_accueil.php");
                }else {
                    echo('<script>window.location.href="admin_accueil.php"</script>');
                }
            }
        }

    //--------- fin traitement de Activation et désactivation d'un profil -------------------------------------

    //--------- début traitement de la déconection ------------------------------------------------------------
        if(isset($_POST['btn_deconection'])){
            session_destroy();
            unset($_SESSION['id']);
            unset($_SESSION['role']);
            if(!headers_sent()){
                header("Location:session.php");
            }else {
                echo('<script>window.location.href="session.php"</script>');
            }
        }
    //--------- fin traitement de la déconection ------------------------------------------------------------


?>