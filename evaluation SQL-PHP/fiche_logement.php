<?php

require_once("inc/init.php");


// LOGIQUE PHP////


//////////////////////////////////////////////////////////////////
//////////// RÉCUPÉRATION DES PRODUITS À AFFICHER ////////////////
//////////////////////////////////////////////////////////////////

$r = $pdo->query("SELECT * FROM logement");

require_once("inc/header.php");

?>

<!-- HTML -->
<div class="col-md-12">

    <?php echo $content; ?>

  
     

        <table class="table col-md-12">
            <thead class="thead-dark">
                <tr>

                    <!-- JE RÉCUPÈRE LE NOM DE MES COLONNES EN BDD -->
                    <!-- POUR GÉNÉRER LES TH DE MA TABLE HTML DYNAMIQUEMENT -->

                    <?php for($i=0; $i< $r->columnCount(); $i++ ) { ?>
                        <th> <?php echo $r->getColumnMeta($i)["name"]; ?> </th>
                    <?php } ?>
                    <th> modification </th>
                    <th>Detail de  logement</th>

                </tr>
            </thead>
            <tbody>
                <!-- JE FETCH DANS LE JEU DE RÉSULTAT DE MA REQUÊTE SQL (PDOSTATEMENT)-->
                
                <?php while($logement= $r->fetch(PDO::FETCH_ASSOC)) { ?>
                    
                    <tr>

                        <?php foreach($logement as $indice => $valeur) {
                            if($indice == "photo") { ?>
                                <td> <img class="img-fluid" style="width:80px" src="<?php echo $valeur; ?>"> </td>
                            <?php  } else{ ?>
                                <td> <?php echo $valeur; ?>  </td>
                            <?php } ?>

                        <?php } ?>

                        <!-----Couper le texte en ajoutant...  ------>
                        <!---  echo "<pre>";
                              var_dump($logement); 
                              echo "</pre>";
                        ---->
                        
                       <?php foreach($logement as $indice => &$value) { 
                            if($value == $logement['description']) { ?>
	                            <?php  $value =substr(strip_tags($logement['description']), 0, 50).'...';  ?>
                            <?php } ?>  
                             
                        <?php } ?>
                            <?php unset( $value ); ?>
                            <td> <?php echo $logement['description'] ?> </td>
                           
                       
                        
                        <!--LIEN DE PAGE INFO_LOGEMENT AFFICHE ID DANS L'URL-->
                        <td>
                            <a href="info_logement.php?id_logement=<?php echo $logement['id_logement'];?>" class="badge badge-dark">detail </a>
                        </td>

                    </tr>
                    
                    
                <?php } ?>

            </tbody>
        </table>





<?php

require_once("inc/footer.php");

 ?>