<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:category-list');
         $this->middleware('permission:category-create', ['only' => ['create','store']]);
         $this->middleware('permission:category-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:category-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('category.index',compact('categories'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     
        return view('category.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'name' => 'required'
        ]);


        Category::create($request->all());


        return redirect()->route('category.index')
                        ->with('success','Cateory created successfully.');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $jobs
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return view('category.show',compact('category'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Job  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('category.edit',compact('category'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Job  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
         request()->validate([
            'name' => 'required'
        ]);


        $category->update($request->all());


        return redirect()->route('category.index')
                        ->with('success','Category updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Job  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();


        return redirect()->route('category.index')
                        ->with('success','Category deleted successfully');
    }
}
