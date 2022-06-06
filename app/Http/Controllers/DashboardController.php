<?php

namespace App\Http\Controllers;

use App\Models\Konfirmasi;
use App\Models\StatusRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexAdmin()
    {
        //
        $user = count(User::all());
        $status = count(StatusRequest::all());
        $donor = count(Konfirmasi::all());
        $date = StatusRequest::get();
        $gol = $date->map->only(['gol_darah', 'tgl_pembuatan'])->toArray();
        $date_kon = Konfirmasi::get();
        
        $golA_plus = 0;
        $golB_plus = 0;
        $golAB_plus = 0;
        $golO_plus = 0;
        $golA_minus = 0;
        $golB_minus = 0;
        $golAB_minus = 0;
        $golO_minus = 0;

        $tahun_sekarang = Carbon::now()->format('Y');
        $req = $date->map->only(['tgl_pembuatan'])->toArray();
        $don = $date_kon->map->only(['tgl_pembuatan', 'konfirmasi'])->toArray();


        for ($i = 0; $i < count($gol); $i++) {
            $check_tahun = Carbon::parse($gol[$i]['tgl_pembuatan'])->format('Y');
            if ($check_tahun === $tahun_sekarang) {
                if ($gol[$i]['gol_darah'] === 'A+') {
                    $golA_plus++;
                } else if ($gol[$i]['gol_darah'] === 'A-') {
                    $golA_minus++;
                } else if ($gol[$i]['gol_darah'] === 'B+') {
                    $golB_plus++;
                } else if ($gol[$i]['gol_darah'] === 'B-') {
                    $golB_minus++;
                } else if ($gol[$i]['gol_darah'] === 'AB+') {
                    $golAB_plus++;
                } else if ($gol[$i]['gol_darah'] === 'AB-') {
                    $golAB_minus++;
                } else if ($gol[$i]['gol_darah'] === 'O+') {
                    $golO_plus++;
                } else if ($gol[$i]['gol_darah'] === 'O-') {
                    $golO_minus++;
                }
            }
        }

        $don_januari = 0;
        $don_februari = 0;
        $don_maret = 0;
        $don_april = 0;
        $don_mei = 0;
        $don_juni = 0;
        $don_juli = 0;
        $don_agustus = 0;
        $don_september = 0;
        $don_oktober = 0;
        $don_november = 0;
        $don_desember = 0;

        $req_januari = 0;
        $req_februari = 0;
        $req_maret = 0;
        $req_april = 0;
        $req_mei = 0;
        $req_juni = 0;
        $req_juli = 0;
        $req_agustus = 0;
        $req_september = 0;
        $req_oktober = 0;
        $req_november = 0;
        $req_desember = 0;

        for ($i = 0; $i < count($req); $i++) {
            $check_tahun = Carbon::parse($req[$i]['tgl_pembuatan'])->format('Y');
            $check_bulan = Carbon::parse($req[$i]['tgl_pembuatan'])->format('m');
            // $data_id[] = $req[$i]['id'];
            if ($check_tahun === $tahun_sekarang) {
                if ($check_bulan === '01') {
                    $req_januari++;
                } else if ($check_bulan === '02') {
                    $req_februari++;
                } else if ($check_bulan === '03') {
                    $req_maret++;
                } else if ($check_bulan === '04') {
                    $req_april++;
                } else if ($check_bulan === '05') {
                    $req_mei++;
                } else if ($check_bulan === '06') {
                    $req_juni++;
                } else if ($check_bulan === '07') {
                    $req_juli++;
                } else if ($check_bulan === '08') {
                    $req_agustus++;
                } else if ($check_bulan === '09') {
                    $req_september++;
                } else if ($check_bulan === '10') {
                    $req_oktober++;
                } else if ($check_bulan === '11') {
                    $req_november++;
                } else if ($check_bulan === '12') {
                    $req_desember++;
                }
            }
        }

        for ($i = 0; $i < count($don); $i++) {
            $check_tahun = Carbon::parse($don[$i]['tgl_pembuatan'])->format('Y');
            $check_bulan = Carbon::parse($don[$i]['tgl_pembuatan'])->format('m');
            $check_kon = $don[$i]['konfirmasi'];
            // $data_id[] = $don[$i]['id'];
            if ($check_kon === 'Sudah Donor') {
                if ($check_tahun === $tahun_sekarang) {
                    if ($check_bulan === '01') {
                        $don_januari++;
                    } else if ($check_bulan === '02') {
                        $don_februari++;
                    } else if ($check_bulan === '03') {
                        $don_maret++;
                    } else if ($check_bulan === '04') {
                        $don_april++;
                    } else if ($check_bulan === '05') {
                        $don_mei++;
                    } else if ($check_bulan === '06') {
                        $don_juni++;
                    } else if ($check_bulan === '07') {
                        $don_juli++;
                    } else if ($check_bulan === '08') {
                        $don_agustus++;
                    } else if ($check_bulan === '09') {
                        $don_september++;
                    } else if ($check_bulan === '10') {
                        $don_oktober++;
                    } else if ($check_bulan === '11') {
                        $don_november++;
                    } else if ($check_bulan === '12') {
                        $don_desember++;
                    }
                }
            }
        }

        
        // return dd($golA_plus);
        return view('back.index')
            ->with('user', $user)
            ->with('status', $status)
            ->with('donor', $donor)
            ->with('don_januari' , $don_januari)
            ->with('don_februari' , $don_februari)
            ->with('don_maret' , $don_maret)
            ->with('don_april' , $don_april)
            ->with('don_mei' , $don_mei)
            ->with('don_juni' , $don_juni)
            ->with('don_juli' , $don_juli)
            ->with('don_agustus' , $don_agustus)
            ->with('don_september' , $don_september)
            ->with('don_oktober' , $don_oktober)
            ->with('don_november' , $don_november)
            ->with('don_desember' , $don_desember)
            ->with('req_januari', $req_januari)
            ->with('req_februari', $req_februari)
            ->with('req_maret', $req_maret)
            ->with('req_april', $req_april)
            ->with('req_mei', $req_mei)
            ->with('req_juni', $req_juni)
            ->with('req_juli', $req_juli)
            ->with('req_agustus', $req_agustus)
            ->with('req_september', $req_september)
            ->with('req_oktober', $req_oktober)
            ->with('req_november', $req_november)
            ->with('req_desember', $req_desember)
            ->with('tahun_sekarang' , $tahun_sekarang)
            ->with('golA_plus', $golA_plus)
            ->with('golA_minus', $golA_minus)
            ->with('golB_plus', $golB_plus)
            ->with('golB_minus', $golB_minus)
            ->with('golAB_plus', $golAB_plus)
            ->with('golAB_minus', $golAB_minus)
            ->with('golO_plus', $golO_plus)
            ->with('golO_minus', $golO_minus);
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
