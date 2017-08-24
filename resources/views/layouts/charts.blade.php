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
    if(isset($day1->lunch,$day2->lunch,$day3->lunch,$day4->lunch,$day5->lunch,$day6->lunch,$day7->lunch)){
            $lunchDay1= $day1->lunch;
            $lunchDay2= $day2->lunch;
            $lunchDay3= $day3->lunch;
            $lunchDay4= $day4->lunch;
            $lunchDay5= $day5->lunch;
            $lunchDay6= $day6->lunch;
            $lunchDay7= $day7->lunch;

    } else {
            $lunchDay1=[];
            $lunchDay2=[];
            $lunchDay3=[];
            $lunchDay4=[];
            $lunchDay5=[];
            $lunchDay6=[];
            $lunchDay7=[];
    }
    $breakfastDay2 = $day2->breakfast;
    $breakfastDay3 = $day3->breakfast;
    $breakfastDay4 = $day4->breakfast;
    $breakfastDay5 = $day5->breakfast;
    $breakfastDay6 = $day6->breakfast;
    $breakfastDay7 = $day7->breakfast;
    echo"<div style='border: 1px solid black;font-size: 14px;'>week_no_$i";
        echo "<div>day-1";
            echo "<div>Breakfast";
                foreach ($breakfastDay1 as $food) {
                     echo "<div>$food</div>";
                }
            echo '</div>';
            echo "<div>Lunch";
                foreach ($lunchDay1 as $food) {
                     echo "<div>$food</div>";
                }
           echo '</div>';
        echo "</div>";
        echo "<div>day-2";
            echo "<div>Breakfast";
                foreach ($breakfastDay2 as $food) {
                     echo "<div>$food</div>";
                }
            echo '</div>';
            echo "<div>Lunch";
                foreach ($lunchDay2 as $food) {
                     echo "<div>$food</div>";
                }
           echo '</div>';        
        echo "</div>";
        echo "<div>day-3";
            echo "<div>Breakfast";
                foreach ($breakfastDay3 as $food) {
                     echo "<div>$food</div>";
                }
            echo '</div>';
            echo "<div>Lunch";
                foreach ($lunchDay3 as $food) {
                     echo "<div>$food</div>";
                }
           echo '</div>';        
        echo "</div>";
        echo "<div>day-4";
            echo "<div>Breakfast";
                foreach ($breakfastDay4 as $food) {
                     echo "<div>$food</div>";
                }
            echo '</div>';
            echo "<div>Lunch";
                foreach ($lunchDay4 as $food) {
                     echo "<div>$food</div>";
                }
           echo '</div>';        
        echo "</div>";
        echo "<div>day-5";
            echo "<div>Breakfast";
                foreach ($breakfastDay5 as $food) {
                     echo "<div>$food</div>";
                }
            echo '</div>';
            echo "<div>Lunch";
                foreach ($lunchDay5 as $food) {
                     echo "<div>$food</div>";
                }
           echo '</div>';        
        echo "</div>";
        echo "<div>day-6";
            echo "<div>Breakfast";
                foreach ($breakfastDay6 as $food) {
                     echo "<div>$food</div>";
                }
            echo '</div>';
            echo "<div>Lunch";
                foreach ($lunchDay6 as $food) {
                     echo "<div>$food</div>";
                }
           echo '</div>';        
        echo "</div>";
        echo "<div>day-7";
            echo "<div>Breakfast";
                foreach ($breakfastDay7 as $food) {
                     echo "<div>$food</div>";
                }
            echo '</div>';
            echo "<div>Lunch";
                foreach ($lunchDay7 as $food) {
                     echo "<div>$food</div>";
                }
           echo '</div>';        
        echo "</div>";
        
    echo "</div>";
}
die();
?>
{!! Charts::assets() !!}
{!! $lava->render() !!}





<?php
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
<br>