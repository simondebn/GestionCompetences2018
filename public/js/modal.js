let data_google_matches_current_ville = {};

function addAutoComplete() {
    data_google_matches_current_ville = {};
    let ville_autocomplete;
    new autoComplete({
        selector: 'input#ville_entreprise',
        source: function(term, response){
            try { ville_autocomplete.abort(); } catch(e){}
            ville_autocomplete = $.ajax({
                url: 'https://maps.googleapis.com/maps/api/geocode/json?key='+ GOOGLE_API_KEY_GEOCODING +'&region=fr&address=' + term,
                type: 'POST',
                success: function (data) {
                    data_google_matches_current_ville = data;
                    let matches = [];
                    $.each(data['results'], function(index, values) {
                        matches.push(values['formatted_address']);
                    });
                    response(matches);
                }
            });
        }
    });
    let competence_autocomplete_form;
    new autoComplete({
        selector: 'input#competences',
        source: function(term, response){
            try { competence_autocomplete_form.abort(); } catch(e){}
            competence_autocomplete_form = $.ajax({
                url: 'main',
                type: 'POST',
                data:
                    {
                        myFunction: 'autoCompleteCompetence',
                        search: term
                    },
                success: function (data) {
                    let json = $.parseJSON(data);
                    response(json);
                }
            });
        }
    });
}

function displayModalPersonne(json) {
    $.ajax({
        url: 'app/view/modalFormPersonne.php',
        type: 'POST',
        data: json
    })
        .done(function (html) {
            $('.modal.form .modal-dialog').html(html);
            addAutoComplete();
        })
        .fail(function () {
            bootstrapNotify("Une erreur s'est produite", 'danger')
        });

    $('.modal.form').modal('show');
}

$('body').on('click', '#addPersonne', function () {
    let json = {
        contexte: 'creation',
        modal_title: 'Création d\'un nouvel utilisateur'
    };
    displayModalPersonne(json);
});

$('body').on('click', '#modifyPersonne', function () {
    $.ajax({
        url: 'main',
        type: 'POST',
        data: {
            myFunction: 'modalModifyPersonne',
            user_id: ''
        },
        success: function(data) {
            let json = {
                contexte: 'modification',
                modal_title: 'Modification du profil',
                user_values: $.parseJSON(data),
                prevent_delete: 0
            };
            if ($('#is_admin').length) {
                json['prevent_delete'] = 1;
            }
            displayModalPersonne(json);
        }
    });
});

$('body').on('click', '#users tr', function (e) {
    if (e.target.className != 'badge badge-cefim bagde-list-cefim') {
        $.ajax({
            url: 'main',
            type: 'POST',
            data: {
                myFunction: 'modalModifyPersonne',
                user_id: $(this).data('id')
            },
            success: function(data) {
                let json = {
                    contexte: 'consultation',
                    modal_title: 'Consultation',
                    prevent_delete: 0
                };
                if ($('#is_admin').length) {
                    json = {
                        contexte: 'modification_sans_mdp',
                        modal_title: 'Consultation / Modification',
                        prevent_delete: 0
                    };
                }
                json['user_values'] = $.parseJSON(data);
                displayModalPersonne(json);
            }
        });
    }
});

$('body').on('click', '.badge', function (e) {
    if (e.target.className === 'remove_badge') {
        e.preventDefault();
        $(this).remove();
    }
});

if ($('#open_modal').length) {
    $(this).remove();
    $.ajax({
        url: 'main',
        type: 'POST',
        data: {
            myFunction: 'modalModifyPersonne',
            user_id: ''
        },
        success: function(data) {
            let json = {
                contexte: 'first_connexion',
                modal_title: 'Première Connexion',
                user_values: $.parseJSON(data),
                prevent_delete: 0
            };
            if ($('#is_admin').length) {
                json['prevent_delete'] = 1;
            }
            displayModalPersonne(json);
        }
    });
}