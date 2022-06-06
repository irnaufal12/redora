@extends('index')
@section('content')
    <section id="services">
        <div id="services-bg" class="parallax">
            <div class="container">
                <div class="heading wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
                    {{-- <div class="row">
                        
                    </div>

                    <div class="row">
                        
                    </div> --}}

                    <div class="row" id="tableContent">
                            <div class="text-center col-sm-8 col-sm-offset-2">
                                @if (session('success'))
                                <div class="alert alert-success">
                                    <span>{{ session('success') }}</span>
                                </div>
                                @endif
                                <h2 class="title">Permintaan Donor Anda</h2>
                                <div class="service-info">
                                    <h3 style="color: black;">Tambah Permintaan?</h3>
                                    <p id="demo"></p>
                                </div>
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#addRequest">
                                    <div class="service-icon">
                                        <i class="fa fa-plus-square-o"></i>
                                    </div>
                                </button>
                            </div>
                            
                            <div class="col-sm-12 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
                                <span class="blue2">BLUE</span>
                                <span style="text-align:left">TUTUP</span>
                                <span class="red">MERAH</span>
                                <span style="text-align:left">BUKA</span>
                                <table class="table table-request table-hover" id="tableStatus2">
                                <thead>
                                    <tr>
                                    <th>No</th>
                                    <th>Tanggal Request</th>
                                    <th>Golongan Darah Yang Dibutuhkan</th>
                                    <th>Kontak</th>
                                    {{-- <th>Lihat Pendonor</th> --}}
                                    <th>Action</th>
                                    {{-- <th>Status Request</th>
                                    <th>Action</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 1;
                                    @endphp
                                    @foreach ($table as $key => $data)
                                        @php
                                            if ($data->status === "Sudah Terpenuhi") {
                                                echo '<tr class="sudahTerpenuhi">';
                                            } else {
                                                echo '<tr>';
                                            }
                                        @endphp
                                        <td scope="row">{{$i}}</td>
                                        <td>{{$data->tgl_pembuatan}}</td>
                                        <td id="golDarah">{{$data->gol_darah}}</td>
                                        <td id="kontak">{{$data->kontak}}</td>
                                        {{-- <td>
                                            @if ($data->pendonor == NULL)
                                                Belum Ada
                                            @else
                                                [Belum Terpenuhi]
                                                
                                            @endif
                                        </td> --}}
                                        <td>
                                            <a href="{{route('user.status-request-show', $data->id)}}" class="btn btn-success">
                                            @php
                                                if ($data->status === "Sudah Terpenuhi") {
                                                echo 'TUTUP';
                                            } else {
                                                echo 'Lihat Detail';
                                            }
                                            @endphp
                                            </a>
                                            
                                        </td>
                                        {{-- <td>
                                            {{$data->status}}
                                        </td> --}}
                                        {{-- <td>
                                            <a class="btn btn-success" id="btnEdit" data-id="{{$data->id}}" data-toggle="modal" data-target="#editRequest">Edit Request</a>
                                            <a href="{{route('user.status-request-update-status',$data->id)}}" class="btn btn-info" onclick="return confirm('Are you sure?')">Sudahi Request</a>
                                        </td> --}}
                                        </tr>
                                        @php
                                            $i = $i + 1;
                                        @endphp
                                    @endforeach
                                </tbody>
                                </table>
                            </div>
                    </div>
                </div>
            </div>
        </div>
        
    </section><!--/#services-->

@endsection

