<?php

namespace App\Http\Controllers\Hospital;

use App\Helpers\InsertLinks;

use App\Helpers\Post;
use App\Http\Controllers\Controller;
use App\Http\Requests\HospitalPostRequest;
use App\Models\Category;
use App\Models\HospitalPost;
use App\Models\HospitalPostPhoto;
use App\Models\Links;
use App\Models\PostActive;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class HospitalPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userId = Auth::id();
        $hospital = HospitalPost::with(['category:id,theNameEn'])
            ->with(['subcategory:id,theNameEn'])
            ->where('user_id', '=', $userId)
            ->addSelect(['isActive' =>
                PostActive::select('isActive')
                    ->whereColumn('user_id', 'hospital_posts.user_id')
                    ->whereColumn('post_id', 'hospital_posts.id'),
                'photos_exist' =>
                    HospitalPostPhoto::select('id')
                        ->whereColumn('post_id', 'hospital_posts.id')
            ])->get();

        return view("admin-hospital.hospital-post.index", compact('hospital'));

//        return view("admin-hospital.hospital-post.photo");

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $hospital = HospitalPost::all();
        $category = Category::all();
        return view("admin-hospital.hospital-post.create", compact('hospital', 'category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(HospitalPostRequest $request)
    {
        $userId = Auth::id();
        $validated = $request->validated();
        $hospital = new hospitalPost;
        $hospital->theTitleEn = $request->theTitleEn;
        $hospital->theTitleTr = $request->theTitleTr;
        $hospital->theLocation = $request->theLocation;
        $hospital->thePhone = $request->thePhone;
        $hospital->theEmail = $request->theEmail;
        $hospital->theWebsite = $request->theWebsite;
        $hospital->facebook = $request->facebook;
        $hospital->instegram = $request->instegram;
        $hospital->twiter = $request->twiter;
        $hospital->map = $request->map;
        $hospital->theTextEn = $request->theTextEn;
        $hospital->theTextTr = $request->theTextTr;
        $hospital->thePhoto = Session::get('image');
        $hospital->category_id = $request->category_id;
        $hospital->subCategory_id = $request->subcategory;
        $hospital->user_id = $userId;
        $hospital->save();
        Session::forget('image');
        $url = permalink($request->url);
        $page = "hospitalPost";
        $id = $hospital->id;
        $isActive = 0;
        $post = Post::post($id, $userId, $page, $isActive);
        $link = InsertLinks::link($id, $url, $page);
        return redirect()->route('hospital-post.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id = 0, Request $request)
    {
        $param = $request->get('id');
        $subcategory = Subcategory::where('category_id', $param)->pluck('theNameEn', 'id');
        return response()->json($subcategory);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
//      Session::forget('image');

        $hospital = HospitalPost::addSelect(['url' => Links::select('url')
            ->whereColumn('content_id', 'hospital_posts.id',)
            ->where('page', 'hospitalPost')
        ])->where('id', $id)->first();
        $category = Category::all();
        $subcategory = Subcategory::where('category_id','=',$hospital->category_id)->get();
        return view('admin-hospital.hospital-post.edit', compact('hospital', 'category', 'subcategory'));


    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(HospitalPostRequest $request, $id)
    {

        $hospital = HospitalPost::find($id);
        $hospital->theTitleEn = $request->input('theTitleEn');
        $hospital->theTitleTr = $request->input('theTitleTr');
        $hospital->theLocation = $request->input('theLocation');
        $hospital->thePhone = $request->input('thePhone');
        $hospital->theEmail = $request->input('theEmail');
        $hospital->theWebsite = $request->input('theWebsite');
        $hospital->facebook = $request->input('facebook');
        $hospital->instegram = $request->input('instegram');
        $hospital->twiter = $request->input('twiter');
        $hospital->map = $request->input('map');
        $hospital->theTextEn = $request->input('theTextEn');
        $hospital->theTextTr = $request->input('theTextTr');
        if (Session::has('image')) {
            $image = Session::get('image');
            $exist_image = '/images/' . $hospital->thePhoto;
            $path = str_replace('\\', '/', public_path());
            if (file_exists($path . $exist_image)) {
                unlink($path . $exist_image);
            }
            $hospital->thePhoto = $image;
            Session::forget('image');
        }
        $hospital->subCategory_id = $request->input('subcategory');
        $hospital->category_id = $request->input('category_id');
        $hospital->update();
        $url = permalink($request->input('url'));
        $page = "hospitalPost";
        InsertLinks::update($id, $url, $page);
        return redirect()->route('hospital-post.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id = 0, Request $request)
    {
        if (Session::has('image')) {
            Session::forget('image');
        }
        $param = $request->get('id');
        $hospital = HospitalPost::find($param);
        $page = "hospitalPost";
        InsertLinks::delete($param, $page);
        $image = '/images/' . $hospital->thePhoto;
        $path = str_replace('\\', '/', public_path());
        if (file_exists($path . $image)) {
            unlink($path . $image);
            $hospital->delete();
            return 1;
        } else {
            $hospital->delete();
            return 1;
        }

    }
}
