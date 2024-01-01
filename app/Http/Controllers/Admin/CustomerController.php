<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\User;
use Carbon\Carbon;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    public $user;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('admin')->user();
            return $next($request);
        });
    }

    public function index()
    {
        $data['customer'] = Customer::all();
        return view('admin.Customer.index', $data);
    }

    public function trash()
    {
        $data['customer'] = Customer::onlyTrashed()->get();
        return view('admin.Customer.trash-list', $data);
    }

    public function restore($id)
    {
        Customer::withTrashed()->find($id)->restore();
        return redirect()->route('admin.customer.index')->with('success', 'Item Restored Successfully');
    }

    public function forceDelete($id)
    {
        Customer::withTrashed()->find($id)->forceDelete();
        return redirect()->back()->with('success', 'Force Delete Successful');
    }

    public function deleteAll(Request $request)
    {
        $ids = $request->ids;

        if (is_null($ids)) {
            return redirect()->back()->with('error', 'Nothing to Delete!!');
        } else {
            Customer::withTrashed()->whereIn('id', $ids)->forceDelete();
            return redirect()->back()->with('success', 'Multiple Data Delete Successful');
        }
    }

    public function changeStatus($id)
    {
        $getStatus = Customer::select('status')->where('id', $id)->first();
        if ($getStatus->status == 1) {
            $status = 0;
        } else {
            $status = 1;
        }
        Customer::where('id', $id)->update(['status' => $status]);
        return redirect()->back()->with('success', 'Status Updated Successfully!');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.Customer.add');
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
            'name' => 'required|max:100',
            'email' => 'nullable|email|max:50',
            'mobile' => 'required|unique:customers,mobile|numeric|digits:11|regex:/(01)[0-9]{9}/',
            'gender' => 'required',
            'religion' => 'required',
            'marital_status' => 'nullable',
            'blood_grp' => 'nullable',
            'dob' => 'nullable',
            'occupation' => 'nullable',
            'address' => 'nullable',
            'city' => 'nullable',
            'district' => 'nullable',
            'division' => 'nullable',
            'country' => 'nullable',
            'guard_name' => 'nullable|max:100',
            'guard_mobile' => 'nullable|numeric|digits:11|regex:/(01)[0-9]{9}/',
            'guard_address' => 'nullable',
        ]);
        if ($validate->fails()) {
            return back()->withErrors($validate)->withInput();
        }

        $customer_id = IdGenerator::generate(['table' => 'customers', 'field' => 'customer_id', 'length' => 14, 'prefix' => 'CUS-' . date('Y')]);

        $dob = Carbon::parse($request['dob']);
        $age = $dob->age;

        $customer = new Customer();
        $customer->customer_id = $customer_id;
        $customer->name = $request->name;
        $customer->father_name = $request->father_name;
        $customer->mother_name = $request->mother_name;
        $customer->email = $request->email;
        $customer->mobile = $request->mobile;
        $customer->gender = $request->gender;
        $customer->religion = $request->religion;
        $customer->marital_status = $request->marital_status;
        $customer->blood_grp = $request->blood_grp;
        $customer->dob = $request->dob;
        $customer->age = $age;
        $customer->occupation = $request->occupation;
        $customer->birth_reg = $request->birth_reg;
        $customer->nid = $request->nid;
        $customer->passport = $request->passport;
        $customer->present_address = $request->present_address;
        $customer->present_city = $request->present_city;
        $customer->present_district = $request->present_district;
        $customer->present_division = $request->present_division;
        $customer->permanent_address = $request->permanent_address;
        $customer->permanent_city = $request->permanent_city;
        $customer->permanent_district = $request->permanent_district;
        $customer->permanent_division = $request->permanent_division;
        $customer->country = $request->country;
        $customer->guard_name = $request->guard_name;
        $customer->guard_mobile = $request->guard_mobile;
        $customer->guard_address = $request->guard_address;
        $customer->created_by = Auth::guard('admin')->user()->id;

        $customer->save();
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make("12345678");
        $user->save();
        return redirect()->back()->with('success', 'Customer Created Successfully!');
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
        $data['customer'] = Customer::find($id);
        return view('admin.Customer.edit', $data);
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
            'name' => 'required|max:100',
            'email' => 'nullable|email|max:50',
            'mobile' => 'required|numeric|digits:11|regex:/(01)[0-9]{9}/|unique:customers,mobile,' . $id,
            'gender' => 'required',
            'religion' => 'required',
            'marital_status' => 'nullable',
            'blood_grp' => 'nullable',
            'dob' => 'nullable',
            'occupation' => 'nullable',
            'address' => 'nullable',
            'city' => 'nullable',
            'district' => 'nullable',
            'division' => 'nullable',
            'country' => 'nullable',
            'guard_name' => 'nullable|max:100',
            'guard_mobile' => 'nullable|numeric|digits:11|regex:/(01)[0-9]{9}/',
            'guard_address' => 'nullable',
        ]);
        if ($validate->fails()) {
            return back()->withErrors($validate)->withInput();
        }

        $dob = Carbon::parse($request['dob']);
        $age = $dob->age;

        $customer = Customer::find($id);
        $customer->name = $request->name;
        $customer->father_name = $request->father_name;
        $customer->mother_name = $request->mother_name;
        $customer->email = $request->email;
        $customer->mobile = $request->mobile;
        $customer->gender = $request->gender;
        $customer->religion = $request->religion;
        $customer->marital_status = $request->marital_status;
        $customer->blood_grp = $request->blood_grp;
        $customer->dob = $request->dob;
        $customer->age = $age;
        $customer->occupation = $request->occupation;
        $customer->birth_reg = $request->birth_reg;
        $customer->nid = $request->nid;
        $customer->passport = $request->passport;
        $customer->present_address = $request->present_address;
        $customer->present_city = $request->present_city;
        $customer->present_district = $request->present_district;
        $customer->present_division = $request->present_division;
        $customer->permanent_address = $request->permanent_address;
        $customer->permanent_city = $request->permanent_city;
        $customer->permanent_district = $request->permanent_district;
        $customer->permanent_division = $request->permanent_division;

        $customer->country = $request->country;
        $customer->guard_name = $request->guard_name;
        $customer->guard_mobile = $request->guard_mobile;
        $customer->guard_address = $request->guard_address;
        $customer->created_by = Auth::guard('admin')->user()->id;

        if ($customer->isDirty()) {
            $customer->update();
            return redirect()->route('admin.customer.index')->with('success', 'Updated Successfully!');
        }
        return redirect()->route('admin.customer.index')->with('error', 'Nothing Changed!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Customer::find($id)->delete();
        return redirect()->back()->with('warning', 'Item Moved To Trash Successfully');
    }
}
