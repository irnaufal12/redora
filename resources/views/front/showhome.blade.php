@extends('index')
@section('content')
    <section id="home">
        <div id="detail-bg" class="parallax">
            <div class="container">
                <div class="row">
                    <div class="heading col-sm-8 col-sm-offset-2 text-center wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
                        <h2 class="title">DETAIL STATUS REQUEST</h2>
                         @if (session('success'))
                                <div class="alert alert-success">
                                    <span>{{ session('success') }}</span>
                                </div>
                        @endif
                    </div>
                </div>
                <div class="row" id="tableContent" style="width: fit-content; margin-left:55px">
                    <table class="table table-request table-hover" id="tableDetail">
                        <thead>
                            <tr>
                                <th>
                                       Status
                                   </th>
                                   <th>
                                       Pendonor
                                   </th>
                                  <th>
                                       Keterangan
                                  </th>
                              </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td rowspan="3">
                                    {{$status}}
                                </td>
                                <td rowspan="3">
                                    @if ($counter == 0)
                                        Belum Ada
                                    @else
                                        {{$counter}} orang.
                                    @endif
                                </td>
                                <td rowspan="3">
                                    @if ($keterangan == NULL)
                                        Tidak Ada
                                    @else
                                        {{$keterangan}}
                                    @endif
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="text-center" style="margin-top:20px">
                        <a style="font-size:30px; padding:0.6em" href="{{route('user.status-request-isi-update',$tanda)}}" class="btn btn-success" onclick="return confirm('Anda yakin? Kontak anda akan dikirim.')">Ikut Donor!</a>
                    </div>
                </div>

                {{-- <div class="row">
                    <div class="flex-container">
                            <div class="text-center wow fadeInUp col-sm-12" data-wow-duration="1200ms" data-wow-delay="300ms">
                                
                                <div class="row" style="margin-top: 0">
                                    <div class="col-sm-4">
                                        <h3 class="title2">Status</h3>
                                        <p class="desc" style="text-align: center">
                                            {{$status}}
                                        </p>
                                    </div>
                                    <div class="col-sm-4" >
                                        <h3 class="title2">Pendonor</h3>
                                        <p class="desc" style="text-align: center">
                                            @if ($counter == 0)
                                                Belum Ada
                                            @else
                                                {{$counter}} orang.
                                            @endif
                                        </p>
                                    </div>
                                    <div class="col-sm-4" style="text-align: center">
                                        <h3 class="title2">Keterangan</h3>
                                        <p class="desc" style="text-align: center">
                                            @if ($keterangan == NULL)
                                                Tidak Ada
                                            @else
                                                {{$keterangan}}
                                            @endif
                                        </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <a style="font-size:20px" href="{{route('user.status-request-isi-update',$tanda)}}" class="btn btn-success" onclick="return confirm('Anda yakin? Kontak anda akan dikirim.')">Ikut Donor!</a>
                                </div>
                            </div>
                            
                    </div> --}}
                    <div class="text-center" style="margin: 20px">
                        <a href="{{route('user.home')}}">
                                <button style="font-size:20px; padding:10px; vertical-align:middle" class="btn-animation">
                                    <span>Kembali</span>
                                </button>
                        </a>
                    </div>
                    
                    
                    
                </div>
            </div>
            
            
        </div>
    </section>
@endsection