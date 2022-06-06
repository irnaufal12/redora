<?php

namespace App\Http\Controllers;

use App\Models\Manfaat;
use App\Models\Syarat;
use App\Models\Prosedur;
use App\Models\StatusRequest;
use App\Models\User;
use App\Mail\SendEmail;
use Illuminate\Support\Facades\Mail;
use App\Models\UserTanpaDaftar;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|max:8',
            'confirm_password' => 'required|min:8|max:8|same:password',
            'tgl_lahir' => 'required',
            'alamat' => 'required',
            'gol_darah' => 'required',
            'no_telp' => 'required',
        ]);

        User::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => \Hash::make($request->password),
            'tgl_lahir' => $request->tgl_lahir,
            'alamat' => $request->alamat,
            'gol_darah' => $request->gol_darah,
            'no_telp' => $request->no_telp
        ]);

        return redirect()->route('user.user-login')->with('fail', 'Registrasi berhasil, silahkan login');
        
    }

    // Check
    public function check(Request  $request) 
    {
        //Validate
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8|max:8',
        ]);

        $creds = $request->only('email', 'password');
        if(Auth::guard('user')->attempt($creds)) {
            return redirect()->route('user.home')->with('berhasil', 'Login berhasil. Selamat Datang di Redora!');
        }else{
            return redirect()->route('user.user-login')->with('fail', 'Incorrect Crudentials');
        }
    }

    public function logout() 
    {
        Auth::logout();
        return redirect('/');
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

    public function frontManfaat() {
        $manfaat = Manfaat::all();

        return view('frontManfaat')->with('manfaat', $manfaat);
    }

    public function frontProsedur()
    {
        $syarat = Syarat::all();
        $prosedur = Prosedur::all();

        return view('frontProsedur')->with('syarat', $syarat)->with('prosedur', $prosedur);
    }

    public function semuaRequest() {
        $semuaRequest = StatusRequest::orderBy('id', 'desc')->get();;
        $user = User::all();
        $count_user = count($user);

        return view('semuaRequest')
            ->with('semuaRequest', $semuaRequest)
            ->with('user', $user)
            ->with('count_user', $count_user);
    }

    public function showPage($id) {
        $tanda = $id;
        $detail = StatusRequest::find($id);
        $pendonor = $detail->pendonor;
        $status = $detail->status;
        $keterangan = $detail->keterangan;
        $array = (array) $pendonor;

        if (!empty($pendonor)) {
            $counter = count($pendonor);
        } else {
            $counter = 0;
        }

        return view('showPage')
            ->with('pendonor', $pendonor)
            ->with('status', $status)
            ->with('keterangan', $keterangan)
            ->with('array', $array)
            ->with('counter', $counter)
            ->with('tanda', $tanda)
            ->with('detail', $detail);
    }

    public function ikutDonor(Request $request, $id) {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email',
            'tgl_lahir' => 'required',
            'alamat' => 'required',
            'gol_darah' => 'required',
            'no_telp' => 'required',
        ]);

        UserTanpaDaftar::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'tgl_lahir' => $request->tgl_lahir,
            'alamat' => $request->alamat,
            'gol_darah' => $request->gol_darah,
            'no_telp' => $request->no_telp
        ]);

        $user_tanpa_daftar = UserTanpaDaftar::orderBy('id', 'desc')->first();
        $user_id = $user_tanpa_daftar->id;
        $table = StatusRequest::find($id);
        $old = $table->pendonor_tanpa_daftar;
        $counter = count(array($old));

        if ($counter > 0) {
            $old[$counter + 1] = $user_id;
        } else {
            $old[0] = $user_id;
        }

        StatusRequest::find($id)->update([
            'pendonor_tanpa_daftar' => $old,
        ]);

        $pemohon = User::find($table->user_id);
        $gol_darah = $request->golonganDarah;
        $kontak = $table->kontak;
        $kk = $table->keterangan;

        $email = [
            'title' => $request->nama .', Terima Kasih Telah Ikut Donor',
            'nama' => 'Nama Peminta Donor : ' . $pemohon->nama,
            'gol' => 'Golongan Darah yang Dibutuhkan : ' . $gol_darah,
            'kontak' => 'Kontak Peminta Donor : ' . $kontak,
            'kk' => 'Untuk Keperluan : ' . $kk,
            'link' => 'Hubungi KONTAK PEMINTA DONOR untuk konfirmasi bila telah donor'
        ];

        Mail::to($request->email)->send(new SendEmail($email));

        // return dd($request);
        return redirect()->route('user.semua-request')->with('success', 'Permintaan telah dikirim, cek email anda untuk informasi lebih lanjut');
    }
}
