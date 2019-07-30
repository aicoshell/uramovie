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

    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

    <script src="./js/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>


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
            <form enctype="multipart/form-data" method="POST" action="process/crudmovie.php?action=addMovie">
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
                    <input name="jacket_Film" type="file" class="form-control-file">
                </div>

                <div class="form-group">
                    <label for="genres">Genres</label>
                    <input name="genres" type="text" class="form-control" id="genres">
                </div>

                <div class="form-group">
                    <label for="realisateurs">Réalisateurs</label>
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

        </div>
        <div class="tab-pane" id="addRealisateurs" role="tabpanel" aria-labelledby="addRealisateurs-tab">

        </div>
    </div>





    <script>
        $(document).ready(function() {
            var availableTags = [
      "ActionScript",
      "AppleScript",
      "Asp",
      "BASIC",
      "C",
      "C++",
      "Clojure",
      "COBOL",
      "ColdFusion",
      "Erlang",
      "Fortran",
      "Groovy",
      "Haskell",
      "Java",
      "JavaScript",
      "Lisp",
      "Perl",
      "PHP",
      "Python",
      "Ruby",
      "Scala",
      "Scheme"
    ];
    function split( val ) {
      return val.split( /,\s*/ );
    }
    function extractLast( term ) {
      return split( term ).pop();
    }
 
    $( "#tags" )
      // don't navigate away from the field on tab when selecting an item
      .on( "keydown", function( event ) {
        if ( event.keyCode === $.ui.keyCode.TAB &&
            $( this ).autocomplete( "instance" ).menu.active ) {
          event.preventDefault();
        }
      })
      .autocomplete({
        minLength: 0,
        source: function( request, response ) {
          // delegate back to autocomplete, but extract the last term
          response( $.ui.autocomplete.filter(
            availableTags, extractLast( request.term ) ) );
        },
        focus: function() {
          // prevent value inserted on focus
          return false;
        },
        select: function( event, ui ) {
          var terms = split( this.value );
          // remove the current input
          terms.pop();
          // add the selected item
          terms.push( ui.item.value );
          // add placeholder to get the comma-and-space at the end
          terms.push( "" );
          this.value = terms.join( ", " );
          return false;
        }
      });
  } );
        });
    </script>

</body>

</html>