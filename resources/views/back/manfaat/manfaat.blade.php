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
                            <h3>Ruang Kelola Data Manfaat Donor</h3>
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
                            <h4 class="card-title">Tabel Manfaat Donor</h4>
                            <a href="{{route('admin-manfaat-create')}}" class="btn btn-primary">Add Data</a>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped" id="table1">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Admin</th>
                                        <th>Tanggal Dibuat</th>
                                        <th>Judul</th>
                                        <th>Isi</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($table as $key => $data)                             
                                        <tr>
                                            <td>{{$i+1}}</td>
                                            <td>
                                                @foreach ($admin as $ad)
                                                @if ($data->admin_id == $ad->id)
                                                {{$ad->nama}}
                                                @endif
                                                @endforeach
                                            </td>
                                            <td>{{$data->tanggal}}</td>
                                            <td>{{$data->judul}}</td>
                                            <td>{{$data->isi}}</td>
                                            <td>
                                                <a href="{{route('admin-manfaat-edit',$data->id)}}" class="btn btn-warning">Edit</a>
                                                <a href="{{route('admin-manfaat-delete',$data->id)}}" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
                                                {{-- <a href="#"><i class="bi bi-eraser"></i></a> --}}
                                            </td>
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