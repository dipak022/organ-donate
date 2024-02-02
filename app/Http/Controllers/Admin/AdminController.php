<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Image;
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function passwordView()
    {
        $data['user'] = Auth::guard('admin')->user();
        return view('admin.User.password', $data);
    }

    public function passwordUpdate(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'new_password' => 'required|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/|max:100',
            'old_password' => 'required',
        ]);


        #Match The Old Password
        if(!Hash::check($request->old_password, Auth::guard('admin')->user()->password)){
            session()->flash("success", "Old Password Doesn't match!");
            return redirect()->back();
        }


        #Update the new Password
        Admin::whereId(Auth::guard('admin')->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);
        session()->flash("success", "Password changed successfully!");
        return redirect()->back();
}

    public function profile()
    {
        $data['user'] = Auth::guard('admin')->user();
        return view('admin.User.prodile-update', $data);
    }
    public function profileUpdate(Request $request, $id)
    {
        $validate = Validator::make($request->all(), [
            'mobile' => 'required|unique:admins,mobile|numeric|digits:11|regex:/(01)[0-9]{9}/',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            
        ]);
        $user=Admin::find($id);
        if(!empty($user)){
            if($request->image) {
                if($request->old_image){
                    unlink($request->old_image);
                }
                $image = $request->file('image');
                $image_upload = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
                Image::make($image)->resize(300, 300)->save('Images/profile/' . $image_upload);
                $imgUrl = 'Images/profile/' . $image_upload;
                $image_url = $imgUrl;
                $user->image = $image_url;
                $user->name = $request->name;
                $user->mobile = $request->mobile;
               
                $user->save();
                session()->flash('success', 'Profile Updated successfully!!');
            }else{
                $user->name = $request->name;
                $user->mobile = $request->mobile;
                $user->save();
                session()->flash('success', 'Profile Updated successfully!!');
            }
            
            return redirect()->back();
        }else{
            session()->flash('success', 'Profile Updated unsuccessfully!!');
        }
    }


}
