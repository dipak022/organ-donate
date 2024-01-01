<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Donate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use DateTime;

class DonateController extends Controller
{
    public function organDoantionStore(Request $request){

        if(!Auth::check()){
            return redirect()->route('home')->with('warning', 'At first create or login your account !');
        }

        $validate = Validator::make($request->all(), [
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'date_of_bith' => 'required|date',
            'phone' => 'required|string',
            'address' => 'required|string',
            'city' => 'required|string',
            'postal_code' => 'required|string',
            'country' => 'required|string',
            'email' => 'required|string',
            'height' => 'required|string',
            'weight' => 'required|string',
            'gender' => 'required|string',
            'permission_to_donate' => 'required|string',
            'organs_tissues_for' => 'required|string',
            'donor_signature' => 'required|string',
            'anything_description' => 'nullable|string',
        ]);

        if ($validate->fails()) {
            return back()->withErrors($validate)->withInput();
        }

        $donate = new Donate();
        $donate->first_name = $request->first_name;
        $donate->first_name = $request->first_name;
        $donate->date_of_bith = strtotime($request->date_of_bith) ? (new DateTime($request->date_of_bith))->format('Y-m-d') : null;
        $donate->phone = $request->phone;
        $donate->address = $request->address;
        $donate->address_line = $request->address_line;
        $donate->city = $request->city;
        $donate->postal_code = $request->postal_code;
        $donate->country = $request->country;
        $donate->email = $request->email;
        $donate->height = $request->height;
        $donate->weight = $request->weight;
        $donate->gender = $request->gender;
        $donate->permission_to_donate = $request->permission_to_donate;
        $donate->organs_tissues_for = $request->organs_tissues_for;
        $donate->specific_organs_tissues_name = $request->specific_organs_tissues_name;
        $donate->donor_signature = $request->donor_signature;
        $donate->anything_description = $request->anything_description;
        $donate->status = 1;
        $donate->created_by = Auth::user()->id;
        $donate->save();
        if ($donate) {
            return redirect()->route('home')->with('success', 'Organ Donation Form Submit Successfully!');
        }
        return redirect()->route('home')->with('error', 'Failed to submit Organ Donation!');
    }
}
