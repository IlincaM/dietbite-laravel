<?php
$bmrActivity = json_decode($data["bmr_activity"], true);
$bmrExercise = json_decode($data["bmr_exercise"], true);
$allegiesTable = json_decode($allergies);
?>

@extends('master')

@section('content')
{!! Form::open(['method' => 'POST', 'action' => 'GetMealsController@store'])  !!}

<div class="container container-style">
    <div class="row row-center">
        <div class="start_question">
            <div class="col-xs-12 col-md-12 start_question_calories noPadding">
                <span>My diet will consist in</span>
                <div class="not_know_div">
                    <a href="#bmrcalcultaor" class="btn btn-sty" data-toggle="modal">Calories calculator</a>

                    <div class="not_know">
                        <span class="font-size-calculate">Calculate your calories intake</span>
                    </div>
                    <div class="not_know">
                        <span id='kcal'>=</span> <span name="cal_input" id="cal_input"> </span>
                    </div>
                    <input type="text" name="hidden_goal_weight" id="hidden_goal_weight"  >

                </div>
                <span>/ day</span>

                <span>in</span>
                <select name="nummeals" class=" inline_auto number_meals" id="number_meals">
                    <option selected="" value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4" >4</option>
                    <option value="5" disabled>5</option>
                    <option value="6" disabled>6</option>
                    <option value="7" disabled>7</option>
                    <option value="8" disabled>8</option>
                    <option value="9" disabled>9</option>

                </select>
                <span>meals.</span>
            </div>

            <div  class="col-xs-12 col-md-12 start_question_diet noPadding">
                <span class="span-diet">My diet will be:</span>
                <div class="not_know_div meals">
                    <div class="meal_div">
                        <select name="diet_type" class="inline_auto preset_diet_selector select-style">
                            <option selected="" value="anything">anything</option>
                            <option value="paleo" disabled>paleo</option>
                            <option value="vegetarian" disabled>vegetarian</option>
                            <option value="vegan" disabled>vegan</option>
                            <option value="atkins / ketogenic"disabled>atkins / ketogenic</option>
                            <option value="mediterranean" disabled>Mediterranean</option>                           
                        </select>
                    </div>
                </div>

            </div>

            <div class="col-xs-12 col-md-12 start_question_diet noPadding">
                <span class="type-meal"> The meal plan will be:</span>
                <div class="not_know_div meals">
                    <div class="meal_div">
                        <select name="planType" class="select-style inline_auto preset_diet_selector">
                            <option selected="" value="1">normal</option>
                            <option value="2" disabled>aggressive</option>

                        </select>

                    </div>
                </div>

            </div>
            <div class="col-xs-12 col-md-12 start_question_diet noPadding">
                <span class="type-meal"> Food allergies</span>
                <div class="not_know_div meals">
                    <div class="meal_div">
                        @foreach ($allegiesTable as $allegiesOptions)
                        <label for="<?php $allegiesOptions->name ?>"><?php echo $allegiesOptions->name ?></label>
                        <input name="allergies[]" value="<?php echo $allegiesOptions->id ?>"  type="checkbox">
                        @endforeach
                    </div>
                </div>
           
            </div>
            <div class="col-xs-12 col-md-12 start_question_diet noPadding">
                <input name="submit" type="submit" class="btn btn-lg  btn-makeMeal" value="Get your meals">
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>




@include('partials._form-bmr-modal')
<div id="chart-div"></div>
@endsection

                                            
@section('scripts')

<script type="text/javascript" src="{{ URL::asset('js/modals.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/getMeals.js') }}"></script>

@endsection                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                          