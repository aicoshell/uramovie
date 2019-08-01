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
   
    <nav class="navbar navbar-dark navbar-expand-sm bg-black">
    <div class="container">
    <a class="navbar-brand" href="index.php"><h1 class="logo-css">Wild'Cin&eacute;</h1></a>
      
      <!-- Links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="#">Link 1</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Link 2</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Link 3</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Link 4</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Link 5</a>
    </li>
  </ul>

      <form class="text-right float-right" id="searchForm float-right" method="GET" action="#">
        <input class="rounded form-control search" name="keyword" type="text" placeholder="Rechercher...">
        
      </form>
    </div>
</nav>
  </div>
  <div class="container">

    <div class="col-lg- d-flex align-content-start">

      <?php
      $stmt = $dbh->query("SELECT * FROM films");
      while ($row = $stmt->fetch()) {

        ?>

        <div class="card rounded bg-dark d-inline-block  mt-4 ml-4 mr-4" style="width: 12rem;">
          <img width="160" height="240" src="process/<?php echo $row['url_Jacket']; ?>" class="card-img-top rounded" alt="<?php echo $row['titre']; ?>">
          <div class="card-img-overlay text-white">
        
          
            

          </div>
          <div class="card-body text-center">
          <?php echo $row['titre']; ?></br>
         <?php $date = DateTime::createFromFormat("Y-m-d", $row['date_sortie']);
            echo 'Ann&eacute;e : '.$date->format("Y"); ?>
       
          </div>
         
        
        </div>

      <?php
      }
      ?>
    </div>




  </div>
  <a href="#" data-toggle="tooltip" data-placement="left" title="Hooray!">Hover over me</a>



  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<script>
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip(); 
});
</script>
</body>

</html>