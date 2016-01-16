
<?php
include ('./lib/php/Jliste_include.php');
$db = connexion::getInstance($dsn,$user,$pass);
session_start();

$scripts=array(); //stocker tous les fichiers d'inlinemod pour les lier plus loin
$i=0;
foreach(glob('../admin/lib/js/jquery/*.js') as $js) {
    $fichierJs[$i]=$js;
    $i++;
    
}
?>

<html>
    <head>
        <meta charset="utf-8">
        <title> LittleToys </title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
        
        <link rel="stylesheet" type="text/css" href="../utilisateur/lib/css/utcss.css" />
        <link rel="stylesheet" type="text/css" href="../admin/lib/css/style_pc.css" />
        <link rel="stylesheet" type="text/css" href="../admin/lib/css/mediaqueries.css" />
        
         <?php
    foreach($fichierJs as $js) {
       ?><script type="text/javascript" src="<?php print $js;?>"></script>
    <?php            
    }
    ?>
    <script type="text/javascript" src="../admin/lib/js/jquery/jquery-validation-1.13.1/dist/jquery.validate.js"></script>   
    <script type="text/javascript" src="../admin/lib/js/fonctionsJquery.js"></script>     

    </head>
<body>

    <section id="all_all">
        <header>
            <img src="../admin/images/ToysGamesbanner.jpg" alt="Banniere" />
        </header>
  <section id="exemple">
      <div id="category-menu">
          
            <div id="cssmenu">
            <ul class="na">
                <?php
                if(file_exists('./lib/php/Jmenu.php')){
                    include ('./lib/php/Jmenu.php');
                }
                ?>
            </ul >
            </div>
        </section>
        <section id="all">
            <div class="exemple" id="ex2">
                <?php
                    //quand on arrive sur le site 
                    if(!isset($_SESSION['page']))
                    {
                        $_SESSION['page']="accueil";
                    }  //si on a cliqué sur un lien du menu
                    if(isset($_GET['page']))
                    {
                         $_SESSION['page']=$_GET['page'];
                    }
                    $_SESSION['page']='./pages/'.$_SESSION['page'].'.php';
                    if(file_exists($_SESSION['page']))
                    {
                        include ($_SESSION['page']);
                    }     
                ?>
            </div>
        </section>
        
        
  <div id="wrap-bottom">
    <div id="bottom">
      <?php
            require './lib/php/footer.php';
            ?>
    </div>
  </div>          

    </body>
</html>
