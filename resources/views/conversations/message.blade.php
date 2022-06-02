
   
@extends('layouts.app')

@section('content')


<h1>Contacter le vendeur</h1>
<div class="container">
<form action="{{route('message.store')}}" method="POST">
    @csrf
    <div class="form-group">
         <label for="content"></label>
    <textarea name="content" id="content" cols="30" rows="10" class="form-control"></textarea>
    </div>
    <input type="hidden" name="seller_id" value="{{$seller_id}}">
    <input type="hidden" name="ad_id" value="{{$ad_id}}">
    <input type="hidden" name="buyer_id" value="{{auth()->user()->id}}">
<button typr="submit" class="btn btn-success">Contacter le vendeur</button>

</form>
</div>
@endsection