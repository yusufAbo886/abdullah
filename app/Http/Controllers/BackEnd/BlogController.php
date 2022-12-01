<?php

namespace App\Http\Controllers\BackEnd;

use App\Helpers\InsertLinks;
use App\Http\Controllers\Controller;
use App\Http\Requests\BlogRequest;
use App\Models\Blog;
use App\Models\Links;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blog = Blog::all();
      return view("admin.blog.index", compact('blog'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.blog.create");

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\BlogRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(BlogRequest $request)
    {
        $validated = $request->validated();
        $blog = new Blog;
        $blog->theTitleEn = $request->theTitleEn;
        $blog->theTitleTr = $request->theTitleTr;
        $blog->theTextEn = $request->theTextEn;
        $blog->theTextTr = $request->theTextTr;
        $blog->thePhoto = $request->file;
        $blog->save();
        $url = permalink($request->url);
        $page = "blog";
        $id = $blog->id;
        InsertLinks::link($id, $url, $page);
        return redirect()->route('blog.index');
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
        $blog = Blog::addSelect(['url' => Links::select('url')
            ->whereColumn('content_id', 'blogs.id')
            ->where('page', 'blog')
        ])->where('id', $id)->first();
        return view('admin.blog.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\BlogRequest $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BlogRequest $request, $id)
    {
        $validated = $request->validated();
        $blog = Blog::find($id);
        $blog->theTitleEn = $request->input('theTitleEn');
        $blog->theTitleTr = $request->input('theTitleTr');
        $blog->theTextEn  = $request->input('theTextEn');
        $blog->theTextTr  = $request->input('theTextTr');
        $blog->thePhoto = $request->input('file');
        $blog->update();
        $url = permalink($request->input('url'));
        $page = "blog";
        InsertLinks::update($id, $url, $page);
        return redirect()->route('blog.index');
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
        $blog=Blog::find($param);
        $page = "blog";
        InsertLinks::delete($param,$page);
        $blog->delete();
        return  1;
    }
}
