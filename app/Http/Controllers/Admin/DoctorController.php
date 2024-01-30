<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Department;
use App\Models\Designation;
use App\Models\Doctor;
use App\Models\User;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
//use Intervention\Image\Facades\Image as Image;
use Image;

use Illuminate\Support\Facades\Validator;

class DoctorController extends Controller
{
    public $user;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('admin')->user();
            return $next($request);
        });
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['doctor'] = Doctor::all();
        return view('admin.doctor.index', $data);
    }

    public function trash()
    {
        $data['doctor'] = Doctor::onlyTrashed()->get();
        return view('admin.doctor.trash-list', $data);
    }

    public function restore($id)
    {
        Doctor::withTrashed()->find($id)->restore();
        return redirect()->route('admin.doctor.index')->with('success', 'Item Restored Successfully');
    }

    public function forceDelete($id)
    {
        $doctor = Doctor::withTrashed()->find($id);
        if($doctor){
            $old_image = $doctor->image;
            if (File::exists($old_image)) {
                File::delete($old_image);
            }
            $doctor->forceDelete();
        }
        return redirect()->back()->with('success', 'Force Delete Successful');
    }

    public function deleteAll(Request $request)
    {
        $ids = $request->ids;

        if(is_null($ids)){
            return redirect()->back()->with('error', 'Nothing to Delete!!');
        } else{
            Doctor::withTrashed()->whereIn('id', $ids)->forceDelete();
            return redirect()->back()->with('success', 'Multiple Data Delete Successful');
        }
    }

    public function changeStatus($id)
    {
        $getStatus = Doctor::select('status')->where('id', $id)->first();
        if ($getStatus->status == 1) {
            $status = 0;
        } else {
            $status = 1;
        }
        Doctor::where('id', $id)->update(['status' => $status]);
        return redirect()->back()->with('success', 'Status Updated Successfully!');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['designation'] = Designation::where('status', '1')->orderBy('name', 'ASC')->get();
        $data['department'] = Department::where('status', '1')->orderBy('name', 'ASC')->get();
        return view('admin.doctor.add', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'desig_id' => 'nullable',
            'dept_id' => 'nullable',
            'type' => 'required',
            'name' => 'required|max:100',
            'email' => 'required|email|unique:doctors,email|max:50',
            'mobile' => 'required|unique:doctors,mobile|numeric|digits:11|regex:/(01)[0-9]{9}/',
            // 'mobile' => 'required|unique:admins,mobile|numeric|digits:11|regex:/(01)[0-9]{9}/',
            'mobile2' => 'nullable|numeric|digits:11|regex:/(01)[0-9]{9}/',
            'gender' => 'required',
            'religion' => 'required',
            'dob' => 'required|date',
            'blood_grp' => 'nullable',
            'degree' => 'nullable|string',
            'specialist' => 'nullable|string',
            'train_certi' => 'nullable|string',
            'hosp_name' => 'nullable|string',
            'exp' => 'nullable|integer',
            'consult_fee' => 'nullable|integer',
            'follow_up_fee' => 'nullable|integer',
            'about' => 'nullable',
            'marital_status' => 'nullable',
            'address' => 'nullable',
            'city' => 'nullable',
            'district' => 'nullable',
            'division' => 'nullable',
            'country' => 'nullable',
        ]);
        if ($validate->fails()) {
            return back()->withErrors($validate)->withInput();
        }

        $doctor_id = IdGenerator::generate(['table' => 'doctors', 'field' => 'doctor_id', 'length' => 10, 'prefix' => 'DT-'. date('Y')]);

        $dob = Carbon::parse($request['dob']);
        $age = $dob->age;

        $doctor = new Doctor();
        $doctor->doctor_id = $doctor_id;
        $doctor->desig_id = $request->desig_id;
        $doctor->dept_id = $request->dept_id;
        $doctor->type = $request->type;
        $doctor->name = $request->name;
        $doctor->email = $request->email;
        $doctor->mobile = $request->mobile;
        $doctor->mobile2 = $request->mobile2;
        $doctor->gender = $request->gender;
        $doctor->religion = $request->religion;
        $doctor->dob = $request->dob;
        $doctor->age = $age;
        $doctor->blood_grp = $request->blood_grp;
        $doctor->degree = $request->degree;
        $doctor->specialist = $request->specialist;
        $doctor->train_certi = $request->train_certi;
        $doctor->hosp_name = $request->hosp_name;
        $doctor->exp = $request->exp;
        $doctor->consult_fee = $request->consult_fee;
        $doctor->follow_up_fee = $request->follow_up_fee;
        $doctor->about = $request->about;
        $doctor->marital_status = $request->marital_status;
        if($request->hasFile('image')){
            $image = $request->file('image');
            $image_upload= hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(300,300)->save('Images/Doctor/'.$image_upload);
            $imgUrl = 'Images/Doctor/'.$image_upload;
            $doctor->image = $imgUrl;
        }
        $doctor->address = $request->address;
        $doctor->city = $request->city;
        $doctor->district = $request->district;
        $doctor->division = $request->division;
        $doctor->country = $request->country;
        $doctor->created_by = Auth::guard('admin')->user()->id;

        $doctor->save();

        if ($doctor) {
            return redirect()->route('admin.doctor.index')->with('success', 'Doctor Added Successfully!');
        }
        return redirect()->route('admin.doctor.index')->with('error', 'Failed to Add Doctor!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['doctor'] = Doctor::find($id);
        $data['designation'] = Designation::all();
        $data['department'] = Department::all();
        return view('admin.doctor.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validate = Validator::make($request->all(), [
            'desig_id' => 'nullable',
            'dept_id' => 'nullable',
            'name' => 'required|max:100',
            'type' => 'required',
            'email' => 'nullable|email|max:50|unique:doctors,email,' .$id,
            // 'email' => 'nullable|email|max:50|unique:admins,email,' .$id,
            'mobile' => 'required|numeric|digits:11|regex:/(01)[0-9]{9}/|unique:doctors,mobile,' .$id,
            // 'mobile' => 'required|numeric|digits:11|regex:/(01)[0-9]{9}/|unique:admins,mobile,' .$id,
            'mobile2' => 'nullable|numeric|digits:11|regex:/(01)[0-9]{9}/',
            'gender' => 'required',
            'religion' => 'required',
            'dob' => 'required|date',
            'blood_grp' => 'nullable',
            'degree' => 'nullable|string',
            'specialist' => 'nullable|string',
            'train_certi' => 'nullable|string',
            'hosp_name' => 'nullable|string',
            'exp' => 'nullable|integer',
            'consult_fee' => 'nullable|integer',
            'follow_up_fee' => 'nullable|integer',
            'about' => 'nullable',
            'marital_status' => 'nullable',
            'address' => 'nullable',
            'city' => 'nullable',
            'district' => 'nullable',
            'division' => 'nullable',
            'country' => 'nullable',
        ]);
        // dd($validate);
        if ($validate->fails()) {
            return back()->withErrors($validate)->withInput();
        }

        $dob = Carbon::parse($request['dob']);
        $age = $dob->age;

        $doctor = Doctor::find($id);
        $doctor->desig_id = $request->desig_id;
        $doctor->dept_id = $request->dept_id;
        $doctor->name = $request->name;
        $doctor->type = $request->type;
        $doctor->email = $request->email;
        $doctor->mobile = $request->mobile;
        $doctor->mobile2 = $request->mobile2;
        $doctor->gender = $request->gender;
        $doctor->religion = $request->religion;
        $doctor->dob = $request->dob;
        $doctor->age = $age;
        $doctor->blood_grp = $request->blood_grp;
        $doctor->degree = $request->degree;
        $doctor->specialist = $request->specialist;
        $doctor->train_certi = $request->train_certi;
        $doctor->hosp_name = $request->hosp_name;
        $doctor->exp = $request->exp;
        $doctor->consult_fee = $request->consult_fee;
        $doctor->follow_up_fee = $request->follow_up_fee;
        $doctor->about = $request->about;
        $doctor->marital_status = $request->marital_status;
        if ($request->hasFile('image')){
            $old_image = $doctor->image;
            if (File::exists($old_image)) {
                File::delete($old_image);
            }
            $image = $request->file('image');
            $image_upload= hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(300,300)->save('Images/Doctor/'.$image_upload);
            $imgUrl = 'Images/Doctor/'.$image_upload;
            $doctor->image = $imgUrl;
        }
        $doctor->address = $request->address;
        $doctor->city = $request->city;
        $doctor->district = $request->district;
        $doctor->division = $request->division;
        $doctor->country = $request->country;
        $doctor->updated_by = Auth::guard('admin')->user()->id;

        if ($doctor->isDirty()) {
            $doctor->update();
            return redirect()->route('admin.doctor.index')->with('success', 'Updated Successfully!');
        }
        return redirect()->route('admin.doctor.index')->with('error', 'Nothing Changed!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Doctor::find($id)->delete();
        return redirect()->back()->with('warning', 'Item Moved To Trash Successfully');
    }
}
