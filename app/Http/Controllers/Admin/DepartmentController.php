<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class DepartmentController extends Controller
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
        $data['department'] = Department::all();
        return view('admin.Department.index', $data);
    }

    public function trash()
    {
        $data['department'] = Department::onlyTrashed()->get();
        return view('admin.Department.trash-list', $data);
    }

    public function restore($id)
    {
        Department::withTrashed()->find($id)->restore();
        return redirect()->route('admin.department.index')->with('success', 'Item Restored Successfully');
    }

    public function forceDelete($id)
    {
        Department::withTrashed()->find($id)->forceDelete();
        return redirect()->back()->with('success', 'Force Delete Successful');
    }

    public function deleteAll(Request $request)
    {
        $ids = $request->ids;
        if(is_null($ids)){
            return redirect()->back()->with('error', 'Nothing to Delete!!');
        } else{
            Department::withTrashed()->whereIn('id', $ids)->forceDelete();
            return redirect()->back()->with('success', 'Multiple Data Delete Successful');
        }
    }

    public function changeStatus($id)
    {
        $getStatus = Department::select('status')->where('id', $id)->first();
        if ($getStatus->status == 1) {
            $status = 0;
        } else {
            $status = 1;
        }
        Department::where('id', $id)->update(['status' => $status]);
        return redirect()->back()->with('success', 'Status Updated Successfully!');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.Department.add');
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
            'name' => 'nullable|string',
            'description' => 'nullable',
        ]);

        if ($validate->fails()) {
            return back()->withErrors($validate)->withInput();
        }

        $department = new Department();
        $department->name = $request->name;
        $department->description = $request->description;
        $department->created_by = Auth::guard('admin')->user()->id;
        $department->save();
        if ($department) {
            return redirect()->route('admin.department.index')->with('success', 'Department Created Successfully!');
        }
        return redirect()->route('admin.department.index')->with('error', 'Failed to Create Department!');
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
        $data['department'] = Department::find($id);
        return view('admin.Department.edit', $data);
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
            'name' => 'required|string',
            'description' => 'nullable',
        ]);

        if ($validate->fails()) {
            return back()->withErrors($validate)->withInput();
        }

        $department = Department::find($id);
        $department->name = $request->name;
        $department->description = $request->description;
        $department->updated_by = Auth::guard('admin')->user()->id;
        if ($department->isDirty()) {
            $department->update();
            return redirect()->route('admin.department.index')->with('success', 'Updated Successfully!');
        }
        return redirect()->route('admin.department.index')->with('error', 'Nothing Changed!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Department::find($id)->delete();
        return redirect()->back()->with('warning', 'Item Moved To Trash Successfully');
    }
}
