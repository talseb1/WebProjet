<h2 id="titre_page"> Catalogue </h2>

<section id="resultat" ><?php if(isset($texte)) print $texte; ?></section>
<form id="formachat" action="<?php print $_SERVER['PHP_SELF'];?>" method="get">
    
    <table class="jouet">
     <tr>
         <?php
            $cm=new catManager($db);
            $cat=$cm->getCat($_GET);
         ?>
                
            </tr>
<legend>Nos joués de stocks :</legend> 
<tr><td>Titre</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td>Prix</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td>Nombre de joueurs</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td>Genre</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td>Societé</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td>Type</td><td>Commander</td></tr>
<?php
    for($i=0;$i<count($cat);$i++)
    {
        $titre=$cat[$i]->nom;
        $prix=$cat[$i]->prix;
        $nj=$cat[$i]->nj;
        $genre=$cat[$i]->genre;
        $soc=$cat[$i]->soc;
        $type=$cat[$i]->type_jouet;
        $idj=$cat[$i]->idjouet;
        $nom="achat";
        $id="cc";
        $ty="radio";
        print "<tr><td>{$titre}</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td>{$prix}</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td>{$nj}</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td>{$genre}</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td>{$soc}</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td>{$type}</td><td><input type={$ty} name={$nom} id={$id} value={$idj}/></td></tr>";
    }
?>
<tr> 
    
    <td class="nostyle">Votre ID : </td>
                <td>
                    <?php if(isset($_SESSION['form']['id_client'])) { ?>
                        <input type="text" name="id_client" id="id_client" value="<?php print $_SESSION['form']['id_client'];?>"/>
                    <?php
                    }
                    else {
                        ?>
                        <input type="text" name="id_client" id="id_client" placeholder="Votre identifiant" required/>
                        <?php
                    }
                    ?>
                        <div id="error"></div>
                </td> <td class="nostyle" colspan="5">
                   
<input type="submit" name="submitcommande" id="submitcommande" value="Passer commande !"/>
<!--<input type="hidden" name="hd" id="hd" value="hd"/>-->
                </td>
            </tr>

</table>
 <a class="pdf" href="index.php?page=printcat"><img class="pdf" src="../admin/images/pdf.jpg" alt="Telecharger votre pdf ici !" /></a>
</form>


<?php
if(isset($_GET['submitcommande'])) {
    extract($_GET,EXTR_OVERWRITE);
    echo 'id_client : + $id_client + achat: + $achat';
      if(trim($id_client)!='')
	  {	  
            $mg2 = new achatManager($db);
            $retour = $mg2->getAchat($_GET);  
            if($retour==1)
            {
                $texte="<span class='txtGras'>Commande enregistré !</span>";
            }
			if(isset($_SESSION['form'])) {unset($_SESSION['form']);}
            else
            {
                $texte="Champs id vide.";
                if(trim($id_client)!='') {$_SESSION['form']['id_client']=$id_client;}
                
            }
        }
	}
?>