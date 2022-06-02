@extends('layouts.app')

@section('content')
    <div class="container">
      @if(session()->has('success'))
      <div class="alert alert-success">
          {{session()->get('success')}}
      </div>
      @endif
  
  </div>
    <div class="container">
   

  
  <form method="post" action="{{route('ad.search')}}" onsubmit="search(event)" id="searchForm">
     @csrf
       <div class="row  d-flex flex-row w-50 justify-content-center" >
   
      <div class="col-8 " >
    <div class="form-group ">
      <input type="text"  class="form-control" id="words">
    </div>
    </div>
    
    <div class="col-4 " >
    <button type="submit" class="btn btn-primary">Rechercher</button>
    </div>
    
  </form>
</div>


<div id="results">
    <div class="filters">
  <div class="form-group">
    <span class="sort btn btn-default" data-sort="title">Sort by title</span>
    <span class="sort btn btn-default" data-sort="location">Sort by city</span>
    <span class="sort btn btn-default" data-sort="price">Sort by price</span>
    <span class="sort btn btn-default" data-sort="date">Sort by date</span>
</div>
</div>
        <div class="row justify-content-center list">
        
            @foreach ($ads as $ad)
                <a href="{{route('ad.details',[$ad->id]) }}" class="col-md-2">
                    <div class="card h-100" style="width:  11rem;">
                        <img class="card-img" src="{{ asset('/images/ads/' . $ad->img) }}" alt="Card image cap">
                        <p class="p price"> <b>{{ $ad->price }} €</b></p>
                        <div class="card-body">
                            <h5 class="card-title title">{{ $ad->title }}</h5>
                            <p class="card-text date">{{ Carbon\Carbon::parse($ad->updated_at)->diffForHumans() }} </p>
                           <p class="location"> <span class="material-icons">place</span>{{ $ad->location }}</p>
                        </div>
                    </div>
                </a>
            @endforeach

      </div>

      </div>


        {{ $ads->links('pagination::bootstrap-5') }}

    </div>
@endsection

@section('extra-js')
    <script>
        function search(event) {
            event.preventDefault();
            let urlWebsite = window.location.origin;
            const words = document.querySelector('#words').value
            const url = document.querySelector('#searchForm').getAttribute('action');

            axios.post(`${url}`, {
                    words: words,
                })
                .then(function(response) {

                    const ads = response.data.ads
                   let  render ='';
                    let results = document.querySelector('#results')
                    for (let i = 0; i < ads.length; i++) {
                 render= ` <a href="" class="col-md-2">
                    <div class="card h-100" style="width:  10rem;">
                        <img class="img-fluid rounded-start" src="${urlWebsite}/images/ads/${ads[i].img}" alt="Card image cap">
                        <p class="card-text"> <b>${ads[i].price}€</b></p>
                        <div class="card-body">
                            <h5 class="card-title">${ads[i].title}</h5>
                            <p class="card-text">  </p>
                        </div>
                    </div>
                </a>`
              }

              ads.length === 0 ? results.innerHTML = '<h2>Aucun résultats</h2>'
                        : results.innerHTML = render;              
                })
                .catch(function (error) {
     console.log(error.response.data.errors);
});
        }


        document.addEventListener("DOMContentLoaded", function() {
            const options = {
                valueNames: ['title', 'location', 'price', 'date', { name: 'timestamp', attr: 'data-timestamp' }]
            };
            let hackerList = new List('results', options);
          
        });


        
    </script>

@endsection











