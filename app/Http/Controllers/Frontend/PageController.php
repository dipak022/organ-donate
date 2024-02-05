<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\ComentForConfioused;
use Illuminate\Http\Request;
use App\Models\Confused;
use App\Models\Donate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
class PageController extends Controller
{
    public function confusedOrOrganFrom(Request $request){
        if(!Auth::check()){
            $notification = array(
                'message' => 'At first create or login your account !',
                'alert-type' => 'warning'
            );
            return redirect()->back()->with($notification);
        }
        if(request('orgen_donate') == "confused"){
            $data['confused'] = Confused::first();
            $count = Confused::count();
            $skip = 1;
            $limit = $count - $skip; 
            $data['confuseds'] = Confused::skip($skip)->take($limit)->get();
            $data['comments'] = ComentForConfioused::with(['user'])->where('user_id',Auth::id())->get();
            return view("frontend.pages.confused", $data);
        }else if(request('orgen_donate') == "yes"){
            return view("frontend.pages.organ-from");
        }else{
            abort(404);
        }
    }

    public function makeADonate(){
        return view('frontend.pages.make-a-donate');
    }
    public function contact(){
        return view('frontend.pages.contact');
    }

    public function profile(){
        $data['donates'] = Donate::all();
        return view('frontend.pages.profile', $data);
    }
    public function deathNews(){
        $data['donates'] = Donate::all();
        return view('frontend.pages.death-news', $data);
    }
    public function deathOrganTransplant(){
        $data['donates'] = Donate::all();
        return view('frontend.pages.organ_transplant', $data);
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
