@extends('layouts.app')

@section('content')
<h1>Free Ads</h1>
<div class="container">
    @if(session()->has('success'))
    <div class="alert alert-success">
        {{session()->get('success')}}
    </div>
    @endif

</div>


@endsection