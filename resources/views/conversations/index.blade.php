@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-10">
                <div class="card">
                    <div class="card-body">
                        <h1>Mesages</h1>
                        <div class="card-header">   </div>
    <table class="table">
         <thead>
                            <tr>
                              <th scope="col">Name</th>
                              <th scope="col">Message</th>
                              <th scope="col">Repondre</th>
                            </tr>
                          </thead>
                        @foreach ($messages as $message)
                            <tbody>
                           <tr> 
                            <td  class="{{$message->buyer_id != auth()->user()->id ? 'red' : ' '}}"> {{getBuyerName($message->buyer_id)}}   </td>
                               <td>{{ $message->content }}</td>
                               <td>
                                   <a href="{{route('message.create', ['seller_id' =>$message->buyer_id, 'ad_id'=>$message->ad_id]) }}"> Repondre</a>  </td>
                            </tr>
                            </tbody>

                          
                        @endforeach
 </table>


          
                    </div>
                </div>
            </div>

      

        </div>
    </div>
@endsection