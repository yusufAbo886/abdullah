<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $setting = DB::table('setting')->where('id',1 )->first();
      return view('admin.setting.edit',compact('setting'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

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
        DB::table('setting')->where('id',1 )->update(
            [
                'theTitle'=>$request->get('theTitle'),
                'theText'=>$request->get('theText'),
                'abstract'=>$request->get('abstract'),
                'keywords'=>$request->get('keywords'),
                'telefon1'=>$request->get('telefon1'),
                'telefon2'=>$request->get('telefon2'),
                'email'=>$request->get('email'),
                'youtube'=>$request->get('youtube'),
                'facebook'=>$request->get('facebook'),
                'linkdin'=>$request->get('linkdin'),
                'instegram'=>$request->get('instegram'),
                'twiter'=>$request->get('twiter'),
                'theAddress'=>$request->get('theAddress'),
                'theMap'=>$request->get('theMap'),
                'theText1'=>$request->get('theText1'),
                'alt'=>$request->get('alt'),
                'thePhoto'=>$request->get('file')

            ]
        );
//        return redirect()->route('admin.setting.index');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id=0,Request $request)
    {
        $param = $request->input('id');

        DB::table('setting')->where('id',$param )->delete();
    }
}
