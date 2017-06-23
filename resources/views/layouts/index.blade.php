<?php
$bmrActivity = json_decode($data["bmr_activity"], true);
$bmrExercise = json_decode($data["bmr_exercise"], true);
?>
@extends('master')



@section('content')

<a href="#createprojects" class="btn btn-default" data-toggle="modal">New</a>

<div class="modal fade" tabindex="-1" role="dialog" id='createprojects'>
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            {!! Form::open(['method' => 'POST', 'action' => 'BmrController@storeBmrCalculation',"id" => "register"])  !!}
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">BMR Calculation</h4>
            </div>
            <div class="modal-body">

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
                @if ($errors->any())
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                    <li> {{ $error }}</li>
                    @endforeach
                </ul>

                @endif
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <!--                <a href="#" id='calculate' class="btn btn-default submitbutton" data-toggle="modal">Calculate</a>-->
                    <input name="submit" type="submit" value="Submit">
                {!! Form::close() !!}


            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

  <meta name="_token" content="{!! csrf_token() !!}" />

@endsection

@section('scripts')
<script type="text/javascript" src="{{ URL::asset('js/modals.js') }}"></script>
@endsection                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            