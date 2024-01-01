<?php

namespace App\Http\Controllers\Admin\Setup;

use App\Http\Controllers\Controller;
use App\Models\BedType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class BedTypeController extends Controller
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
        $data['bed_types'] = BedType::all();
        return view('admin.setup.bed_type.index', $data);
    }

    public function trash()
    {
        $data['bed_types'] = BedType::onlyTrashed()->get();
        return view('admin.setup.bed_type.trash-list', $data);
    }

    public function restore($id)
    {
        BedType::withTrashed()->find($id)->restore();
        return redirect()->route('admin.bed-type.index')->with('success', 'Item Restored Successfully');
    }

    public function forceDelete($id)
    {
        BedType::withTrashed()->find($id)->forceDelete();
        return redirect()->back()->with('success', 'Force Delete Successful');
    }

    public function deleteAll(Request $request)
    {
        $ids = $request->ids;

        if(is_null($ids)){
            return redirect()->back()->with('error', 'Nothing to Delete!!');
        } else{
            BedType::withTrashed()->whereIn('id', $ids)->forceDelete();
            return redirect()->back()->with('success', 'Multiple Data Delete Successful');
        }
    }

    public function changeStatus($id)
    {
        $getStatus = BedType::select('status')->where('id', $id)->first();
        if ($getStatus->status == 1) {
            $status = 0;
        } else {
            $status = 1;
        }
        BedType::where('id', $id)->update(['status' => $status]);
        return redirect()->back()->with('success', 'Status Updated Successfully!');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.setup.bed_type.add');
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
            'bed_type' => 'required|string',
        ]);

        if ($validate->fails()) {
            return back()->withErrors($validate)->withInput();
        }

        $cabin = new BedType();
        $cabin->bed_type = $request->bed_type ;
        $cabin->created_by = Auth::guard('admin')->user()->id;
        $cabin->save();
        if ($cabin) {
            return redirect()->route('admin.bed-type.index')->with('success', 'Bed Type Created Successfully!');
        }
        return redirect()->route('admin.bed-type.index')->with('error', 'Failed to Create Bed Type!');
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
        $data['bed_type'] = BedType::find($id);
        return view('admin.setup.bed_type.edit', $data);
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
            'bed_type' => 'required|string',
        ]);

        if ($validate->fails()) {
            return back()->withErrors($validate)->withInput();
        }

        $cabin = BedType::find($id);
        $cabin->bed_type = $request->bed_type ;
        $cabin->updated_by = Auth::guard('admin')->user()->id;
        if ($cabin->isDirty()) {
            $cabin->update();
            return redirect()->route('admin.bed-type.index')->with('success', 'Updated Successfully!');
        }
        return redirect()->route('admin.bed-type.index')->with('error', 'Nothing Changed!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        BedType::find($id)->delete();
        $getUser = Auth::guard('admin')->user()->id;
        BedType::where('id', $id)->update(['deleted_by' => $getUser]);
        return redirect()->back()->with('warning', 'Item Moved To Trash Successfully');
    }
}
