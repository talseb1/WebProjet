
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
        
            
           
   <div id="footer">
            <?php
            require './pages/footer.php';
            ?>
   </div>
    </body>
</html>
