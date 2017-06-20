
<?php
echo '<pre>';
$bmrActivity = json_decode($data["bmr_activity"], true);
$bmrExercise = json_decode($data["bmr_exercise"],true);

echo '</pre>';
//
?>
{!! Form::open(['url' => 'calculate']) !!}

{{ Form::label('age', ' How old are you? ') }}
{{ Form::input('text', 'age') }}
<br>
{{ Form::label('weight', 'Your weight(kg) is ? ') }}   
{{ Form::input('text', 'weight') }}
<br>
{{ Form::label('goal_weight', ' Your Goal Weight(kg) Is ? ') }}
{{ Form::input('text', 'goal_weight') }}
<br>
{{ Form::label('height', ' Your height(cm) is ? ') }}
{{ Form::input('text', 'height') }}
<hr>

{{ Form::label('gender', 'Gender') }}
<br>
{{ Form::label('female', 'female') }}
{{ Form::radio('gender', 'female') }}
{{ Form::label('male', 'male') }}
{{ Form::radio('gender', 'male') }}
<hr>
{{ Form::label('activity', 'Activiy Level') }}
<br>
@foreach ($bmrActivity as $bmrActivityValues)

{{ Form::label('activityLevel', 'Sedentary') }}
{{ Form::radio('activityLevel', $bmrActivityValues["sedentary"]) }}
{{ Form::label('activityLevel', 'Light Activity') }}
{{ Form::radio('activityLevel', $bmrActivityValues["light_activity"]) }}
{{ Form::label('activityLevel', ' Active') }}
{{ Form::radio('activityLevel', $bmrActivityValues["normal_active"]) }}
{{ Form::label('activityLevel', ' Very Active ') }}
{{ Form::radio('activityLevel', $bmrActivityValues["very_active"]) }}
@endforeach

<hr>
{{ Form::label('exercise', 'Exercise Level') }}
<br>
@foreach ($bmrExercise as $bmrExerciseValues)

{{ Form::label('exerciseLevel', 'None') }}
{{ Form::radio('exerciseLevel', $bmrExerciseValues["none"]) }}
{{ Form::label('exerciseLevel', 'Light') }}
{{ Form::radio('exerciseLevel', $bmrExerciseValues["light"]) }}
{{ Form::label('exerciseLevel', 'Moderate') }}
{{ Form::radio('exerciseLevel', $bmrExerciseValues["moderate"]) }}
{{ Form::label('exerciseLevel', ' Difficult ') }}
{{ Form::radio('exerciseLevel', $bmrExerciseValues["difficult"]) }}
{{ Form::label('exerciseLevel', 'Intense') }}
{{ Form::radio('exerciseLevel', $bmrExerciseValues["intense"]) }}
@endforeach
<hr>
{{ Form::submit('Calculate') }}
{!! Form::close() !!}