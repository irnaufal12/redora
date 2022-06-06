@extends('index')
@section('content')
    <section id="portfolio">
        <div class="container">
            {{-- <div class="row">
                <div class="heading text-center col-sm-8 col-sm-offset-2 wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
                <h2 class="title">Prosedur Donor</h2>
                <p>Bagi yang tertarik untuk melakukukan donor tapi tidak tahu prosedur dan persyaratannya.</p>
                </div>
            </div>  --}}
        {{-- <div class="text-center our-services"> --}}
            <div class="row">
                <div class="col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
                {{-- <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#prosedurDonor">
                    <div class="service-icon">
                    <i class="fa fa-list"></i>
                    </div>
                </button> --}}

                <div class="service-info" id="syaratContent">
                    <h2 class="title">Persyaratan Donor Darah</h2>
                    <p>
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($syarat as $item)
                            <span style="">
                                {{-- &#40; --}}
                                {{$i}}.
                                {{-- &#41; --}}
                            </span>
                            &ensp;{{$item->syarat}} <br><br>
                            @php
                                $i++;
                            @endphp
                        @endforeach
                    </p>
                </div>
                </div>

                <div class="col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="450ms">
                {{-- <a type="button" class="btn btn-danger" data-toggle="modal" data-target="#syaratDonor">
                    <div class="service-icon">
                    <i class="fa fa-cog"></i>
                    </div>
                </a> --}}
                    
                <div class="service-info" id="prosedurContent">
                    <h2 class="title">Prosedur Donor Darah</h2>
                    <p>
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($prosedur as $item)
                        <span>
                            {{$i}}.  {{$item->isi}} <br>
                        </span>
                        <br><img src="../images/registration-{{$i}}.jpg" alt="" width="300px" height="150px"> <br> <br>
                            @php
                                $i++;
                            @endphp
                        @endforeach    
                    </p>
                </div>
                </div>
    
            </div>
        {{-- </div> --}}
        </div>
    </section><!--/#prosedur-->
@endsection

