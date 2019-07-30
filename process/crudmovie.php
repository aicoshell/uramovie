<?php
require_once('./../config/connect_db.php');

//Verifie si la variable action existe 
    if(!isset($_GET['action']) OR empty($_GET['action'])){
        //Si l'action n'est pas remplis ou vide 
        echo "pas remplis ou vide";
        
    }
    else{

        $action = $_GET['action'];

        switch($action){
            case 'addMovie':
                echo 'addMovie';
                    echo $_POST["titre"];
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


 
   







    
    
