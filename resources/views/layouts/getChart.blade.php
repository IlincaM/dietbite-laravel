@extends('master')
@include('partials._head')

@section('content')
<div class="container container-chart">
{!! Charts::assets() !!}
{!! $lava->render() !!}    
</div>
                  

@endsection
