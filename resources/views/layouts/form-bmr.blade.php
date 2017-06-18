
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

{{ Form::label('sedentary', 'Sedentary') }}
{{ Form::radio('sedentary', $bmrActivityValues["sedentary"]) }}
{{ Form::label('lightActivity', 'Light Activity') }}
{{ Form::radio('lightActivity', $bmrActivityValues["light_activity"]) }}
{{ Form::label(' active', ' Active') }}
{{ Form::radio(' active', $bmrActivityValues["normal_active"]) }}
{{ Form::label(' veryActive ', ' Very Active ') }}
{{ Form::radio(' veryActive ', $bmrActivityValues["very_active"]) }}
@endforeach

<hr>
{{ Form::label('activity', 'Exercise Level') }}
<br>
@foreach ($bmrExercise as $bmrExerciseValues)

{{ Form::label('none', 'None') }}
{{ Form::radio('none', $bmrExerciseValues["none"]) }}
{{ Form::label('light', 'Light') }}
{{ Form::radio('light', $bmrExerciseValues["light"]) }}
{{ Form::label(' moderate', 'Moderate') }}
{{ Form::radio('moderate', $bmrExerciseValues["moderate"]) }}
{{ Form::label('difficult ', ' Difficult ') }}
{{ Form::radio('difficult ', $bmrExerciseValues["difficult"]) }}
{{ Form::label('intense ', 'Intense') }}
{{ Form::radio('intense ', $bmrExerciseValues["intense"]) }}
@endforeach
<hr>
{{ Form::submit('Calculate') }}
{!! Form::close() !!}