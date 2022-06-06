@extends('back.master')
@section('content')
            <div class="page-heading">
                <div class="page-title">
                    @if (session('berhasil'))
                        <div class="alert alert-success" role="alert">
                            <span>{{ session('berhasil') }}</span>
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>Dashboard</h3>
                            <p class="text-subtitle text-muted">Halaman Admin</p>
                        </div>
                        {{-- <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                                </ol>
                            </nav>
                        </div> --}}
                    </div>
                </div>
                <section class="section">
                    <div class="title">
                        <h4>Statistics</h4>
                    </div>
                    <div id="chartDonor" style="margin-top: 10px;">

                    </div>
                    <div id="chartPermintaan" style="margin-top: 10px;">
                    
                    </div>
                    <div class="flex-container">
                        <div class="card col-sm-3" style="background-color: white;">
                            <div class="card-header">
                                User Count
                            </div>
                            <div class="card-body">
                                <img src="../images/icon/user-after.png" width="50%"><br>
                                <span>{{$user}}</span>
                            </div>
                        </div>
                        <div class="card col-sm-3" style="background-color: white;">
                            <div class="card-header">
                                Total Permintaan Donor
                            </div>
                            <div class="card-body">
                                <img src="../images/icon/status.png" width="50%"><br>
                                <span>{{$status}}</span>
                            </div>
                        </div>
                        <div class="card col-sm-3" style="background-color: white;">
                            <div class="card-header">
                                Total Konfirmasi Donor
                            </div>
                            <div class="card-body">
                                <img src="../images/icon/donor-after.png" width="50%"><br>
                                <span>{{$donor}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="title">
                        <h4>Data Tables</h4>
                    </div>
                    <div class="flex-container">
                        <div class="card col-sm-3">
                            <div class="card-header">
                                <a href="{{route('admin-prosedur-index')}}">
                                    <h4 class="card-title">Table Prosedur</h4>
                                </a>
                            </div>
                            <div class="card-body">
                                <a href="{{route('admin-prosedur-index')}}">
                                    <img src="../images/icon/prosedur.png" width="50%">
                                </a>
                            </div>
                        </div>
                        <div class="card col-sm-3">
                            <div class="card-header">
                                <a href="{{route('admin-syarat-index')}}">
                                    <h4 class="card-title">Table Persyaratan</h4>
                                </a>
                            </div>
                            <div class="card-body">
                                <a href="{{route('admin-syarat-index')}}">
                                    <img src="../images/icon/syarat.png" width="50%">
                                </a>
                            </div>
                        </div>
                        <div class="card col-sm-3">
                            <div class="card-header">
                                <a href="{{route('admin-pertanyaan-index')}}">
                                    <h4 class="card-title">Tabel Pertanyaan</h4>
                                </a>
                            </div>
                            <div class="card-body">
                                <a href="{{route('admin-pertanyaan-index')}}">
                                    <img src="../images/icon/pertanyaan.png" width="50%">
                                </a>
                            </div>
                        </div>
                        <div class="card col-sm-3">
                            <div class="card-header">
                                <a href="{{route('admin-manfaat-index')}}">
                                    <h4 class="card-title">Tabel Manfaat</h4>
                                </a>
                            </div>
                            <div class="card-body">
                                <a href="{{route('admin-manfaat-index')}}">
                                    <img src="../images/icon/manfaat.png" width="50%">
                                </a>
                            </div>
                        </div>
                        <div class="card col-sm-3">
                            <div class="card-header">
                                <a href="{{route('admin-faq-index')}}">
                                    <h4 class="card-title">Tabel FAQ</h4>
                                </a>
                            </div>
                            <div class="card-body">
                                <a href="{{route('admin-faq-index')}}">
                                    <img src="../images/icon/faq.png" width="50%">
                                </a>
                            </div>
                        </div>
                    </div>                  
                </section>
            </div>
            @php
                $contoh = 'LALALA'
            @endphp
@endsection

@section('footer')
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script>
        Highcharts.chart('chartDonor', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Donor Darah Per Bulan ({{$tahun_sekarang}})'
            },
            xAxis: {
                categories: [
                    'Jan',
                    'Feb',
                    'Mar',
                    'Apr',
                    'May',
                    'Jun',
                    'Jul',
                    'Aug',
                    'Sep',
                    'Oct',
                    'Nov',
                    'Dec'
                ],
                crosshair: true
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Donor'
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y}</b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
            series: [{
                name: 'Permintaan Donor',
                // data: [49.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4]
                data: [{{$req_januari}}, {{$req_februari}}, {{$req_maret}}, {{$req_april}}, {{$req_mei}}, {{$req_juni}}, {{$req_juli}}, {{$req_agustus}}, {{$req_september}}, {{$req_oktober}}, {{$req_november}}, {{$req_desember}}]

            }, {
                name: 'Donor (yang dikonfirmasi)',
                // data: [83.6, 78.8, 98.5, 93.4, 106.0, 84.5, 105.0, 104.3, 91.2, 83.5, 106.6, 92.3]
                data: [{{$don_januari}}, {{$don_februari}}, {{$don_maret}}, {{$don_april}}, {{$don_mei}}, {{$don_juni}}, {{$don_juli}}, {{$don_agustus}}, {{$don_september}}, {{$don_oktober}}, {{$don_november}}, {{$don_desember}}]

            }]
        });

        Highcharts.chart('chartPermintaan', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Permintaan Donor Per Golongan Darah ({{$tahun_sekarang}})'
            },
            xAxis: {
                categories: [
                    'A+',
                    'A-',
                    'B+',
                    'B-',
                    'AB+',
                    'AB-',
                    'O+',
                    'O-'
                ],
                crosshair: true
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Donor'
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y}</b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
            series: [{
                name: 'Permintaan Donor',
                // data: [49.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4]
                data: [{{$golA_plus}}, {{$golA_minus}}, {{$golB_plus}}, {{$golB_minus}}, {{$golAB_plus}}, {{$golAB_minus}}, {{$golO_plus}}, {{$golO_minus}}]

            }]
        });
    </script>
@endsection