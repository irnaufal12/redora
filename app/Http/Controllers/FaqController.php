<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Faq;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $table = Faq::all();
        $admin = Admin::all();
        $i = 0;
        return view('back.faq.faq')->with('table', $table)->with('admin', $admin)->with('i', $i);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('back.faq.create');
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
        $pertanyaan = $request->pertanyaan;
        $jawaban = $request->jawaban;

        Faq::create([
            'admin_id' => $admin_id,
            'tanggal' => Carbon::now()->format('Y-m-d'),
            'pertanyaan' => $pertanyaan,
            'jawaban' => $jawaban,
        ]);

        return redirect()->route('admin-faq-index')->with('success', 'Data Berhasil Dibuat');

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
        $table = Faq::find($id);
        return view('back.faq.edit')->with('id', $id)->with('table', $table);
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
        $pertanyaan = $request->pertanyaan;
        $jawaban = $request->jawaban;

        Faq::find($id)->update([
            'admin_id' => $admin_id,
            'tanggal' => Carbon::now()->format('Y-m-d'),
            'pertanyaan' => $pertanyaan,
            'jawaban' => $jawaban,
        ]);

        return redirect()->route('admin-faq-index')->with('success', 'Data Berhasil Diupdate');

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
        Faq::find($id)->delete();
        return redirect()->route('admin-faq-index')->with('success', 'Data Berhasil Dihapus');
    }
}
