<?php
session_start();
$_SESSION['serveur'] = 'mysql.hostinger.fr';
$_SESSION['loginBDD'] = 'u652047723_milad';
$_SESSION['password'] = 'bmw530d2002';
$_SESSION['database'] = 'u652047723_data';

?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Recherche des infos</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" 
              integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" 
              crossorigin="anonymous">
    </head>
    <body onload="Id()">

        <script>
            function Id() {
                document.search_box.search.focus();
            }

        </script>

        <style>
            body{
                margin: 12%;
            }

        </style>

        <form name="search_box" action="result.php" method="GET">
            <center>
                <img src="logo/search_hat.png" height="150px" class="img-responsive" alt="Search">
                <input type="text" class="form-control" name="search" style="width:60%; margin-top: 20px">
                <input type="submit" class="btn btn-outline-primary" value="Rechercher" name="search_button" style="margin-top: 20px;">
            </center>
        </form>
        <br>
        <br>
        <div>
            <center>
                <a href="donnee.php" target='_blank'><input type='button' class='btn btn-info' name='search_complete' value='Réfèrencez vos infos'></a>
                <a href="connect.php" target='_blank'><input type='button' class='btn btn-warning' name='acces_stagiaire' value='Acces suivi stagiaire'></a>
            </center>
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
    
    <footer>
        <h6><center style="margin-top: 50px"><?php include 'piedDePage.php'; ?></center></h6>
    </footer>
</html>