/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });

    $('.btn-makeMeal').click(function (e) {
        e.preventDefault();
        $.ajax({

            method: 'GET',
            url: '/charts',
            data: $('btn-makeMeal'),
            dataType: 'json',
            success: function (data) {
                    console.log(data);


            },
            error: function (reject) {
                if (reject.status === 422) {
                    var errors = $.parseJSON(reject.responseText);

                    $.each(errors, function (key, val) {
                        $("#" + key + "_error").text(val[0]);
                    });
                }

            }
        });


    });
   
    
});