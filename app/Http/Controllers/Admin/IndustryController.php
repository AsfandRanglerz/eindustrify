<?php

namespace App\Http\Controllers\Admin;

use App\Models\Industry;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndustryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $industries=Industry::get();
        return view('admin.industry.industry', compact('industries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.industry.create_industry');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name'=>'required|unique:industries',
            'status'=>'required'
        ];
        $customMessages = [
            'name.required' => trans('admin_validation.Name is required'),
            'name.unique' => trans('admin_validation.Name already exist'),
        ];
        $this->validate($request, $rules,$customMessages);

        $industry=new Industry();
        $industry->name = $request->name;
        $industry->status = $request->status;
        $industry->save();

        $notification=trans('admin_validation.Created Successfully');
        $notification=array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->back()->with($notification);
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
        $industry = Industry::find($id);
        return view('admin.industry.edit_industry', compact('industry'));
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
        $industry = Industry::find($id);
        $rules = [
            'name'=>'required|unique:industries,name,'.$industry->id,
            'status'=>'required'
        ];
        $customMessages = [
            'name.required' => trans('admin_validation.Name is required'),
            'name.unique' => trans('admin_validation.Name already exist'),
        ];
        $this->validate($request, $rules,$customMessages);

        $industry->name = $request->name;
        $industry->status = $request->status;
        $industry->save();

        $notification=trans('admin_validation.Updated Successfully');
        $notification=array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->route('admin.industry.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $industry = Industry::find($id);
        $industry->delete();
        $notification=trans('admin_validation.Delete Successfully');
        $notification=array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->route('admin.industry.industry')->with($notification);
    }
    public function changeStatus($id){
        $industry = Industry::find($id);
        if($industry->status==1){
            $industry->status=0;
            $industry->save();
            $message= trans('admin_validation.Inactive Successfully');
        }else{
            $industry->status=1;
            $industry->save();
            $message= trans('admin_validation.Active Successfully');
        }
        return response()->json($message);
    }
}
