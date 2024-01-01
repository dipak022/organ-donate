<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Confused;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
class PageController extends Controller
{
    public function confusedOrOrganFrom(Request $request){
        // if(!Auth::check()){
        //     return redirect()->route('home')->with('warning', 'At first create or login your account !');
        // }
        if($request->orgen_donate == "confused"){
            $data['confused'] = Confused::first();
            $count = Confused::count();
            $skip = 1;
            $limit = $count - $skip; 
            $data['confuseds'] = Confused::skip($skip)->take($limit)->get();
            return view("frontend.pages.confused", $data);
        }else if($request->orgen_donate == "yes"){
            return view("frontend.pages.organ-from");
        }else{
            abort(404);
        }
    }


    public function UserLogout(){
        Session::forget('user');
        Auth::logout();
        $notification = array(
            'message' => 'Successfully Logout',
            'alert-type' => 'success'
        );
        return redirect()->route('home')->with($notification);
    }
}
