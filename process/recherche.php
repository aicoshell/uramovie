<?php
require_once('./../config/connect_db.php');


if (empty($_GET['valReq']) or !isset($_GET['valReq'])) { } else {
    $valReq = $_GET['valReq'];

    ?>

<div id="resultats" class="mt-3 bg-dark p-4 rounded">
    <h3>R&eacute;sultats pour "<?php echo $valReq; ?>"</h3>
    <?php



        if (!isset($_GET['nbPage']) or empty($_GET['nbPage']) or !is_numeric($_GET['nbPage'])) {
            $nbPage = 1;
        } else {
            $nbPage = $_GET['nbPage'];
            $maxLimit = $nbPage * 5;
            $minLimit = $maxLimit - 5;
        }

        $reqTotal = $dbh->prepare("SELECT * FROM films WHERE titre LIKE ?");
        $reqTotal->execute(array("%$valReq%"));
        $nbResults = $reqTotal->rowCount();
        ?>
        <?php  if($nbResults==0){echo "Aucun r&eacute;sultat pour votre recherche.";} ?>
        <?php

        $reqSearch = $dbh->prepare("SELECT * FROM films WHERE titre LIKE ?  LIMIT $minLimit, $maxLimit");
        $reqSearch->execute(array("%$valReq%"));


        while ($resultats = $reqSearch->fetch()) {

            if ($nbResults > 0) {
                $synopsis = $resultats['synopsis'];
                if (strlen($synopsis) > 700) {
                    $synopsis = substr($resultats['synopsis'], 0, 700) . '...';
                } else {
                    $synopsis =  $resultats['synopsis'];
                }

                ?>
    <div class="media border-bottom p-3">
        <img width="120" src="process/<?php echo $resultats['url_Jacket'] ?>" class="mr-3" alt="...">
        <div class="media-body">
            <h5 class="mt-0"><?php echo $resultats['titre']; ?></h5>
            <?php echo $synopsis; ?>
            </br> </br>R&eacute;alisateur(s) : <?php echo $resultats['realisateur_s'] ?>
        </div>
    </div>
    <?php
            } else {
                echo "Pas de resultats pour cette recherche";
            }
        }
       
        $nbMaxP = ceil($nbResults / 5);
       
        if($nbResults>5){

        ?>
    
    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <li class="page-item">
                <a class="page-link" href="#" aria-label="Previous" id="numPageDec">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
            <?php
                $i = 1;
                while ($i <= $nbMaxP) {
                   
                    ?>
            <li class="page-item"><button class="page-link" id="getNumPage" data-pageNum="<?php echo $i; ?>" ><?php echo $i; ?></button></a>
            <?php
                     $i++;
                }
                ?>
            <li class="page-item">
                <a class="page-link" href="#" aria-label="Next" id="numPageInc">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
    </nav>



    <?php
    }
    }
    ?>







</div>