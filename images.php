<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Resultat de votre recherche</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" 
              integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" 
              crossorigin="anonymous">

    </head>
    <body>

        <div class="container-fluid">
            <?php
            $search = $_GET["id"];

            $bdd = new PDO('mysql:host=localhost;dbname=search;charset=utf8', 'root', 'formation');

            $sql = "select site_img, site_link from website where site_key like '%$search%'";
            $resultat = $bdd->query($sql);

            $list = $resultat->fetchAll();
            foreach ($list as $value) {

                echo "<a href='img/$value[0]' download><img src='img/$value[0]' height='100px' style='margin-top:10px; margin-left:5px; margin-left:5px'></a>";
            }
            ?>


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