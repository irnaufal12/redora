<?php

namespace App\Http\Controllers;

use App\Models\Pertanyaan;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Mail\SendEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;

class PertanyaanController extends Controller
{
    //
    public function post(Request $request)
    {

        $nama = $request->nama;
        $sender = $request->email;
        $subject = $request->subject;
        $pertanyaan = $request->pertanyaan;

        Pertanyaan::create([
            'tanggal' => Carbon::now()->format('Y-m-d'),
            'nama' => $nama,
            'email' => $sender,
            'subject' => $subject,
            'pertanyaan' => $pertanyaan,
        ]);

        // email
        $email = [
            'title' => 'PERTANYAAN USER || Subject :' .$subject,
            'nama' => 'Nama : ' . $nama,
            'gol' => 'Dari : ' . $sender,
            'kontak' => '',
            'kk' => 'Pertanyaan : ' . $pertanyaan,
            // 'date' => 'Masukkan data berikut untuk identifikasi : '.$last->created_at,
            'link' => ''
        ];

        $tujuan = 'admincs@mailinator.com';
        Mail::to($tujuan)->send(new SendEmail($email));

        // $tujuan = 'irnaufal12@gmail.com';
        // Mail::to($tujuan)->send(new SendEmail($email));

        // return dd($data);
        // return redirect('user#services')->with('success', 'Request berhasil dibuat');
        // return redirect()->route('user.faqPage');
        return Redirect::back()->with('success', 'Email sudah terkirim');
    }

    public function index()
    {
        $table = Pertanyaan::all();

        return view('back.pertanyaan')->with('table', $table);
    }
}
