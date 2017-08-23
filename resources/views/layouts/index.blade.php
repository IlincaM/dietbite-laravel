<?php
$bmrActivity = json_decode($data["bmr_activity"], true);
$bmrExercise = json_decode($data["bmr_exercise"], true);
?>
@extends('master')

@section('content')
{!! Form::open(['method' => 'POST', 'action' => 'ChartsController@store'])  !!}

<div class="container">
    <div class="row row-center">
        <div class="start_question">
            <div class="col-xs-12 col-md-12 start_question_calories noPadding">
                <span>My Diet will consist in</span>
                <div class="not_know_div">
                    <input  name='cal_input' id="cal_input" type="text" class="form-control" disabled >
                    <span >calories</span>

                    <div class="not_know">
                        <span><i class="fa fa-hand-o-down"></i>Calculate here</span>
                    </div>
                    <div>
                        <a href="#bmrcalcultaor" class="btn btn-sm btn-info" data-toggle="modal">Calories calculator</a>
                        <input type="text" name="hidden_goal_weight" id="hidden_goal_weight"  >
                    </div>
                </div>
                <span>in</span>
                <select name="nummeals" class="form-control inline_auto number_meals" id="number_meals">
                    <option selected="" value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>

                </select>
                <span>meals.</span>
            </div> 
            
            <div  class="col-xs-12 col-md-12 start_question_diet noPadding">
                <span>My Diet will be:</span>
                <div class="not_know_div meals">
                    <div class="meal_div">
                    <select name="diet_type" class="form-control inline_auto preset_diet_selector">
                        <option selected="" value="anything">anything</option>
                        <option value="paleo">paleo</option>
                        <option value="vegetarian">vegetarian</option>
                        <option value="vegan">vegan</option>
                        <option value="atkins / ketogenic">atkins / ketogenic</option>
                        <option value="mediterranean">Mediterranean</option>                           
                    </select>
                </div>
                </div>
                <span> and  the plan will be:</span>
                <div class="not_know_div meals">
                    <div class="meal_div">
                    <select name="planType" class="form-control inline_auto preset_diet_selector">
                        <option selected="" value="1">normal</option>
                        <option value="2">aggressive</option>
                                              
                    </select>
                        
                </div>
                    
                </div>
                 <input name="submit" type="submit" class="btn btn-lg btn-info btn-makeMeal" value="Make my meal plan">
            {!! Form::close() !!}
        </div>

           
    </div>
</div>
@include('partials._form-bmr-modal')
<div id="chart-div"></div>
@endsection

@section('scripts')
<script type="text/javascript" src="{{ URL::asset('js/modals.js') }}"></script>
@endsection                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            