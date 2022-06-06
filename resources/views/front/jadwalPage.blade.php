@extends('index')
@section('content')
    <section id="team">
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
    </section><!--/#jadwal-->
@endsection

