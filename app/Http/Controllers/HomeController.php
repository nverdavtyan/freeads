<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)

    {
        $seller_id =$request['seller_id'];
        $ad_id = $request['ad_id'];

        $messages = Message::where('seller_id', '=', auth()->user()->id)->orWhere('buyer_id', '=', auth()->user()->id)->get();

        return view('conversations/index', compact('messages', 'seller_id','ad_id'));
    }
}
