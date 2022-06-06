<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Carbon\Carbon;
use App\Models\JadwalKeliling;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JadwalKelilingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $table = JadwalKeliling::all();
        $admin = Admin::all();
        $i = 0;
        return view('back.jadwal-keliling.jadwal-keliling')->with('table', $table)->with('admin', $admin)->with('i', $i);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('back.jadwal-keliling.create');
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
        $tanggal = $request->tanggal;
        $lokasi = $request->lokasi;

        JadwalKeliling::create([
            'admin_id' => $admin_id,
            'tanggal' => $tanggal,
            'lokasi' => $lokasi,
        ]);

        return redirect()->route('admin-jadwal-keliling-index')->with('success', 'Data Berhasil Dibuat');
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
        $table = JadwalKeliling::find($id);
        return view('back.jadwal-keliling.edit')->with('table', $table);
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
        $tanggal = $request->tanggal;
        $lokasi = $request->lokasi;

        JadwalKeliling::find($id)->update([
            'admin_id' => $admin_id,
            'tanggal' => $tanggal,
            'lokasi' => $lokasi,
        ]);

        return redirect()->route('admin-jadwal-keliling-index')->with('success', 'Data Berhasil Diupdate');
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
        JadwalKeliling::find($id)->delete();
        return redirect()->route('admin-jadwal-keliling-index')->with('success', 'Data Berhasil Dihapus');
    }
}
