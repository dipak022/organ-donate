<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Confused;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ConfusedController extends Controller
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
        $data['confuseds'] = Confused::all();
        return view('admin.confused.index', $data);
    }

    public function trash()
    {
        $data['confuseds'] = Confused::onlyTrashed()->get();
        return view('admin.confused.trash-list', $data);
    }

    public function restore($id)
    {
        Confused::withTrashed()->find($id)->restore();
        return redirect()->route('admin.confused.index')->with('success', 'Item Restored Successfully');
    }

    public function forceDelete($id)
    {
        Confused::withTrashed()->find($id)->forceDelete();
        return redirect()->back()->with('success', 'Force Delete Successful');
    }

    public function deleteAll(Request $request)
    {
        $ids = $request->ids;
        if(is_null($ids)){
            return redirect()->back()->with('error', 'Nothing to Delete!!');
        } else{
            Confused::withTrashed()->whereIn('id', $ids)->forceDelete();
            return redirect()->back()->with('success', 'Multiple Data Delete Successful');
        }
    }

    public function changeStatus($id)
    {
        $getStatus = Confused::select('status')->where('id', $id)->first();
        if ($getStatus->status == 1) {
            $status = 0;
        } else {
            $status = 1;
        }
        Confused::where('id', $id)->update(['status' => $status]);
        return redirect()->back()->with('success', 'Status Updated Successfully!');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.confused.add');
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

        $confused = new Confused();
        $confused->name = $request->name;
        $confused->description = $request->description;
        $confused->created_by = Auth::guard('admin')->user()->id;
        $confused->save();
        if ($confused) {
            return redirect()->route('admin.confused.index')->with('success', 'Confused Created Successfully!');
        }
        return redirect()->route('admin.confused.index')->with('error', 'Failed to Create Confused!');
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
        $data['confused'] = Confused::find($id);
        return view('admin.confused.edit', $data);
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

        $confused = Confused::find($id);
        $confused->name = $request->name;
        $confused->description = $request->description;
        $confused->updated_by = Auth::guard('admin')->user()->id;
        if ($confused->isDirty()) {
            $confused->update();
            return redirect()->route('admin.confused.index')->with('success', 'Updated Successfully!');
        }
        return redirect()->route('admin.confused.index')->with('error', 'Nothing Changed!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Confused::find($id)->delete();
        return redirect()->back()->with('warning', 'Item Moved To Trash Successfully');
    }
}
