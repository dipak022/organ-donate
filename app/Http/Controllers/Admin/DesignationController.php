<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Designation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class DesignationController extends Controller
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
        $data['designation'] = Designation::all();
        return view('admin.Designation.index', $data);
    }

    public function trash()
    {
        $data['designation'] = Designation::onlyTrashed()->get();
        return view('admin.Designation.trash-list', $data);
    }

    public function restore($id)
    {
        Designation::withTrashed()->find($id)->restore();
        return redirect()->route('admin.designation.index')->with('success', 'Item Restored Successfully');
    }

    public function forceDelete($id)
    {
        Designation::withTrashed()->find($id)->forceDelete();
        return redirect()->back()->with('success', 'Force Delete Successful');
    }

    public function deleteAll(Request $request)
    {
        $ids = $request->ids;
        if(is_null($ids)){
            return redirect()->back()->with('error', 'Nothing to Delete!!');
        } else{
            Designation::withTrashed()->whereIn('id', $ids)->forceDelete();
            return redirect()->back()->with('success', 'Multiple Data Delete Successful');
        }
    }

    public function changeStatus($id)
    {
        $getStatus = Designation::select('status')->where('id', $id)->first();
        if ($getStatus->status == 1) {
            $status = 0;
        } else {
            $status = 1;
        }
        Designation::where('id', $id)->update(['status' => $status]);
        return redirect()->back()->with('success', 'Status Updated Successfully!');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.Designation.add');
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
            'name' => 'required|string',
            'description' => 'nullable',
        ]);

        if ($validate->fails()) {
            return back()->withErrors($validate)->withInput();
        }

        $designation = new Designation();
        $designation->name = $request->name;
        $designation->description = $request->description;
        $designation->created_by = Auth::guard('admin')->user()->id;
        $designation->save();
        if ($designation) {
            return redirect()->route('admin.designation.index')->with('success', 'Designation Created Successfully!');
        }
        return redirect()->route('admin.designation.index')->with('error', 'Failed to Create Designation!');
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
        $data['designation'] = Designation::find($id);
        return view('admin.Designation.edit', $data);
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

        $designation = Designation::find($id);
        $designation->name = $request->name;
        $designation->description = $request->description;
        $designation->updated_by = Auth::guard('admin')->user()->id;
        if ($designation->isDirty()) {
            $designation->update();
            return redirect()->route('admin.designation.index')->with('success', 'Updated Successfully!');
        }
        return redirect()->route('admin.designation.index')->with('error', 'Nothing Changed!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Designation::find($id)->delete();
        return redirect()->back()->with('warning', 'Item Moved To Trash Successfully');
    }
}
