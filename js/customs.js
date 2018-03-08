
jQuery(window).load(function(){

    jQuery('#myModal').modal('show');

    jQuery('#customModal').on('hide.bs.modal', function(e) {
        jQuery('body .download_pdf').removeClass('not-active');
        jQuery('body #abonnement').removeClass('not-active');
        jQuery('.modal-content').html('');
        jQuery(this).removeData('bs.modal');
    });
});


jQuery('body').on('click', '.download_pdf', function(e){

    e.preventDefault();
    var modal = jQuery(this);
    //modal.addClass('not-active');
    jQuery.ajax({
        url: ''+modal.attr('href').toString()+'',
        data: ''+modal.data('id').toString()+'',
        type: 'GET',
        dataType: 'json',
        success: function(json) {
            if(json.error !== 'OK') {
                if(json.register === 'register'){
                    jQuery('#login_form').trigger('click');
                    jQuery('#forgot-pass-link').trigger('click');
                    jQuery('#error_display_inscription').html(json.error).attr('style','display:block !important; margin:0 !important;');
                }
                if(json.register === 'login'){
                    jQuery('#login_form').trigger('click');
                    jQuery('#error_display').html(json.error).attr('style','display:block !important; margin:0 !important;');
                }
                if(json.register === 'abonnement'){
                    jQuery.ajax({
                        url: json.url, // Le nom du fichier indiqué dans le formulaire
                        type: 'GET', // La méthode indiquée dans le formulaire (get ou post)
                        success: function(data) { // Je récupère la réponse du fichier PHP
                            jQuery('#customModal').modal('show');
                            jQuery('#customModal .modal-content').html(data);
                            jQuery('#customModal #alert').html(json.error);
                        }
                    });
                }

            }else{
                downloadFile(json.url);
            }
        }
    });
});


jQuery('body').on('click', '.abonnementCheck', function(e){

    e.preventDefault();
    var modal = jQuery(this);
    //modal.addClass('not-active');
    jQuery.ajax({
        url: ''+modal.attr('href').toString()+'',
        data: ''+modal.data('id').toString()+'',
        type: 'GET',
        dataType: 'json',
        success: function(json) {
            if(json.error !== 'OK') {
                if(json.register === 'login'){
                    jQuery('#login_form').trigger('click');
                    jQuery('#error_display').html(json.error).attr('style','display:block !important; margin:0 !important;');
                }
            }else{
                window.location.replace(json.url);
            }
        }
    });
});


jQuery('body').on('click', '#abonnement', function(e){
    e.preventDefault();

    var url = jQuery(this).attr('href');
    //jQuery(this).addClass('not-active');
    jQuery.ajax({
        url: url, // Le nom du fichier indiqué dans le formulaire
        type: 'GET', // La méthode indiquée dans le formulaire (get ou post)
        success: function(data) { // Je récupère la réponse du fichier PHP
            jQuery('#customModal').modal('show');
            jQuery('#customModal .modal-content').html(data);
            jQuery('#customModal #alert').hide();
        }
    });

});

jQuery('body').on('click', '.select', function(e){
    e.preventDefault();
    jQuery('#plan').val(jQuery(this).attr('id'));
    jQuery('#id_formulaire_abonnement').submit();
})

jQuery(document).ready(function() {
    jQuery('#example').DataTable({
        'language':{
            "sProcessing":     "Traitement en cours...",
            "sSearch":         "Rechercher&nbsp;:",
            "sLengthMenu":     "Afficher _MENU_ &eacute;l&eacute;ments",
            "sInfo":           "Affichage de  _START_ &agrave; _END_ sur _TOTAL_ ",
            "sInfoEmpty":      "Affichage de 0 &agrave; 0 sur 0 ",
            "sInfoFiltered":   "(filtr&eacute; de _MAX_ &eacute;l&eacute;ments au total)",
            "sInfoPostFix":    "",
            "sLoadingRecords": "Chargement en cours...",
            "sZeroRecords":    "Aucun &eacute;l&eacute;ment &agrave; afficher",
            "sEmptyTable":     "Aucune donn&eacute;e disponible dans le tableau",
            "oPaginate": {
                "sFirst":      "Premier",
                "sPrevious":   "Pr&eacute;c&eacute;dent",
                "sNext":       "Suivant",
                "sLast":       "Dernier"
            },
            "oAria": {
                "sSortAscending":  ": activer pour trier la colonne par ordre croissant",
                "sSortDescending": ": activer pour trier la colonne par ordre d&eacute;croissant"
            }
        }
    });
} );

