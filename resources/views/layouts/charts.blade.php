<?php
for ($i = 1; $i <= count($makeMeals); $i++) {
    echo "<table class='table'>"
    . "<thead>"
    . "<tr><th>#</th>"
    . "<th>day-1</th>"
    . "<th>day-2</th>"
                . "<th>day-3</th>"
    . "<th>day-4</th>"
    . "<th>day-5</th>"
    . "<th>day-6</th>"
    . "<th>day-7</th>"

    . "</tr>"
    . "</thead> 
      <tbody>
      <tr>
        <td>Breakfast</td>
        <td>";
      
       echo" <ul>
        <li>dkdkd<li><li>ddjjdbs<li></ul></td>
        <td>Pitt</td>
        <td>35</td>
        <td>New York</td>
        <td>USA</td>
      </tr>
    </tbody>"
    . "</table>";
}

foreach ($makeMeals as $makeTable ) {
  dump($makeTable);
//    foreach ($value["day-no-1"] as $v){
//            dump($v);

//    }
}
//    
//    for ($i = 0; $i <= $makeTable; $i++) {
//        echo "
//<table class='table'>            
//<thead>
//        <th>#</th>";
//        
//        foreach ($value as $val => $v){
//            
//                echo "<th>$val</th>";
//
//        }
//    
//    
//echo " </thead>
//<tbody>
//        <tr> 
//            <td>Breakfast</td>";
//foreach ($v as $plm ){
//    echo "<td><ul><li>$plm->Shrt_Desc</li></ul></td>";
//}
//            echo "</tr>
//</tbody>
//</table>
//";
//        echo "<br>";
//    }
//}
//die();
//
?>

{!! Charts::assets() !!}
{!! $lava->render() !!}
<?php
echo '<pre>';
?>
