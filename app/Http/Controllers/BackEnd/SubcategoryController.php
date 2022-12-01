<?php

namespace App\Http\Controllers\BackEnd;

use App\Helpers\InsertLinks;
use App\Http\Controllers\Controller;
use App\Http\Requests\SubcategoryRequest;
use App\Models\Category;
use App\Models\Links;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subcategory=Subcategory::with(['category:id,theNameEn'])->get();
       return view("admin.subcategory.index", compact('subcategory',));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        return view("admin.subcategory.create", compact('category'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\SubcategoryRequest $request

     * @return \Illuminate\Http\Response
     */
    public function store(SubcategoryRequest $request)
    {
        $validated = $request->validated();
        $subcategory = new Subcategory;
        $subcategory->theNameEn = $request->theNameEn;
        $subcategory->theNameTr = $request->theNameTr;
        $subcategory->category_id = $request->category_id;
        $subcategory->save();
        $url = permalink($request->url);
        $page = "subcategory";
        $id = $subcategory->id;
        $link = InsertLinks::link($id, $url, $page);
       return redirect()->route('subcategory.index');


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
        $subcategory = Subcategory::addSelect(['url' => Links::select('url')
            ->whereColumn('content_id', 'subcategories.id')
            ->where('page', 'subcategory')
        ])->where('id', $id)->first();
       $category = Category::all();
       return view('admin.subcategory.edit', compact('subcategory','category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\SubcategoryRequest $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SubcategoryRequest $request, $id)
    {
        $validated = $request->validated();
        $subCategory = Subcategory::find($id);
        $subCategory->theNameEn = $request->input('theNameEn');
        $subCategory->theNameTr = $request->input('theNameTr');
        $subCategory->category_id = $request->input('category_id');
        $subCategory->update();
        $url = permalink($request->input('url'));
        $page = "subcategory";
        InsertLinks::update($id, $url, $page);
        return redirect()->route('subcategory.index');

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
        $category=Subcategory::find($param);
        $page = "subcategory";
        InsertLinks::delete($param,$page);
        $category->delete();
        return  1;
    }
}
