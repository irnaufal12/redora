<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>ReDoRa - Request Donor Darah</title>
  <link href="/css/bootstrap.min.css" rel="stylesheet">
  <link href="/css/animate.min.css" rel="stylesheet"> 
  <link href="/css/font-awesome.min.css" rel="stylesheet">
  <link href="/css/lightbox.css" rel="stylesheet">
  <link href="/css/main.css" rel="stylesheet">
  <link id="css-preset" href="/css/presets/preset1.css" rel="stylesheet">
  <link href="/css/responsive.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap.min.css">

  <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
  <![endif]-->
  
  <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' type='text/css'>
  <link rel="shortcut icon" href="/images/favicon.ico">
</head><!--/head-->

<body>

  <!--.preloader-->
  <div class="preloader"> <i class="fa fa-circle-o-notch fa-spin"></i></div>
  <!--/.preloader-->

  <header id="home">
    {{-- <div id="home-slider" class="carousel slide carousel-fade" data-ride="carousel">
      <div class="carousel-inner">
        <div class="item active" style="background-image: url(/images/contracted-by.jpg)">
          <div class="caption">
            <h1 class="animated fadeInLeftBig">Welcome to <span>REDORA</span></h1>
            <p class="animated fadeInRightBig">Website Request Donor Darah</p>
            <a data-scroll class="btn btn-start animated fadeInUpBig" href="#services">MULAI</a>
          </div>
        </div>

      <a id="tohash" href="#services"><i class="fa fa-angle-down"></i></a>

    </div><!--/#home-slider--> --}}
    <div class="main-nav">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="{{route('dashboard')}}">
            <h1><img class="img-responsive" src="/images/redora-resize.png" alt="logo"></h1>
          </a>                    
        </div>
        <div class="collapse navbar-collapse">
          {{-- <ul class="nav navbar-nav navbar-left" id="navTop">                 
            <li class="scroll"><a href="{{route('user.faqPage')}}">FAQ</a></li>           
          </ul> --}}
          <ul class="nav navbar-nav navbar-right">
            <li class="scroll">
              <a href="{{ route('user.user-login') }}">LOGIN</a>
            </li>
            <li class="scroll">
              <a href="{{ route('user.user-register') }}">REGISTER</a>
            </li>
          </ul>
        </div>
      </div>
    </div><!--/#main-nav-->
  </header><!--/#home-->


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

  {{-- <section id="home">
        <div id="home-bg" class="parallax">
            <div class="container">
                  <div class="row">
                      <div class="col-sm-12">
                        <div class="col-sm-4">
                          <div class="homeContainer" style="height:350px;">
                              <div class="text-center col-sm-12 wow fadeInUp" data-wow-duration="1200ms" data-wow-delay="300ms">
                              <h2 class="title"><img class="img-responsive" src="/images/redora-resize.png" alt="logo"></h2>
                                  <div class="col-sm-offset-1">
                                      <p id="demo">
                                      Redora adalah website yang bertujuan memudahkan masyarakat melakukan donor darah. Pengguna bisa meminta donor darah maupun mendonorkan darah antar pengguna.
                                      </p>
                                      <p style="margin-top:40px">
                                        <a class="title" href="{{route('user.manfaatPage')}}" style="background:#064c72; color:white">LOGIN</a>
                                        <a class="title" href="{{route('user.manfaatPage')}}" style="background:#064c72; color:white">REGISTER</a>
                                      </p>
                                  </div>
                              </div>
                          </div>
                        </div>
                        <div class="col-sm-8">
                          <div class="homeContainer" style="height:350px; width:100%">
                              <div class="text-center col-sm-12 wow fadeInUp" data-wow-duration="1200ms" data-wow-delay="300ms">
                                    <h2 class="title">Manfaat Donor</h2>
                                    <p id="demo">
                                    Kamu mungkin belum pernah membayangkan sebelumnya bahwa beberapa tetes darah yang kamu sumbangkan 
                                    bisa menjadi sangat berarti bagi orang lain. 
                                    Menurut Palang Merah Amerika, satu sumbangan darah dapat menyelamatkan sebanyak tiga nyawa dan setidaknya 
                                    ada satu orang di Amerika Serikat yang membutuhkan darah setiap dua detik.
                                    Manfaat donor darah ternyata tidak hanya menguntungkan bagi si penerima saja lho, 
                                    tetapi juga bagi para pendonor. Berikut manfaat donor darah untuk kesehatan.
                                    </p>
                                    <h4 class="title" style="background:#064c72">
                                      <a href="{{route('user.prosedurPage')}}" style="color:white">Lihat selengkapnya</a>
                                    </h4>
                              </div>
                          </div>
                        </div>
                      </div>
                  </div>    
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="col-sm-4">
                        <div class="homeContainer" style="height:420px;">
                              <div class="text-center col-sm-12 wow fadeInUp" data-wow-duration="1200ms" data-wow-delay="300ms">
                              <h2 class="title">Prosedur & Persyaratan</h2>
                                  <div class="col-sm-offset-1">
                                      <p id="demo">
                                        Untuk bisa melakukan donor darah, kamu harus mengikuti syarat dan prosedur yang ada. Tekan tombol di bawah untuk melihat syarat dan prosedur donor darah!
                                      </p>
                                      <h4 class="title" style="background:#064c72">
                                      <a href="{{route('user.manfaatPage')}}" style="color:white">Lihat selengkapnya</a>
                                    </h4>
                                  </div>
                              </div>
                        </div>
                      </div>
                      <div class="col-sm-8">
                        <div class="homeContainer" style="height:420px; width:100%;">
                            <div class="text-center col-sm-12 wow fadeInUp" data-wow-duration="1200ms" data-wow-delay="300ms">
                                <h2 class="title">Lokasi Donor</h2>                                                                              
                                <div id="google-map" style="width:auto" class="wow fadeIn" data-latitude="-0.31380812482125003" data-longitude="100.03083249897738" data-wow-duration="1000ms" data-wow-delay="400ms">
                                  
                                </div>
                            </div>
                        </div>
                      </div>
                    </div>
                  </div> 
            </div>
        </div>
  </section> --}}

  <footer id="footer">
    <div class="footer-top wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
      <div class="container text-center">
        <div class="footer-logo">
          <a href="index.html"><img class="img-responsive" src="/images/redora-resize.png" alt=""></a>
        </div>
        <div class="social-icons">
          <ul>
            <li><a class="dribbble" href="https://www.instagram.com/pmi_kab_agam/" target="_blank" rel="noopener noreferrer"><i class="fa fa-instagram"></i></a></li>
            <li><a class="facebook" href="https://facebook.com/pmi.kabupatenagam/" target="_blank" rel="noopener noreferrer"><i class="fa fa-facebook"></i></a></li> 
          </ul>
        </div>
      </div>
    </div>
    <div class="footer-bottom">
      <div class="container">
        <div class="row">
          <div class="col-sm-6">
            <p>&copy; 2014 Oxygen Theme.</p>
          </div>
          <div class="col-sm-6">
            <p class="pull-right">Designed by <a href="http://www.themeum.com/">Themeum</a></p>
          </div>
        </div>
      </div>
    </div>
  </footer>

  {{-- <header id="home">
    <div id="home-slider" class="carousel slide carousel-fade" data-ride="carousel">
      <div class="carousel-inner">
        <div class="item active" style="background-image: url(/images/contracted-by.jpg)">
          <div class="caption">
            <h1 class="animated fadeInLeftBig">Welcome to <span>REDORA</span></h1>
            <p class="animated fadeInRightBig">Website Request Donor Darah</p>
            <a class="btn btn-start" href="{{ route('user.user-login') }}">LOGIN</a>
            <a class="btn btn-start" href="{{ route('user.user-register') }}">REGISTER</a>
          </div>
        </div>
      </div>
    </div>
  </header><!--/#home-slider--> --}}

  <script type="text/javascript" src="/js/jquery.js"></script>
  <script type="text/javascript" src="/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
  <script type="text/javascript" src="/js/jquery.inview.min.js"></script>
  <script type="text/javascript" src="/js/wow.min.js"></script>
  <script type="text/javascript" src="/js/mousescroll.js"></script>
  <script type="text/javascript" src="/js/smoothscroll.js"></script>
  <script type="text/javascript" src="/js/jquery.countTo.js"></script>
  <script type="text/javascript" src="/js/lightbox.min.js"></script>
  <script type="text/javascript" src="/js/main.js"></script>

</body>
</html>