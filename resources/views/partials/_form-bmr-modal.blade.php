<div class="modal fade" tabindex="-1" role="dialog" id='bmrcalcultaor'>
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            {!! Form::open(['method' => 'POST', 'action' => 'BmrController@storeBmrCalculation',"id" => "register"])  !!}
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><i class="fa fa-calculator" aria-hidden="true"></i>BMR Calculator</h4>
            </div>
            <div class="modal-body">
                <div class="row row-border">
                    <div class="col-md-4 your-age-text">
                        {{ Form::label('age', 'Your age*') }}

                    </div>
                    <div class="col-md-8 your-age-input">
                        <input id="age"name="age" type="text" placeholder="25" >
                        <span id="age_error"></span>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-4 your-age-text">

                        {{ Form::label('weight', 'Your weight*') }}   
                    </div>
                    <div class="col-md-8 your-age-input">

                        <input name="weight" id="weight" placeholder="kg" type="text">
                        <span id="weight_error"></span>

                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-4 your-age-text">

                        {{ Form::label('goal_weight', 'Your desired weight*') }}
                    </div>
                    <div class="col-md-8 your-age-input">

                        <input name="goal_weight" id="goal_weight" placeholder="kg" type="text">
                        <span class="goal_weight-span">*has to be smaller than your weight</span>

                        <span id="goal_weight_error"></span>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-4 your-age-text">
                        {{ Form::label('height', ' Your height*') }}
                    </div>
                    <div class="col-md-8 your-age-input">
                        <input name="height" id="height" type="text" placeholder="cm">
                        <span id="height_error"></span>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-4 your-age-text gender-style">

                        {{ Form::label('gender', 'Gender') }}
                    </div>
                    <div class="col-md-8 col-gender">
                        <div class="col-md-3">
                            {{ Form::label('female', 'female') }}

                        </div>
                        <div class="col-md-3 text-right">
                            {{ Form::radio('gender', 'female') }}

                        </div>
                        <div class="col-md-3">
                            {{ Form::label('male', 'male') }}

                        </div>
                        <div class="col-md-3  text-right">
                            {{ Form::radio('gender', 'male') }}

                        </div>
                        <span id="gender_error"></span>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-4 your-age-text">

                        {{ Form::label('activity', 'Activiy Level') }}
                    </div>
                    <div class="col-md-8">
                        @foreach ($bmrActivity as $bmrActivityValues)
                        <div class="col-md-6">
                            {{ Form::label('activityLevel', 'Sedentary') }}
                            {{ Form::radio('activityLevel', $bmrActivityValues["sedentary"]) }}
                            {{ Form::label('activityLevel', 'Light Activity') }}
                            {{ Form::radio('activityLevel', $bmrActivityValues["light_activity"]) }}
                        </div>
                        <div class="col-md-6">

                            {{ Form::label('activityLevel', ' Active') }}
                            {{ Form::radio('activityLevel', $bmrActivityValues["normal_active"]) }}
                            {{ Form::label('activityLevel', ' Very Active ') }}
                            {{ Form::radio('activityLevel', $bmrActivityValues["very_active"]) }}
                        </div>

                        @endforeach
                        <span id="activityLevel_error"></span>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-4 your-age-text">

                        {{ Form::label('exercise', 'Exercise Level') }}
                    </div>
                    <div class="col-md-8">

                        @foreach ($bmrExercise as $bmrExerciseValues)
                        <div class="col-md-6">

                            {{ Form::label('exerciseLevel', 'None') }}
                            {{ Form::radio('exerciseLevel', $bmrExerciseValues["none"]) }}
                            <br>
                            {{ Form::label('exerciseLevel', 'Light') }}
                            {{ Form::radio('exerciseLevel', $bmrExerciseValues["light"]) }}
                            <br>
                            {{ Form::label('exerciseLevel', 'Moderate') }}
                            {{ Form::radio('exerciseLevel', $bmrExerciseValues["moderate"]) }}
                        </div>
                        <div class="col-md-6">

                            {{ Form::label('exerciseLevel', ' Difficult ') }}
                            {{ Form::radio('exerciseLevel', $bmrExerciseValues["difficult"]) }}
                            <br>
                            {{ Form::label('exerciseLevel', 'Intense') }}
                            {{ Form::radio('exerciseLevel', $bmrExerciseValues["intense"]) }}
                        </div>
                        @endforeach
                        <span id="exerciseLevel_error"></span>
                    </div>
                </div>
                <hr>
                <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-8">
                    <input name="submit" type="submit" class="submitCalculator btn btn-success" value="Calculate">
                    {!! Form::close() !!}

                </div>
                </div>
                <div class=" row bmr-result-div">
                    
                    <div class="col-md-4 col-Cpd">
                        <div>Recommended CPD</div>
                    </div>
                    <div class="col-md-8">
                        <div class="div-bmr-result" id="bmr_result"></div>
                    </div>

                    <div class="col-md-4"></div>
                    <div class="col-md-8">
                        <button type="button" class="btn  use_this_result use-res-style" data-dismiss="modal">Use result</button>

                    </div>
                </div>
            </div>
            <div class="modal-footer">

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<meta name="_token" content="{!! csrf_token() !!}" />


