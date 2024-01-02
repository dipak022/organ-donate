<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Donate;
use App\Models\DeathDonate;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class ShowController extends Controller
{
    public $user;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('admin')->user();
            return $next($request);
        });
    }


    public function donateShow(){
        $data['donates'] = Donate::with(['user'])->get();
        return view('admin.show.donate', $data);
    }
    public function deathDonateShow(){
        $data['death_donates'] = DeathDonate::with(['user','donate'])->get();
        return view('admin.show.death_donate', $data);
    }
    public function userAccountShow(){
        $data['users'] = User::all();
        return view('admin.show.user', $data);
    }


}
