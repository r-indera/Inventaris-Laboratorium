<?php

namespace App\Http\Controllers;

use App\Place;
use App\Category;
use App\Inventory;
use Illuminate\Http\Request;

class PlacesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inventories = Inventory::all();
        $places = Place::all();
        return view('places.index', compact('places', 'inventories'));
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
        // dd($request->all());
        $place = [
            'name' => $request->name,
            'ket' => $request->ket,
        ];

        if($request->hasFile('foto_lab')){
            $request->file('foto_lab')->move('images/lab/',$request->file('foto_lab')->getClientOriginalName());
            $place['foto_lab'] = $request->file('foto_lab')->getClientOriginalName();
            }
        Place::create($place);

        return redirect('/places')->with('status', 'Category Invantaris Berhasil Ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Place  $place
     * @return \Illuminate\Http\Response
     */
    public function show(Place $place)
    {
        $categories = Category::all();
        // $inventoriesReady = $place->inventories()->where('status', 'Ready')->where('place_id', $place->id)->count();
        return view('places.place_profile', compact('place','categories'));
    }

    public function placeInventory(Place $place, Category $category)
    {
        $inventories = $place->inventories()->where('category_id', $category->id)->get();
        
        return view('places.placeInventory', compact('place', 'inventories', 'category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Place  $place
     * @return \Illuminate\Http\Response
     */
    public function edit(Place $place)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Place  $place
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Place $place)
    {
        // dd($request->all());
        $place->ket = $request->ket;

        if($request->hasFile('foto_lab')){
            $request->file('foto_lab')->move('images/lab/',$request->file('foto_lab')->getClientOriginalName());
            $place['foto_lab'] = $request->file('foto_lab')->getClientOriginalName();
            }
        $place->save();

        return redirect('/places/'.$place->id.'/show')->with('status', 'Keterangan Tempat Laboratorium Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Place  $place
     * @return \Illuminate\Http\Response
     */
    public function destroy(Place $place)
    {
        //
    }
}
