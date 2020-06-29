<?php

require_once("inc/init.php");

//// HEADER//////
require_once("inc/header.php");



if($_POST) {




    /////////Vérifier un code postal//////////
     //if ((!is_numeric($_POST['cp'])) OR (strlen($_POST['cp'])!=5)) {
     //echo "Votre Code postal n'est pas correct"; } 
   

    //////////Vérifier code postal//////////
    if (!preg_match('#^[z0-9]{5}+$#', $_POST['cp'])) {
        $error .='<div class="alert alert-danger"> Votre Code postal n\'est pas correct. </div>';
    }



    /////////Vérifier surface doivent contenir exclusivement des nombres entiers/////////
    if (!preg_match('/^[0-9]*$/', $_POST['surface'])) {
        $error .='<div class="alert alert-danger"> Valeur de surface doit des nombres entiers </div>';
    }
    


    /////////Vérifier prix  doivent contenir exclusivement des nombres entiers/////////
    if (!preg_match('/^[0-9]*$/', $_POST['prix'])) {
        $error .='<div class="alert alert-danger"> Valeur de prix doit des nombres entiers </div>';
    }


    ////////Vérifier le type de photo///////////////
    /*<?php if (exif_imagetype('image.gif') != IMAGETYPE_GIF) {
    //echo 'Cette image n\'est pas un gif';}?>*////


    if( !strstr($_FILES['photo']['type'], 'jpg') && !strstr($_FILES['photo']['type'], 'jpeg')){
        echo "ce n'est pas une JPEG valide";
    }



    /////////Vérifier poids du ficher//////

    if($_FILES['photo']['size'] > 2000000){
        $error .= '<div class="alert alert-danger">Veuillez choisir une photo de 2Mo max</div>';
    }
    
    


    ////////////////////////////////////////////
    //////////// TRAITEMENT DE LA PHOTO ////////
    ////////////////////////////////////////////
    // Renommé les photos <<logement _timestamp.jpg>>//
    //.$file = 'x.y.z.png';
    //echo pathinfo($file, PATHINFO_EXTENSION);

    $extension= pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);
    $nomPhoto = 'logement_' .time() . '.'.$extension;
    
    // Enregistrer en BDD le chemin vers la photo
    $cheminPhotoPourBDD = URL . "photo/" . $nomPhoto;
    // Enregister/copier la photo sur le serveur
    // Fichier de destination à copier
    $dossier_pour_enregistrer_photo = RACINE_SITE . "photo/" . $nomPhoto;

    // Fichier de départ à copier
    copy($_FILES["photo"]["tmp_name"], $dossier_pour_enregistrer_photo);

    foreach($_POST as $indice=>$valeur){
        $_POST[$indice] = addslashes($valeur);
    }




    ////////////////////////////////////////////
    //////////// AJOUT DANS BASE DONNE//////////
    ////////////////////////////////////////////


    $count = $pdo->exec("INSERT INTO logement (titre, adresse, ville, cp, surface,
    prix, photo, type, description)
    VALUES('$_POST[titre]', '$_POST[adresse]', '$_POST[ville]', '$_POST[cp]', '$_POST[surface]', '$_POST[prix]', '$cheminPhotoPourBDD', '$_POST[type]', '$_POST[description]') ");


    // Message de confirmation après ajout
    if($count >0){
        $content .= "<div class=\"alert alert-success\" role=\"alert\">
        Votre annoce a bien été ajouté en base </div>";
    }



}







?>




<!-- HTML -->
<!-- Formulaire d'ajout logment -->
<h1>Ajoutez une annonce pour un logement</h1>

<form action="" method="POST" enctype="multipart/form-data">
    <div class="form-row">
        <div class="form-group col-md-12">
            <label for="titre">Titre</label>
            <input type="text" class="form-control" id="titre" name="titre">
        </div>
        <div class="form-group col-md-6">
            <label for="adresse">adresse</label>
            <input type="text" class="form-control" id="adresse" name="adresse">
        </div>
        <div class="form-group col-md-3">
            <label for="ville">Ville</label>
            <input type="text" class="form-control" id="ville" name="ville">
        </div>
        <div class="form-group col-md-3">
            <label for="cp">Code postal</label>
            <input type="number" class="form-control" id="cp" name="cp">
            </div>
        <div class="form-group col-md-6">
            <label for="surface">Surface m2</label>
            <input type="number" class="form-control" id="surface" name="surface">
        </div>
        <div class="form-group col-md-6">
            <label for="prix">Prix € </label>
            <input type="number" class="form-control" id="prix" name="prix">
        </div>
        <div class="form-group col-md-6">
            <input type="file" class="custom-file-input" id="photo" name="photo">
            <label class="custom-file-label" for="photo">Choisir une photo</label>
        </div>
        <div class="w-100"></div>
            <div class="form-group col-md-2">
                <label for="type_v">Type de logment</label>
                <div class="custom-control custom-radio">
                    <input type="radio" id="type_v" name="type" class="custom-control-input" value="v">
                    <label class="custom-control-label" for="type_v">Vente</label>
                </div>
            </div>
            <div class="form-group col-md-2">
                <label for="type_l" style="color:transparent">Type de logment</label>
                <div class="custom-control custom-radio">
                    <input type="radio" id="type_l" name="type" class="custom-control-input" value="l">
                    <label class="custom-control-label" for="type_l">Location</label>
                </div>
            </div>
        <div class="form-group col-md-12">
            <label for="description">Description</label>
            <textarea name="description" id="description" cols="30" rows="10"></textarea>
        </div>
    </div>

        <button type="submit" class="btn btn-primary" name="ajouterLogement">Valider</button>
</form>





<?php

require_once("inc/footer.php");

?>