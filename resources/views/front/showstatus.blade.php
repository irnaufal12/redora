@extends('index')
@section('content')
    <section id="home">
        <div id="detail-bg" class="parallax">
            <div class="container">
                <div class="row">
                    <div class="heading text-center col-sm-8 col-sm-offset-2 wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
                        
                        <h2 class="title">DETAIL STATUS REQUEST</h2><br>
                        @if (session('success'))
                            <div class="alert alert-success">
                                <span>{{ session('success') }}</span>
                            </div>
                        @endif
                        {{-- <a href="{{route('user.requestPage')}}">
                            <button style="font-size:30px; vertical-align:middle" class="btn-animation">
                                <span>Kembali</span>
                            </button>
                        </a> --}}
                        {{-- <div class="belowContainer">
                            <h2 class=""> Data ke-{{$tanda}}</h2>
                            <table style="margin:auto;">
                                <tr>
                                    <td  style="padding-right:15px">
                                        <h2>
                                            <a style="font-size:20px" class="btn btn-success" id="btnEdit" data-id="{{$tanda}}" data-toggle="modal" data-target="#editRequest">Edit</a>
                                        </h2>
                                    </td>
                                    <td>
                                        <h2>
                                            <a style="font-size:20px" href="{{route('user.status-request-update-status',$tanda)}}" class="btn btn-success" onclick="return confirm('Are you sure?')">Sudahi Request</a>
                                        </h2>
                                    </td>
                                </tr>
                            </table>
                        </div> --}}
                    </div>
                </div>
                
                <div class="row" id="tableContent" style="width: fit-content; margin-left:55px; margin-top:-20px">
                    <table class="table table-request table-hover" id="tableDetail2">
                        <thead>
                            <tr>
                                <th>Pendonor</th>
                                <th>Kontak</th>
                                <th>Status Donor</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @for ($i=0; $i <= $counter; $i++)
                                <tr>
                                @if (!empty($array[$i]))
                                    @php
                                        $data_user = App\Models\User::find($array[$i]);
                                        $nama = $data_user->nama;
                                        $kontak = $data_user->no_telp;
                                        $very = "Belum Donor";
                                        for ($y=0; $y < $counter2 ; $y++) { 
                                            if ($konfirmasi[$y]['user_id'] == $array[$i] && $konfirmasi[$y]['status_request_id'] == $tanda) {
                                                $very = $konfirmasi[$y]['konfirmasi'];
                                            }
                                        }

                                    @endphp
                                    <td style="text-align:center">{{$nama}}</td>
                                    <td style="text-align:center">{{$kontak}}</td>
                                    <td style="text-align:center">{{$very}}</td>
                                    {{-- <td>Belum Donor</td> --}}
                                    <td style="text-align:center"><a href="{{route('user.status-request-send',['id_pemohon'=>$tanda,'id_pendonor'=>$data_user->id])}}" class="btn btn-success">Kirim Terima Kasih</a></td>
                                @endif  
                                </tr>  
                            @endfor
                            @for ($i=0; $i <= $counter_tanpa_daftar; $i++)
                                <tr>
                                @if (!empty($array2[$i]))
                                    @php
                                        $data_user = App\Models\UserTanpaDaftar::find($array2[$i]);
                                        $nama = $data_user->nama;
                                        $kontak = $data_user->no_telp;
                                        $very = "Belum Donor";
                                    @endphp
                                    <td style="text-align:center">{{$nama}}</td>
                                    <td style="text-align:center">{{$kontak}}</td>
                                    <td style="text-align:center">{{$very}}</td>
                                    {{-- <td>Belum Donor</td> --}}
                                    <td style="text-align:center"><a href="{{route('user.status-request-send',['id_pemohon'=>$tanda,'id_pendonor'=>$data_user->id])}}" class="btn btn-success">Kirim Terima Kasih</a></td>
                                @endif  
                                </tr>
                            @endfor
                            {{-- <tr>
                                <td rowspan="3">
                                    @if ($counter == 0)
                                        Belum Ada
                                    @else
                                        {{$counter}} orang.
                                    @endif
                                </td>
                            </tr> --}}
                        </tbody>
                    </table>
                    <div class="text-center" style="margin-top:20px">
                        <a style="font-size:20px" class="btn btn-success" id="btnEdit" data-id="{{$tanda}}" data-toggle="modal" data-target="#editRequest">Edit</a>
                        <a style="font-size:20px" href="{{route('user.status-request-update-status',$tanda)}}" class="btn btn-success" onclick="return confirm('Are you sure?')">Sudahi Request</a>
                        {{-- <a style="font-size:30px; padding:0.6em" href="{{route('user.status-request-isi-update',$tanda)}}" class="btn btn-success" onclick="return confirm('Anda yakin? Kontak anda akan dikirim.')">Ikut Donor!</a> --}}
                    </div>
                </div>

                <div class="row">
                    <div class="flex-container col-sm-8 col-sm-offset-2">
                            <div class="text-center col-sm-4 wow fadeInUp" data-wow-duration="1200ms" data-wow-delay="300ms">
                                <h2 class="title2">Status</h2>
                                <p class="desc">
                                    {{$status}}
                                </p>
                            </div>
                            {{-- <div class="text-center wow fadeInUp" data-wow-duration="1200ms" data-wow-delay="300ms">
                                <h2 class="title2">Pendonor</h2>
                                <p class="desc">
                                    @if ($counter == 0)
                                        Belum Ada
                                    @else
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Nama</th>
                                                    <th>Kontak</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                    <td>
                                                        @php
                                                            for ($i=0; $i <= $counter; $i++) {
                                                                if (!empty($array[$i])) {
                                                                    $data_user = App\Models\User::find($array[$i]);
                                                                    $nama = $data_user->nama;
                                                                    echo $nama;
                                                                }
                                                            }
                                                        @endphp
                                                    </td>
                                                    <td>
                                                        @php
                                                            for ($i=0; $i <= $counter; $i++) {
                                                                if (!empty($array[$i])) {
                                                                    $data_user = App\Models\User::find($array[$i]);
                                                                    $kontak = $data_user->no_telp;
                                                                    echo $kontak;
                                                                }
                                                            }
                                                        @endphp
                                                    </td>
                                                    @for ($i=0; $i <= $counter; $i++)
                                                    <tr>
                                                        @if (!empty($array[$i]))
                                                            @php
                                                                $data_user = App\Models\User::find($array[$i]);
                                                                $nama = $data_user->nama;
                                                                $kontak = $data_user->no_telp;
                                                            @endphp
                                                            <td style="text-align:left">{{$nama}}</td>
                                                            <td style="text-align:left">{{$kontak}}</td>
                                                            <td style="text-align:center"><a href="{{route('user.status-request-send',['id_pemohon'=>$tanda,'id_pendonor'=>$data_user->id])}}" class="btn btn-success">Kirim Terima Kasih</a></td>
                                                        @endif
                                                    </tr>
                                                    @endfor
                                            </tbody>
                                        </table>
                                    @endif
                                </p>
                            </div> --}}
                            <div class="text-center col-sm-4 wow fadeInUp" data-wow-duration="1200ms" data-wow-delay="300ms">
                                <h2 class="title2">Keterangan</h2>
                                <p class="desc">
                                    @if ($keterangan == NULL)
                                        Tidak Ada
                                    @else
                                        {{$keterangan}}
                                    @endif
                                </p>
                            </div>
                    </div>
                </div>
                <div class="text-center" style="margin: 20px">
                        <a href="{{route('user.requestPage')}}">
                                <button style="font-size:20px; padding:10px; vertical-align:middle" class="btn-animation">
                                    <span>Kembali</span>
                                </button>
                        </a>
                    </div>
            </div>
        </div>
    </section>
@endsection