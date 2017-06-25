<?php
$bmrActivity = json_decode($data["bmr_activity"], true);
$bmrExercise = json_decode($data["bmr_exercise"], true);
?>
@extends('master')

@section('content')
{!! Form::open(['method' => 'POST', 'action' => 'ChartsController@store'])  !!}

<div class="container-fluid">
    <div class="row">
        <div class="start_question">
            <div class="col-xs-12 col-md-4 start_question_calories">
                <span>My Dialy Diet will consist in</span>
                <div class="not_know_div">
                    <input  name='cal_input' id="cal_input" type="text" class="form-control" value=" ">
                    <span >calories</span>

                    <div class="not_know">
                        <span><i class="fa fa-hand-o-down"></i>Don't know?</span>
                    </div>
                    <div>
                        <a href="#bmrcalcultaor" class="btn btn-sm btn-info" data-toggle="modal">Calories calculator</a>
                    </div>
                </div>
            </div> 
            <div class="col-xs-12 col-md-2 start_question_meals" >
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
            <div class="col-xs-12 col-md-3 start_question_diet" >
                <span>My Diet will be:</span>
                <div class="not_know_div">
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
        </div>
        <div class="gen_area col-xs-12 col-md-3">

            <input name="submit" type="submit" class="btn btn-lg btn-info" value="Make my meal plan">
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