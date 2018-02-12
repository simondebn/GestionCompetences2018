function addAutoComplete() {
    var ville_autocomplete;
    new autoComplete({
        selector: 'input#ville_entreprise',
        source: function(term, response){
            try { ville_autocomplete.abort(); } catch(e){}
            ville_autocomplete = $.ajax({
                url: 'https://maps.googleapis.com/maps/api/geocode/json?key='+ GOOGLE_API_KEY_GEOCODING +'&region=fr&address=' + term,
                type: 'POST',
                success: function (data) {
                    var matches = [];
                    $.each(data['results'], function(index, values) {
                        matches.push(values['formatted_address']);
                    });
                    response(matches);
                }
            });
        }
    });
}

$('body').on('click', '#addPersonne', function () {
    $.ajax({
        url: 'app/view/modalFormPersonne.php',
        type: 'POST',
        data: {
            contexte: 'creation',
            modal_title: 'Création d\'un nouvel utilisateur'
        }
    })
        .done(function (html) {
            $('.modal.form .modal-dialog').html(html);
            addAutoComplete();
        })
        .fail(function () {
            bootstrapNotify("Une erreur s'est produite", 'danger')
        });

    $('.modal.form').modal('show');
});

$('body').on('click', '#modifyPersonne', function () {
    $.ajax({
        url: 'app/view/modalFormPersonne.php',
        type: 'POST',
        data: {
            contexte: 'modification',
            modal_title: 'Modification du profil'
        }
    })
        .done(function (html) {
            $('.modal.form .modal-dialog').html(html);
            addAutoComplete();
        })
        .fail(function () {
            bootstrapNotify("Une erreur s'est produite", 'danger')
        });

    $('.modal.form').modal('show');
});

$('body').on('click', 'tr', function () {
    var data = {
        contexte: 'consultation',
        modal_title: 'Consultation'
    };
    if ($('#is_admin').length) {
        data = {
            contexte: 'modification',
            modal_title: 'Consultation / Modification'
        };
    }
    $.ajax({
        url: 'app/view/modalFormPersonne.php',
        type: 'POST',
        data: data
    })
        .done(function (html) {
            $('.modal.form .modal-dialog').html(html);
        })
        .fail(function () {
            bootstrapNotify("Une erreur s'est produite", 'danger')
        });

    $('.modal.form').modal('show');
});
