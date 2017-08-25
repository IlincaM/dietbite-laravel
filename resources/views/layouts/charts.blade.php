@extends('master')
@include('partials._head')

@section('content')
    
<?php
// dump($makeMeals);die();
$sessionCaloriesPerWeek = Session::get('result');
$weeks = sizeof($sessionCaloriesPerWeek);
for ($i = 1; $i <=$weeks; $i++) {
    $days = $makeMeals->{"week_no_" . $i};
    $day1 = $days->day_1;
    $day2 = $days->day_2;
    $day3 = $days->day_3;
    $day4 = $days->day_4;
    $day5 = $days->day_5;
    $day6 = $days->day_6;
    $day7 = $days->day_7;
    $breakfastDay1 = $day1->breakfast;
    if(isset($day1->lunch,$day2->lunch,$day3->lunch,$day4->lunch,$day5->lunch
            ,$day6->lunch,$day7->lunch,
            $day1->dinner,$day2->dinner,
            $day3->dinner,$day4->dinner,$day5->dinner,$day6->dinner,$day7->dinner))
            {
            $lunchDay1= $day1->lunch;
            $lunchDay2= $day2->lunch;
            $lunchDay3= $day3->lunch;
            $lunchDay4= $day4->lunch;
            $lunchDay5= $day5->lunch;
            $lunchDay6= $day6->lunch;
            $lunchDay7= $day7->lunch;
            $dinnerDay1= $day1->dinner;
            $dinnerDay2= $day2->dinner;
            $dinnerDay3= $day3->dinner;
            $dinnerDay4= $day4->dinner;
            $dinnerDay5= $day5->dinner;
            $dinnerDay6= $day6->dinner;
            $dinnerDay7= $day7->dinner;



    } else {
            $lunchDay1=[];
            $lunchDay2=[];
            $lunchDay3=[];
            $lunchDay4=[];
            $lunchDay5=[];
            $lunchDay6=[];
            $lunchDay7=[];
            $dinnerDay1=[];
            $dinnerDay2=[];
            $dinnerDay3=[];
            $dinnerDay4=[];
            $dinnerDay5=[];
            $dinnerDay6=[];
            $dinnerDay7=[];


    }
    $breakfastDay2 = $day2->breakfast;
    $breakfastDay3 = $day3->breakfast;
    $breakfastDay4 = $day4->breakfast;
    $breakfastDay5 = $day5->breakfast;
    $breakfastDay6 = $day6->breakfast;
    $breakfastDay7 = $day7->breakfast;
    echo "<div class='container-fluid container-border-table'>";
  echo "<div class='row column-color2'>";
    echo"<div><span class='col-md-12 strong-word '>week_no_$i</span>";
    echo "<br>";
        echo "<div class='col-md-2 '><span class='strong-word'>day-1</span>";
            echo "<div class='breakfast-div'><span class='strong-word'>Breakfast</span>";
                foreach ($breakfastDay1 as $food) {
                     echo "<div class='food-style'>$food</div>";
                }
            echo '</div>';
            echo "<div class='lunch-div'><span class='strong-word'>Lunch</span>";
                foreach ($lunchDay1 as $food) {
                     echo "<div class='food-style'>$food</div>";
                }
           echo '</div>';
            echo "<div class='dinner-div'><span class='strong-word'>Dinner</span>";
                foreach ($dinnerDay1 as $food) {
                     echo "<div class='food-style'>$food</div>";
                }
            echo '</div>';
        echo "</div>";
        echo "<div class='col-md-2 '><span class='strong-word'>day-2</span>";
            echo "<div class='breakfast-div'><span class='strong-word'>Breakfast</span>";
                foreach ($breakfastDay2 as $food) {
                     echo "<div class='food-style'>$food</div>";
                }
            echo '</div>';
            echo "<div class='lunch-div'><span class='strong-word'>Lunch</span>";
                foreach ($lunchDay2 as $food) {
                     echo "<div class='food-style'>$food</div>";
                }
           echo '</div>';
           echo "<div class='dinner-div'><span class='strong-word'>Dinner</span>";
                foreach ($dinnerDay2 as $food) {
                     echo "<div class='food-style'>$food</div>";
                }
           echo '</div>';
        echo "</div>";
        echo "<div class='col-md-2'><span class='strong-word'>day-3</span>";
            echo "<div class='breakfast-div'><span class='strong-word'>Breakfast</span>";
                foreach ($breakfastDay3 as $food) {
                     echo "<div class='food-style'>$food</div>";
                }
            echo '</div>';
            echo "<div class='lunch-div'><span class='strong-word'>Lunch</span>";
                foreach ($lunchDay3 as $food) {
                     echo "<div class='food-style'>$food</div>";
                }
           echo '</div>'; 
           echo "<div class='dinner-div'><span class='strong-word'>Dinner</span>";
                foreach ($dinnerDay3 as $food) {
                     echo "<div class='food-style'>$food</div>";
                }
           echo '</div>';
        echo "</div>";
        echo "<div class='col-md-2'><span class='strong-word'>day-4</span>";
            echo "<div class='breakfast-div'><span class='strong-word'>Breakfast</span>";
                foreach ($breakfastDay4 as $food) {
                     echo "<div class='food-style'>$food</div>";
                }
            echo '</div>';
            echo "<div class='lunch-div'><span class='strong-word'>Lunch</span>";
                foreach ($lunchDay4 as $food) {
                     echo "<div class='food-style'>$food</div>";
                }
           echo '</div>';
           echo "<div class='dinner-div'><span class='strong-word'>Dinner</span>";
                foreach ($dinnerDay4 as $food) {
                     echo "<div class='food-style'>$food</div>";
                }
           echo '</div>';           
        echo "</div>";
        echo "<div class='col-md-2'><span class='strong-word'>day-5</span>";
            echo "<div class='breakfast-div'><span class='strong-word'>Breakfast</span>";
                foreach ($breakfastDay5 as $food) {
                     echo "<div class='food-style'>$food</div>";
                }
            echo '</div>';
            echo "<div class='lunch-div'><span class='strong-word'>Lunch</span>";
                foreach ($lunchDay5 as $food) {
                     echo "<div class='food-style'>$food</div>";
                }
           echo '</div>';
           echo "<div class='dinner-div'><span class='strong-word'>Dinner</span>";
                foreach ($dinnerDay5 as $food) {
                     echo "<div class='food-style'>$food</div>";
                }
           echo '</div>';           
        echo "</div>";
        echo "<div class='col-md-1'><span class='strong-word'>day-6</span>";
            echo "<div class='breakfast-div'><span class='strong-word'>Breakfast</span>";
                foreach ($breakfastDay6 as $food) {
                     echo "<div class='food-style'>$food</div>";
                }
            echo '</div>';
            echo "<div class='lunch-div'><span class='strong-word'>Lunch</span>";
                foreach ($lunchDay6 as $food) {
                     echo "<div class='food-style'>$food</div>";
                }
           echo '</div>';
           echo "<div class='dinner-div'><span class='strong-word'>Dinner</span>";
                foreach ($dinnerDay6 as $food) {
                     echo "<div class='food-style'>$food</div>";
                }
           echo '</div>';           
        echo "</div>";
        echo "<div class='col-md-1'><span class='strong-word'>day-7</span>";
            echo "<div class='breakfast-div'><span class='strong-word'>Breakfast</span>";
                foreach ($breakfastDay7 as $food) {
                     echo "<div class='food-style'>$food</div>";
                }
            echo '</div>';
            echo "<div class='lunch-div'><span class='strong-word'>Lunch</span>";
                foreach ($lunchDay7 as $food) {
                     echo "<div class='food-style'>$food</div>";
                }
           echo '</div>';
           echo "<div class='dinner-div'><span class='strong-word'>Dinner</span>";
                foreach ($dinnerDay7 as $food) {
                     echo "<div class='food-style'>$food</div>";
                }
           echo '</div>';           
        echo "</div>";
        
    echo "</div>";
  echo "</div>";
    echo "</div>";


}
?>
{!! Charts::assets() !!}
{!! $lava->render() !!}





<?php
die();

$object = json_decode(json_encode($makeMeals), FALSE);





$sessionCaloriesPerWeek = Session::get('result');
$weeks = sizeof($sessionCaloriesPerWeek);
for ($j = 1; $j <= $weeks; $j++) {
    ?>
    <table style='border: 1px solid black;font-size: 14px;' class="table">
        <thead >
        <th >week-{{$j}}/day</th>

        <th>Breakfast Foods Only</th>
    </thead>
    <tr>

    <tbody>

    <?php $i = 0 ?>
        @foreach ($makeMeals["week_no_$j"] as $value)
    <?php $i++ ?>   
        <tr>
            <td>day-{{ $i}}</td>
        <?php
        foreach ($value as $food) {
            echo " <td style='font-size: 10px;'>$food->Shrt_Desc,"
            . "<br><span style=' font-style: italic;'>Calories: $food->Energ_Kcal<span></td>";
        }
        ?>
        </tr>
        @endforeach
    </tbody>
    </table>
    <br>
<?php }
?>
@endsection
