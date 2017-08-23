<div class="modal fade" tabindex="-1" role="dialog" id='bmrcalcultaor'>
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
                <span id="age_error"></span>

                <br>
                {{ Form::label('weight', 'Your weight(kg) is ? ') }}   
                {{ Form::input('text', 'weight') }}
                <span id="weight_error"></span>

                <br>
                {{ Form::label('goal_weight', ' Your Goal Weight(kg) Is ? ') }}
                
                {{ Form::input('text', 'goal_weight') }}
                <span>(has to be smaller than your weight)</span>

                <span id="goal_weight_error"></span>

                <br>
                {{ Form::label('height', ' Your height(cm) is ? ') }}
                {{ Form::input('text', 'height') }}
                <span id="height_error"></span>

                <hr>

                {{ Form::label('gender', 'Gender') }}
                <br>
                {{ Form::label('female', 'female') }}
                {{ Form::radio('gender', 'female') }}
                {{ Form::label('male', 'male') }}
                {{ Form::radio('gender', 'male') }}
                <span id="gender_error"></span>

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
                <span id="activityLevel_error"></span>

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
                <span id="exerciseLevel_error"></span>
                <hr>
                <br>
                <input name="submit" type="submit" class="submitCalculator btn btn-success" value="Calculate">
                {!! Form::close() !!}
                <div class="bmr-result-div">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Recommend Calories Per Day</th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><span id="bmr_result"></span></td>
                            </tr>
                        </tbody>
                    </table>

                    <button type="button" class="btn btn-primary use_this_result" data-dismiss="modal">Use this result</button>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<meta name="_token" content="{!! csrf_token() !!}" />


