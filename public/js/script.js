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

new autoComplete({
    selector: 'input#search',
    source: function(term, response){
        $.ajax({
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

$('body').on('submit', '#form_search', function (e) {
    e.preventDefault();
});
