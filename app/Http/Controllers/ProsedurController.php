<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Carbon\Carbon;
use App\Models\Prosedur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProsedurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $table = Prosedur::all();
        $admin = Admin::all();
        $i = 0;
        return view('back.prosedur.prosedur')->with('table', $table)->with('admin', $admin)->with('i', $i);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('back.prosedur.create');
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
        // $admin_id = '1';
        $admin_id = Auth::guard('admin')->user()->id;
        $isi = $request->isi;

        Prosedur::create([
            'admin_id' => $admin_id,
            'tanggal' => Carbon::now()->format('Y-m-d'),
            'isi' => $isi,
        ]);

        return redirect()->route('admin-prosedur-index')->with('success', 'Data Berhasil Dibuat');
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
        $table = Prosedur::find($id);
        return view('back.prosedur.edit')->with('table', $table);
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
        // $admin_id = '1';
        $admin_id = Auth::guard('admin')->user()->id;
        $isi = $request->isi;

        Prosedur::find($id)->update([
            'admin_id' => $admin_id,
            'tanggal' => Carbon::now()->format('Y-m-d'),
            'isi' => $isi,
        ]);

        return redirect()->route('admin-prosedur-index')->with('success', 'Data Berhasil Diupdate');
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
        Prosedur::find($id)->delete();
        return redirect()->route('admin-prosedur-index')->with('success', 'Data Berhasil Dihapus');
    }
}
