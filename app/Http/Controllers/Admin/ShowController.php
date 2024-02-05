<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OrganTransplant;
use Illuminate\Http\Request;
use App\Models\Donate;
use App\Models\DeathDonate;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use DateTime;
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
    public function deathOrganTransplantShow(){
        $data['organ_transplants'] = OrganTransplant::with(['user','donate'])->get();
        return view('admin.show.organ_transplant', $data);
    }
    public function userAccountShow(){
        $data['users'] = User::all();
        return view('admin.show.user', $data);
    }


    public function changeStatus($id)
    {
        $getStatus = Donate::select('use_status')->where('id', $id)->first();
        if ($getStatus->use_status == 1) {
            $status = 0;
        } else {
            $status = 1;
        }
        Donate::where('id', $id)->update(['use_status' => $status]);
        return redirect()->back()->with('success', 'Status Updated Successfully!');
    }

    public function donateConfirm(Request $request, $id){

        $donate = Donate::find($id);
        $donate->use_anything_description = $request->use_anything_description;
        $donate->use_date = strtotime($request->use_date) ? (new DateTime($request->use_date))->format('Y-m-d') : null;
        $donate->updated_by = Auth::guard('admin')->user()->id;
        if ($donate->isDirty()) {
            $donate->update();
            return redirect()->route('admin.donate.show')->with('success', 'Updated Successfully!');
        }
        return redirect()->route('admin.donate.show')->with('error', 'Nothing Changed!');
    }


}
