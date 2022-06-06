@extends('index')
@section('content')
    {{-- <section id="team">
        <div class="container">
            <div class="row">
                <div class="heading text-center col-sm-8 col-sm-offset-2 wow fadeInUp" data-wow-duration="1200ms" data-wow-delay="300ms">
                    <h2>Jadwal Keliling PMI</h2>
                    <p>Jadwal Palang Merah Indonesia Kabupaten Agam melakukan kegiatan donor darah.</p>
                    <table class="table table-hover" id="tableJadwal">
                        <thead>
                            <tr>
                            <th scope="col">No</th>
                            <th scope="col">Tanggal Kegiatan</th>
                            <th scope="col">Lokasi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($jadwal as $data)
                                @php
                                    $i = 1;
                                @endphp
                                <tr>
                                <th scope="row">{{$i}}</th>
                                <td>{{$data->tanggal}}</td>
                                <td>{{$data->lokasi}}</td>                      
                                </tr>
                                @php
                                    $i++
                                @endphp
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>        
        </div>
    </section><!--/#jadwal--> --}}
    
    <section id="home">
        <div id="home-bg" class="parallax">
            <div class="container">
                @if (session('berhasil'))
                        <div class="alert alert-success" role="alert">
                            <span>{{ session('berhasil') }}</span>
                        </div>
                @endif
                <div class="row">
                    <div>
                        <div class="col-sm-4">
                            <div class="row">
                                <div class="homeContainer" style="height:300px">
                                    <div class="text-center col-sm-12 wow fadeInUp" data-wow-duration="1200ms" data-wow-delay="300ms">
                                    <h2 class="title"><img class="img-responsive" src="/images/redora-resize.png" alt="logo"></h2>
                                        <div class="col-sm-offset-1">
                                            <p id="demo">
                                            Redora adalah website yang bertujuan memudahkan masyarakat melakukan donor darah. Pengguna bisa meminta donor darah maupun mendonorkan darah antar pengguna.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="homeContainer" style="height:420px">
                                    <div class="text-center col-sm-12 wow fadeInUp" data-wow-duration="1200ms" data-wow-delay="300ms">
                                        <h2 class="title">Lokasi Donor</h2>                                                                              
                                        <div id="google-map" class="wow fadeIn" data-latitude="-0.31380812482125003" data-longitude="100.03083249897738" data-wow-duration="1000ms" data-wow-delay="400ms">
                                        </div>
                                    </div>
                                </div>
                            </div>  
                        </div>
                        <div class="col-sm-8" id="tableContent">
                            <div class="col-sm-12 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
                                @if (session('success'))
                                    <div class="alert alert-success">
                                        <span>{{ session('success') }}</span>
                                    </div>
                                @endif
                                <h2 class="title">Semua Permintaan Donor</h2>
                                <h4 class="title">Untuk Golongan Darah {{$gol}}</h4>
                                <span class="blue2">BLUE</span>
                                <span style="text-align:left">TUTUP</span>
                                <span class="red">MERAH</span>
                                <span style="text-align:left">BUKA</span>
                                <table class="table table-home table-hover" id="tableStatus1" style="display: block">
                                    <thead>
                                        <tr>
                                        <th>No</th>
                                        <th>Tanggal Request</th>
                                        <th>Dibuat Oleh</th>
                                        <th>Golongan Darah Yang Dibutuhkan</th>
                                        <th>Kontak</th>
                                        {{-- <th>Lihat Pendonor</th> --}}
                                        {{-- <th>Status Request</th> --}}
                                        <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i = 1;
                                        @endphp
                                        @foreach ($gol_sesuai as $key => $data)
                                                @php
                                                    // $rt = route('user.status-request-show-home',$data->id);
                                                    $rt = 'user/status-request/show-home/'.$data->id;
                                                    if ($data->status === "Sudah Terpenuhi") {
                                                       echo '<tr class="sudahTerpenuhi">';
                                                       echo '<td scope="row">'.$i.'</td>';
                                                       echo '<td>'.$data->tgl_pembuatan.'</td>';
                                                       for ($c=0; $c<$count_user; $c++) { 
                                                           if ($data->user_id === $user[$c]->id) {
                                                               $nama = $user[$c]->nama;
                                                           }
                                                       }
                                                       echo '<td>'.$nama.'</td>';
                                                       echo '<td id="golDarah">'.$data->gol_darah.'</td>';
                                                       echo '<td id="kontak">'.$data->kontak.'</td>';
                                                       echo '<td>';
                                                       echo '<a href="'.$rt.'" class="btn btn-success">TUTUP</a>';
                                                       echo '</td>';
                                                       echo '</tr>';
                                                    } else {
                                                       echo '<tr>';
                                                       echo '<td scope="row">'.$i.'</td>';
                                                       echo '<td>'.$data->tgl_pembuatan.'</td>';
                                                       for ($c=0; $c<$count_user; $c++) { 
                                                           if ($data->user_id === $user[$c]->id) {
                                                               $nama = $user[$c]->nama;
                                                           }
                                                       }
                                                       echo '<td>'.$nama.'</td>';
                                                       echo '<td id="golDarah">'.$data->gol_darah.'</td>';
                                                       echo '<td id="kontak">'.$data->kontak.'</td>';
                                                       echo '<td>';
                                                       echo '<a href="'.$rt.'" class="btn btn-success">Lihat Detail</a>';
                                                       echo '</td>';
                                                       echo '<span id="status_donor{{$i}}" style="display:none;">{{$data->status}}</span>';
                                                       echo '</tr>';
                                                    }
                                                    $i = $i + 1;
                                                @endphp                                   
                                                {{-- <tr class="">
                                                    <td scope="row">{{$i}}</td>
                                                    <td>{{$data->tgl_pembuatan}}</td>
                                                    <td id="golDarah">{{$data->gol_darah}}</td>
                                                    <td id="kontak">{{$data->kontak}}</td>
                                                    <td>
                                                        <a href="{{route('user.status-request-show-home', $data->id)}}" class="btn btn-success">Lihat Detail</a>
                                                    </td>
                                                    <span id="status_donor{{$i}}" style="display:none;">{{$data->status}}</span>
                                                </tr> --}}
                                                {{-- @php
                                                @endphp --}}
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    
                    
                </div>
                

                {{-- <div class="row" id="tableContent">
                        
                </div>
                
                <div class="row">
                    <div class="heading text-center col-sm-8 col-sm-offset-2 wow fadeInUp" data-wow-duration="1200ms" data-wow-delay="300ms">
                        <h2 class="title">Lokasi Donor</h2>
                        <p>Lihat lokasi untuk melakukan donor darah.</p>
                        
                        -0.31380812482125003, 100.03083249897738
                        -0.31367925590001133, 100.03132552644112
                        
                        <div id="google-map" class="wow fadeIn" data-latitude="-0.31380812482125003" data-longitude="100.03083249897738" data-wow-duration="1000ms" data-wow-delay="400ms">
                        
                        </div>
                    </div>
                </div> --}}

                
            </div>
        </div>
    </section>

    {{-- <section id="blog">
        <div class="container">
            
        </div>
    </section><!--/#lokasi--> --}}
@endsection