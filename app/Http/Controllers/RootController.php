<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donate;
use App\Models\Doctor;
class RootController extends Controller
{
    public function home(){
        $data['doctors'] = Doctor::with(['designation','department'])->get();
        $data['donates'] = Donate::where('use_status',1)->get();
        return view('frontend.index', $data);
    }

    
}
