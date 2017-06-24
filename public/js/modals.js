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
                var result = data.bmr_result + ' kcal';
                $(".bmr-result-div").show("slow");
                $("#bmr_result").text(result);
                $(".use_this_result").click(function () {
                     $("#cal_input").attr("value", data.bmr_result).val(data.bmr_result);


                });
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

