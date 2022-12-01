<?php

namespace App\Http\Controllers\Hospital;

use App\Helpers\InsertLinks;
use App\Http\Controllers\Controller;
use App\Models\HospitalPost;
use App\Models\HospitalPostPhoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HospitalPostSliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return redirect("/");

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $param = $id;
        return view("admin-hospital.hospital-post-photo.create", compact('param'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $postId= $request->get('post_id');
        HospitalPostPhoto::create([
            'post_id'  => $postId,
            'thePhoto' => Session::get('image'),
        ]);
        Session::forget('image');
        return redirect("admin-hospital/hospital-post-photos/$postId");

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $photo = HospitalPostPhoto::where('post_id',$id)->get();
        $param = $id;
        return view("admin-hospital.hospital-post-photo.index", compact('photo','param'));


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return redirect("/");
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
        return redirect("/");
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
        $hospital=HospitalPostPhoto::find($param);
        $image = '/images/'.$hospital->thePhoto;
        $path = str_replace('\\','/',public_path());
        if (file_exists($path.$image) ){
            unlink($path.$image);
            $hospital->delete();
            return 1 ;
        }
        else{
            $hospital->delete();
            return 1;
        }
    }
}
