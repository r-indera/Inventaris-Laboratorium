<?php

namespace App\Http\Controllers;

use App\Category;
use App\Place;
use App\Inventory;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
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
    public function store(Request $request, Category $category)
    {
        $category->name = $request->name;
        $category->ket = $request->ket;

        if($request->hasFile('foto_alat')){
            $request->file('foto_alat')->move('images/lab/',$request->file('foto_alat')->getClientOriginalName());
            $category['foto_alat'] = $request->file('foto_alat')->getClientOriginalName();
            }
        $category->save();

        return redirect('/category')->with('status', 'Category Invantaris Berhasil Ditambah');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        $places = Place::all();
        return view('categories.category_show', compact('category', 'places'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function categoryInventory(Category $category, Place $place)
    {
        $inventories = $category->inventories()->where('place_id', $place->id)->get();
        return view('categories.categoryInventory', compact('category', 'inventories', 'place'));    
    }

    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        // dd($request->all());
        $category->ket = $request->ket;

        if($request->hasFile('foto_alat')){
            $request->file('foto_alat')->move('images/lab/',$request->file('foto_alat')->getClientOriginalName());
            $category['foto_alat'] = $request->file('foto_alat')->getClientOriginalName();
            }
        $category->save();

        return redirect('/category/'.$category->id.'/show')->with('status', 'Category Invantaris Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }
}
