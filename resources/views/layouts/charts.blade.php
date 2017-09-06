@extends('master')
@include('partials._head')

@section('content')
<!--{!! Charts::assets() !!}
{!! $lava->render() !!}    -->









//<?php
//$yourInt = 10;
//$remainder = $yourInt % 3;
//$third = floor($yourInt / 3);
//$lastBit = $third + $remainder;
//
//$sessionCaloriesPerWeek = Session::get('result');
//$weeks = sizeof($sessionCaloriesPerWeek);
//for ($i = 1; $i <= $weeks; $i++) {
//    $days = $makeMeals->{"week_no_" . $i};
//    $day1 = $days->day_1;
//    $day2 = $days->day_2;
//    $day3 = $days->day_3;
//    $day4 = $days->day_4;
//    $day5 = $days->day_5;
//    $day6 = $days->day_6;
//    $day7 = $days->day_7;
//    $breakfastDay1 = $day1->breakfast;
//    if (isset($day1->lunch, $day2->lunch, $day3->lunch, $day4->lunch, $day5->lunch
//                    , $day6->lunch, $day7->lunch, $day1->dinner, $day2->dinner, $day3->dinner, $day4->dinner, $day5->dinner, $day6->dinner, $day7->dinner)) {
//        $lunchDay1 = $day1->lunch;
//        $lunchDay2 = $day2->lunch;
//        $lunchDay3 = $day3->lunch;
//        $lunchDay4 = $day4->lunch;
//        $lunchDay5 = $day5->lunch;
//        $lunchDay6 = $day6->lunch;
//        $lunchDay7 = $day7->lunch;
//        
//        $dinnerDay1 = $day1->dinner;
//        $dinnerDay2 = $day2->dinner;
//        $dinnerDay3 = $day3->dinner;
//        $dinnerDay4 = $day4->dinner;
//        $dinnerDay5 = $day5->dinner;
//        $dinnerDay6 = $day6->dinner;
//        $dinnerDay7 = $day7->dinner;
//    } else {
//        $lunchDay1 = [];
//        $lunchDay2 = [];
//        $lunchDay3 = [];
//        $lunchDay4 = [];
//        $lunchDay5 = [];
//        $lunchDay6 = [];
//        $lunchDay7 = [];
//        $dinnerDay1 = [];
//        $dinnerDay2 = [];
//        $dinnerDay3 = [];
//        $dinnerDay4 = [];
//        $dinnerDay5 = [];
//        $dinnerDay6 = [];
//        $dinnerDay7 = [];
//    }
//    $breakfastDay2 = $day2->breakfast;
//    $breakfastDay3 = $day3->breakfast;
//    $breakfastDay4 = $day4->breakfast;
//    $breakfastDay5 = $day5->breakfast;
//    $breakfastDay6 = $day6->breakfast;
//    $breakfastDay7 = $day7->breakfast;
//    echo "<div class='container-fluid container-border-table'>";
//    echo "<div class='row column-color2'>";
//    echo"<div><span class='col-md-12 strong-word '>week_no_$i</span>";
//    echo "<br>";
//    echo "<div class='col-md-2 '><span class='strong-word'>day-1</span>";
//    echo "<div class='breakfast-div'><span class='strong-word'>Breakfast</span>";
//    foreach ($breakfastDay1 as $food) {
//        echo "<div class='food-style'>$food</div>";
//    }
//    echo '</div>';
//    echo "<div class='lunch-div'><span class='strong-word'>Lunch</span>";
//    foreach ($lunchDay1 as $food) {
//        echo "<div class='food-style'>$food</div>";
//    }
//    echo '</div>';
//    echo "<div class='dinner-div'><span class='strong-word'>Dinner</span>";
//    foreach ($dinnerDay1 as $food) {
//        echo "<div class='food-style'>$food</div>";
//    }
//    echo '</div>';
//    echo "</div>";
//    echo "<div class='col-md-2 '><span class='strong-word'>day-2</span>";
//    echo "<div class='breakfast-div'><span class='strong-word'>Breakfast</span>";
//    foreach ($breakfastDay2 as $food) {
//        echo "<div class='food-style'>$food</div>";
//    }
//    echo '</div>';
//    echo "<div class='lunch-div'><span class='strong-word'>Lunch</span>";
//    foreach ($lunchDay2 as $food) {
//        echo "<div class='food-style'>$food</div>";
//    }
//    echo '</div>';
//    echo "<div class='dinner-div'><span class='strong-word'>Dinner</span>";
//    foreach ($dinnerDay2 as $food) {
//        echo "<div class='food-style'>$food</div>";
//    }
//    echo '</div>';
//    echo "</div>";
//    echo "<div class='col-md-2'><span class='strong-word'>day-3</span>";
//    echo "<div class='breakfast-div'><span class='strong-word'>Breakfast</span>";
//    foreach ($breakfastDay3 as $food) {
//        echo "<div class='food-style'>$food</div>";
//    }
//    echo '</div>';
//    echo "<div class='lunch-div'><span class='strong-word'>Lunch</span>";
//    foreach ($lunchDay3 as $food) {
//        echo "<div class='food-style'>$food</div>";
//    }
//    echo '</div>';
//    echo "<div class='dinner-div'><span class='strong-word'>Dinner</span>";
//    foreach ($dinnerDay3 as $food) {
//        echo "<div class='food-style'>$food</div>";
//    }
//    echo '</div>';
//    echo "</div>";
//    echo "<div class='col-md-2'><span class='strong-word'>day-4</span>";
//    echo "<div class='breakfast-div'><span class='strong-word'>Breakfast</span>";
//    foreach ($breakfastDay4 as $food) {
//        echo "<div class='food-style'>$food</div>";
//    }
//    echo '</div>';
//    echo "<div class='lunch-div'><span class='strong-word'>Lunch</span>";
//    foreach ($lunchDay4 as $food) {
//        echo "<div class='food-style'>$food</div>";
//    }
//    echo '</div>';
//    echo "<div class='dinner-div'><span class='strong-word'>Dinner</span>";
//    foreach ($dinnerDay4 as $food) {
//        echo "<div class='food-style'>$food</div>";
//    }
//    echo '</div>';
//    echo "</div>";
//    echo "<div class='col-md-2'><span class='strong-word'>day-5</span>";
//    echo "<div class='breakfast-div'><span class='strong-word'>Breakfast</span>";
//    foreach ($breakfastDay5 as $food) {
//        echo "<div class='food-style'>$food</div>";
//    }
//    echo '</div>';
//    echo "<div class='lunch-div'><span class='strong-word'>Lunch</span>";
//    foreach ($lunchDay5 as $food) {
//        echo "<div class='food-style'>$food</div>";
//    }
//    echo '</div>';
//    echo "<div class='dinner-div'><span class='strong-word'>Dinner</span>";
//    foreach ($dinnerDay5 as $food) {
//        echo "<div class='food-style'>$food</div>";
//    }
//    echo '</div>';
//    echo "</div>";
//    echo "<div class='col-md-1'><span class='strong-word'>day-6</span>";
//    echo "<div class='breakfast-div'><span class='strong-word'>Breakfast</span>";
//    foreach ($breakfastDay6 as $food) {
//        echo "<div class='food-style'>$food</div>";
//    }
//    echo '</div>';
//    echo "<div class='lunch-div'><span class='strong-word'>Lunch</span>";
//    foreach ($lunchDay6 as $food) {
//        echo "<div class='food-style'>$food</div>";
//    }
//    echo '</div>';
//    echo "<div class='dinner-div'><span class='strong-word'>Dinner</span>";
//    foreach ($dinnerDay6 as $food) {
//        echo "<div class='food-style'>$food</div>";
//    }
//    echo '</div>';
//    echo "</div>";
//    echo "<div class='col-md-1'><span class='strong-word'>day-7</span>";
//    echo "<div class='breakfast-div'><span class='strong-word'>Breakfast</span>";
//    foreach ($breakfastDay7 as $food) {
//        echo "<div class='food-style'>$food</div>";
//    }
//    echo '</div>';
//    echo "<div class='lunch-div'><span class='strong-word'>Lunch</span>";
//    foreach ($lunchDay7 as $food) {
//        echo "<div class='food-style'>$food</div>";
//    }
//    echo '</div>';
//    echo "<div class='dinner-div'><span class='strong-word'>Dinner</span>";
//    foreach ($dinnerDay7 as $food) {
//        echo "<div class='food-style'>$food</div>";
//    }
//    echo '</div>';
//    echo "</div>";
//
//    echo "</div>";
//    echo "</div>";
//    echo "</div>";
//}
//
?>
<?php
//dump($makeMeals);
echo '<script> var json = ' . json_encode($makeMeals) . '</script>';
?>
<div class="calendar-dark"></div>


</div>
<!--<div class="containe container-meals">
    <div class="dropdown">
        <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
            Breakfast
            <span class="caret"></span>
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
            <div class="breakfast-div-meal">
                Something
            </div>

        </ul>
    </div>
</div>-->
<div class="containe container-meals">
    <div class="row-fluid">
        <div id="brk">Breakfast
            <div class="col-md-12">
                <br>
                <div class="col-md-6" >Food</div>
                <div class="col-md-6"  >Calories</div>
            </div>
            <div class="breakfast-result-div">

            </div>

        </div>
        <div id="lnc">Lunch
                        <div class="col-md-12">
                <br>
                <div class="col-md-6" >Food</div>
                <div class="col-md-6"  >Calories</div>
            </div>
            <div class="breakfast-result-div">

            </div>

        </div>
            <div class="lunch-result-div">
            </div>

        </div>
        <div id="dnr">Dinner
                        <div class="col-md-12">
                <br>
                <div class="col-md-6" >Food</div>
                <div class="col-md-6"  >Calories</div>
            </div>
            <div class="breakfast-result-div">

            </div>

        </div>
            <div class="dinner-result-div">
            </div>

        </div>
    </div>
</div>
@section('scripts')
<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>

<script type="text/javascript" src="{{ URL::asset('js/moment.js') }}"></script>

<script src="./pg-calendar/dist/js/pignose.calendar.js"></script>

<script type="text/javascript" src="{{ URL::asset('js/modals.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/getMeals.js') }}"></script>

<script>

$('.calendar-dark').pignoseCalendar({
    theme: 'dark', // light, dark
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

    miniReport(dateToQuery);



}

function miniReport(dateToQuery) {
    var dateSelected = dateToQuery;


    $.each(json[dateSelected], function (value) {
        if (value == 'breakfast') {
            $("#brk").show();

            $.each(json[dateSelected].breakfast, function (index, value) {
                $(".breakfast-result-div").empty();


                $.ajax({
                    type: "GET",
                    url: "/charts",
                    dataType: "json",
                    success: function (data) {

                        $(".breakfast-result-div").show();
                        $(".breakfast-result-div").append('<div class="col-md-6"><div>' + index + '</div></div>');

                        $(".breakfast-result-div").append('<div class="col-md-6">' + value + '</div>');

                    },
                    error: function () {
                        alert("error");
                    }
                });
                console.log(index);

                console.log(value);


            });

        } else if (value == 'lunch') {
            $("#lnc").show();

            $.each(json[dateSelected].lunch, function (index, value) {
                $(".lunch-result-div").empty();


                $.ajax({
                    type: "GET",
                    url: "/charts",
                    dataType: "json",
                    success: function (data) {

                        $(".lunch-result-div").show();

                        $(".lunch-result-div").append('<div class="col-md-6">' + index + '</div>');

                        $(".lunch-result-div").append('<div class="col-md-6">' + value + '</div>');
                    },
                    error: function () {
                        alert("error");
                    }
                });
                console.log(index);

                console.log(value);


            });

        } else if (value == 'dinner') {
            $("#dnr").show();

            $.each(json[dateSelected].lunch, function (index, value) {
                $(".dinner-result-div").empty();


                $.ajax({
                    type: "GET",
                    url: "/charts",
                    dataType: "json",
                    success: function (data) {

                        $(".dinner-result-div").show();

                        $(".dinner-result-div").append('<div class="col-md-6">' + index + '</div>');

                        $(".dinner-result-div").append('<div class="col-md-6">' + value + '</div>');


                    },
                    error: function () {
                        alert("error");
                    }
                });
                console.log(index);

                console.log(value);


            });

        }
//    console.log(value);
    });
//    console.log(json[dateSelected].breakfast);
}


</script>
<script src="js/pignose.calendar.me.js"></script>


@endsection                      





@endsection
