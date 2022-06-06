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

    <section id="home">
        <div id="detail-bg" class="parallax">
            <div class="container">
                <div class="row">
                    <div class="heading col-sm-8 col-sm-offset-2 text-center wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
                        <h2 class="title">DETAIL PERMINTAAN</h2>
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
                        {{-- <a style="font-size:30px; padding:0.6em" href="{{route('user.status-request-isi-update',$tanda)}}" class="btn btn-success" onclick="return confirm('Anda yakin? Kontak anda akan dikirim.')">Ikut Donor!</a> --}}
                        <button type="button" class="btn btn-show" data-toggle="modal" data-target="#addRequest" style="color:white; font-size:20px">
                            IKUT DONOR!
                        </button>
                    </div>
                </div>
                <div class="text-center" style="margin: 20px">
                        <a href="{{route('user.semua-request')}}">
                                <button style="font-size:20px; padding:10px; vertical-align:middle" class="btn-animation">
                                    <span>Kembali</span>
                                </button>
                        </a>
                </div>
                </div>
            </div>
            
            
        </div>
    </section>

  <div class="modal fade" id="addRequest" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="addRequestLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="addRequestLabel">Form Ikut Donor</h5>
          </div>
          <div class="modal-body">
            <form action="{{route('user.ikut-donor', $detail->id)}}" method="POST">
              @method('PUT')
              @csrf
              <div class="mb-3">
                  <label for="gol_darah" class="form-label">Golongan Darah Yang Dibutuhkan</label>
                  <br>
                  <input type="text" class="form-control @error('gol_darah') is-invalid @enderror" name="gol_darah" id="gol_darah" value="{{$detail->gol_darah}}" placeholder="{{$detail->gol_darah}}" readonly="readonly">
                  @error('gol_darah')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                  @enderror
              </div>
              <br>
              <div class="mb-3">
                  <label for="nama" class="form-label">Nama</label>
                  <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" placeholder="Nama Anda" value="{{old('nama')}}">
                  @error('nama')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                  @enderror
              </div>
              <br>
              <div class="mb-3">
                  <label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
                  <input type="date" class="form-control @error('tgl_lahir') is-invalid @enderror" id="tgl_lahir" name="tgl_lahir" value="{{old('tgl_lahir')}}">
                  @error('tgl_lahir')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                  @enderror
              </div>
              <br>
              <div class="mb-3">
                  <label for="no_telp" class="form-label">No Telepon</label>
                  <input type="number" class="form-control @error('no_telp') is-invalid @enderror" id="no_telp" name="no_telp" placeholder="Nomor Telepon Anda" value="{{old('no_telp')}}">
                  @error('no_telp')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                  @enderror
              </div>
              <br>
              <div class="mb-3">
                  <label for="email" class="form-label">Email</label>
                  <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Email Anda" value="{{old('email')}}">
                  @error('email')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                  @enderror
              </div>
              <br>
              <div class="mb-3">
                  <label for="alamat" class="form-label">Alamat</label>
                  <textarea id="alamat" rows="5" class="form-control @error('alamat') is-invalid @enderror" name="alamat" placeholder="Alamat Anda">{{old('alamat')}}</textarea>
                  @error('alamat')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                  @enderror
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

  @if (count($errors) > 0)
    <script type="text/javascript">
        $( document ).ready(function() {
             $('#addRequest').modal('show');
        });
    </script>
  @endif

</body>