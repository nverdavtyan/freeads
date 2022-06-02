<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdStore;
use App\Models\Ad;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\RegistersUsers;


class AdController extends Controller 
{

   use RegistersUsers;
   
   public function index(){

               $ads = DB::table('ads')
               ->orderBy('created_at', 'DESC')
               ->paginate(6);  
                 return view('ads', compact('ads'));  

   }

   public function create(){
             return view('create');
   }
   

   public function store(AdStore $request){
       
    $validated = $request->validated();

   if(!Auth::check()){

    $request->validate([
    'name' => 'required|unique:users',
    'email' => 'required|email|unique:users',
    'password' => 'required|confirmed',
    'password_confirmation' => 'required',
    
    ]);

   $user = User::create([
        'name' => $request['name'],
        'email' => $request['email'],
        'password' =>  Hash::make($request['password']),

    ]);


    $this->guard()->login($user);
}



  $ad = new Ad();
   $ad->title = $validated['title'];
   $ad->description = $validated['description'];
   $ad->location = $validated['location'];
   $ad->price = $validated['price'];
   $ad->img = $validated['img'];
   $ad->user_id = auth()->user()->id;
   $ad->save();

   return redirect()->route('ad.index')->with('success', 'Votre annonce a été postée');


   }


   public function search(Request $request){
      $words = $request->words;
      $ads = DB::table('ads')
      ->where('title', 'LIKE', "%$words%")
      ->orWhere('description', 'LIKE', "%$words%")
      ->orderBy('created_at', 'DESC')
      ->get();
      return response()->json(['success' => true, 'ads' => $ads]);
      
   }



   public function userads(){

      $ads = DB::table('ads')
      ->orderBy('title', 'DESC')
      ->paginate(6);  
        return view('ads', compact('ads'));  

}

public function addetails(Request $request,$ad){

    $ad = Ad::find($ad);


   return view('ads-details', compact('ad'));

}

  


}
