GOOGLE_API_KEY_GEOCODING = 'AIzaSyC-9Og-UfQFd1Oh5a1lDGpHXp2hCFjRxuc';

$('body').on('click', '#connexion', function (e) {
    e.preventDefault();
    var params = {};
    $.each($('#formConnexion').serializeArray(), function (index, value) {
        params[value.name] = value.value;
    });

    console.log(params);
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
            console.log(data);
            var msg = JSON.parse(data);
            console.log(msg);
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
                console.log(data);
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

/***********Scripts Listes***************/
var options = {
  valueNames: [ 'nom', 'prenom' ]
};

var userList = new List('users', options);
/*********************************/