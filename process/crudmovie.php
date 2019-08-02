<!DOCTYPE html>



<?php
require_once('./../config/connect_db.php');
?>

<html>

<head>
    <title>Process > Wild'Ciné</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="./../css/bootstrap.min.css">
    <!-- CSS UraMovie -->
    <link rel="stylesheet" type="text/css" href="css/design.css">

    <!-- Icons FontAwesome -->
    <script src="https://kit.fontawesome.com/5738d8e7a0.js"></script>
</head>

<body>


    <div class="container">

        <?php

        if (!isset($_GET['action']) or empty($_GET['action'])) { //Verifie si la variable action existe , n'est pas remplis ou vide 
            //Si l'action n'est pas remplis ou vide 
            echo "pas remplis ou vide";
        } else {

            $action = $_GET['action'];

            switch ($action) {
                case 'addMovie':

                    // On verifie que le champs obligatoires sont remplies : titre, date de sortie, image
                    if (!isset($_POST['titre']) or empty($_POST['titre'])) {
                        echo "Le champ titre est vide !";
                    } else {
                        //Si les champs ne sont pas vide alors on declare les variables
                        $titre = htmlentities($_POST['titre']);
                        $synopsis = htmlentities($_POST['synopsis']);
                        $duree = $_POST['duree'];
                        $url_Bande_Annonce = $_POST['lien_bande_annonce'];

                        //On verifie que l'input fichier n'est pas vide
                        if (!isset($_FILES['jacket_Film']) or  empty($_POST['jacket_Film'])) {
                            $url_Jacket = $_FILES['jacket_Film']; //Pas vide donc on declare la variable FILES
                            $nom_fichier = $_FILES['jacket_Film']['name']; //On recupere le nom du fichier
                            $nom_tmp_fichier = $_FILES['jacket_Film']['tmp_name']; //On recupere le nom temporaire du fichier
                            $taille_fichier = $_FILES['jacket_Film']['size']; // On recupere la taille du fichier
                            $erreur_fichier = $_FILES['jacket_Film']['error']; //On recupere le code erreur de l'upload
                            $type_fichier = $_FILES['jacket_Film']['type']; //On recupere le type de fichier

                            $ext_fichier = explode('.', $nom_fichier); // Retourne un tableau avec les elements separer par le delimiteur " . " dans notre cas
                            $ext_fichier_now = strtolower(end($ext_fichier)); //On recupere l'extension du fichier apres le dernier point => end pour le dernier element

                            $ext_allowed = array('jfif', 'jpg', 'jpeg', 'png', 'PNG', 'JPG', 'JPEG'); // On creer un tableau pour les extensions autorises

                            if (in_array($ext_fichier_now, $ext_allowed)) {
                                if ($erreur_fichier === 0) { //On verifier que le code d'erreur du fichier est 0 car 0 => aucune erreure et qu'ils sont du meme type avec === (identique)
                                    if ($taille_fichier < 6291456) { // On verifie que la taille du fichier est inferieur a 6 Mo largement suffisant pour une image de haute qualite voir trop pour un site web
                                        $new_nom_fichier = uniqid('', true) . "." . $ext_fichier_now; //On creer un nom unique en fonction de la date actuelle TRUE pour more_entropy donc encore plus precis pour une valeure unique
                                        $destination_fichier = 'jackets/' . $new_nom_fichier; // Variable contenant le repertoire de destination + nom du fichier

                                        $upload_fichier = move_uploaded_file($nom_tmp_fichier, $new_nom_fichier);

                                        $date_Sortie = $_POST['date_Sortie'];

                                        $genre_s = htmlentities($_POST['genres']);
                                        $acteur_s = htmlentities($_POST['acteurs']);
                                        $realisateur_s = htmlentities($_POST['realisateurs']);

                                        $sql = "INSERT INTO films (titre, synopsis, url_Jacket, duree, url_bande_annonce, acteur_s, realisateur_s, genre_s, date_Sortie) VALUES (?,?,?,?,?,?,?,?,?)";
                                        $exe = $dbh->prepare($sql);
                                        $exe->execute([$titre, $synopsis, $new_nom_fichier, $duree, $url_Bande_Annonce, $acteur_s, $realisateur_s, $genre_s, $date_Sortie]);
                                        if ($exe->errorCode() == 00000) {
                                          //Si l'execution de la requete $exe retourne true on le stock dans la var $exeBool 
                                            $exeBool = true;
                                        } else {
                                            echo "Une erreure est survenue. \nPDOStatement::errorCode(): ";
                                            print $exe->errorCode();
                                            $exeBool = false;
                                        }

                                        if ($upload_fichier) {
                                            //Si l'upload return true on stock dans $uploadBool 
                                            $uploadBool = true;
                                        } else {
                                            $uploadBool = false;
                                            echo "Erreur upload";
                                        }
                                    } else {
                                        $uploadBool = false;
                                        echo "Le fichier est trop grand !";
                                    }
                                } else {
                                    echo "Une erreure s'est produite lors de la tentative d'upload du fichier !";
                                    print_r($_FILES);
                                    $new_nom_fichier = "default.jpg";
                                }
                            } else {
                                echo "Impossile d'uploader le fichier, les extensions autorisées sont jpg, jpeg et png.";
                            }
                        }
                        if($exeBool==true && $uploadBool == true){
                            //Si l'execution de la requete d'insertion et l'upload retourne TRUE alors tout est OK
                        ?> 
                        <div class="p-3 mb-2 bg-success text-white"> Le film à bien etait ajouter !</div>
                <?php
                }
                else{
                    echo "Une erreure est survenue le film n'a pas etait ajouter!";
                }
                    }
                    break;

                case 'deleteMovie':
                    echo 'deleteMovie';
                    if (!isset($_GET['id_to_delete']) or empty($_GET['id_to_delete']) && !is_numeric($_GET['id_to_delete']) && $_GET['id_to_delete'] > 0) {
                        echo "L'ID n'est pas correcte.";
                    } else {
                        $id = $_GET['id_to_delete'];
                        $stmt = $dbh->prepare("DELETE FROM films WHERE id =:id");
                        $stmt->bindParam(':id', $id);
                        $stmt->execute();
                        if (!$stmt->rowCount()) {
                            echo "Erreur de suppression";
                        } else {
                            header('location:./../manageMovies.php#manageMovies');
                        }
                    }
                    break;
                case 'editMovie':

                    break;

                case 'searchMovie':
                    echo "searchMovie";
                    break;

                case 'addActeur':
                         // On verifie que le champs obligatoires sont remplies : titre, date de sortie, image
                         if (!isset($_POST['nom_acteur']) or empty($_POST['nom_acteur'])) {
                            echo "Le champ titre est vide !";
                        } else {
                            $nom_acteur = $_POST['nom_acteur'];

                            
                            $sql = "INSERT INTO acteurs (nom) VALUES (?)";
                            $exe = $dbh->prepare($sql);
                            $exe->execute([$nom_acteur]);
                            if ($exe->errorCode() == 00000) {
                              //Si l'execution de la requete $exe retourne true on le stock dans la var $exeBool 
                                header('location:./../manageMovies.php?#addActeurs');
                            } else {
                                echo "Une erreure est survenue. \nPDOStatement::errorCode(): ";
                                print $exe->errorCode();
                                $exeBool = false;
                            }

                        }
                    break;

                case 'addRealisateur':
                    echo "addRealisateur";
                    break;

                default:
                    echo "Action non-reconnue <=== retour au formulaire";
            }
        }


        ?>
    </div>
</body>

</html>