<?php
$bmrActivity = json_decode($data["bmr_activity"], true);
$bmrExercise = json_decode($data["bmr_exercise"], true);
?>
@extends('master')

@section('content')
{!! Form::open(['method' => 'POST', 'action' => 'ChartsController@store'])  !!}
<div class="container container-middle ">
    <div class="row mx-center ">
        <div class="col-md-12 col-xs-12">
            <label for="bmrcalcultaor" class="label-responsive label-form">My diet will consist in</label>
            <a href="#bmrcalcultaor" class="btn  btn-color" data-toggle="modal">Calories calculator</a>
            <span class="spacing-style"> /day</span>

            <label for="nummeals" class="label-form">in</label>
            <select  name="nummeals" style="width: 6%; height: 45px;">
                <option selected="" value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4" disabled>4</option>
                <option value="5" disabled >5</option>
                <option value="6" disabled>6</option>
                <option value="7" disabled>7</option>
                <option value="8" disabled>8</option>
                <option value="9" disabled>9</option>

            </select>
            <span>meals.</span>
        </div>
        <div class="col-md-12 col-xs-12">
            <label for="diet_type" class="label-form label-margin" > My diet will be:</label>
            <select name="diet_type" class="select-style">
                <option selected="" value="anything">anything</option>
                <option value="paleo" disabled>paleo</option>
                <option value="vegetarian" disabled>vegetarian</option>
                <option value="vegan" disabled>vegan</option>
                <option value="atkins / ketogenic" disabled>atkins / ketogenic</option>
                <option value="mediterranean" disabled>Mediterranean</option>                           
            </select>
        </div>
        <div class="col-md-12 col-xs-12">
            <label for="planType" class="label-form">The meal plan will be: </label>

            <select name="planType" class="select-style">
                <option selected="" value="1">normal</option>
                <option value="2" disabled>aggressive</option>

            </select>

        </div>
        <div>
            <input name="submit" type="submit" class="btn btn-lg" value="Make my meal plan">
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