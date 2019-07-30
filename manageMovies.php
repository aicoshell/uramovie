<!DOCTYPE html>

<?php
require_once("config/connect_db.php");
?>
<html>

<head>
    <title>CRUDMovie</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <!-- CSS UraMovie -->
    <link rel="stylesheet" type="text/css" href="css/design.css">
</head>

<body>
    <div id="header">

        <form id="searchForm float-right" method="GET" action="#">
            <input class="search" name="keyword" type="text" placeholder="Search a movie !">
            <input class="search_button" type="submit" value="Search">
        </form>


    </div>

    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="addMovie-tab" data-toggle="tab" href="#addMovie" role="tab" aria-controls="addMovie" aria-selected="true">Ajouter un film</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="addActeurs-tab" data-toggle="tab" href="#addActeurs" role="tab" aria-controls="addActeurs" aria-selected="false">Ajouter un acteur</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="addRealisateurs-tab" data-toggle="tab" href="#addRealisateurs" role="tab" aria-controls="addActeurs" aria-selected="false">Ajouter un réalisateur</a>
        </li>
    </ul>

        <div class="tab-content">
            <div class="tab-pane active" id="addMovie" role="tabpanel" aria-labelledby="addMovie-tab">
                <form  enctype="multipart/form-data" method="POST" action="process/crudmovie.php?action=addMovie">
                    <legend>Ajouter un film</legend>

                    <div class="form-group">
                        <input type="text" class="form-control" name="titre" placeholder="Titre">
                    </div>

                    <div class="form-group">
                        <textarea class="form-control" name="synopsis" placeholder="Synopsis"></textarea>
                    </div>

                    <div class="form-group">
                        <input type="time" name="duree" class="form-control" placeholder="Durée">
                    </div>

                    <div class="form-group">
                        <input type="date" class="form-control-date" name="date_Sortie" placeholder="Date de sortie">
                    </div>

                    <div class="form-group">
                        <label for="jacket_Film">Jacket</label>
                        <input name="jacket_Film" type="file" class="form-control-file" aria-describedby="fileHelp">
                    </div>

                    <div class="form-group">
                        <label for="genres">Liste des genres</label>
                        <select name="genres" class="form-control" id="genres">
                            <?php
                            $stmt = $dbh->query("SELECT * FROM genres");
                            while ($row = $stmt->fetch()) {

                                ?>
                                <option value="<?php echo $row['id'] ?>"><?php echo $row['genre']; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="realisateurs">Liste des réalisateurs</label>
                        <select name="realisateurs" class="form-control" id="realisateurs">
                            <?php
                            $stmt = $dbh->query("SELECT * FROM realisateurs");
                            while ($row = $stmt->fetch()) {

                                ?>
                                <option value="<?php echo $row['id'] ?>"><?php echo $row['nom'] ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="acteurs">Liste des acteurs</label>
                        <select name="acteurs" class="form-control" id="acteurs">
                            <?php
                            $stmt = $dbh->query("SELECT * FROM acteurs");
                            while ($row = $stmt->fetch()) {

                                ?>
                                <option value="<?php echo $row['id'] ?>"><?php echo $row['nom']; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" name="lien_bande_annonce" placeholder="Lien bande-annonce (Youtube)">
                    </div>

                    <div class="form-group">
                        <input type="submit" value="Ajouter le film">
                    </div>
                </form>
            </div>

            <div class="tab-pane" id="addActeurs" role="tabpanel" aria-labelledby="addActeurs-tab">
                                    <form method="POST" action="process/crudmovie.php?action=addActeur">
                                    
                               <div class="form-group">
                                    <input type="text" class="form-control" name="nom" placeholder="Nom de l'acteur"> 
                        </div>

                                <div class="form-group">
                                    <input type="submit" value="Ajouter l'acteur">
                        </div>
                                    
                                </form>
            </div>
            <div class="tab-pane" id="addRealisateurs" role="tabpanel" aria-labelledby="addRealisateurs-tab">
            <form method="POST" action="process/crudmovie.php?action=addRealisateur">
                                    
                                    <div class="form-group">
                                         <input type="text" class="form-control" name="nom" placeholder="Nom du réalisateur"> 
                             </div>
     
                                     <div class="form-group">
                                         <input type="submit" value="Ajouter le réalisateur">
                             </div>
                                         
                                     </form>
                        </div>
        </div>
    

 

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>