<div id="header">

<nav class="navbar navbar-dark navbar-expand-sm bg-black">
  <div class="container">
    <a class="navbar-brand" href="index.php">
      <h1 class="logo-css">Wild'Cin&eacute;</h1>
    </a>

    <!-- Links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="index.php">Accueil</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Genres
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <?php
            $navBar = $dbh->query("SELECT * FROM genres");
                while ($row = $navBar->fetch()) {
      
          ?>
          <a class="dropdown-item" href="#"><?php echo $row['genre']; ?></a>
          <?php
                }
          ?>
        </div>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLinkA" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Acteurs
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLinkA">
            <?php
            $navBar = $dbh->query("SELECT * FROM acteurs");
                while ($row = $navBar->fetch()) {
      
          ?>
          <a class="dropdown-item" href="acteur.php?id_Acteur=<?php echo $row['id'];?>"><?php echo $row['nom']; ?></a>
          <?php
                }
          ?>
        </div>
      </li>
     
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLinkR" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            R&eacute;alisateurs
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLinkR">
            <?php
            $navBar = $dbh->query("SELECT * FROM realisateurs");
                while ($row = $navBar->fetch()) {
      
          ?>
          <a class="dropdown-item" href="#"><?php echo $row['nom']; ?></a>
          <?php
                }
          ?>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"></a>
      </li>
    </ul>

    <form class="form-inline" id="searchForm float-right" method="GET" action="#">
      <input class="form-control mr-sm-2" type="search" placeholder="Recherche" aria-label="Search" name="keyword" id="rechercheReq">

    </form>
  </div>
</nav>
</div>