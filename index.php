<?php require_once 'config/connect_db.php'; ?>

<!DOCTYPE html>


<html>

<head>
  <title>CRUDMovie</title>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/design.css">
</head>

<body>
  <div id="header">

    <form id="searchForm float-right" method="GET" action="#">
      <input class="search" name="keyword" type="text" placeholder="Search a movie !">
      <input class="search_button" type="submit" value="Search">
    </form>


  </div>
<div class="row">
<div class="col-lg- d-flex align-content-start">
  
    <?php
    $stmt = $dbh->query("SELECT * FROM films");
    while ($row = $stmt->fetch()) {

      ?>
     
      <div class="card d-inline-block   mt-4 ml-4" style="width: 18rem;">
        <img width="285" height="410" src="process/<?php echo $row['url_Jacket']; ?>" class="card-img-top" alt="<?php echo $row['titre']; ?>">
        <div class="card-img-overlay text-white">
          <h3 class="card-title"><?php echo $row['titre']; ?></h3>
          
        </div>
        <div class="card-body">
        <p class="card-text"><?php echo $row['synopsis']; ?></p>
        </div>
        <ul class="list-group list-group-flush">
          
        <li class="list-group-item">Durée : <?php echo $row['duree']; ?></li>
          <li class="list-group-item">Genre(s) : </li>
          <li class="list-group-item">Acteur(s) : </li>
          <li class="list-group-item">R&eacute;alisateur(s) :</li>
        </ul>
        <div class="card-body">
          <a href="#" class="card-link">Bande-Annonce</a>
          <a href="#" class="card-link">Allocine</a>
        </div>
      </div>
      
    <?php
    }
    ?>
  </div>

  <div class="col">
  <ul class="list-group mt-4">
  <li class="list-group-item">Cras justo odio</li>
  <li class="list-group-item">Dapibus ac facilisis in</li>
  <li class="list-group-item">Morbi leo risus</li>
  <li class="list-group-item">Porta ac consectetur ac</li>
  <li class="list-group-item">Vestibulum at eros</li>
</ul>
  </div>
  </div>
  

</body>

</html>