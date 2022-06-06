<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\JadwalEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JadwalEventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $table = JadwalEvent::all();
        $admin = Admin::all();
        $i = 0;
        return view('back.jadwal-event.jadwal-event')->with('table', $table)->with('admin', $admin)->with('i', $i);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('back.jadwal-event.create');
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
        $nama_event = $request->nama_event;
        $tanggal = $request->tanggal;
        $lokasi = $request->lokasi;

        JadwalEvent::create([
            'admin_id' => $admin_id,
            'nama_event' => $nama_event,
            'tanggal' => $tanggal,
            'lokasi' => $lokasi,
        ]);

        return redirect()->route('admin-jadwal-event-index')->with('success', 'Data Berhasil Dibuat');
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
        $table = JadwalEvent::find($id);
        return view('back.jadwal-event.edit')->with('table', $table);
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
        $nama_event = $request->nama_event;
        $tanggal = $request->tanggal;
        $lokasi = $request->lokasi;

        JadwalEvent::find($id)->update([
            'admin_id' => $admin_id,
            'nama_event' => $nama_event,
            'tanggal' => $tanggal,
            'lokasi' => $lokasi,
        ]);

        return redirect()->route('admin-jadwal-event-index')->with('success', 'Data Berhasil Diupdate');
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
        JadwalEvent::find($id)->delete();
        return redirect()->route('admin-jadwal-event-index')->with('success', 'Data Berhasil Dihapus');
    }
}
