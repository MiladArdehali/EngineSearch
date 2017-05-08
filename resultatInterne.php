<?php
session_start();

$serveur = $_SESSION['serveur'];
$loginBDD = $_SESSION['loginBDD'];
$password = $_SESSION['password'];
$database = $_SESSION['database'];
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Resultat de votre recherche</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" 
              integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" 
              crossorigin="anonymous">

    </head>
    <body >
        <script>
            function CloseWindows() {
                var obj_window = window.open('', '_self');
                obj_window.opener = window;
                obj_window.focus();
                opener = self;
                self.close();
            }
        </script>


        <?php
        $id = $_GET["id"];

        $bdd = new PDO("mysql:host=$serveur;dbname=$database",$loginBDD,$password);

        $sql = "select * from website where id=$id";
        $retourBDD = $bdd->query($sql);
        $result = $retourBDD->fetchAll();
        echo "<center><a href='index.php'><img src='logo/search_hat.png' height='150px' class='img-responsive'></a></center>";
        foreach ($result as $valeur) {
            echo "<div class='col-sm-12'>
            <center><h3 style='color:#ff751a; margin-top:10px'><b>Resultat de votre recherche sur $valeur[1]</b></h3></center>";
            if ($valeur[2]) {
                echo "<hr>
                <center><h4 style='color:#33cc33'><b>Lien de l'article</b></h4></center>
                <div style='margin-left: 10px; margin-right: 10px;' ><a href='http://$valeur[2]' target='_blank'>$valeur[2]</a></div>";
            }

            echo "<hr>
            <center><h4 style='color:#0000cc'><b>Contenu de l'article</b></h4></center>
            <div style='margin-left: 10px; margin-right: 10px;'> $valeur[4]</div>";
            if ($valeur[5]) {
                echo "<hr>
                <center><h4 style='color:#ff751a'><b>Image liée à l'article</b></h4>
                <div><a href='img/$valeur[5]' download><img src='img/$valeur[5]' height='200px' style='margin-left:10px'></a></div></center>
                        <br><hr></div>";
            }
        }
        ?>



        <div class="col-sm-12">
            <center><input type="button" class="btn btn-outline-primary" name="fermer_page" value="Fermer cette page" onclick="CloseWindows();"/></center>
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