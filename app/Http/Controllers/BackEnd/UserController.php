<?php

namespace App\Http\Controllers\BackEnd;

use App\Helpers\Post;
use App\Http\Controllers\Controller;
use App\Models\DoctorPost;
use App\Models\HospitalPost;
use App\Models\HospitalPostPhoto;
use App\Models\PostActive;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Laratrust\Laratrust;
use function GuzzleHttp\Promise\all;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $users =User::with(['roles:id,display_name'])
            ->addSelect(['isActive'=>
               PostActive::select(DB::raw('count(*)'))
                    ->where('isActive', '=', 0)
                    ->whereColumn('user_id','users.id')
                    ->groupBy('user_id')
            ])->get();
    return view("admin.users.index", compact('users'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $postId =$request->input('id');
       $userId =$request->input('userId');
        $isActive =$request->input('isActive');
       $table = "hospitalPost";
       Post::updatePost($postId,$userId,$table,$isActive);
      return 1;

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post= HospitalPost::with(['category:id,theNameEn']) ->with(['subcategory:id,theNameEn']) ->addSelect(['isActive' =>
            PostActive::select('isActive')
                ->whereColumn('user_id', 'hospital_posts.user_id')
                ->whereColumn('post_id', 'hospital_posts.id'),
            'photos_exist' =>
                HospitalPostPhoto::select('id')
                    ->whereColumn('post_id', 'hospital_posts.id')
        ])->where('user_id',$id)->get();
        return view("admin.users.edit", compact('post'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = DoctorPost::addSelect(['isActive' =>
            PostActive::select('isActive')
                ->whereColumn('user_id', 'doctor_posts.user_id')
                ->whereColumn('post_id', 'doctor_posts.id')
        ])->where('user_id',$id)->get();
        return view("admin.users.doctor", compact('post'));
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
        //
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
