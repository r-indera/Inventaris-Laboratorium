<?php

namespace App\Http\Controllers;

use App\User;
use App\Employee;
use App\Student;
use App\Inventory;
use App\Borrow;
use Illuminate\Http\Request;
use PDF;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
        $inventories = Inventory::all();
        return view('users.profile_user', compact('user', 'inventories'));
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
    public function store(Request $request, $user_id)
    {
        $borrows = $request->all();
        $borrows['user_id'] = $user_id;

        Borrow::create($borrows);
        return redirect('/profile/'.$user_id.'/show')->with('status', 'Peminjama Alat Berhasil');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $user->name = $request->name;
        $user->email = $request->email;
        // dd($request->password);
        if ($request->password != null) {
            $user->password = Hash::make($request->password);
        }
        $user->save();

        if ($user->role == 'staff') {
            $employee = $user->employee;
            $employee->name = $request->name;
            $employee->nip = $request->nip;
            $employee->email = $request->email;
            $employee->jabatan = $request->jabatan;
            $employee->no_telp = $request->no_telp;
            $employee->alamat = $request->alamat;

            if($request->hasFile('image_employee')){
            $request->file('image_employee')->move('images/employees/',$request->file('image_employee')->getClientOriginalName());
            $employee['image_employee'] = $request->file('image_employee')->getClientOriginalName();
            }
            $employee->save();

        } else if ($user->role == 'mahasiswa') {
            $student = $user->student;
            $student->name = $request->name;
            $student->nim = $request->nim;
            $student->email = $request->email;
            $student->no_telp = $request->no_telp;
            $student->alamat = $request->alamat;

            if($request->hasFile('image_student')){
            $request->file('image_student')->move('images/students/',$request->file('image_student')->getClientOriginalName());
            $student['image_student'] = $request->file('image_student')->getClientOriginalName();
            }
            $student->save();
        }

        return redirect('/profile/'.$user->id.'/show')->with('status', 'Data User Berhasil Diupdate.');
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

