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
    <div class="col-lg- ">

      <?php
      $stmt = $dbh->query("SELECT * FROM films");

      while ($row = $stmt->fetch()) {

        ?>

        <div class="card rounded bg-dark d-inline-block  mt-4 ml-4 mr-4" style="width: 12rem;">
          <img width="160" height="240" src="process/<?php echo $row['url_Jacket']; ?>" class="card-img-top rounded" alt="<?php echo $row['titre']; ?>">
          <div class="card-img-overlay text-white">




          </div>
          <div class="card-body text-center">
          <a class="link" href="#"> 
          <?php echo $row['titre']; ?></br>
            <?php $date = DateTime::createFromFormat("Y-m-d", $row['date_sortie']);
            echo 'Ann&eacute;e : ' . $date->format("Y"); ?>
        </a>
          </div>


        </div>

      <?php
      }
      ?>
    </div>




  </div>
  <a href="#" data-toggle="tooltip" data-placement="left" title="Hooray!">Hover over me</a>

      
  <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="js/recherche.js"></script>
  <script>
    
</body>

</html>