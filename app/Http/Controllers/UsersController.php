<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProfileRequest;
use App\Http\Requests\AdStore;
use App\Models\Ad;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;


class UsersController extends Controller
{

   /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth' , 'verified']);
    }

    public function index(){

        $ads = DB::table('ads')->where('user_id', auth()->id())
        ->orderBy('title', 'ASC')
        ->paginate(5);  
        
          return view('users.index', compact('ads'));  

}
  
  public function edit(){
      $user = auth()->user();
      $date['user']=$user;
      return view('users.edit')->with('user',auth()->user());
  }


  public function update(UpdateProfileRequest  $request){
    $user = auth()->user();

       $user->update([
        'name' => $request['name'],
        'email' => $request['email'],
        'password' =>  Hash::make($request['password'])

  ]);

  session()->flash('success',  'Les information ont modifié');
  return redirect()->back();

}
public function destroy($user)
{  
    $user= User::find($user);
    $user->delete();

    return redirect()->route('ad.index')->with('success',  'compte a supprime');;
}


public function editads($ad)
{  
    $ad = Ad::find($ad);
    return view('users.editads', compact('ad'));
}

public function updateads(AdStore $request, $id)
{
   $ad = Ad::find($id)->update($request->all());  
   return back()->with('success',' Annonce a modifié!');
}





public function addestroy($ad)
{  
    $ad= Ad::find($ad);
    $ad->delete();

    session()->flash('success',  'annonce a supprime');
    return redirect()->back();
}

}
