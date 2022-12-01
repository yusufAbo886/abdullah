<?php

namespace App\Http\Controllers;

use App\Helpers\Languge;
use App\Helpers\Post;
use App\Models\Blog;
use App\Models\Category;
use App\Models\DoctorPost;
use App\Models\HospitalPost;
use App\Models\HospitalPostPhoto;
use App\Models\Links;
use App\Models\PostActive;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Mail;
use App\Mail\MyTestMail;
use Sabberworm\CSS\Settings;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $changeLanguge = Languge::category();

//        $categories = Category::all();
        $categories = Category::select('categories.*',$changeLanguge['theName'])->addSelect(['url' => Links::select('url')
            ->whereColumn('content_id', 'categories.id',)
            ->where('page', 'category')
        ])->latest('created_at')->get();
      view()->share(['categories'=> $categories]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request  $request,$slug = null,$slug1 = null, $all = null )
    {
        if ($slug){

            $url2 = str_replace("-", "_", $slug);
            $url3 = str_replace("-", "_", $slug1);
              if ($slug1 !=null ) {
            if (method_exists($this, $url3)){
              return $this->$url3();
            }else {
                    return $this->find_page($slug1);
                    exit();
            }

          } elseif(method_exists($this, $url2)) {

            // if ($slug1){
                // if ($all){
                //      return $this->$url2($slug1,$all);
                // }else{
                   return $this->$url2($request);
                // }
            // }else{
            //    return $this->$url2($request);
            // }
            }else{
               return $this->find_page($slug);
                 exit();
            }


        }else{
            $changeLanguge = Languge::post();
            $changeLangCty = Languge::category();
            $hospital = HospitalPost::
            join('post_actives',function ($join){
                $join->on('post_id','=','hospital_posts.id');
                $join->where('table_name','=',"hospitalPost");
            })->
           join('links',function ($joins){
                $joins->on('content_id','=','hospital_posts.id');
                $joins->where('page','=',"hospitalPost");
            })->select(['hospital_posts.id','hospital_posts.created_at',
                'hospital_posts.'.$changeLanguge['theTitle'],
                'hospital_posts.theLocation','hospital_posts.thePhone',
                'hospital_posts.theWebsite','hospital_posts.theEmail',
                'hospital_posts.facebook','hospital_posts.instegram',
                'hospital_posts.twiter','hospital_posts.map',
                'hospital_posts.thePhoto','hospital_posts.instegram',
                'post_actives.isActive',
                'links.url'
            ])->where('isActive','=',1)->latest('created_at')->limit(5)->get();
            $category = Category::get([$changeLangCty['theName']]);
            $blog = Blog::select('blogs.*',$changeLanguge['theTitle'],$changeLanguge['theText'])->addSelect(['url' => Links::select('url')
                ->whereColumn('content_id', 'blogs.id',)
                ->where('page', 'blog')
            ])->latest('created_at')->limit(3)->get();
//            return $category;


          return view('index',compact('hospital','blog','category'));
        }
    }





    public function find_page($slug){
      $checkURL = DB::table('links')->where('url',$slug )->get();
      if (count($checkURL)>0){
          $thePage = $checkURL[0]->page;
          $theID = $checkURL[0]->content_id;

      }else{
          $thePage = '';
          $theID = '';
      }

    if ($thePage == "category") {
        return $this->category($theID);
      }elseif ($thePage == "doctorPost") {
        return $this->doctorPost($theID);
      }else{
        return redirect("/");
          exit();
     }
    }




//    public function read(){
//        return view("auth.register");
//
//    }

public function category($request){
    $changeLanguge = Languge::post();
        $post = HospitalPost::
           join('post_actives',function ($join){
                 $join->on('post_id','=','hospital_posts.id');
                 $join->where('table_name','=',"hospitalPost");
             })->
            select(['hospital_posts.id','hospital_posts.created_at',
                 'hospital_posts.'.$changeLanguge['theTitle'],
                 'hospital_posts.theLocation','hospital_posts.thePhone',
                 'hospital_posts.theWebsite','hospital_posts.theEmail',
                 'hospital_posts.facebook','hospital_posts.instegram',
                 'hospital_posts.twiter','hospital_posts.map',
                 'hospital_posts.thePhoto','hospital_posts.instegram',
                 'post_actives.isActive','hospital_posts.'.$changeLanguge['theText'],
             ])->addSelect(['url' => Links::select('url')
                ->whereColumn('content_id', 'hospital_posts.id',)
                ->where('page', 'hospitalPost')
            ]) ->where('category_id','=',$request)
            ->where('isActive','=',1)->latest('created_at')->get();
        $category = Category::all();
    return view('category',compact('post','category'));
}
public function doctors(){
    $changeLanguge = Languge::post();
    $doctor = DoctorPost:: join('post_actives',function ($join){
        $join->on('post_id','=','doctor_posts.id');
        $join->where('table_name','=',"doctorPost");
    })->
    select(['doctor_posts.id','doctor_posts.created_at',
        'doctor_posts.'.$changeLanguge['theTitle'],
        'doctor_posts.theWebsite','doctor_posts.theEmail',
        'doctor_posts.facebook','doctor_posts.instegram',
        'doctor_posts.twiter','doctor_posts.map',
        'doctor_posts.thePhoto','doctor_posts.instegram',
    ])->addSelect(['url' => Links::select('url')
        ->whereColumn('content_id', 'doctor_posts.id')
        ->where('page', 'doctorPost')
    ])
        ->
        where('isActive','=',1)->get();

    return view('doctor',compact('doctor'));

}





public function blog(){
    $changeLanguge = Languge::post();
    $blog = Blog::
    select(['blogs.*','blogs.'.$changeLanguge['theTitle'],'blogs.'.$changeLanguge['theText'],

    ])->addSelect(['url' => Links::select('url')
        ->whereColumn('content_id', 'blogs.id')
        ->where('page', 'blog')
    ])->get();
    return view('blog',compact('blog'));
}
    public function contact(){

        return view('contact');
    }












}
