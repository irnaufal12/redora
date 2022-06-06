<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>ReDoRa - Request Donor</title>
  <link href="/css/bootstrap.min.css" rel="stylesheet">
  <link href="/css/animate.min.css" rel="stylesheet"> 
  <link href="/css/font-awesome.min.css" rel="stylesheet">
  <link href="/css/lightbox.css" rel="stylesheet">
  <link href="/css/main.css" rel="stylesheet">
  <link id="css-preset" href="/css/presets/preset1.css" rel="stylesheet">
  <link href="/css/responsive.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">
  

  <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
  <![endif]-->
  
  <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' type='text/css'>
  <link rel="shortcut icon" href="/images/favicon.ico">
</head><!--/head-->

<body>
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
                                <h2 class="title">Semua Permintaan Donor</h2>
                                
                            </div>
                            
                            <div class="col-sm-12 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
                                <span>||</span>
                                <span class="blue2">BLUE</span>
                                <span style="text-align:left">TUTUP</span>
                                <span>||</span>
                                <span class="red">MERAH</span>
                                <span style="text-align:left">BUKA</span>
                                <span style="background: white">|| GUNAKAN KOLOM SEARCH UNTUK MENCARI GOLONGAN DARAH ||</span><br>
                                <table class="table table-request table-hover" id="tableStatus2">
                                  <thead>
                                      <tr>
                                      <th>No</th>
                                      <th>Tanggal Request</th>
                                      <th>Dibuat Oleh</th>
                                      <th>Golongan Darah Yang Dibutuhkan</th>
                                      <th>Kontak</th>
                                      <th>Action</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      @php
                                          $i = 1;
                                      @endphp
                                      @foreach ($semuaRequest as $key => $data)
                                          @php
                                              if ($data->status === "Sudah Terpenuhi") {
                                                  echo '<tr class="sudahTerpenuhi">';
                                              } else {
                                                  echo '<tr>';
                                              }
                                          @endphp
                                          <td scope="row">{{$i}}</td>
                                          <td>{{$data->tgl_pembuatan}}</td>
                                          @php
                                          for ($c=0; $c<$count_user; $c++) { 
                                              if ($data->user_id === $user[$c]->id) {
                                                 $nama = $user[$c]->nama;
                                              }
                                          }
                                          @endphp
                                          <td>{{$nama}}</td>
                                          <td id="golDarah">{{$data->gol_darah}}</td>
                                          <td id="kontak">{{$data->kontak}}</td>
                                          <td>
                                              <a href="{{route('user.show-permintaan', $data->id)}}" class="btn btn-success">
                                              @php
                                                  if ($data->status === "Sudah Terpenuhi") {
                                                  echo 'TUTUP';
                                              } else {
                                                  echo 'Lihat Detail';
                                              }
                                              @endphp
                                              </a>
                                              
                                          </td>
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

    {{-- <section id="home">
        <div id="home-bg" class="parallax">
            <div class="container">
                @if (session('berhasil'))
                        <div class="alert alert-success" role="alert">
                            <span>{{ session('berhasil') }}</span>
                        </div>
                @endif
                <div class="row">
                    <div class="col-sm-12" id="tableContent">
                      <div class="col-sm-12 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
                          @if (session('success'))
                              <div class="alert alert-success">
                                  <span>{{ session('success') }}</span>
                              </div>
                          @endif
                          <h2 class="title">Semua Permintaan Donor</h2>
                          <span class="blue2">BLUE</span>
                          <span style="text-align:left">TUTUP</span>
                          <span class="red">MERAH</span>
                          <span style="text-align:left">BUKA</span>
                          <table class="table table-request table-hover" id="tableStatus2" style="display: block">
                              <thead>
                                  <tr>
                                  <th>No</th>
                                  <th>Tanggal Request</th>
                                  <th>Dibuat Oleh</th>
                                  <th>Golongan Darah Yang Dibutuhkan</th>
                                  <th>Kontak</th>
                                  <th>Action</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  @php
                                      $i = 1;
                                  @endphp
                                  @foreach ($semuaRequest as $key => $data)
                                          @php
                                              if ($data->status === "Sudah Terpenuhi") {
                                                  echo '<tr class="sudahTerpenuhi">';
                                              } else {
                                                  echo '<tr>';
                                              }
                                          @endphp
                                          <td scope="row">{{$i}}</td>
                                          <td>{{$data->tgl_pembuatan}}</td>
                                          @php
                                          for ($c=0; $c<$count_user; $c++) { 
                                              if ($data->user_id === $user[$c]->id) {
                                                 $nama = $user[$c]->nama;
                                              }
                                          }
                                          @endphp
                                          <td>{{$nama}}</td>
                                          <td id="golDarah">{{$data->gol_darah}}</td>
                                          <td id="kontak">{{$data->kontak}}</td>
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

  


  <script type="text/javascript" src="/js/jquery.js"></script>
  <script type="text/javascript" src="/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
  {{-- <script async defer src="https://maps.googleapis.com/maps/api/js?keyAIzaSyA224SOSfksJa0g-s66kwhXkluZxEwu1BA" type="text/javascript"></script> --}}
  {{-- <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script> --}}
  <script type="text/javascript" src="/js/jquery.inview.min.js"></script>
  <script type="text/javascript" src="/js/wow.min.js"></script>
  <script type="text/javascript" src="/js/mousescroll.js"></script>
  <script type="text/javascript" src="/js/smoothscroll.js"></script>
  <script type="text/javascript" src="/js/jquery.countTo.js"></script>
  <script type="text/javascript" src="/js/lightbox.min.js"></script>
  <script type="text/javascript" src="/js/main.js"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>
  {{-- <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script> --}}
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>


  <script>
      $(document).ready(function() {
          $('#tableStatus2').DataTable();
      })
  </script>

</body>