$(document).ready(function () {

    //Ajout d'un client par un formulaire sous ajax

    $('input#submit_Addcompte').on('click', function (event) {

        event.preventDefault();// ou return false à la fin
        var nom_tf = $('input#nom_tf').val();
        var prenom_tf = $('input#prenom_tf').val();
        var adresse_tf = $('input#adresse_tf').val();
        var ville_tf = $('input#ville_tf').val();
        var cp_tf = $('input#cp_tf').val();
        var pays_tf = $('input#pays_tf').val();
        var num_tf = $('input#num_tf').val();


        if ($.trim(nom_tf) != '' && $.trim(prenom_tf) != '' && $.trim(adresse_tf) != '' && $.trim(ville_tf) != '' && $.trim(cp_tf) != '' && $.trim(pays_tf) != '' && $.trim(num_tf) != '') {
            var data_form = $('form#form_compte').serialize();
            //alert(data_form);
            $.ajax({
                type: 'GET',
                data: data_form,
                dataType: "json", //type du retour des données par le php
                url: '../admin/lib/php/ajax/AjaxAdd_compte.php',
                //callback exécuté en cas de succès uniquement :
                success: function (data) { //data : valeur fichier php 
                    //effacer les input txt et email
                    $('form').find('input[type=text]').val('');
                    $('form').find('input[type=email]').val('');
                    $('input[name="type"]').prop('checked', false);
                    
                    //stricte égalité type compris (sinon valeurs peuvent être de types != et etre =   
                    if (data.retour >= 0) {  $('section#resultat').css({
                            'color': 'yellow'
                        }),
                                $('section#resultat').html("Vous etes desormais inscrit ! Votre numéro de client est :" + data.retour + " ! ");
                    } else if (data.retour == -1) {//si se trouve dans la table
                        $('section#resultat').css({
                            'color': 'yellow'
                        }),
                                $('section#resultat').html("Déjà dans la base de données...");
                    } else {
                        $('section#resultat').css({
                            'color': 'yellow'
                        }),
                                $('section#resultat').html("Echec.");
                    }
                },
                //En cas d'echec
                fail: function () {
                    document.write("Planté");
                    alert("échec url");
                }
            })//fin $.ajax    
        }
    });
    
    
    
});