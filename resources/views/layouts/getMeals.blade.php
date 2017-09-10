@extends('master')
@include('partials._head')
@section('content')
<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>

<script type="text/javascript" src="{{ URL::asset('js/moment.js') }}"></script>

<script src="./pg-calendar/dist/js/pignose.calendar.js"></script>

<script type="text/javascript" src="{{ URL::asset('js/modals.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/getMeals.js') }}"></script>


<?php

echo '<script> var json = ' . json_encode($makeMeals) . '</script>';
?>
<div class="container container-plan">
<p>Your diet plan starts on <span class="firstDay"></span> and ends on <span class="lastDay"></span> </p>
</div>
<div class="calendar-dark"></div>


</div>

<div class="getMealsTable"> 
<div class="container container-meals container-meals-breakfast">
    <div class="row">
        <div id="brk">
            <div class="brk-div">
                <a class="btn-xs-style" href="#"><i class="fa fa-plus"></i>Breakfast</a>
            </div>
            <div>
                <div class="col-md-12 container-break">
                    <div class="col-md-10 col-food" >Food</div>
                    <div class="col-md-2 col-calories">Calories</div>
                </div>
                <div class="breakfast-result-div ">

                </div>
            </div>
        </div>
    </div>
</div>
<div class="container container-meals-lunch">
    <div class="row">
        <div id="lnc">
            <div class="lnc-div">
                <a class="btn-xs-style-lunch" href="#"><i class="fa fa-plus"></i>
                    Lunch</a>

            </div>
            <div class="container col-md-12 container-lunch">

                <div class="col-md-10 col-food" >Food</div>
                <div class="col-md-2 col-calories">Calories</div>
            </div>
            <div class="lunch-result-div">

            </div>
        </div>

    </div>
</div>
<div class="container container-meals container-meals-dinner">
    <div class="row">
        <div id="dnr">
            <div class="dnr-div">
                <a class="btn-xs-style-dinner" href="#"><i class="fa fa-plus"></i>Dinner</a>
            </div>
            <div>
                <div class="col-md-12 container-dinner">
                    <div class="col-md-10 col-food" >Food</div>
                    <div class="col-md-2 col-calories">Calories</div>
                </div>
                <div class="dinner-result-div ">

                </div>
            </div>
        </div>
    </div>
</div>
<div class="container container-meals container-meals-snack">
    <div class="row">
        <div id="snk">
            <div class="snk-div">
                <a class="btn-xs-style-snack" href="#" ><i class="fa fa-plus"></i>Snack 1</a>
            </div>
            <div>
                <div class="col-md-12 container-snack">
                    <div class="col-md-10 col-food" >Food</div>
                    <div class="col-md-2 col-calories">Calories</div>
                </div>
                <div class="snack-result-div ">

                </div>
            </div>
        </div>
    </div>
</div>
</div>

@section('scripts')



<script>

$('.calendar-dark').pignoseCalendar({
    theme: 'light', // light, dark
    select: onClickHandler
});
function onClickHandler(date, obj) {
        
    /**
     * @date is an array which be included dates(clicked date at first index)
     * @obj is an object which stored calendar interal data.
     * @obj.calendar is an element reference.
     * @obj.storage.activeDates is all toggled data, If you use toggle type calendar.
     */
    var $calendar = obj.calendar;
    var $box = $calendar.parent().siblings('.box').show();
    var text = 'You choose date ';

    if (date[0] !== null) {
        text += date[0].format('YYYY-MM-DD');

    }

    if (date[0] !== null && date[1] !== null) {
        text += ' ~ ';
    } else if (date[0] === null && date[1] == null) {
        text += 'nothing';
    }

    if (date[1] !== null) {
        text += date[1].format('YYYY-MM-DD');
    }

    $box.text(text);
    var dateToQuery = date[0].format('YYYY-MM-DD');

     getMeals(dateToQuery);


};
function getMeals(dateToQuery) {
    
    var dateSelected = dateToQuery;


    $.each(json[dateSelected], function (value) {
        if (value == 'breakfast') {


            $("#brk").show();
            $(".brk-div").show();
            $(".container-meals-breakfast").show();

            $.each(json[dateSelected].breakfast, function (index, value) {

                $(".breakfast-result-div").empty();


                $.ajax({
                    type: "GET",
                    url: "/get-meals",
                    dataType: "json",
                    success: function (data) {

                        $(".breakfast-result-div").append('<div class="col-md-10 col-color col-text"><div>' + index + '</div></div>');

                        $(".breakfast-result-div").append('<div class="col-md-2 col-color col-value">' + value + '</div>');

                    },
                    error: function () {
                        alert("error");
                    }
                });
                

            });

        } else if (value == 'lunch') {

            $("#lnc").show();
            $(".lnc-div").show();
            $(".container-meals-lunch").show();


            $.each(json[dateSelected].lunch, function (index, value) {
                $(".lunch-result-div").empty();


                $.ajax({
                    type: "GET",
                    url: "/get-meals",
                    dataType: "json",
                    success: function (data) {


                        $(".lunch-result-div").append('<div class="col-md-10 col-color col-text">' + index + '</div>');

                        $(".lunch-result-div").append('<div class="col-md-2 col-color col-value">' + value + '</div>');
                    },
                    error: function () {
                        alert("error");
                    }
                });
               


            });

        } else if (value == 'dinner') {
            $("#dnr").show();
            $(".dnr-div").show();
            $(".container-meals-dinner").show();
            
            $.each(json[dateSelected].dinner, function (index, value) {
                $(".dinner-result-div").empty();


                $.ajax({
                    type: "GET",
                    url: "/get-meals",
                    dataType: "json",
                    success: function (data) {


                        $(".dinner-result-div").append('<div class="col-md-10 col-color col-text">' + index + '</div>');

                        $(".dinner-result-div").append('<div class="col-md-2 col-color col-value">' + value + '</div>');


                    },
                    error: function () {
                        alert("error");
                    }
                });
               

            });

        } else if(value == 'firstSnack'){
                        $("#snk").show();
            $(".snk-div").show();
            $(".container-meals-snack").show();
            
            $.each(json[dateSelected].firstSnack, function (index, value) {
                $(".snack-result-div").empty();


                $.ajax({
                    type: "GET",
                    url: "/get-meals",
                    dataType: "json",
                    success: function (data) {


                        $(".snack-result-div").append('<div class="col-md-10 col-color col-text">' + index + '</div>');

                        $(".snack-result-div").append('<div class="col-md-2 col-color col-value">' + value + '</div>');


                    },
                    error: function () {
                        alert("error");
                    }
                });
               

            });
        }
    });
}
 
</script>


@endsection                      





@endsection
