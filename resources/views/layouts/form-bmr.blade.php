{!! Form::open(['url' => '']) !!}

{{ Form::label('age', ' How old are you? ') }}
{{ Form::input('text', 'age') }}
<br>
{{ Form::label('weight', 'Your weight(kg) is ? ') }}   
{{ Form::input('text', 'weight') }}
<br>
{{ Form::label('age', ' Your Goal Weight(kg) Is ? ') }}
{{ Form::input('text', 'goal_weight') }}
<br>
{{ Form::label('age', ' Your height(cm) is ? ') }}
{{ Form::input('text', 'height') }}
<hr>

{{ Form::label('gender', 'Gender') }}
<br>
{{ Form::checkbox('name', 'value') }}




{!! Form::close() !!}