<?php

namespace App\Http\Controllers\Doctor;

use App\Helpers\InsertLinks;
use App\Helpers\Post;
use App\Http\Controllers\Controller;
use App\Http\Requests\DoctorPostRequest;
use App\Models\DoctorPost;
use App\Models\HospitalPost;
use App\Models\HospitalPostPhoto;
use App\Models\Links;
use App\Models\PostActive;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class DoctorPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {    $userId = Auth::id();
        $chek = DoctorPost::where('user_id',$userId)->first();
        $exist = '';
        if (isset($chek)) {
            $exist = $chek->id;
        }
        $doctor = DoctorPost::addSelect(['isActive' =>
                PostActive::select('isActive')
                    ->whereColumn('user_id', 'doctor_posts.user_id')
                    ->whereColumn('post_id', 'doctor_posts.id'),
            ])->get();

        return view("admin-doctor.doctor-post.index", compact('doctor','exist'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin-doctor.doctor-post.create");

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DoctorPostRequest $request)
    {
        $validated = $request->validated();
        $userId = Auth::id();
        $chek = DoctorPost::where('user_id',$userId)->first();

        if (isset($chek)){
            $exist = $chek->id;
            return redirect()->route('doctor-post.index',compact('exist'));
        }else{
            $doctor = new doctorPost;
            $doctor->theTitleEn = $request->theTitleEn;
            $doctor->theTitleTr = $request->theTitleTr;
            $doctor->theLocation = $request->theLocation;
            $doctor->thePhone = $request->thePhone;
            $doctor->theEmail = $request->theEmail;
            $doctor->theWebsite = $request->theWebsite;
            $doctor->facebook = $request->facebook;
            $doctor->instegram = $request->instegram;
            $doctor->twiter = $request->twiter;
            $doctor->map = $request->map;
            $doctor->theTextEn = $request->theTextEn;
            $doctor->theTextTr = $request->theTextTr;
            $doctor->thePhoto = Session::get('image');
            $doctor->user_id = $userId;
            $doctor->save();
            Session::forget('image');
            $url = permalink($request->url);
            $page = "doctorPost";
            $id = $doctor->id;
            $isActive = 0;
            $post = Post::post($id,$userId,$page,$isActive);
            $link = InsertLinks::link($id, $url, $page);
            return redirect()->route('doctor-post.index');
        }



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
        $post = DoctorPost::addSelect(['url' => Links::select('url')
            ->whereColumn('content_id', 'doctor_posts.id',)
            ->where('page', 'doctorPost')
        ])->where('id', $id)->first();
        return view('admin-doctor.doctor-post.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DoctorPostRequest $request, $id)
    {

        $doctor = DoctorPost::find($id);
        $doctor->theTitleEn = $request->input('theTitleEn');
        $doctor->theTitleTr = $request->input('theTitleTr');
        $doctor->theLocation = $request->input('theLocation');
        $doctor->thePhone = $request->input('thePhone');
        $doctor->theEmail = $request->input('theEmail');
        $doctor->theWebsite = $request->input('theWebsite');
        $doctor->facebook = $request->input('facebook');
        $doctor->instegram = $request->input('instegram');
        $doctor->twiter = $request->input('twiter');
        $doctor->map = $request->input('map');
        $doctor->theTextEn = $request->input('theTextEn');
        $doctor->theTextTr = $request->input('theTextTr');
        if (Session::has('image')) {
            $image = Session::get('image');
            $exist_image = '/images/' . $doctor->thePhoto;
            $path = str_replace('\\', '/', public_path());
            if (file_exists($path . $exist_image)) {
                unlink($path . $exist_image);
            }
            $doctor->thePhoto = $image;
            Session::forget('image');
        }
        $doctor->update();
        $url = permalink($request->input('url'));
        $page = "doctorPost";
        InsertLinks::update($id, $url, $page);
        return redirect()->route('doctor-post.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
