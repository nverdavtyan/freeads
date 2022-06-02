@extends('layouts.app')

@section('content')
<div class="container">
    
<div class="row justify-content-center ">
    @if (session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
@endif
    @foreach ($ads as $ad)
        <div class="col-md-2">
            <div class="card h-100" style="width:  10rem;">
                <img class="img-fluid rounded-start" src="{{ asset('/images/ads/' . $ad->img) }}" alt="Card image cap">
                <p class="card-text"> <b>{{ $ad->price }} €</b></p>
                <div class="card-body">
                    <h5 class="card-title">{{ $ad->title }}</h5>
                    <p class="card-text">{{ Carbon\Carbon::parse($ad->created_at)->diffForHumans() }} </p>
                </div>


                <div>
 
                    <a href="{{url('users/annonces' ,$ad->id)}}" class="btn btn-success btn-sm">Modifier</a>
        
                    <form action="{{ url('users/anonnces',$ad->id)}}" method="POST">
                        @method('delete')
                        @csrf
                           <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                    </form>
                </div>
        
            </div>

        

        </div>
    @endforeach

    </div>
    <div>

            {{ $ads->links('pagination::bootstrap-4') }}  
    </div>
  
</div>

    @endsection