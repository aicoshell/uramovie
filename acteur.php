<?php require_once 'config/connect_db.php'; ?>

<!DOCTYPE html>


<html>

<head>
    <title>CRUDMovie</title>
    <!-- Bootrsrap v4 -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <!-- Theme Wild'Ciné -->
    <link rel="stylesheet" type="text/css" href="css/design.css">
    <!-- Icons FontAwesome -->
    <script src="https://kit.fontawesome.com/5738d8e7a0.js"></script>
</head>

<body>
    <?php include_once('header.php'); ?>
    <div class="container">
        <div id="viewResults">
        </div>

        <?php
        if (isset($_GET['id_Acteur']) or !empty($_GET['id_Acteur']) and is_numeric($_GET['id_Acteur']) and $_GET['id_Acteur'] > 0) {
            $id_Acteur = $_GET['id_Acteur'];

            $getMovie = $dbh->prepare("SELECT * FROM acteurs WHERE id = $id_Acteur");
            $getMovie->execute();

            $data = $getMovie->fetch();

            ?>



            <div class="row p-4">
                <div class="col">
                    <div class="row justify-content-center">
                        <h2 class="text-light "><?php echo $data['nom']; ?></h2>
                    </div>
                    <div class="row justify-content-center">
                        
                    </div>
                </div>
                <div class="col">
                    <h3 class="text-light">Bio</h3>
                    <?php echo $data['description']; ?></br></br>
                </div>
            </div>
            
        <?php


        }
        ?>

        <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

        <script src="js/recherche.js"></script>
</body>


</html>