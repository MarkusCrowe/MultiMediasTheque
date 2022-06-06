<section>
    <h1>Formulaire d'envoi de fichiers</h1>
    <form method="post" enctype="multipart/form-data">
        <!-- <label for="image">Image de profil</label></br> -->
        <input type="file" name="upload" class="upload"></br>
        <input type="submit" name="submit">Envoyer</input>
    </form>
</section>

<?php



if (isset($_POST["submit"])) {
    $maxSize = 50000;
    $validExt = array(".jpg", ".jpeg" , ".gif" , ".png");

    if($_FILES["upload"]["error"] > 0){
        echo "Error during transfer";
        die;
    }

    $fileSize = $_FILES["upload"]["size"];
    // echo $fileSize;
    if($fileSize > $maxSize){
        echo "The document is too big !";
        die;
    }

    $fileName = $_FILES["upload"]["name"];
    $fileExt = "." . strtolower(substr(strrchr($fileName, "."), 1));
    if(!in_array($fileExt, $validExt)){
        echo "the file isn't an image";
        die;
    }

    $tempName = $_FILES["upload"]["tmp_name"];
    $uniqueName = md5(uniqid(rand(), true));
    $fileName = "../Assets/Images/Upload/" . $uniqueName . $fileExt;
    $resultat = move_uploaded_file($tempName, $fileName);
    if($resultat){
        echo "transfert done!";
    }
}
?>