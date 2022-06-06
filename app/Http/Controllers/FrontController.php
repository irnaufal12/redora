<?php

namespace App\Http\Controllers;

use App\Models\JadwalKeliling;
use App\Models\Lokasi;
use App\Models\Manfaat;
use App\Models\Prosedur;
use App\Models\StatusRequest;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Mail\SendEmail;
use App\Models\Faq;
use App\Models\Syarat;
use Illuminate\Support\Facades\Mail;

class FrontController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //prosedur
        $prosedur = Prosedur::all();

        //syarat
        $syarat = Syarat::all();

        // status request
        $table = StatusRequest::orderBy('id', 'desc')->where('user_id', '=', Auth::guard('user')->user()->id)->get();
        $user = User::all();
        $count_user = User::count();

        //all status
        $all = StatusRequest::orderBy('id', 'desc')->get();
        $gol = Auth::guard('user')->user()->gol_darah;
        $gol_sesuai = StatusRequest::orderBy('id', 'desc')->where('gol_darah', '=', $gol)->get();

        // manfaat
        $manfaat = Manfaat::all();

        // jadwal keliling
        $jadwal = JadwalKeliling::all();

        // lokasi
        $lokasi = Lokasi::all();

        //FAQ
        $faq = Faq::all();

        // return dd($count_user);
        return view('front.homePage')->with('user', $user)
            ->with('table', $table)
            ->with('manfaat', $manfaat)
            ->with('jadwal', $jadwal)
            ->with('lokasi', $lokasi)
            ->with('prosedur', $prosedur)
            ->with('faq', $faq)
            ->with('syarat', $syarat)
            ->with('all', $all)
            ->with('gol_sesuai', $gol_sesuai)
            ->with('gol', $gol)
            ->with('count_user', $count_user);

    }

    public function requestPage() 
    {
        //prosedur
        $prosedur = Prosedur::all();

        //syarat
        $syarat = Syarat::all();

        // status request
        // $table = StatusRequest::all()->where('user_id', '=', Auth::guard('user')->user()->id);
        $table = StatusRequest::orderBy('id', 'desc')->where('user_id', '=', Auth::guard('user')->user()->id)->get();
        $user = User::all();

        //all status
        $all = StatusRequest::all();

        // manfaat
        $manfaat = Manfaat::all();

        // jadwal keliling
        $jadwal = JadwalKeliling::all();

        // lokasi
        $lokasi = Lokasi::all();

        //FAQ
        $faq = Faq::all();

        return view('front.requestPage')->with('user', $user)
            ->with('table', $table)
            ->with('manfaat', $manfaat)
            ->with('jadwal', $jadwal)
            ->with('lokasi', $lokasi)
            ->with('prosedur', $prosedur)
            ->with('faq', $faq)
            ->with('syarat', $syarat)
            ->with('all', $all);

    }

    public function manfaatPage()
    {
        //prosedur
        $prosedur = Prosedur::all();

        //syarat
        $syarat = Syarat::all();

        // status request
        $table = StatusRequest::all()->where('user_id', '=', Auth::guard('user')->user()->id);
        $user = User::all();

        //all status
        $all = StatusRequest::all();

        // manfaat
        $manfaat = Manfaat::all();

        // jadwal keliling
        $jadwal = JadwalKeliling::all();

        // lokasi
        $lokasi = Lokasi::all();

        //FAQ
        $faq = Faq::all();

        return view('front.manfaatPage')->with('user', $user)
            ->with('table', $table)
            ->with('manfaat', $manfaat)
            ->with('jadwal', $jadwal)
            ->with('lokasi', $lokasi)
            ->with('prosedur', $prosedur)
            ->with('faq', $faq)
            ->with('syarat', $syarat)
            ->with('all', $all);
    }

    public function prosedurPage()
    {
        //prosedur
        $prosedur = Prosedur::all();
        
        //syarat
        $syarat = Syarat::all();

        // status request
        $table = StatusRequest::all()->where('user_id', '=', Auth::guard('user')->user()->id);
        $user = User::all();

        //all status
        $all = StatusRequest::all();

        // manfaat
        $manfaat = Manfaat::all();

        // jadwal keliling
        $jadwal = JadwalKeliling::all();

        // lokasi
        $lokasi = Lokasi::all();

        //FAQ
        $faq = Faq::all();

        return view('front.prosedurPage')->with('user', $user)
            ->with('table', $table)
            ->with('manfaat', $manfaat)
            ->with('jadwal', $jadwal)
            ->with('lokasi', $lokasi)
            ->with('prosedur', $prosedur)
            ->with('faq', $faq)
            ->with('syarat', $syarat)
            ->with('all', $all);
    }


    public function faqPage()
    {
        //prosedur
        $prosedur = Prosedur::all();

        //syarat
        $syarat = Syarat::all();

        // status request
        $table = StatusRequest::all()->where('user_id', '=', Auth::guard('user')->user()->id);
        $user = User::all();

        //all status
        $all = StatusRequest::all();

        // manfaat
        $manfaat = Manfaat::all();

        // jadwal keliling
        $jadwal = JadwalKeliling::all();

        // lokasi
        $lokasi = Lokasi::all();

        //FAQ
        $faq = Faq::all();

        return view('front.faqPage')->with('user', $user)
            ->with('table', $table)
            ->with('manfaat', $manfaat)
            ->with('jadwal', $jadwal)
            ->with('lokasi', $lokasi)
            ->with('prosedur', $prosedur)
            ->with('faq', $faq)
            ->with('syarat', $syarat)
            ->with('all', $all);
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
    public function update(Request $request, $id)
    {
        //
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
