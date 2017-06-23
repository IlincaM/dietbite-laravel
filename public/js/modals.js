$(document).ready(function () {
    console.log("ready!");
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });

    $('form').on('submit', function (e) {
        e.preventDefault();
        $.ajax({

            method: 'POST',
            url: '/calculate',
            data: $('form').serialize(),
            dataType: 'json',
            success: function (data) {
                console.log(data);

            },
            error: function (data) {
                if (data.status === 422) {
                    //process validation errors here.
                    var errors = data.responseJSON; //this will get the errors response data.
                    //show them somewhere in the markup
                    //e.g
                    for (datos in errors) {
                        console.log(data.responseJSON[datos]);
                        errors += data.responseJSON[datos] + '<br>';

                    }
                    $('#response').show().html(errors);
                }
            }
        });


    });

});

