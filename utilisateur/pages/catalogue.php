<h2 id="titre_page"> Catalogue </h2>
<?php
if(isset($_GET['submitcatalogue'])) {
    extract($_GET,EXTR_OVERWRITE);
    echo 'id_client : + $id_client + achat: + $achat';
      if(trim($id_client)!='')
	  {	  
            $mg2 = new achatManager($db);
            $retour = $mg2->getAchat($_GET);  
            if($retour==1)
            {
                $texte="<span class='txtGras'>Votre demande a bien été enregistrée</span>";
            }
			if(isset($_SESSION['form'])) {unset($_SESSION['form']);}
            else
            {
                $texte="Complétez tous les champs.";
                if(trim($id_client)!='') {$_SESSION['form']['id_client']=$id_client;}
                
            }
        }
	}
?>
<section id="resultat" class="txtGreen"><?php if(isset($texte)) print $texte; ?></section>
<form id="formachat" action="<?php print $_SERVER['PHP_SELF'];?>" method="get">
<table>
     <tr>
         <?php
            $cm=new catManager($db);
            $cat=$cm->getCat($_GET);
         ?>
                <td>Votre ID : </td>
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
                </td>
            </tr>
<tr><td>Titre</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td>Prix</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td>Nombre de joueurs</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td>Genre</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td>Societé</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td>Type</td><td>Commander</td></tr>
<?php
    for($i=0;$i<count($cat);$i++)
    {
        $titre=$cat[$i]->nom;
        $prix=$cat[$i]->prix;
        $nj=$cat[$i]->nbjoueurs;
        $cat2=$cat[$i]->idgenre;
        $dev=$cat[$i]->idsoc;
        $pl=$cat[$i]->idtype;
        $idj=$cat[$i]->idjouet;
        $nom="achat";
        $id="cc";
        $ty="radio";
        print "<tr><td>{$titre}</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td>{$prix}</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td>{$nj}</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td>{$cat2}</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td>{$dev}</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td>{$pl}</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td><input type={$ty} name={$nom} id={$id} value={$idj}/></td></tr>";
    }
?>
<tr> 
    <td></td><td></td><td></td><td></td><td></td><td></td>  <td colspan="2">
                    
<input type="submit" name="submitcatalogue" id="submitcatalogue" value="Acheter"/>
<!--<input type="hidden" name="hd" id="hd" value="hd"/>-->
                &nbsp;&nbsp;&nbsp;
                </td>
            </tr>
<a href="index.php?page=printcat">Version PDF de notre catalogue</a>
</table>
</form>
