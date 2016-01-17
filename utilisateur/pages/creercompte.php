<h2 id="titre_page"> Création d'un compte client </h2>

<img src="../admin/images/banniereinscription.jpg" alt="Banniere Clients" />
<!--creer une table contact afin de mettre ces données dans la DB ?-->
<section id="resultat" class="bann"><?php if(isset($texte)) print $texte; ?></section>
<section id="leform">
    <form id="form_ccompte" action="<?php print $_SERVER['PHP_SELF'];?>" method="get">
        <fieldset id="Client">
        <legend class="txtMauv txtGras">Renseignements personnel : </legend>
        <table >
            <tr>
                <td>Nom : </td>
                <td>
                    <?php if(isset($_SESSION['form']['nom_cc'])) { ?>
                        <input type="text" name="nom_cc" id="nom_cc" value="<?php print $_SESSION['form']['nom_cc'];?>"/>
                    <?php
                    }
                    else {
                        ?>
                        <input type="text" name="nom_cc" id="nom_cc" placeholder="Entrez Nom" required/>
                        <?php
                    }
                    ?>
                        <div id="error"></div>
                </td>
                <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                <td>Prénom : </td>
                <td>
                    <?php if(isset($_SESSION['form']['pren_cc'])) { ?>
                        <input type="text" name="pren_cc" id="pren_cc" value="<?php print $_SESSION['form']['pren_cc'];?>"/>
                    <?php
                    }
                    else {
                        ?>
                        <input type="text" name="pren_cc" id="pren_cc" placeholder="Entrez Prenom" required/>
                        <?php
                    }
                    ?>
                        <div id="error"></div>
                </td>
            </tr>
	    <tr>
                <td> &nbsp;</td>
            </tr>
             <tr>
                <td>Adresse : </td>
                <td>
                    <?php if(isset($_SESSION['form']['adresse_cc'])) { ?>
                        <input type="text" name="adresse_cc" id="adresse_cc" value="<?php print $_SESSION['form']['adresse_cc'];?>"/>
                    <?php
                    }
                    else {
                        ?>
                        <input type="text" name="adresse_cc" id="adresse_cc" placeholder="Entrez votre rue + numero" required/>
                        <?php
                    }
                    ?>
                        <div id="error"></div>
                </td>
            </tr>
	
            <tr>
                <td> &nbsp;</td>
            </tr>         
            <tr>
                <td>Ville : </td>
                <td>
                    <?php if(isset($_SESSION['form']['ville_cc'])) { ?>
                        <input type="text" name="ville_cc" id="ville_cc" value="<?php print $_SESSION['form']['ville_cc'];?>"/>
                    <?php
                    }
                    else {
                        ?>
                        <input type="text" name="ville_cc" id="ville_cc" placeholder="Entrez votre Ville" required/>
                        <?php
                    }
                    ?>
                        <div id="error"></div>
                </td>
                <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                <td>CP : </td>
                <td>
                    <?php if(isset($_SESSION['form']['cp_cc'])) { ?>
                        <input type="text" name="cp_cc" id="cp_cc" value="<?php print $_SESSION['form']['cp_cc'];?>"/>
                    <?php
                    }
                    else {
                        ?>
                        <input type="text" name="cp_cc" id="cp_cc" placeholder="Entrez votre CP" required/>
                        <?php
                    }
                    ?>
                        <div id="error"></div>
                </td>
                
                <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                
                <td>Pays : </td>
                <td>
                    <?php if(isset($_SESSION['form']['pays_cc'])) { ?>
                        <input type="text" name="pays_cc" id="pays_cc" value="<?php print $_SESSION['form']['pays_cc'];?>"/>
                    <?php
                    }
                    else {
                        ?>
                        <input type="text" name="pays_cc" id="pays_cc" placeholder="Entrez votre pays" required/>
                        <?php
                    }
                    ?>
                        <div id="error"></div>
                </td>
            </tr>
            <tr>
                <td> &nbsp;</td>
            </tr>
            
             <tr>
                <td>Numéro de téléphone : </td>
                <td>
                    <?php if(isset($_SESSION['form']['num_cc'])) { ?>
                        <input type="text" name="num_cc" id="num_cc" value="<?php print $_SESSION['form']['num_cc'];?>"/>
                    <?php
                    }
                    else {
                        ?>
                        <input type="text" name="num_cc" id="num_cc" placeholder="Entrez votre Numero" required/>
                        <?php
                    }
                    ?>
                        <div id="error"></div>
                </td>
            </tr>
            <tr>
                <td> &nbsp;</td>
            </tr>        
            <tr>
                <td colspan="5">
                <input type="submit" class="buttonform"name="submit_ccompte" id="submit_ccompte" value="Envoyer la demande" />
                &nbsp;&nbsp;&nbsp;
                <input type="reset" class="buttonform" id="reset" value="R&eacute;initialiser le formulaire" />
                </td>
            </tr>
            
        </table>
        </fieldset>
    </form>
</section>


<?php

if(isset($_GET['submit_ccompte'])) {
    extract($_GET,EXTR_OVERWRITE);
    if(trim($nom_cc)!='' && trim($pren_cc)!='' && trim($adresse_cc)!='' && trim($ville_cc)!='' && trim($cp_cc)!='' && trim($pays_cc)!='' && trim($num_cc)!='') {
        $mg2 = new creercompteManager($db);
        $retour = $mg2->addClient($_GET);
        if($retour>=0){
            $texte="<span class='txtGras'>Votre demande a bien été enregistrée.</span>";
            print '$texte';
        }
        /*else if ($retour==2) { 'pas possible dans notre cas
            $texte="<span class='txtGras'>Déjà dans la base de données</span>";
        }    */
        if(isset($_SESSION['form'])) {unset($_SESSION['form']);}                
    }
    else {
        $texte="Complétez tous les champs.";
    }
}
?>