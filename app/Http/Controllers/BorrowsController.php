<?php

namespace App\Http\Controllers;

use App\Borrow;
use App\Inventory;
use App\User;
use PDF;
use Illuminate\Http\Request;

class BorrowsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $borrows = Borrow::all();
        return view('borrows.index', compact('borrows'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(User $user, Inventory $inventory)
    {
        return view('borrows.borrowInventory', compact('user', 'inventory'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $user_id, $inventory_id)
    {
        // dd($request->all());
        $borrows = $request->all();
        $borrows['user_id'] = $user_id;
        $borrows['inventory_id'] = $inventory_id;

        Borrow::create($borrows);

        return redirect('/profile/'.$user_id.'/show')->with('status', 'Peminjaman Inventaris Berhasil');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Borrow  $borrow
     * @return \Illuminate\Http\Response
     */
    public function show(Borrow $borrow)
    {
       
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Borrow  $borrow
     * @return \Illuminate\Http\Response
     */
    public function edit(Borrow $borrow)
    {
        return view('borrows.edit', compact('borrow'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Borrow  $borrow
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Borrow $borrow)
    {
        $borrow->end_date = $request->end_date;
        
        if($request->hasFile('sk_file')){
            $request->file('sk_file')->move('images/sk/',$request->file('sk_file')->getClientOriginalName());
            $borrow['sk_file'] = $request->file('sk_file')->getClientOriginalName();
        }
        $borrow->save();

        $inventory = $borrow->inventory;
        $inventory->status = $request->status;
        $inventory->save();

        return redirect('/borrow')->with('status', 'Data Pinjaman Alat Inventaris Berhasil Diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Borrow  $borrow
     * @return \Illuminate\Http\Response
     */
    public function destroy(Borrow $borrow)
    {
        $borrow->delete();
        // Borrow::destroy($borrow->id);
        return redirect('/borrow')->with('status', 'Data Pinjam berhasil Hapus.');
    }

    public function pdf(Borrow $borrow)
    {
        $pdf = PDF::loadView('borrows.pdf', compact('borrow'));
        return $pdf->stream('invoice.pdf');
    }
}
