<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Donate;
use App\Models\DeathDonate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use DateTime;

class DonateController extends Controller
{
    public function organDoantionStore(Request $request){
        //return $request->all();

        

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
            'anything_description' => 'nullable|string',
        ]);

        if ($validate->fails()) {
            return back()->withErrors($validate)->withInput();
        }

        $donate = new Donate();
        $donate->user_id = Auth::user()->id;
        $donate->first_name = $request->first_name;
        $donate->last_name = $request->last_name;
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
        if($request->hasFile('donor_signature')){
            $image = $request->file('donor_signature');
            $image_upload= hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(300,300)->save('Images/signature/'.$image_upload);
            $imgUrl = 'Images/signature/'.$image_upload;
            $donate->donor_signature = $imgUrl;
        }

        $donate->anything_description = $request->anything_description;
        $donate->status = 1;
        $donate->created_by = Auth::user()->id;
        $donate->save();
        if ($donate) {
            $notification = array(
                'message' => 'Organ Donation Form Submit Successfully!',
                'alert-type' => 'success'
            );
            return redirect()->route('home')->with($notification);
        }
        $notification = array(
            'message' => 'Failed to submit Organ Donation!',
            'alert-type' => 'error'
        );
        return redirect()->route('home')->with($notification);
    }


    public function deathOrganDoantionStatusStore(Request $request){

        

        $validate = Validator::make($request->all(), [
            'donate_id' => 'required',
            'death_date' => 'required|date',
            'death_time' => 'required|string',
            'phone' => 'required|string',
            'address' => 'required|string',
            'city' => 'required|string',
            'postal_code' => 'required|string',
            'country' => 'required|string',
            'email' => 'required|string',
            'death_organs_tissues_status' => 'required|string',
            'collect_organ_location' => 'required|string',
            'anything_description' => 'nullable|string',
        ]);

        if ($validate->fails()) {
            return back()->withErrors($validate)->withInput();
        }

        $death_donate_id = Donate::where('id',$request->donate_id)->first()->user_id;

        $death_donate = new DeathDonate();
        $death_donate->donate_id = $request->donate_id;
        $death_donate->death_donate_id = $death_donate_id;
        $death_donate->death_date = strtotime($request->death_date) ? (new DateTime($request->death_date))->format('Y-m-d') : null;
        $death_donate->death_time = $request->death_time;
        $death_donate->phone = $request->phone;
        $death_donate->address = $request->address;
        $death_donate->address_line = $request->address_line;
        $death_donate->city = $request->city;
        $death_donate->postal_code = $request->postal_code;
        $death_donate->country = $request->country;
        $death_donate->email = $request->email;
        $death_donate->death_organs_tissues_status = $request->death_organs_tissues_status;
        $death_donate->collect_organ_location = $request->collect_organ_location;
        $death_donate->anything_description = $request->anything_description;
        $death_donate->status = 1;
        $death_donate->created_by = $death_donate_id;
        $death_donate->save();
        if ($death_donate) {
            $notification = array(
                'message' => 'Organ Death Donation Form Submit Successfully!',
                'alert-type' => 'success'
            );
            return redirect()->route('home')->with($notification);
        }
        $notification = array(
            'message' => 'Failed to submit Organ Death Donation!',
            'alert-type' => 'error'
        );
        return redirect()->route('home')->with($notification);
    }
}
