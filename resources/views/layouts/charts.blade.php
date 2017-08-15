

<?php $createTable = '<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>Monday</th>
            <th>Tuesday</th>
            <th>Wednesday</th>
            <th>Thursday</th>
            <th>Friday</th>
            <th>Saturday</th>
            <th>Sunday</th>

        </tr>
    </thead>
    <tbody>
        <tr>
            <th>Breakfast</th>
                  <td>Jacob</td>

        </tr>
        <tr>
            <th>Lunch</th>
        </tr>
        <tr>
            <th >Dinner</th>

        </tr>
    </tbody>
</table>
'; ?>
<?php
$j = 0;
$z=1;

foreach ($makeMeals as $makeMealsTable => $table) {
    while ($z<=$makeMealsTable){
    var_dump($table["week_no_$z"]);
        $z++;
    }
//        while ($j <= $makeMealsTable) {
//        echo $createTable;
//        $j++;}
//    var_dump($table);
//    var_dump($table["week_no_1"]["day_no_1"]);
//    while ($j <= $makeMealsTable) {
//        echo $createTable;
//        $j++;
//    }
}
die();
?>
{!! Charts::assets() !!}
{!! $lava->render() !!}
<?php
echo '<pre>';
?>
