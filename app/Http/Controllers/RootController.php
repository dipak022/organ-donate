<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donate;
class RootController extends Controller
{
    public function home(){
        $data['donates'] = Donate::all();
        return view('frontend.index', $data);
    }

    
}
