<?php
    require_once("inc/init.php");

    //Afficher les informations logement du logement sélectionné depuis fiche_logement.php

    if(!isset($_GET["id_logement"])) {
        header("location:info_logement.php");
        exit();
    }
    
    if(isset($_GET["id_logement"])){
        $r = $pdo->query("SELECT * FROM logement WHERE id_logement = '$_GET[id_logement]' ");
        if($r->rowCount() <= 0){ header("location:info_logement.php"); exit(); }
        $logement = $r->fetch(PDO::FETCH_ASSOC); // Je récupère le logement
    }

    require_once("inc/header.php");
?>

<div class="row col-md-12 mx-auto justify-content-center">
    <div class="card col-md-5">
        <img class="card-img-top" src="<?php echo $logement["photo"];?>" alt="">
        <div class="card-body">
            <p class="card-text text-center font-weight-bold"> <?php echo $logement["titre"]; ?> </p>
           
        </div>
    </div>

    <div class="col-md-7">

        <ul class="list-group">
            <li class="list-group-item"><span class="title"> Adresse : </span> <?php echo $logement["adresse"]; ?> </li>
            <li class="list-group-item"><span class="title"> Ville : </span> <?php echo $logement["ville"]; ?> </li>
            <li class="list-group-item"><span class="title"> Code Postal : </span> <?php echo $logement["cp"]; ?> </li>
            <li class="list-group-item"><span class="title"> Surface: </span> <?php echo $logement["surface"]; ?> m2 </li>
            <li class="list-group-item"><span class="title"> Prix: </span> <?php echo $logement["prix"]; ?> € </li>
            <li class="list-group-item"><span class="title"> Type: </span> <?php echo $logement["type"]; ?> </li>
            <li class="list-group-item"><span class="title"> Description: </span> <?php echo $logement["description"]; ?> </li>
        </ul>
        <a href="index.php" class="badge badge-dark"> Retour vers Index </a>
    </div>

</div>


<?php
    require_once("inc/footer.php");
?>