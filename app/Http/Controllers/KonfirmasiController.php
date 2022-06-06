<?php

namespace App\Http\Controllers;

use App\Models\JadwalKeliling;
use App\Models\Lokasi;
use App\Models\Manfaat;
use App\Models\Prosedur;
use App\Models\StatusRequest;
use App\Models\Syarat;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Mail\SendEmail;
use App\Models\Faq;
use App\Models\Konfirmasi;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;

class KonfirmasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //prosedur
        $prosedur = Prosedur::all();

        //Syarat
        $syarat = Syarat::all();

        // status request
        $table = StatusRequest::all()->where('user_id', '=', Auth::guard('user')->user()->id);
        $user = User::all();

        // manfaat
        $manfaat = Manfaat::all();

        // jadwal keliling
        $jadwal = JadwalKeliling::all();

        // lokasi
        $lokasi = Lokasi::all();

        //FAQ
        $faq = Faq::all();

        //KonfirmasiTable
        $kontab = Konfirmasi::all()->where('user_id', '=', Auth::guard('user')->user()->id);

        return view('front.konfirmasiPage')->with('user', $user)
            ->with('table', $table)
            ->with('manfaat', $manfaat)
            ->with('jadwal', $jadwal)
            ->with('lokasi', $lokasi)
            ->with('prosedur', $prosedur)
            ->with('faq', $faq)
            ->with('syarat', $syarat)
            ->with('kontab', $kontab);
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
    public function store(Request $request)
    {
        //
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
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        //
        Konfirmasi::find($id)->update([
            'tgl_konfirmasi' => Carbon::now()->format('Y-m-d'),
            'konfirmasi' => 'Sudah Donor',
        ]);

        return redirect()->route('user.konfirmasiPage')->with('success', 'Request berhasil dikirim');

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
