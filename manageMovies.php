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

    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

    <script src="./js/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>


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
                    <input type="text" class="form-control" name="titre" placeholder="Titre"  required>
                </div>

                <div class="form-group">
                    <textarea class="form-control" name="synopsis" placeholder="Synopsis"  required></textarea>
                </div>

                <div class="form-group">
                    <input type="time" name="duree" class="form-control" placeholder="Durée"  required>
                </div>

                <div class="form-group">
                    <input type="date" class="form-control-date" name="date_Sortie" placeholder="Date de sortie"  required>
                </div>

                <div class="form-group bg-dark text-white p-4">
                    <label for="jacket_Film">Image de couverture</label>
                    <input name="jacket_Film" type="file" class="form-control-file"  required>
                </div>

                <div class="form-group">
                    <label for="genres">Genres</label>
                    <input name="genres" type="text" class="form-control" id="genres"  required>
                </div>

                <div class="form-group">
                    <label for="realisateurs">Réalisateurs</label>
                    <input name="realisateurs" type="text" class="form-control" id="realisateurs"  required>
                        
                </div>

                <div class="form-group">
                    <label for="acteurs">Acteurs</label>
                    <input name="acteurs" type="text" class="form-control" id="acteurs"  required>
                </div>

                <div class="form-group">
                    <input type="text" class="form-control" name="lien_bande_annonce" placeholder="Lien bande-annonce (Youtube)"  required>
                </div>

                <div class="form-group">
                    <input type="submit" value="Ajouter le film">
                </div>
            </form>
        </div>

        <div class="tab-pane" id="addActeurs" role="tabpanel" aria-labelledby="addActeurs-tab">

        </div>
        <div class="tab-pane" id="addRealisateurs" role="tabpanel" aria-labelledby="addRealisateurs-tab">

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
      <td><?php echo $row['titre'];?></td>
      <td><a href="process/crudmovie.php?action=deleteMovie&id_to_delete=<?php echo $row['id'];?>"><i class="far fa-trash-alt"></i></a></td>
      <td><a href="process/crudmovie.php?=<?php echo $row['id'];?>"><i class="far fa-edit"></i></a></td>
    </tr>
  <?php 
                }
  ?>
    </tbody>
</table>
        </div>
    </div>





    <script>
        $(document).ready(function() {
            var availableTags = [
                <?php
                $stmt = $dbh->query("SELECT * FROM genres");
                while ($row = $stmt->fetch()) {

                    echo "\"".$row['genre']."\",";  
                 
                }
                ?>
            ];

            function split(val) {
                return val.split(/,\s*/);
            }

            function extractLast(term) {
                return split(term).pop();
            }

            $("#genres")
                // don't navigate away from the field on tab when selecting an item
                .on("keydown", function(event) {
                    if (event.keyCode === $.ui.keyCode.TAB &&
                        $(this).autocomplete("instance").menu.active) {
                        event.preventDefault();
                    }
                })
                .autocomplete({
                    minLength: 0,
                    source: function(request, response) {
                        // delegate back to autocomplete, but extract the last term
                        response($.ui.autocomplete.filter(
                            availableTags, extractLast(request.term)));
                    },
                    focus: function() {
                        // prevent value inserted on focus
                        return false;
                    },
                    select: function(event, ui) {
                        var terms = split(this.value);
                        // remove the current input
                        terms.pop();
                        // add the selected item
                        terms.push(ui.item.value);
                        // add placeholder to get the comma-and-space at the end
                        terms.push("");
                        this.value = terms.join(", ");
                        return false;
                    }
                });
        });
    </script>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script>
// Javascript to enable link to tab
var url = document.location.toString();
if (url.match('#')) {
    $('.nav-tabs a[href="#' + url.split('#')[1] + '"]').tab('show');
} 

// Change hash for page-reload
$('.nav-tabs a').on('shown.bs.tab', function (e) {
    window.location.hash = e.target.hash;
})
    </script>
</body>

</html>