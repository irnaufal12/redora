@extends('index')
@section('content')
    <section id="services">
        <div id="services-bg" class="parallax">
            <div class="container">
                <div class="heading wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
                    <div class="row" id="tableContent">
                            <div class="text-center col-sm-8 col-sm-offset-2">
                                @if (session('success'))
                                <div class="alert alert-success">
                                    <span>{{ session('success') }}</span>
                                </div>
                                @endif
                                <h2 class="title">Donor Anda</h2>
                            </div>
                            
                            <div class="col-sm-12 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
                                <table class="table table-request table-hover" id="tableStatus" class="display">
                                <thead>
                                    <tr>
                                    <th>No</th>
                                    <th>Tanggal Pembuatan</th>
                                    <th>Tanggal Konfirmasi</th>
                                    <th>Status</th>
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
                                    @foreach ($kontab as $key => $data)
                                        <tr>
                                        <td scope="row">{{$i}}</td>
                                        <td>{{$data->tgl_pembuatan}}</td>
                                        <td id="golDarah">
                                            @if ($data->tgl_konfirmasi == NULL)
                                                -
                                            @else
                                                {{$data->tgl_konfirmasi}}
                                            @endif
                                        </td>
                                        <td id="kontak">
                                            @if ($data->konfirmasi == NULL)
                                                Belum Donor
                                            @else
                                                {{$data->konfirmasi}}
                                            @endif
                                        </td>
                                        {{-- <td>
                                            @if ($data->pendonor == NULL)
                                                Belum Ada
                                            @else
                                                [Belum Terpenuhi]
                                                
                                            @endif
                                        </td> --}}
                                        <td>
                                            @if ($data->konfirmasi == NULL)
                                                <a href="{{route('user.konfirmasi-donor', $data->id)}}" class="btn btn-success">Konfirmasi di sini</a>                                              
                                            @endif
                                            <a href="{{route('user.status-request-show-home', $data->status_request_id)}}" class="btn btn-success">Lihat Permintaan</a>
                                            
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

