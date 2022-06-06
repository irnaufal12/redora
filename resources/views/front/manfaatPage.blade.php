@extends('index')
@section('content')
    <section id="services">
        <div id="about-us" class="parallax">
            <div class="container">
                <div class="heading wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
                    <div class="row">
                        <div class="col-sm-10 col-sm-offset-1">
                                <h2 class="title">Manfaat Donor</h2>
                                <p id="demo">
                                Kamu mungkin belum pernah membayangkan sebelumnya bahwa beberapa tetes darah yang kamu sumbangkan 
                                bisa menjadi sangat berarti bagi orang lain. 
                                Menurut Palang Merah Amerika, satu sumbangan darah dapat menyelamatkan sebanyak tiga nyawa dan setidaknya 
                                ada satu orang di Amerika Serikat yang membutuhkan darah setiap dua detik.
                                Manfaat donor darah ternyata tidak hanya menguntungkan bagi si penerima saja lho, 
                                tetapi juga bagi para pendonor. Berikut manfaat donor darah untuk kesehatan.
                                </p>
                                <div class="text-center">
                                    {{-- <table class="table table-borderless">
                                        <tr>
                                        <td>
                                            
                                        </td>
                                        </tr>
                                    </table> --}}
                                    <div class="col-sm-12" id="manfaatContent">
                                        <div class="row" id="headManfaat">
                                            @php
                                                $i = 0;
                                            @endphp
                                            @foreach ($manfaat as $item)
                                            {{-- <a data-id="{{$item->id}}" class="btn btn-primary" id="judulManfaat">{{$item->judul}}</a> --}}
                                                <button class="btn btn-success" onclick="showIsi({{$i}})" id="tbl{{$i}}">
                                                    {{$i+1}}
                                                </button>
                                                @php
                                                    $i++;
                                                @endphp
                                            @endforeach
                                        </div>
                                        <div class="row" id="bodyManfaat">
                                            @php
                                                $i = 0;
                                            @endphp
                                            @foreach ($manfaat as $item)
                                                <div class="alinea wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="100ms" id="isiBox{{$i}}" style="display: none">
                                                    <h4>{{$item->judul}}</h4>
                                                    <p>
                                                        {{$item->isi}}   
                                                    </p>
                                                </div>
                                                @php
                                                    $i++;
                                                @endphp
                                            @endforeach
                                            <div id="counter" style="display: none">{{$i}}</div>
                                        </div>
                                        <div class="row">
                                            {{-- <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                                                <!-- Indicators -->
                                                <ol class="carousel-indicators">
                                                    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                                    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                                    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                                                </ol>

                                                <!-- Wrapper for slides -->
                                                <div class="carousel-inner" role="listbox">
                                                    <div class="item active">
                                                       
                                                        <div class="carousel-caption">
                                                            LALALALALALAL
                                                        </div>
                                                    </div>
                                                    <div class="item">
                                                        
                                                        <div class="carousel-caption">
                                                            LALALALALALAL
                                                        </div>
                                                    </div>
                                                    ...
                                                </div>

                                                <!-- Controls -->
                                                <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                                                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                                    <span class="sr-only">Previous</span>
                                                </a>
                                                <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                                                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                                    <span class="sr-only">Next</span>
                                                </a>
                                            </div> --}}
                                        </div>
                                        {{-- <div class="row">
                                            <button class="btn btn-primary" onclick="togglePhp()">Toggle</button>
                                        </div> --}}
                                    </div>
                                   
                                </div>
                                
                        </div>
                    </div>
                    {{-- <div class="row">
                        <div class="col-sm-12">
                            <div class="about-info wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
                                @foreach ($manfaat as $item)
                                    <h3>{{$item->judul}}</h3>
                                    <p>{{$item->isi}}</p>
                                @endforeach
                            </div>
                        </div>
                    </div> --}}
                </div>
                
            </div>
        </div>
        
    </section><!--/#manfaaat-->
@endsection

