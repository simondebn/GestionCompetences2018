GOOGLE_API_KEY_GEOCODING = 'AIzaSyC-9Og-UfQFd1Oh5a1lDGpHXp2hCFjRxuc';

function bootstrapNotify(msg, type) {
    $.notify({
        message: msg
    }, {
        //settings
        type: type,
        z_index: 2000,
        animate: {
            enter: 'animated fadeInDown',
            exit: 'animated fadeOutUp'
        },
        placement: {
            from: 'top',
            align: 'center'
        }
    });
}

$('body').on('click', '#connexion', function (e) {
    e.preventDefault();
    var params = {};
    $.each($('#formConnexion').serializeArray(), function (index, value) {
        params[value.name] = value.value;
    });

    $.ajax({
        url: "main",
        type: 'POST',
        data:
            {
                myFunction: 'checkConnexion',
                myParams: {
                    params: params
                }
            },
        success: function (data) {
            var msg = JSON.parse(data);
            if (msg.type == 'success') {
                window.location.href = "main";
            }
            else {
                bootstrapNotify(msg.msg, msg.type);
            }
        }
    });

});

var competence_autocomplete;
new autoComplete({
    selector: 'input#search',
    source: function(term, response){
        try { competence_autocomplete.abort(); } catch(e){}
        competence_autocomplete = $.ajax({
            url: 'main',
            type: 'POST',
            data:
                {
                    myFunction: 'autoCompleteCompetence',
                    search: term
                },
            success: function (data) {
                var json = $.parseJSON(data);
                response(json);
            }
        });
    }
});

$('body').on('submit', '#form_search, #formPersonne', function (e) {
    e.preventDefault();
});

$('body').on('click', '#deconnexion', function (e) {
    $.ajax({
        url: "home",
        type: 'POST',
        data:
            {
                myFunction: 'deconnexion'
            },
        success: function (data) {
            window.location.href = 'home';
        }
    });

});

$('body').on('submit', '#formAddPersonne', function(e) {
    // TODO gestion du formulaire à corriger : lorsqu'il y a une erreur (champ required non rempli) le formulaire ce vide !!
    e.preventDefault();

    var params = {};
    $.each($(this).serializeArray(), function(index, values) {
        params[values['name']] = values['value'];
    });

    $.ajax({
        url: 'personne',
        type: 'POST',
        data: {
            myFunction: 'addPersonne',
            myParams: {
                params: params
            }
        },
        success: function (data) {
            var msg = $.parseJSON(data);
            if (msg.type == 'success') {
                $('.modal.form').modal('hide');
                bootstrapNotify(msg.msg, msg.type);
            }
            else {
                bootstrapNotify(msg.msg, msg.type);
            }
        }
    });
});

$('body').on('click', '#deletePersonne', function(e) {
    var confirm_message = "Êtes-vous sûr de vouloir supprimer le profil ? Vous allez perdre vos accès à la plateforme.";
    if ($('#is_admin').length) {
        confirm_message = "Êtes-vous sûr de vouloir supprimer le profil ? L\'utilisateur perdra ses accès à la plateforme.";
    }
    var response = confirm(confirm_message);
    if (response) {
        $.ajax({
            url: 'personne',
            type: 'POST',
            data: {
                myFunction: 'deletePersonne',
                id: $(this).data('id')
            },
            success: function (data) {
                var msg = $.parseJSON(data);
                if (msg.type == 'success') {
                    $('.modal.form').modal('hide');
                    bootstrapNotify(msg.msg, msg.type);
                }
                else {
                    bootstrapNotify(msg.msg, msg.type);
                }
            }
        });
    }
});

$('body').on('submit', '#formModifyPersonne', function(e) {
    e.preventDefault();

    var params = {};
    $.each($(this).serializeArray(), function(index, values) {
        params[values['name']] = values['value'];
    });
    params['description_projets'] = $('#description_projets')[0]['value'];
    params['competences'] = [];

    $.each($('#badge_competences').children(), function(index, item) {
        params['competences'].push($(item)[0]['childNodes'][0]['textContent']);
    });

    var myFunction = 'modifyPersonneNewPassword';

    if (params['password'] == '') {
        myFunction = 'modifyPersonneKeepPassword';
    }

    $.ajax({
        url: 'personne',
        type: 'POST',
        data: {
            myFunction: myFunction,
            myParams: {
                params: params
            }
        },
        success: function (data) {
            var msg = $.parseJSON(data);
            if (msg.type == 'success') {
                $('.modal.form').modal('hide');
                bootstrapNotify(msg.msg, msg.type);
            }
            else {
                bootstrapNotify(msg.msg, msg.type);
            }
        }
    });
});

$('body').on('click', 'a', function(e) {
    e.preventDefault();
});

$('body').on('click', '#addCompetenceForm', function(e) {
    var nom_competence = $('input#competences')[0]['value'];
    $('#badge_competences').append('<a href="#" class="badge badge-cefim">'+ nom_competence +' <span class="remove_badge">X</span></a>');
    $('input#competences')[0]['value'] = '';
});

/***********Scripts Listes***************/
var options = {
  valueNames: [ 'nom', 'prenom' ]
};

var userList = new List('users', options);
/*********************************/