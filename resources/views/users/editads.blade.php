
@extends('layouts.app')

@section('content')

<div class=" row justify-content-center ">
    <form  method="POST"  action="{{url('/users/annonces/update/' . $ad->id)}}" class=" border  shadow-lg p-3 mb-5 bg-white rounded" style="width:30rem;">
      @csrf
      <h2>Modifier mon annonce</h2>
      <hr>
    <div class="form-group">
      
      <label for="title">Title</label>
      <input type="text" class="form-control {{ $errors->has('title') ? 'is-invalid': ''}}"  
      id="title" name="title" placeholder="Title"  value="{{$ad->title}}">
      @if($errors->has('title'))
      <span class="invalid-feedback">{{$errors->first('title')}}</span>
      @endif
    </div>
    <div class="form-group">
      <label for="description">Description</label>
      <textarea class="form-control {{ $errors->has('description') ? 'is-invalid': ''}}"  class="form-control" id="description" name="description" placeholder="Description" cols="10" rows="5">{{$ad->description}} </textarea>
      @if($errors->has('description'))
      <span class="invalid-feedback">{{$errors->first('description')}}</span>
      @endif
    </div>
    <div class="form-group">
      <label for="location">Location</label>
      <input type="text" class="form-control" id="location" name="location" placeholder="Location" value="{{$ad->location}}" >
    </div>
  
    <div class="form-group">
      <label for="location">Image</label>
      <input type="file" class="form-control" id="img" name="img" >
    </div>
  
  
  <div class="input-group mb-3">
    <div class="input-group-prepend">
      <span class="input-group-text">$</span>
    </div>
    <input type="text" class="form-control" name="price" aria-label="Amount (to the nearest dollar)"  value="{{$ad->price}}">
    <div class="input-group-append">
      <span class="input-group-text">.00</span>
    </div>
  </div>

<button class="btn btn-success">Modifier</button>
</form>
</div>
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