<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function useradd()
    {
        return view('user.useradd', [
            'title' => 'UserAdd'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function userstore(Request $request)
    {
        $data = User::create($request->all());
        if ($request->hasFile('photo')) {
            $name = $request->name;
            $position = $request->position;
            $request->file('photo')->move('img/', $request->file('photo')->getClientOriginalName());
            $data->photo = $request->file('photo')->getClientOriginalName();
            $data->save();
        }
        return redirect('/dashboard')->with('Success', 'Data Pegawai Berhasil Ditambahkan');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    // Index
    public function useredit($id)
    {
        return view("user.useredit", [
            'title' => 'UserEdit',
            'user' => User::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function userupdate(Request $request, $id)
    {

        $data = User::find($id);
        if ($request->hasFile('photo')) {
            $data->name = $request->name;
            $data->position = $request->position;
            $request->file('photo')->move('img/', $request->file('photo')->getClientOriginalName());
            $data->photo = $request->file('photo')->getClientOriginalName();
            $data->save();
        }
        return redirect('/dashboard')->with('Edit', 'Data Pegawai Berhasil Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function userdelete(Request $request)
    {
        User::destroy($request->id);
        return redirect()->back()
            ->with(['Delete' => 'Data Pegawai Berhasil Dihapus']);
    }
}
