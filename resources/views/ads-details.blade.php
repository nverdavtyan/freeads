@extends('layouts.app')

@section('content')



        <div class="container">
            <div class="col-lg-10 border p-3 main-section bg-white">
                <div class="row hedding m-0 pl-3 pt-0 pb-3">
 Vendu par {{$ad->user->name}} <br>
 <small>Inscrit depuis {{date('d-m-Y', strtotime($ad->user->created_at));}}</small>
                </div>
                <div class="row ">
                    <div class="col-lg-8 left-side-product-box pb-3">
                        <img src="{{ asset('/images/ads/' . $ad->img) }}" class="border p-3">
                    </div>
                    <div class="col-lg-4">
                        <div class="right-side-pro-detail border p-3 m-0">
                            <div class="row">
                                <div class="col-lg-12">
                        
                                    <p class="m-0 p-0">{{   $ad->title }}</p>
                                </div>
                                <div class="col-lg-12">
                                    <p class="m-0 p-0 price-pro"> {{   $ad->price }} €</p>
                                    <hr class="p-0 m-0">
                                </div>
                                <div class="col-lg-12 pt-2">
                                    <h5>Product Detail</h5>
                                    <span>{{ $ad->description}}</span>
                    
                                </div>
                           

                                <div class="col-lg-12 mt-3">
                                    <div class="row">
                           
                                        <div class="col-lg-6">
                                            <a href="{{route('message.create', ['seller_id' =>$ad->user_id, 'ad_id'=>$ad->id]) }}" class="btn btn-success w-100">Contacter le vendeur</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
         
            
            </div>
        </div>

<style>

body {
    font-family: 'Roboto Condensed', sans-serif;
    background-color: #f5f5f5
}

.hedding {
    font-size: 20px;
    color: #ab8181`;
}

.main-section {
    position: absolute;
    left: 50%;
    right: 50%;
    transform: translate(-50%, 5%);
}

.left-side-product-box img {
    width: 100%;
}

.right-side-pro-detail span {
    font-size: 15px;
}

.right-side-pro-detail p {
    font-size: 25px;
    color: #a1a1a1;
}

.right-side-pro-detail .price-pro {
    color: #E45641;
}

.right-side-pro-detail .tag-section {
    font-size: 18px;
    color: #5D4C46;
}

.pro-box-section .pro-box img {
    width: 100%;
    height: 200px;
}

@media (min-width:360px) and (max-width:640px) {
    .pro-box-section .pro-box img {
        height: auto;
    }
}
</style>
@endsection




