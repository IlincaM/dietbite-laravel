
{!! Charts::assets() !!}
{!! $lava->render() !!}

<?php
 $sessionCaloriesPerWeek = Session::get('result');
        $weeks = sizeof($sessionCaloriesPerWeek);
for ($j = 1; $j <= $weeks; $j++) { ?>
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
<br>