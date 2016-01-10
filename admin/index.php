<!doctype html>
<?php
//INDEX ADMIN
include ('./lib/php/liste_include.php');
$db = Connexion::getInstance($dsn, $user, $pass);
session_start();
$scripts = array(); //stocker tous les fichiers d'inlinemod pour les lier plus loin
$i = 0;
foreach (glob('./lib/js/jquery/*.js') as $js) {
    $fichierJs[$i] = $js;
    $i++;
}
?>

<html>
    <head>
        <title>LittleToys</title>
        <meta charset='UTF-8'/>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
        <link rel="stylesheet" type="text/css" href="./lib/css/main.css"/>
        <?php
        foreach ($fichierJs as $js) {
            ?><script type="text/javascript" src="<?php print $js; ?>"></script>
            <?php
        }
        ?>
        <script type="text/javascript" src="./lib/js/fonctionsJqueryAdmin.js"></script> 
    </head>

    <body>    

        <?php //var_dump($_SESSION);
        //session_destroy();
        ?>
        <section id="all_all">              
            <header id="header">
                <img src="./images/ToysGamesbanner.jpg" alt="Banniere LittleToys" id="image_header"/><br />	
                <section id="deconnexion"> 
                    <!-- section id="deconnexion">-->

                    <?php
                    if (isset($_SESSION['admin'])) {
                        ?><a href="./lib/php/disconnect.php">Se déconnecter</a>
                        <?php
                    }
                    ?>
                </section>

            </header>

            <?php if (!isset($_SESSION['admin'])) {
                ?>
                <section id="login_form">
                    <?php
                    require './pages/authentification.php';
                    ?> </section><?php
            } else {

                
                ?>
                <section id="exemple">
                    <div class="exemple" id="ex2">
                        <ul class="nav">
                            
                            <?php
                            ?>

                        </ul>
                </section>

                <footer>Copyright 2015-2016 LittleToys - Condorcet - talamini Sebastien</footer>
                <?php
            }
            ?>
    </body>
</html>