<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Resultat de votre recherche</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" 
              integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" 
              crossorigin="anonymous">

        <style>
            .result{
                margin-left: 10%;
                margin-right: 10%;
                margin-top: 12px;
            }

        </style>

    </head>
    <body onload="ID()">

        <script>
            function ID() {
                document.recherche.search.focus();
            }
        </script>


        <div class="container-fluid">
            <form action="result.php" method="get" name="recherche">

                <div class="row" style="background: #F2F2F2;">

                    <div class="col-sm-1" style="margin-left:20px">
                        <a href="search.php"><img src="img/search_hat.png" height="60px"></a>
                    </div>

                    <div class="col-sm-6" style="margin-left:10px;">
                        <div class="input-group" style="margin-top: 10px;">
                            <input type="text" class="form-controle" name="search">
                            <span class="input-group-btn">
                                <input class="btn btn-secondary" type="submit" name="search_button" value="Rechercher">
                            </span>
                        </div>
                    </div>

                </div>

            </form>
        </div>

        <div class="result">
            <table>
                <tr>

                    <?php
                    $bdd = new PDO('mysql:host=localhost;dbname=search;charset=utf8', 'root', 'formation');

                    if (isset($_GET['search_button'])) {
                        $search = $_GET['search'];

                        if ($search == "") {
                            echo "<center><b>Veuillez saisir une recherche</b></center>";
                            exit();
                        }
                        $sql_image = "select * from website where site_key like '%$search%' limit 0, 4";
                        $rs = $bdd->query($sql_image);

                        if (!$rs) {
                            echo "<center><h4><b> Ooops!!! Il n'y a aucun élèment corrspondant à votre recherche</b></h4></center>";
                            exit();
                        }

                        echo "<font size='+1' color='#1a1aff'>Image pour la recherche : " . $search . "</font>";

                        $row = $rs->fetchAll();

                        foreach ($row as $key) {
                            echo "<td>
                                    <table style='margin-top:10px'>
                                        <tr>
                                            <td>
                                                <a target='_blank' href='images.php?id=$search'>
                                                <img src='img/$key[5]' height='90px'>
                                                </a>
                                            </td>
                                        </tr>
                                    </table>
                                </td>";
                        }
                    }
                    ?>


                </tr>

            </table>

            <?php
            echo "<a target='_blank' href='images.php?id=$search'><font size='+1' color='#1a1aff'> Plus d'image pour: " . $search . "</font></a>";

            echo "<hr>";

            $sql_text = "select * from website where site_key like'%$search%'";

            $rs_text = $bdd->query($sql_text);

            $row_text = $rs_text->fetchAll();

            foreach ($row_text as $value) {
                
                echo "<a href='http://$value[2]' target='_blank'><font size='4' color='#0000cc'><b>$value[1]</b></font></a><br>";
                echo "<font size='3' color='#006400'>$value[2]</font><br>";
                echo "<font size='3' color='#666666'>$value[4]</font><br><br>";
                
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