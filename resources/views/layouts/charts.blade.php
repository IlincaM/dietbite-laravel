<?php dump($makeMeals);
?>
{!! Charts::assets() !!}
{!! $lava->render() !!}





<?php
$object = json_decode(json_encode($makeMeals), FALSE);

for ($j = 1; $j <= 6; $j++) {
    echo "week-$j";
    ?>
    <ul>
        <ul>day-1
            <li>Breakfast
                <ul>
                    <li>Smth</li>
                    <li>Smth</li>
                    <li>Smth</li>
                    <li>Smth</li>
                    <li>Smth</li>
                    <li>Smth</li>
                </ul>
            </li>
            <li>Lunch
                <ul>
                    <li>Ceva</li>
                    <li>Altveva</li>
                </ul>
            </li>
        </ul>
       
        
    </ul>
    <?php
//    foreach ($day->day_1 as $value) {
//        dump($value->meal_time_id);
//    }
}

die();
$sessionCaloriesPerWeek = Session::get('result');
$weeks = sizeof($sessionCaloriesPerWeek);
for ($j = 1; $j <= $weeks; $j++) {
    ?>
    <table style="border: 1px solid black;font-size: 14px;" class="table">
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
<!--<br>
<table style="border: 1px solid black;font-size: 14px;" class="table">
        <thead >
        <th>*</th>
        <th >day-1</th>
        <th >day-2</th>
        <th >day-3</th>
        <th >day-4</th>

    </thead>

    <tbody>
        <tr>
            <td>Breakfast</td>
            <td>sm1
                sm2
                
            
            </td>
            <td>sm1
                sm2</td>
        </tr>
        <tr>
            <td>Lunch</td>
        </tr>

    </tbody>
    </table>
    <br>-->
