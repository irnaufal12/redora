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
  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap.min.css">

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
          {{-- <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button> --}}
          <a class="navbar-brand" href="#home">
            <h1><img class="img-responsive" src="/images/redora-resize.png" alt="logo"></h1>
          </a>                    
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav navbar-right">   
            {{-- need fixing               --}}
            <li class="scroll active"><a href="http://127.0.0.1:8000/user#home">Home</a></li>
            <li class="scroll"><a href="http://127.0.0.1:8000/user#services">Request</a></li> 
            <li class="scroll"><a href="http://127.0.0.1:8000/user#about-us">Manfaat Donor</a></li>
            <li class="scroll"><a href="http://127.0.0.1:8000/user#portfolio">Prosedur Donor</a></li>                     
            <li class="scroll"><a href="http://127.0.0.1:8000/user#team">Jadwal Keliling PMI</a></li>
            <li class="scroll"><a href="http://127.0.0.1:8000/user#blog">Lokasi Donor</a></li>
            <li class="scroll"><a href="http://127.0.0.1:8000/user#contact">FAQ</a></li>       
            <li class="scroll"><a href="{{route('user.user-logout')}}" onclick="event.preventDefault();document.
              getElementById('logout-form').submit();">Logout</a>
              <form action="{{route('user.user-logout')}}" method="POST" class="d-none" id="logout-form">@csrf</form>
            </li>       
          </ul>
        </div>
      </div>
    </div><!--/#main-nav-->
  </header><!--/#home-->

    <div class="text-center">
        <div class="container">
            <div class="row">
                <div class="heading text-center col-sm-8 col-sm-offset-2 wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
                <h2>Laman Konfirmasi</h2>
                </div>
            </div>
            <div class="row">
                <form action="{{route('user.konfirmasi-post', basename(request()->path()))}}" method="POST" id="konfirmasiForm">
                        @method('PUT')
                        @csrf
                        <div class="mb-3">
                            <label for="konfirmasi" class="form-label">Apa anda ingin melakukan donor darah? Nama dan Kontak anda akan diberikan kepada pengirim request.</label>
                            <br>
                            <select class="form-select" id="konfirmasi" name="konfirmasi">
                            <option value="1">Ya</option>
                            <option value="2">Tidak</option>
                            </select>
                        </div>
                        
                        <br>
                        
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                </form>
            </div>    
        </div>
    </div>
    

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
</body>