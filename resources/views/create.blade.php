
@extends('layouts.app')

@section('content')

<div class="container">
  <div class=" row justify-content-center ">
  <form  method="POST"  action="{{ route('ad.store')}}" class=" border  shadow-lg p-3 mb-5 bg-white rounded" style="width:30rem;">
    @csrf
    <h2>Deposer une annonce</h2>
    <hr>
  <div class="form-group">
    
    <label for="title">Title</label>
    <input type="text" class="form-control {{ $errors->has('title') ? 'is-invalid': ''}}"  
    id="title" name="title" placeholder="Title">
    @if($errors->has('title'))
    <span class="invalid-feedback">{{$errors->first('title')}}</span>
    @endif
  </div>
  <div class="form-group">
    <label for="description">Description</label>
    <textarea class="form-control {{ $errors->has('description') ? 'is-invalid': ''}}"  class="form-control" id="description" name="description" placeholder="Description" cols="30" rows="10"> </textarea>
    @if($errors->has('description'))
    <span class="invalid-feedback">{{$errors->first('description')}}</span>
    @endif
  </div>
  <div class="form-group">
    <label for="location">Location</label>
    <input type="text" class="form-control" id="location" name="location" placeholder="Location">
  </div>

  <div class="form-group">
    <label for="location">Image</label>
    <input type="file" class="form-control" id="img" name="img" >
  </div>


<div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text">$</span>
  </div>
  <input type="text" class="form-control" name="price" aria-label="Amount (to the nearest dollar)">
  <div class="input-group-append">
    <span class="input-group-text">.00</span>
  </div>
</div>


@guest

<h1>Vos Informations</h1>

<hr>
<div class="form-group">
<label for="name">Votre Nom</label>
<input type="text"  class="form-control {{$errors->has('name') ? 'is-invalid': '' }}"  name="name" id="name">
@if($errors->has('name'))
<span class="invalid-feedback">{{$errors->first('name')}}</span>
@endif
</div>

<div class="form-group">
  <label for="email">Votre Email</label>
  <input type="text" class="form-control {{$errors->has('email') ? 'is-invalid': '' }}" name="email" id="email">
  @if($errors->has('email'))
<span class="invalid-feedback">{{$errors->first('email')}}</span>
@endif
  </div>

  <div class="form-group">
    <label for="password">Votre Mote de passe</label>
    <input type="password"  class="form-control" name="password" id="password">
    </div>
    <div class="form-group">
      <label for="password_confirmation">Confirmation du mot de passe</label>
      <input type="password" class="form-control" name="password_confirmation" id="password_confirmation">
      </div>
@endguest

  <button type="submit" class="btn btn-primary">Soumettre votre annonce</button>
</form>

</div>
</div>
<form>
  @endsection

@section('scripts')
<script>
    // Get a reference to the file input element
    const inputElement = document.querySelector('input[id="img"]');
    // Create a FilePond instance
    const pond = FilePond.create(inputElement);

       FilePond.setOptions({
       server: {
         url: '/upload',
         headers: {
        
           'X-CSRF-TOKEN': '{{ csrf_token() }}'
      }
       } 
    });
</script>


  @endsection












