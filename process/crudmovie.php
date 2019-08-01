<?php
require_once('./../config/connect_db.php');


    if(!isset($_GET['action']) OR empty($_GET['action'])){ //Verifie si la variable action existe , n'est pas remplis ou vide 
        //Si l'action n'est pas remplis ou vide 
        echo "pas remplis ou vide";
        
    }
    else{

        $action = $_GET['action'];

        switch($action){
            case 'addMovie':
                echo 'addMovie';
                // On verifie que le champs obligatoires sont remplies : titre, date de sortie, image
                    if(!isset($_POST['titre']) OR empty($_POST['titre'])){
                        echo "Le champ titre est vide !";
                    }
                    else{
                        //Si les champs ne sont pas vide alors on declare les variables
                            $titre = htmlentities($_POST['titre']);
                            $synopsis = htmlentities($_POST['synopsis']);
                            $duree = $_POST['duree'];
                            $url_Bande_Annonce = $_POST['lien_bande_annonce'];
                            
                            //On verifie que l'input fichier n'est pas vide
                            if(!isset($_FILES['jacket_Film']) OR  empty($_POST['jacket_Film'])){
                                $url_Jacket = $_FILES['jacket_Film']; //Pas vide donc on declare la variable FILES
                                $nom_fichier = $_FILES['jacket_Film']['name']; //On recupere le nom du fichier
                                $nom_tmp_fichier = $_FILES['jacket_Film']['tmp_name']; //On recupere le nom temporaire du fichier
                                $taille_fichier = $_FILES['jacket_Film']['size']; // On recupere la taille du fichier
                                $erreur_fichier = $_FILES['jacket_Film']['error']; //On recupere le code erreur de l'upload
                                $type_fichier = $_FILES['jacket_Film']['type']; //On recupere le type de fichier

                                $ext_fichier = explode('.', $nom_fichier); // Retourne un tableau avec les elements separer par le delimiteur " . " dans notre cas
                                $ext_fichier_now = strtolower(end($ext_fichier)); //On recupere l'extension du fichier apres le dernier point => end pour le dernier element
                        
                                $ext_allowed = array('jfif','jpg', 'jpeg', 'png', 'PNG', 'JPG', 'JPEG'); // On creer un tableau pour les extensions autorises

                                if(in_array($ext_fichier_now, $ext_allowed)){
                                    if($erreur_fichier === 0){ //On verifier que le code d'erreur du fichier est 0 car 0 => aucune erreure et qu'ils sont du meme type avec === (identique)
                                        if($taille_fichier < 6291456){ // On verifie que la taille du fichier est inferieur a 6 Mo largement suffisant pour une image de haute qualite voir trop pour un site web
                                            $new_nom_fichier = uniqid('', true).".".$ext_fichier_now; //On creer un nom unique en fonction de la date actuelle TRUE pour more_entropy donc encore plus precis pour une valeure unique
                                            $destination_fichier = 'jackets/'.$new_nom_fichier; // Variable contenant le repertoire de destination + nom du fichier

                                            $upload_fichier = move_uploaded_file($nom_tmp_fichier, $new_nom_fichier);

                                            if($upload_fichier){
                                                echo "Le fichier a bien etait uploader !";
                                            }
                                            else {
                                                echo "Erreur upload";
                                            }

                                        }
                                        else {
                                            echo "Le fichier est trop grand !";
                                        }
                                    }
                                    else {
                                        echo "Une erreure s'est produite lors de la tentative d'upload du fichier !";
                                        print_r($_FILES);
                                        $new_nom_fichier = "default.jpg";
                                    }

                                }
                                else{
                                    echo "Impossile d'uploader le fichier, les extensions autorisées sont jpg, jpeg et png.";
                                }
                            }
                            $date_Sortie = $_POST['date_Sortie'];

                            $genre_s = htmlentities($_POST['genres']);
                            $acteur_s = htmlentities($_POST['acteurs']);
                            $realisateur_s = htmlentities($_POST['realisateurs']);

                $sql = "INSERT INTO films (titre, synopsis, url_Jacket, duree, url_bande_annonce, acteur_s, realisateur_s, genre_s, date_Sortie) VALUES (?,?,?,?,?,?,?,?,?)";
                $exe = $dbh->prepare($sql);
                $exe->execute([$titre, $synopsis, $new_nom_fichier, $duree, $url_Bande_Annonce, $acteur_s, $realisateur_s, $genre_s, $date_Sortie]);
                          
                        echo "\nPDOStatement::errorCode(): ";
                        print $exe->errorCode();
                        
                    }
                break;

            case 'deleteMovie':
                echo 'deleteMovie';
                break;
            
            case 'updateMovie':
                echo "updateMovie";
                break;

            case 'searchMovie':
                echo "searchMovie";
                break;

            case 'addActeur':
                echo "addActeur";
                break;

            case 'addRealisateur':
                echo "addRealisateur";
                break;
            
            default:
                echo "Action non-reconnue <=== retour au formulaire";

        }
    }


 
   







    
    