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

function Rechercher(pChaine) {

    if(pChaine !== "") {
        window.location.href = 'recherche-' + pChaine;
    } // TODO gestion des espaces
}

let competence_autocomplete;
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
                let json = $.parseJSON(data);
                response(json);
            }
        });
    }
});

$('body').on('click', '#connexion', function (e) {
    //e.preventDefault();
    let params = {};

    params['email'] = $("#email")[0].value;
    params['password'] = $("#password")[0].value;

    $.ajax({
        url: "connexion",
        type: 'POST',
        data:
            {
                myFunction: 'checkConnexion',
                myParams: {
                    params: params
                }
            },
        success: function (data) {
            let msg = JSON.parse(data);
            if (msg.type == 'success') {
                window.location.href = "main";
            }
            else {
                bootstrapNotify(msg.msg, msg.type);
                $('#password').addClass('is-invalid');
                $('#email').addClass('is-invalid');
            }
        }
    });
});

$('body').on('change', '#password, #email', function(e) {
   if ($(this).hasClass('is-invalid')) {
       $('#password').removeClass('is-invalid');
       $('#email').removeClass('is-invalid');
   }
});

$('body').on('submit', '#form_search', function (e) {
    e.preventDefault();
    let chaine = $("#search")[0].value.toLowerCase();
    Rechercher(chaine);
});

$('body').on('click', '.bagde-list-cefim', function (e) {
    e.preventDefault();
    let chaine = $(this).text().toLowerCase();
    Rechercher(chaine);
});

$('body').on('click', '#search_button', function (e) {
    e.preventDefault();
    let chaine = $("#search")[0].value.toLowerCase();
    Rechercher(chaine);
});

$('body').on('click', '#deconnexion', function (e) {
    $.ajax({
        url: "connexion",
        type: 'POST',
        data:
            {
                myFunction: 'deconnexion'
            },
        success: function (data) {
            window.location.href = 'accueil';
        }
    });
});

$('body').on('click', '#deleteSkill', function(){
    let competence = $(this).parent().siblings('.competence').children('a')[0]['outerHTML'];
    $.ajax({url: 'competences',
        type: 'POST',
        data: {
            myFunction: 'deleteCompetence',
            id: $(this).data('id')
        },
        success: function (data) {
            let msg = $.parseJSON(data);
            if (msg.type == 'success') {
                bootstrapNotify(msg.msg, msg.type);
                compList.remove('competence',competence);
            }
            else {
                bootstrapNotify(msg.msg, msg.type);
            }
        }
    });
});

$('body').on('click', '#newPasswordPersonne', function(e) {
    let email = $("#email")[0].value;

    $.ajax({
        url: 'mail',
        type: 'POST',
        data: {
            myFunction: "resetPassword",
            myParams: email,
        },
        success: function (data) {
            let msg = $.parseJSON(data);
            if (msg.type == 'success') {
                bootstrapNotify(msg.msg, msg.type);
            }
            else {
                bootstrapNotify(msg.msg, msg.type);
            }
        }
    });
});

$('body').on('click', '#deletePersonne', function(e) {
    let confirm_message = "Êtes-vous sûr de vouloir supprimer le profil ? Vous allez perdre vos accès à la plateforme.";
    if ($('#is_admin').length) {
        confirm_message = "Êtes-vous sûr de vouloir supprimer le profil ? L\'utilisateur perdra ses accès à la plateforme.";
    }
    let response = confirm(confirm_message);
    if (response) {
        $.ajax({
            url: 'personne',
            type: 'POST',
            data: {
                myFunction: 'deletePersonne',
                id: $(this).data('id')
            },
            success: function (data) {
                let msg = $.parseJSON(data);
                if (msg.type == 'success') {
                    $('.modal.form').modal('hide');
                    bootstrapNotify(msg.msg, msg.type);
                    location.reload();
                }
                else {
                    bootstrapNotify(msg.msg, msg.type);
                }
            }
        });
    }
});

$('body').on('submit', '#formAddPersonne', function(e) {
    e.preventDefault();

    let params = {};
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
            let msg = $.parseJSON(data);
            if (msg.type === 'success') {
                $('.modal.form').modal('hide');
                bootstrapNotify(msg.msg, msg.type);
                userList.add({
                    nom: params['nom'],
                    prenom: params['prenom']
                });
                userList.sort('nom', {order: 'asc'});
                modifyPaginationClasses();
                $.each($('.nom'), function(index, values) {
                    if ($(values).html() == params['nom'] && $($(values).next()).html() == params['prenom']) {
                        $($(values).next().next()).html('');
                        $($(values).parent()).data('id',msg['data-id']);
                    }
                });
            }
            else {
                bootstrapNotify(msg.msg, msg.type);
            }
        }
    });
});

$('body').on('submit', '#formModifyPersonne', function(e) {
    e.preventDefault();

    let params = {};
    $.each($(this).serializeArray(), function(index, values) {
        params[values['name']] = values['value'];
    });
    params['description_projets'] = $('#description_projets')[0]['value'];
    params['competences'] = [];

    $.each($('#badge_competences').children(), function(index, item) {
        params['competences'].push($(item)[0]['childNodes'][0]['textContent']);
    });

    let myFunction = 'modifyPersonneNewPassword';

    if (! $('#password').length) {
        myFunction = 'modifyPersonneKeepPassword';
    }

    let ville_is_valide = false;
    $.each(data_google_matches_current_ville['results'], function(index, values) {
        if (values['formatted_address'] === params['ville_entreprise']) {
            let is_city_or_less = false;
            $.each(values['address_components'], function(indice, item) {
                if (item['types'].indexOf('locality') !== -1) {
                    is_city_or_less = true;
                    params['lat_entreprise'] = values['geometry']['location']['lat'];
                    params['lon_entreprise'] = values['geometry']['location']['lng'];
                }
            });
            if (is_city_or_less) {
                ville_is_valide = true;
            }
        }
    });
    if (params['ville_entreprise'].trim() === '' || Object.keys(data_google_matches_current_ville).length === 0) {
        ville_is_valide = true;
    }

    let form_is_valide = true;

    if (myFunction === 'modifyPersonneNewPassword') {
        if (params['password'] !== params['password_verif']) {
            form_is_valide = false;
            $('#password_verif').addClass('is-invalid');
        }
    }
    if ( ! ville_is_valide) {
        form_is_valide = false;
        $('#ville_entreprise').addClass('is-invalid');
    }

    if (form_is_valide) {
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
                let msg = $.parseJSON(data);
                if (msg.type === 'success') {
                    $('.modal.form').modal('hide');
                    bootstrapNotify(msg.msg, msg.type);
                    location.reload();
                }
                else {
                    bootstrapNotify(msg.msg, msg.type);
                }
            }
        });
    }
});

$('body').on('click', 'a', function(e) {
    if($(this).attr('href') == null || $(this).attr('href') === '#'){
        e.preventDefault();
    }
});

$('body').on('click', '#addCompetenceForm', function(e) {
    let nom_competence = $('input#competences')[0]['value'].trim();
    if (nom_competence.length) {
        let comp_deja_dans_liste = false;
        $.each($('#badge_competences a'), function (index, item) {
            if ($(item)[0]['childNodes'][0]['data'].trim() === nom_competence) {
                comp_deja_dans_liste = true;
            }
        });
        if ( ! comp_deja_dans_liste) {
            $('#badge_competences').append('<a href="#" class="badge badge-cefim">'+ nom_competence +' <span class="remove_badge">X</span></a>');
            $('input#competences')[0]['value'] = '';
        } else {
            // TODO erreur formulaire compétence déjà dans la liste
            //console.log('compétence déjà dans la liste');
        }
    }
});

$('body').on('focusout', '#password_verif', function(e) {
    if ($('#password')[0]['value'] !== $('#password_verif')[0]['value']) {
        $('#password_verif').addClass('is-invalid');
    } else {
        $('#password_verif').removeClass('is-invalid').addClass('is-valid');
        $('#password').addClass('is-valid');
    }
});

$('body').on('focusout', '#password_page_reset2', function(e) {
    if ($('#password_page_reset')[0]['value'] !== $('#password_page_reset2')[0]['value']) {
        $('#password_page_reset2').addClass('is-invalid');
    } else {
        $('#password_page_reset2').removeClass('is-invalid').addClass('is-valid');
        $('#password_page_reset').addClass('is-valid');
    }
});

/***********Scripts Listes***************/

/**
* Ajoute les classes de MDBootstrap aux éléments de la pagination générée par List.js
*/
function modifyPaginationClasses() {
   $('.pagination li').addClass('page-item');
   $('.pagination a').addClass('page-link');
   $('.page-item:not(.active) a').css('color', 'black');
}
$(document).ready(function () {
   modifyPaginationClasses();
});
$('nav').on('click', function () {
   modifyPaginationClasses();
});
$('input').on('change paste keyup', function () {
   modifyPaginationClasses();
});
$('body').on('click', 'th', function () {
   modifyPaginationClasses();
});

/** Liste Users **/

let user_options = {
    valueNames: [ 'nom', 'prenom' ],
    page: 15,
    pagination: [{
        innerWindow: 1,
        outerWindow: 1
    }]
},

userList = new List('users', user_options);
if (userList.items.length) {
    userList.sort('nom', {order: 'asc'});
}
/** Liste compétences **/

let comp_options = {
    valueNames: ['competence', 'children'],
    page: 15,
    pagination: [{
            innerWindow: 1,
            outerWindow: 1
        }]
};

let compList = new List('comp', comp_options);


/*********************************/
// GESTION RESET PASSWORD
/*********************************/

$(document).ready(function() {

    $("#reinitialiser").hide();
    $("#passwordForm").hide();

});

function HideResetPasswordForm(){
    $("#connexion").show();
    $("#connexion").removeAttr("disabled");
    $("#reinitialiser").hide();
    $("#reinitialiser").attr("disabled", true);
    $("#passwordForm").hide();
    $("#email").removeAttr("disabled");
    $("#password").removeAttr("disabled");
}

$("body").on("click", "#resetPassword", function(){

    if($("#connexion").is(":visible")){

        $("#connexion").hide();
        $("#connexion").attr("disabled", true);
        $("#reinitialiser").show();
        $("#reinitialiser").removeAttr("disabled");
        $("#passwordForm").show();
        $("#email").attr("disabled", true);
        $("#password").attr("disabled", true);
    }
    else{
        HideResetPasswordForm();
    }


});

$("body").on("submit", "#formConnexion", function(e){

    if($("#connexion").is(":visible")){
        e.preventDefault();
    }
});

$("body").on("click", "#reinitialiser", function(e){

    e.preventDefault();

    let email = $("#email_reset_password")[0].value;

    $.ajax({
        url: 'mail',
        type: 'POST',
        data: {
            myFunction: "resetPassword",
            myParams: email,
        },
        success: function (data) {
            let msg = $.parseJSON(data);
            if (msg.type === 'success') {
                bootstrapNotify(msg.msg, msg.type);
                HideResetPasswordForm();
                $("#password").val("");
                $("#email").val(email);
            }
            else {
                bootstrapNotify(msg.msg, msg.type);
            }
        }
    });

});

$('body').on("submit", "#formResetPassword", function(e){
    e.preventDefault();

    let params = {};

    params["password"] = $("#password_page_reset")[0].value;
    params["password2"] = $("#password_page_reset2")[0].value;
    params["email"] = $("#email_page_reset")[0].value;

    $.ajax({
        url: 'reset',
        type: 'POST',
        data: {
            myFunction: "resetPassword",
            myParams: params,
        },
        success: function (data) {
            let msg = $.parseJSON(data);
            if (msg.type === 'success') {
                bootstrapNotify(msg.msg, msg.type);
                window.location.href = "main";
            }
            else {
                bootstrapNotify(msg.msg, msg.type);
            }
        }
    });
});
