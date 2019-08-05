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

    <!-- Icons FontAwesome -->
    <script src="https://kit.fontawesome.com/5738d8e7a0.js"></script>




</head>

<body class="bg-white">
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
        <li class="nav-item">
            <a class="nav-link" id="manageMovies-tab" data-toggle="tab" href="#manageMovies" role="tab" aria-controls="addActeurs" aria-selected="false">G&eacute;rer les films</a>
        </li>
    </ul>

    <div class="tab-content">
        <div class="tab-pane active" id="addMovie" role="tabpanel" aria-labelledby="addMovie-tab">
            <form enctype="multipart/form-data" method="POST" action="process/crudmovie.php?action=addMovie">
                <legend>Ajouter un film</legend>

                <div class="form-group">
                    <input type="text" class="form-control" name="titre" placeholder="Titre" required>
                </div>

                <div class="form-group">
                    <textarea class="form-control" name="synopsis" placeholder="Synopsis" required></textarea>
                </div>

                <div class="form-group">
                    <input type="time" name="duree" class="form-control" placeholder="Durée" required>
                </div>

                <div class="form-group">
                    <input type="date" class="form-control-date" name="date_Sortie" placeholder="Date de sortie" required>
                </div>

                <div class="form-group bg-dark text-white p-4">
                    <label for="jacket_Film">Image de couverture</label>
                    <input name="jacket_Film" type="file" class="form-control-file" required>
                </div>

                <div class="form-group">
                    <label for="genres">Genres</label>
                    <input name="genres" type="text" class="form-control" id="genres" required>
                </div>


                <div class="form-group">
                    <label for="realisateurs">Réalisateurs</label>
                    <select name="realisateurs" id="realisateurs" class="form-control" multiple="multiple" style="">
                        <?php
                        $stmt = $dbh->query("SELECT * FROM realisateurs");
                        while ($row = $stmt->fetch()) {
                            ?>
                            <option value="<?php echo $row['nom']; ?>"><?php echo $row['nom']; ?></option>

                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="acteurs">Acteurs</label>
                    <select name="acteurs" id="acteurs" class="form-control" multiple="multiple" style="">
                        <?php
                        $stmt = $dbh->query("SELECT * FROM acteurs");
                        while ($row = $stmt->fetch()) {
                            ?>
                            <option value="<?php echo $row['nom']; ?>"><?php echo $row['nom']; ?></option>

                        <?php
                        }
                        ?>
                    </select>
                </div>

                <div class="form-group">
                    <input type="text" class="form-control" name="lien_bande_annonce" placeholder="Lien bande-annonce (Youtube)" required>
                </div>

                <div class="form-group">
                    <input type="submit" value="Ajouter le film">
                </div>
            </form>
        </div>

        <div class="tab-pane" id="addActeurs" role="tabpanel" aria-labelledby="addActeurs-tab">
            <form method="POST" action="process/crudmovie.php?action=addActeur">
                <legend>Ajouter un film</legend>

                <div class="form-group">
                    <input type="text" class="form-control" name="nom_acteur" placeholder="Nom" required>
                </div>


                <div class="form-group">
                    <input type="submit" value="Ajouter l'acteur'">
                </div>
            </form>

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Acteur</th>
                        <th scope="col">Supprimer</th>
                        <th scope="col">Modifier</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $stmt = $dbh->query("SELECT * FROM acteurs");
                    while ($row = $stmt->fetch()) {
                        ?>
                        <tr>
                            <th scope="row"><?php echo $row['id']; ?></th>
                            <td><?php echo $row['nom']; ?></td>
                            <td><a href="process/crudmovie.php?action=deleteActeur&id_to_delete=<?php echo $row['id']; ?>"><i class="far fa-trash-alt"></i></a></td>
                            <td><a href="process/crudmovie.php?action=editActeur<?php echo $row['id']; ?>"><i class="far fa-edit"></i></a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <div class="tab-pane" id="addRealisateurs" role="tabpanel" aria-labelledby="addRealisateurs-tab">
            <form method="POST" action="process/crudmovie.php?action=addRealisateur">
                <legend>Ajouter un film</legend>

                <div class="form-group">
                    <input type="text" class="form-control" name="nom_rea" placeholder="Nom realisateur" required>
                </div>


                <div class="form-group">
                    <input type="submit" value="Ajouter le realisateur'">
                </div>
            </form>

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Realisateur</th>
                        <th scope="col">Supprimer</th>
                        <th scope="col">Modifier</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $stmt = $dbh->query("SELECT * FROM realisateurs");
                    while ($row = $stmt->fetch()) {
                        ?>
                        <tr>
                            <th scope="row"><?php echo $row['id']; ?></th>
                            <td><?php echo $row['nom']; ?></td>
                            <td><a href="process/crudmovie.php?action=deleteRealisateurs&id_to_delete=<?php echo $row['id']; ?>"><i class="far fa-trash-alt"></i></a></td>
                            <td><a href="process/crudmovie.php?action=editRealisateurs<?php echo $row['id']; ?>"><i class="far fa-edit"></i></a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <div class="tab-pane" id="manageMovies" role="tabpanel" aria-labelledby="manageMovies-tab">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Ajouter le</th>
                        <th scope="col">Titre</th>
                        <th scope="col">Supprimer</th>
                        <th scope="col">Modifier</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $stmt = $dbh->query("SELECT * FROM films");
                    while ($row = $stmt->fetch()) {
                        ?>
                        <tr>
                            <th scope="row"><?php echo $row['id']; ?></th>
                            <td><?php echo $row['ajouter_le']; ?></td>
                            <td><?php echo $row['titre']; ?></td>
                            <td><a href="process/crudmovie.php?action=deleteMovie&id_to_delete=<?php echo $row['id']; ?>"><i class="far fa-trash-alt"></i></a></td>
                            <td><a href="process/crudmovie.php?=<?php echo $row['id']; ?>"><i class="far fa-edit"></i></a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>








    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="js/bsmultiselect/dist/js/BsMultiSelect.js"></script>

    <script>
        // Javascript to enable link to tab
        var url = document.location.toString();
        if (url.match('#')) {
            $('.nav-tabs a[href="#' + url.split('#')[1] + '"]').tab('show');
        }

        // Change hash for page-reload
        $('.nav-tabs a').on('shown.bs.tab', function(e) {
            window.location.hash = e.target.hash;
        });



        $("select").bsMultiSelect({
            selectedPanelDefMinHeight: 'calc(2.25rem + 2px)',
            selectedPanelLgMinHeight: 'calc(2.875rem + 2px)',
            selectedPanelSmMinHeight: 'calc(1.8125rem + 2px)',
            selectedPanelDisabledBackgroundColor: '#e9ecef',
            selectedPanelFocusBorderColor: '#80bdff',
            selectedPanelFocusBoxShadow: '0 0 0 0.2rem rgba(0, 123, 255, 0.25)',
            selectedPanelFocusValidBoxShadow: '0 0 0 0.2rem rgba(40, 167, 69, 0.25)',
            selectedPanelFocusInvalidBoxShadow: '0 0 0 0.2rem rgba(220, 53, 69, 0.25)',
            filterInputColor: '#495057',
            selectedItemContentDisabledOpacity: '.65',
            dropdDownLabelDisabledColor: '#6c757d',
            containerClass: 'dashboardcode-bsmultiselect',

            dropDownItemClass: 'px-2',
            dropDownItemHoverClass: 'text-primary bg-light',
            selectedPanelClass: 'form-control',
            selectedItemClass: 'badge',
            removeSelectedItemButtonClass: 'close',
            filterInputItemClass: '',
            filterInputClass: ''
        });

        $(function() {

            $("select").dashboardCodeBsMultiSelect();

        });
    </script>

</body>

</html>