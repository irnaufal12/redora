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
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class StatusRequestController extends Controller
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
        
        return view('index')->with('user', $user)
                            ->with('table', $table)
                            ->with('manfaat', $manfaat)
                            ->with('jadwal', $jadwal)
                            ->with('lokasi', $lokasi)
                            ->with('prosedur', $prosedur)
                            ->with('faq', $faq)
                            ->with('syarat', $syarat);

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
        // $user_id = 1;
        $user_id = Auth::guard('user')->user()->id;
        $pemohon = User::find($user_id);
        $gol_darah = $request->golonganDarah;
        $kontak = $request->kontak;
        $kk = $request->keterangan;
        StatusRequest::create([
            'user_id' => $user_id,
            'tgl_pembuatan' => Carbon::now()->format('Y-m-d'),
            'gol_darah' => $gol_darah,
            'kontak' => $kontak,
            'keterangan' => $kk,
            'status' => 'Belum Terpenuhi',
        ]);

        // \Mail::raw('Halo relawan donor darah', function ($message) {
        //     $message->to('user1@redora.com', 'John Doe');
            
        //     $message->subject('Konfirmasi Donor Darah');
            
        // });
        
        $last = StatusRequest::orderBy('id', 'desc')->first();

        $link = 'http://127.0.0.1:8000/user/create-status-request/konfirmasi-form/'.$last->id;

        // email
        $email = [
            'title' => 'DIBUTUHKAN DONOR DARAH',
            'nama' => 'Nama Peminta Donor : '.$pemohon->nama,
            'gol' => 'Golongan Darah yang Dibutuhkan : '.$gol_darah,
            'kontak' => 'Kontak Peminta Donor : '.$pemohon->no_telp,
            'kk' => 'Untuk Keperluan : '.$kk,
            // 'date' => 'Masukkan data berikut untuk identifikasi : '.$last->created_at,
            'link' => 'Konfirmasi pada Link berikut : '.$link
        ];

        $data = User::all()->where('gol_darah', '=' , $gol_darah)->toArray();
        // $counter = User::all()->where('gol_darah', '=' , $gol_darah)->count();
        $counter = User::all()->count();
        $pendonor_data = User::all();
        // return dd($data);
        // 


        for ($i = 0; $i <= $counter; $i++)
        {
            if (!empty($data[$i])) {
                // return dd($data);
                if ($data[$i]['id'] != $user_id) {
                    // if($data[$i]['id'] = $pendonor)
                    $tujuan = $data[$i]['email'];
                    Mail::to($tujuan)->send(new SendEmail($email));
                }
            }
        }
        
        // $tujuan = 'irnaufal12@gmail.com';
        // Mail::to($tujuan)->send(new SendEmail($email));

        // return dd($pendonor_data[0]);
        // return dd($a);
        // return redirect('user#services')->with('success', 'Request berhasil dibuat');
        return redirect()->route('user.requestPage')->with('success', 'Request berhasil dibuat');
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

        //prosedur
        $prosedur = Prosedur::all();

        //Syarat
        $syarat = Syarat::all();

        // status request
        $table = StatusRequest::all()->where('user_id', '=', Auth::guard('user')->user()->id);
        $user = User::all();

        // detail
        $tanda = $id;
        $detail = StatusRequest::find($id);
        $pendonor = $detail->pendonor;
        $pendonor_tanpa_daftar = $detail->pendonor_tanpa_daftar;
        $status = $detail->status;
        $keterangan = $detail->keterangan;
        $array = (array) $pendonor;
        $array2 = (array) $pendonor_tanpa_daftar;
        $konfirmasi = Konfirmasi::all();
        // $status_donor = $konfirmasi;
        // $status_donor_pendonor = array();
        

        if (!empty($pendonor)){
            $counter = count($pendonor);

        } else {
            $counter = 0;
        }

        if (!empty($pendonor_tanpa_daftar)) {
            $counter_tanpa_daftar = count($pendonor_tanpa_daftar);
        } else {
            $counter_tanpa_daftar = 0;
        }

        $counter2 = count($konfirmasi);

        // $y = 0;
        // for ($i = 0; $i < $counter; $i++) {
        //     $check = $konfirmasi;
        //     if ($check->isNotEmpty()) {
        //         $status_donor_pendonor[$i] = $check;
        //     }
        //      else {
        //         $status_donor_pendonor[$i] = NULL;
        //         $status_donor_pendonor[$i][$i] = NULL;
        //     }
        // }

        // $check = $konfirmasi->where('user_id', 2)->where('status_request_id', $tanda);

        // manfaat
        $manfaat = Manfaat::all();

        // jadwal keliling
        $jadwal = JadwalKeliling::all();

        // lokasi
        $lokasi = Lokasi::all();

        //FAQ
        $faq = Faq::all();

        // return dd($pendonor_tanpa_daftar);
        return view('front.showstatus')->with('user', $user)
                                       ->with('table', $table)
                                       ->with('manfaat', $manfaat)
                                       ->with('jadwal', $jadwal)
                                       ->with('lokasi', $lokasi)
                                       ->with('prosedur', $prosedur)
                                       ->with('faq', $faq)
                                       ->with('syarat', $syarat)
                                       ->with('pendonor', $pendonor)
                                       ->with('status', $status)
                                       ->with('keterangan', $keterangan)
                                       ->with('counter', $counter)
                                       ->with('counter2', $counter2)
                                       ->with('counter_tanpa_daftar', $counter_tanpa_daftar)
                                       ->with('array', $array)
                                       ->with('tanda', $tanda)
                                       ->with('konfirmasi', $konfirmasi)
                                       ->with('array2', $array2);

        
    }

    public function showHome($id)
    {
        //

        //prosedur
        $prosedur = Prosedur::all();

        //Syarat
        $syarat = Syarat::all();

        // status request
        $table = StatusRequest::all()->where('user_id', '=', Auth::guard('user')->user()->id);
        $user = User::all();

        // detail
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


        // manfaat
        $manfaat = Manfaat::all();

        // jadwal keliling
        $jadwal = JadwalKeliling::all();

        // lokasi
        $lokasi = Lokasi::all();

        //FAQ
        $faq = Faq::all();

        return view('front.showHome')->with('user', $user)
            ->with('table', $table)
            ->with('manfaat', $manfaat)
            ->with('jadwal', $jadwal)
            ->with('lokasi', $lokasi)
            ->with('prosedur', $prosedur)
            ->with('faq', $faq)
            ->with('syarat', $syarat)
            ->with('pendonor', $pendonor)
            ->with('status', $status)
            ->with('keterangan', $keterangan)
            ->with('counter', $counter)
            ->with('array', $array)
            ->with('tanda', $tanda);

        // return dd($counter);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $data)
    {
        //
        $id = $data->id;
        $table = StatusRequest::find($id);
        // $golDarah = $data->golDarah;
        // $kontak = $data->tanggal;
        return view('editForm')->with('table', $table);
        // return view('editForm', compact('id', 'golDarah', 'kontak'));
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
        // $user_id = 1;
        $user_id = Auth::guard('user')->user()->id;
        $gol_darah = $request->golonganDarah;
        $kontak = $request->kontak;
        $keterangan = $request->keterangan;
        StatusRequest::find($id)->update([
            'user_id' => $user_id,
            'tgl_pembuatan' => Carbon::now()->format('Y-m-d'),
            'gol_darah' => $gol_darah,
            'kontak' => $kontak,
            'keterangan' => $keterangan,
            'status' => 'Belum Terpenuhi',
        ]);

        // \Mail::raw('Halo relawan donor darah', function ($message) {
        //     $message->to('user1@redora.com', 'John Doe');

        //     $message->subject('Konfirmasi Donor Darah');
        // });

        // return redirect('user#services')->with('success', 'Request berhasil diupdate');
        return redirect()->route('user.requestPage')->with('success', 'Request berhasil diupdate');
    }

    //lewat ikut donor
    public function isiUpdate(Request $request, $id)
    {
        //
        // $user_id = 1;
        $user_id = Auth::guard('user')->user()->id;
        $user = User::find($user_id);
        // $nama = $user->nama;
        // $kontak = $user->no_telp;
        $table = StatusRequest::find($id);
        $old = $table->pendonor;
        $counter = count($old);

        if ($counter > 0 ) {
            $old[$counter+1] = $user_id;
        } else {
            $old[0] = $user_id;
        }
        

        StatusRequest::find($id)->update([
            'pendonor' => $old,
        ]);

        Konfirmasi::create([
            'user_id' => $user_id,
            'status_request_id' => $id,
            'tgl_pembuatan' => Carbon::now()->format('Y-m-d'),
        ]);

        // \Mail::raw('Halo relawan donor darah', function ($message) {
        //     $message->to('user1@redora.com', 'John Doe');

        //     $message->subject('Konfirmasi Donor Darah');
        // });
        
        return dd($counter);
        // return redirect('user#services')->with('success', 'Request berhasil diupdate');
        return redirect()->route('user.home')->with('success', 'Request berhasil dikirim');
        // return dd($table->pendonor);
    }



    public function updateStatus(Request $data)
    {

        $user_id = Auth::guard('user')->user()->id;
        
        $id = $data->id; 
        $table = StatusRequest::find($id);

        $gol_darah = $table->gol_darah;
        $kontak = $table->kontak;
        $tgl_pembuatan = $table->tgl_pembuatan;
        $keterangan = $table->keterangan;
        StatusRequest::find($id)->update([
            'user_id' => $user_id,
            'tgl_pembuatan' => $tgl_pembuatan,
            'gol_darah' => $gol_darah,
            'kontak' => $kontak,
            'keterangan' => $keterangan,
            'status' => 'Sudah Terpenuhi',
        ]);

        // return redirect('user#services')->with('success', 'Request berhasil diupdate');
        return redirect()->route('user.requestPage')->with('success', 'Request berhasil dikirim');
    }

    public function konfirmasiForm(Request $data)
    {
        $id = $data;
        // $table = StatusRequest::find($id);
        return view('konfirmasiForm')->with('id', $id);
    }
    

    //lewat email
    public function konfirmasiPost(Request $request, $id)
    {
        $user_id = Auth::guard('user')->user()->id;
        $user = User::find($user_id);
        $table = StatusRequest::find($id);
        $old = $table->pendonor;
        $counter = count(array($old));

        if ($counter > 0) {
            $old[$counter] = $user_id;
        } else {
            $old[0] = $user_id;
        }

        if ($request->konfirmasi == '1')
        {
            StatusRequest::find($id)->update([
                'pendonor' => $old,
            ]);

            Konfirmasi::create([
                'user_id' => $user_id,
                'status_request_id' => $id,
                'tgl_pembuatan' => Carbon::now()->format('Y-m-d'),
            ]);
        };

        // return dd($old);
        return redirect()->route('user.redirect')->with('success', 'Data Berhasil Diupdate');

    }

    public function redirect()
    {
        echo "<script>setTimeout(function(){ window.location.href = 'http://127.0.0.1:8000/user'; }, 3000);</script>";
        return view('redirect');
        // ->withHeaders(['refresh' => '7;url=http://127.0.0.1:8000/user']);
    }


    public function send($id_pemohon, $id_pendonor)
    {
        $req_id = StatusRequest::find($id_pemohon)->id;
        $pemohon_id = StatusRequest::find($id_pemohon)->user_id;
        $pemohon = User::find($pemohon_id);

        $pendonor = User::find($id_pendonor);

        // email
        $email = [
            'title' => 'UCAPAN TERIMA KASIH',
            'nama' => 'Dari : ' . $pemohon->nama,
            'gol' => '',
            'kontak' => '',
            'kk' => 'Terima kasih telah memenuhi permintaan donor saya, bantuan anda sungguh berarti.',
            // 'date' => 'Masukkan data berikut untuk identifikasi : '.$last->created_at,
            'link' => ''
        ];

        $tujuan = $pendonor->email;
        Mail::to($tujuan)->send(new SendEmail($email));

        return redirect()->route('user.status-request-show', $req_id)->with('success', 'Ucapan anda sudah dikirim');

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
