@extends('back.master')
@section('content')
            <div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>Ruang Kelola Data Prosedur Donor Darah</h3>
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
                <section id="basic-vertical-layouts">
                    <div class="row match-height">
                        <div class="col-md-12 col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Add Data Form</h4>
                                    <a href="{{url()->previous()}}">
                                        <button class="btn btn-primary">
                                        Go Back
                                        </button>
                                    </a>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <form action="{{route('admin-prosedur-store')}}" class="form form-vertical" method="POST">
                                            @csrf
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="isi">Isi</label>
                                                            <textarea id="isi"
                                                                class="form-control" name="isi"
                                                                rows="5" placeholder=""></textarea>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-12 d-flex justify-content-end">
                                                        <button type="submit"
                                                            class="btn btn-primary me-1 mb-1">Submit</button>
                                                        <button type="reset"
                                                            class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
@endsection