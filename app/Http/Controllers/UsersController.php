<?php

namespace App\Http\Controllers;

use App\User;
use App\Employee;
use App\Student;
use App\Inventory;
use App\Borrow;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $users = User::all();
        // return view('users.index', compact('users'));
        $userQuery = User::query();
        if ($request->has('cari')) {
            $userQuery->where(function ($query) use ($request) {
                $query->where('name', 'LIKE', '%'.$request->cari.'%');
                $query->orWhere('email', 'LIKE', '%'.$request->cari.'%');
            });
        }

        if ($request->has('role') && $request->role != '') {
            $userQuery->where('role', $request->role);
        }

        $users = $userQuery->get();

        return view('users.index', compact('users'));
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
        // dd($request->all());
        $borrows = $request->all();
        $borrows['user_id'] = $user_id;

        Borrow::create($borrows);
        return redirect('/user/'.$user_id.'/show')->with('status', 'Peminjama Alat Berhasil');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $inventories = Inventory::all();
        return view('users.profile_admin', compact('user', 'inventories'));
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
        // dd($request->all());

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

        // } else if ($user->role == 'admin') {
        //     $employee = $user->employee;
        //     $employee->name = $request->name;
        //     $employee->nip = $request->nip;
        //     $employee->email = $request->email;
        //     $employee->jabatan = $request->jabatan;
        //     $employee->no_telp = $request->no_telp;
        //     $employee->alamat = $request->alamat;

        //     if($request->hasFile('image_employee')){
        //     $request->file('image_employee')->move('images/employees/',$request->file('image_employee')->getClientOriginalName());
        //     $employee['image_employee'] = $request->file('image_employee')->getClientOriginalName();
        //     }
        //     $employee->save(); //belum Bisa

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

        return redirect('/user/'.$user->id.'/show')->with('status', 'Data User Berhasil Diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if ($user->role == 'staff') {
            // $employee = $user->employee;
            // Employee::destroy($employee->id);
            $user->employee->delete();
        } else if ($user->role == 'mahasiswa') {
            // $student = $user->student;
            // Student::destroy($student->id);
            $user->student->delete();
        }
        // User::destroy($user->id);
        $user->delete();
        
        return redirect('/user')->with('status', 'Data User berhasil Hapus.'); //redirect arahkan kedasboard
    }
}
