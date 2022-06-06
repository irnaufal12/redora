<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Carbon\Carbon;
use App\Models\Manfaat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ManfaatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $table = Manfaat::all();
        $admin = Admin::all();
        $i = 0;
        return view('back.manfaat.manfaat')->with('table', $table)->with('admin', $admin)->with('i', $i);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('back.manfaat.create');
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
        $judul = $request->judul;
        $isi = $request->isi;

        Manfaat::create([
            'admin_id' => $admin_id,
            'tanggal' => Carbon::now()->format('Y-m-d'),
            'judul' => $judul,
            'isi' => $isi,
        ]);

        return redirect()->route('admin-manfaat-index')->with('success', 'Data Berhasil Dibuat');
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
        $table = Manfaat::find($id);
        return view('back.manfaat.edit')->with('table', $table);

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
        $judul = $request->judul;
        $isi = $request->isi;

        Manfaat::find($id)->update([
            'admin_id' => $admin_id,
            'judul' => $judul,
            'isi' => $isi,
        ]);

        return redirect()->route('admin-manfaat-index')->with('success', 'Data Berhasil Diupdate');

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
        Manfaat::find($id)->delete();
        return redirect()->route('admin-manfaat-index')->with('success', 'Data Berhasil Dihapus');
    }

    public function isiManfaat(Request $data) 
    {
        $id = $data->id;
        $manfaat = Manfaat::find($id);
        return view('manfaat')->with('manfaat', $manfaat);
    }
}
