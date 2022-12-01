<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use App\Http\Requests\ClinicRequest;
use App\Models\Blog;
use App\Models\Clinic;
use Illuminate\Http\Request;

class ClinicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clinic = Clinic::all();
        return view("admin.clinic.index", compact('clinic'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.clinic.create");

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\ClinicRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClinicRequest $request)
    {
        $clinic = new Clinic;
        $clinic->theName = $request->theName;
        $clinic->thePhoto = $request->file;
        $clinic->save();
        return redirect()->route('clinic.index');
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
        $clinic = Clinic::find($id);
        return view('admin.clinic.edit', compact('clinic'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\ClinicRequest $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ClinicRequest $request, $id)
    {
        $validated = $request->validated();
        $clinic = Clinic::find($id);
        $clinic->theName = $request->input('theName');
        $clinic->thePhoto = $request->input('file');
        $clinic->update();
        return redirect()->route('clinic.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id=0,Request $request)
    {
        $param = $request->get('id');
        $clinic=Clinic::find($param);
        $clinic->delete();
        return  1;
    }
}
