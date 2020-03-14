<?php

namespace App\Http\Controllers;

use App\Inventory;
use App\User;
use App\Place;
use App\Device;
use App\Category;
use Illuminate\Http\Request;
use App\Exports\InventoriesExport;
use Maatwebsite\Excel\Facades\Excel;

class InventoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $inventoryQuery = Inventory::query();
        if ($request->has('cari')) {
            $inventoryQuery->where(function ($query) use ($request) {
                $query->where('device_id', 'LIKE', '%'.$request->cari.'%');
                $query->orWhere('kode', 'LIKE', '%'.$request->cari.'%');
            });
        }

        if ($request->has('category_id') && $request->category_id != '') {
            $inventoryQuery->where('category_id', $request->category_id);
        }

        if ($request->has('place_id') && $request->place_id != '') {
            $inventoryQuery->where('place_id', $request->place_id);
        }

        $inventories = $inventoryQuery->paginate(15);
        $places = Place::all();
        $categories = Category::all();
        $devices = Device::all();
        return view('inventories.index', compact('inventories', 'places', 'categories', 'devices'));
    }

    public function borrowIndex(Request $request, User $user)
    {
        $inventoryQuery = Inventory::query();
        if ($request->has('cari')) {
            $inventoryQuery->where(function ($query) use ($request) {
                $query->where('device_id', 'LIKE', '%'.$request->cari.'%');
                $query->orWhere('kode', 'LIKE', '%'.$request->cari.'%');
            });
        }

        if ($request->has('category_id') && $request->category_id != '') {
            $inventoryQuery->where('category_id', $request->category_id);
        }

        if ($request->has('place_id') && $request->place_id != '') {
            $inventoryQuery->where('place_id', $request->place_id);
        }

        $inventories = $inventoryQuery->paginate(15);
        $places = Place::all();
        $categories = Category::all();
        return view('borrows.indexInventory', compact('inventories', 'places', 'categories', 'user'));
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
        Inventory::create([
            'place_id' => $request->place_id,
            'category_id' => $request->category_id,
            'device_id' => $request->device_id,
            'kode' => $request->kode,
            'status' => 'Ready',
        ]);
        return redirect('/inventory')->with('status', 'Data Peralatan Berhasil Tambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function show(Inventory $inventory)
    {
        $places = Place::all();
        return view('inventories.profile_inventory', compact('inventory','places'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function edit(Inventory $inventory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Inventory $inventory)
    {   
        $inventory->place_id = $request->place_id;
        // $inventory->name = $request->name;
        // $inventory->thn_pengadaan = $request->thn_pengadaan;
        $inventory->kode = $request->kode;
        // $inventory->specification = $request->specification;
        $inventory->status = $request->status;
        $inventory->save();

        return redirect('/inventory/'.$inventory->id.'/show')->with('status', 'Data inventory berhasil Diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Inventory $inventory)
    {
        $inventory->delete();
        //$inventory->users->borrow->delete();

        return redirect('/inventory')->with('status', 'Data inventory berhasil delete.');
    }

    public function export() 
    {
        return Excel::download(new InventoriesExport, 'inventories.xlsx');
    }
}
