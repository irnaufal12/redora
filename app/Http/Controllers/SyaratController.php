<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Syarat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SyaratController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $table = Syarat::all();
        $admin = Admin::all();
        $i = 0;
        return view('back.syarat.syarat')->with('table', $table)->with('admin', $admin)->with('i', $i);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('back.syarat.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $admin_id = Auth::guard('admin')->user()->id;
        $syarat = $request->syarat;

        Syarat::create([
            'admin_id' => $admin_id,
            
            'syarat' => $syarat,
        ]);

        return redirect()->route('admin-syarat-index')->with('success', 'Data Berhasil Dibuat');
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
        //
        $table = Syarat::find($id);
        return view('back.syarat.edit')->with('table', $table);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $admin_id = Auth::guard('admin')->user()->id;
        $syarat = $request->syarat;

        Syarat::find($id)->update([
            'admin_id' => $admin_id,
            
            'syarat' => $syarat,
        ]);

        return redirect()->route('admin-syarat-index')->with('success', 'Data Berhasil Diupdate');
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
        Syarat::find($id)->delete();
        return redirect()->route('admin-syarat-index')->with('success', 'Data Berhasil Dihapus');
    }
}
