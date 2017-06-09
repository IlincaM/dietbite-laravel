<style>
    .errorStyle{
        color: red;
    }
 </style>
 
<?php
$activityLevel = BMR_Calculator::activityLevel();
$exerciseLevel = BMR_Calculator::exerciseLevel();
//
//$constructor=new CalculatorValidator();
//$formValues=$constructor->constructValues();
$bmr = new BMR_Calculator();
$tdee = $bmr->visitor();

?>
<form action="<?php admin_url('admin-post.php') ?>" method="post">
    <p>
        <label for="age">How old are you?</label>
        <input type="age" name="age" id="age">
      <?php 
     
    
?>
 
    </p>
    <p>
        <label for="weight">Your weight(kg) is ?</label>
        <input type="weight" name="weight" id="weight">
    </p>
     <p>
        <label for="goalWeight">Your Goal Weight(kg) Is ?</label>
        <input type="goalWeight" name="goalWeight" id="goalWeight">
    </p>
    
    <p>
        <label for="height">Your height(cm) is ?</label>
        <input type="height" name="height" id="weight">
    </p>
    <hr>
    <p>Gender<p>
        <input type="radio" name="gender" value='female'>Female
        <input type="radio" name="gender" value="male">Male

    <hr>
    <p>Activity Level<p>
        <input type = "radio" name = "activity" value = "<?php echo $activityLevel[0]->sedentary; ?>" >Sedentary
        <input type = "radio" name = "activity" value = "<?php echo $activityLevel[0]->light_activity; ?>">Light Activity
        <input type = "radio" name = "activity" value = "<?php echo $activityLevel[0]->normal_active; ?>">Active
        <input type = "radio" name = "activity" value = "<?php echo $activityLevel[0]->very_active; ?>">Very Active
    <hr>

    <p>Exercise Level<p>
        <input type = "radio" name = "exercise" value = "0" >None
        <input type = "radio" name = "exercise" value = "<?php echo $exerciseLevel[0]->light; ?>" >Light
        <input type = "radio" name = "exercise" value = "<?php echo $exerciseLevel[0]->moderate; ?>">Moderate
        <input type = "radio" name = "exercise" value = "<?php echo $exerciseLevel[0]->difficult; ?>">Difficult
        <input type = "radio" name = "exercise" value = "<?php echo $exerciseLevel[0]->intense; ?>">Intense
    <hr>

    <input type = "hidden" name = "to" value = "<?php the_permalink(); ?>">
    <button type = "submit" name = "action" value = "action">Submit</button>
</form>
<?php
if ($_SESSION['result'] == NULL) {
    echo '';
} else {
    echo '<h3> Your TDEE is ' . $_SESSION ["result"];
    '</h3>';
}

?>
  