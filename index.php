<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Notre moteur de recherche</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" 
              integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" 
              crossorigin="anonymous">
    <body>
        <div class="container">
            <br>
            <center><h2><b>Inserer un site internet</b></h2></center>
            <br>
            <form action="index.php" method="POST" enctype="multipart/form-data">

                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-2" for="stitle"> Titre du site </label>

                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="stitle" name="s_title" placeholder="Entrer votre titre ici" required>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-2" for="slink"> Lien du site </label>

                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="slink" name="slink" placeholder="Entrer votre lien vers le site" required>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-2" for="skey"> Mot cle pour le site </label>

                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="skey" name="skey" placeholder="Entrer ici le mot cle permettant de retrouver le site" required>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-2" for="s_des"> Description du site </label>

                        <div class="col-sm-10">
                            <textarea  class="form-control" id="s_des" name="s_des" placeholder="Entrer la description du site ici" required></textarea>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-2" for="simg"> Image du site </label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control" name="simg" required>
                        </div>
                    </div>
                </div>

                <div class="form-group">

                    <div class="row">
                        <center>
                            <input type="submit" class="btn btn-outline-success" name="submit" value="Ajouter le site internet">
                            <input type="reset" class="btn btn-outline-danger" name="cancel" value="Vider le formulaire">
                        </center>
                    </div>    

                </div>

            </form>

        </div>

        <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" 
                integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" 
        crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" 
                integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" 
        crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" 
                integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" 
        crossorigin="anonymous"></script>
    </body>
</html>

<?php
$bdd = new PDO('mysql:host=localhost;dbname=search;charset=utf8', 'root', 'formation');

if (isset($_POST["submit"])) {
    $s_title = addslashes($_POST["s_title"]);
    $s_link = addslashes($_POST["slink"]);
    $s_key = addslashes($_POST["skey"]);
    $s_des = addslashes($_POST["s_des"]);
    $_simg = addslashes($_FILES["simg"] ["name"]);

    if (move_uploaded_file($_FILES["simg"] ["tmp_name"], "img/" . $_FILES["simg"]["name"])) {
        $sql = "insert into website(site_title, site_link, site_key, site_des, site_img) values ('$s_title','$s_link','$s_key','$s_des','$_simg')";
        $rs = $bdd->query($sql);

        if ($rs) {
            echo "<script> alert('site charger dans la base de donnée avec succes')</script>";
        } else {
            echo "<script> alert('erreur lors de l'enregistrement dans la base de donnée)</script>";
        }
    }
}
?>


<!---- https://www.youtube.com/watch?v=ucLMyrTJiCg&index=1&list=PLbsexNAdMaFwOoH1MiOa8GxLuc7M_gEB4#t=641.482712 --->