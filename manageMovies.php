<!DOCTYPE html>


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

        <div class="col-sm-4">
        <form method="POST" action="#">
            <legend>Ajouter un film</legend> 
            
            <div class="form-group">
                <input type="text" class="form-control" name="titre" placeholder="Titre">
            </div>

            <div class="form-group">
            <textarea class="form-control" name="synopsis" placeholder="Synopsis"></textarea>
            </div>
            
            <div class="form-group">
            <input type="date" class="form-control-date" name="date_Sortie" placeholder="Date de sortie">
            </div>

            <div class="form-group">
                <label for="jacket_Film">Jacket</label>
            <input input="jacket_Film" type="file" class="form-control-file"  aria-describedby="fileHelp">
            </div>

            <div class="form-group">
                <input type="text" class="form-control" name="genres" placeholder="Genre(s)">
            </div>

            <div class="form-group">
                <input type="text" class="form-control" name="realisateur" placeholder="R&eacute;alisateur(s)">
            </div>

            <div class="form-group">
                <input type="submit" value="Ajouter le film">
            </div>
        </form>
    </div>

    <div class="col-sm-4">
    </div>

    <div class="col-sm-4">
    </div>
        
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>