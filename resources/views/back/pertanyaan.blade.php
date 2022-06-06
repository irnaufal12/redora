@extends('back.master')
@section('content')
            @if (session('success'))
              <div class="alert alert-success">
                  <span>{{ session('success') }}</span>
              </div>
            @endif
            <div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>Data Pertanyaan</h3>
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
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Tabel Pertanyaan</h4>
                            
                        </div>
                        <div class="card-body">
                            <table class="table table-striped" id="table1">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal Dibuat</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Pertanyaan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 0;
                                    @endphp
                                    @foreach ($table as $key => $data)                             
                                        <tr>
                                            <td>{{$i+1}}</td>
                                            <td>{{$data->tanggal}}</td>
                                            <td>{{$data->nama}}</td>
                                            <td>{{$data->email}}</td>
                                            <td>{{$data->pertanyaan}}</td>
                                        </tr>
                                        @php
                                            $i++;
                                        @endphp
                                    @endforeach
                                </tbody>
                                
                            </table>
                        </div>
                    </div>
                </section>
            </div>
@endsection