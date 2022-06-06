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

  <!--.preloader-->
  <div class="preloader"> <i class="fa fa-circle-o-notch fa-spin"></i></div>
  <!--/.preloader-->


  {{-- navbar --}}
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
          <a class="navbar-brand" href="{{route('user.home')}}">
            <h1><img class="img-responsive" src="/images/redora-resize.png" alt="logo"></h1>
          </a>                    
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav navbar-left" id="navTop">                 
            <li class="scroll"><a href="{{route('user.home')}}">Home</a></li>
            <li class="scroll"><a href="{{route('user.requestPage')}}">Request Anda</a></li> 
            <li class="scroll"><a href="{{route('user.manfaatPage')}}">Manfaat Donor</a></li>
            <li class="scroll"><a href="{{route('user.prosedurPage')}}">Prosedur Donor</a></li>                     
            {{-- <li class="scroll"><a href="#team">Jadwal Event PMI</a></li>
            <li class="scroll"><a href="#blog">Lokasi Donor</a></li> --}}
            <li class="scroll"><a href="{{route('user.faqPage')}}">FAQ</a></li>           
            <li class="scroll"><a href="{{route('user.konfirmasiPage')}}">Donor Anda</a></li>           
          </ul>
          <ul class="nav navbar-nav navbar-right" id="navTop">                         
            <li class="scroll"><a href="{{route('user.user-logout')}}" onclick="event.preventDefault();document.
              getElementById('logout-form').submit();">Logout</a>
              <form action="{{route('user.user-logout')}}" method="POST" class="d-none" id="logout-form">@csrf</form>
            </li>       
          </ul>
        </div>
      </div>
    </div><!--/#main-nav-->
  </header><!--/#home-->

  @yield('content')
  {{-- REQUEST SECTION --}}
  {{-- <section id="services">
    <div class="container">
      <div class="heading wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
        <div class="row">
          <div class="text-center col-sm-8 col-sm-offset-2">
            @if (session('success'))
              <div class="alert alert-success">
                  <span>{{ session('success') }}</span>
              </div>
            @endif
            <h2>Request Section</h2>
            <p>Halaman untuk menambah request donor atau melihat status request yang telah dibuat.</p>
          </div>
        </div> 
      </div>
      <div class="text-center our-services">
        <div class="row">
          <div class="col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#addRequest">
              <div class="service-icon">
                <i class="fa fa-plus-square-o"></i>
              </div>
            </button>

            <div class="service-info">
              <h3>Tambah Request</h3>
              <p>Tambah request donor darah dengan mengisi form.</p>
            </div>
          </div>

          <div class="col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="450ms">
            <a type="button" class="btn btn-danger" href="#statusRequest">
              <div class="service-icon">
                <i class="fa fa-table"></i>
              </div>
            </a>
              
            <div class="service-info">
              <h3>Status Request</h3>
              <p>Lihat status request, list pendonor dan pilihan mengakhiri request</p>
            </div>
          </div>
 
        </div>
      </div>
    </div>
  </section>
  <section id="statusRequest">
    <div class="container">
      <div class="heading wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
        <div class="row">
          <div class="text-center col-sm-8 col-sm-offset-2">
            <h2>Status Request</h2>
            <p>Lihat status request, list pendonor dan pilihan mengakhiri request.</p>
          </div>
        </div> 
      </div>
      <div class="text-center our-services">
        <div class="row">
          <div class="col-sm-12 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
            <table class="table table-hover" id="tableStatus">
              <thead>
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">Tanggal Request</th>
                  <th scope="col">Golongan Darah Yang Dibutuhkan</th>
                  <th scope="col">Kontak</th>
                  <th scope="col">Lihat Pendonor</th>
                  <th scope="col">Status Request</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                @php
                    $i = 1;
                @endphp
                @foreach ($table as $key => $data)
                    <tr>
                      <th scope="row">{{$i}}</th>
                      <td>{{$data->tgl_pembuatan}}</td>
                      <td id="golDarah">{{$data->gol_darah}}</td>
                      <td id="kontak">{{$data->kontak}}</td>
                      <td>
                        @if ($data->nama_pendonor == NULL)
                            Belum Ada
                        @else
                            {{$data->nama_pendonor}}
                        @endif
                      </td>
                      <td>
                        {{$data->status}}
                      </td>
                      <td>
                        <a class="btn btn-warning" id="btnEdit" data-id="{{$data->id}}" data-toggle="modal" data-target="#editRequest">Edit</a>
                        <a href="{{route('user.status-request-update-status',$data->id)}}" class="btn btn-success" onclick="return confirm('Are you sure?')">Sudahi Request</a>
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
  </section><!--/#request--> --}} 

  {{-- MANFAAT SECTION --}}
  {{-- <section id="about-us" class="parallax">
    <div class="container">
      <div class="row">
        <div class="col-sm-6">
          <div class="about-info wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
            <h2>Manfaat Donor</h2>
            <p>
              Kamu mungkin belum pernah membayangkan sebelumnya bahwa beberapa tetes darah yang kamu sumbangkan 
              bisa menjadi sangat berarti bagi orang lain. 
              Menurut Palang Merah Amerika, satu sumbangan darah dapat menyelamatkan sebanyak tiga nyawa dan setidaknya 
              ada satu orang di Amerika Serikat yang membutuhkan darah setiap dua detik.
              Manfaat donor darah ternyata tidak hanya menguntungkan bagi si penerima saja lho, 
              tetapi juga bagi para pendonor. Berikut manfaat donor darah untuk kesehatan.
            </p>
            <table class="table table-borderless">
                <tr>
                  <td>
                    @foreach ($manfaat as $item)
                      <a data-id="{{$item->id}}" class="btn btn-primary" id="judulManfaat">{{$item->judul}}</a>
                    @endforeach
                  </td>
                </tr>
            </table>
          </div>
        </div>
        <div class="col-sm-6">
            <div class="our-skills wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms" id="isiManfaat">
                
            </div>
        </div>
      </div>
    </div>
  </section><!--/#manfaat--> --}}

  {{-- PROSEDUR SECTION --}}
  {{-- <section id="portfolio">
    <div class="container">
      <div class="row">
        <div class="heading text-center col-sm-8 col-sm-offset-2 wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
          <h2>Prosedur Donor</h2>
          <p>Bagi yang tertarik untuk melakukukan donor tapi tidak tahu prosedur dan persyaratannya.</p>
        </div>
      </div> 
      <div class="text-center our-services">
          <div class="row">
            <div class="col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
              <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#prosedurDonor">
                <div class="service-icon">
                  <i class="fa fa-list"></i>
                </div>
              </button>

              <div class="service-info">
                <h3>Prosedur Donor Darah</h3>
                <p>Tahapan yang akan dijalani ketika melakukan donor</p>
              </div>
            </div>

            <div class="col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="450ms">
              <a type="button" class="btn btn-danger" data-toggle="modal" data-target="#syaratDonor">
                <div class="service-icon">
                  <i class="fa fa-cog"></i>
                </div>
              </a>
                
              <div class="service-info">
                <h3>Persyaratan Donor Darah</h3>
                <p>Syarat-syarat yang harus dipenuhi untuk melakukan donor</p>
              </div>
            </div>
  
          </div>
      </div>
    </div>
      
      
    
  </section><!--/#prosedur--> --}}

  {{-- JADWAL EVENT --}}
  {{-- <section id="team">
    <div class="container">
      <div class="row">
        <div class="heading text-center col-sm-8 col-sm-offset-2 wow fadeInUp" data-wow-duration="1200ms" data-wow-delay="300ms">
          <h2>Jadwal Keliling PMI</h2>
          <p>Jadwal Palang Merah Indonesia Kabupaten Agam melakukan kegiatan donor darah.</p>
          <table class="table table-hover" id="tableJadwal">
              <thead>
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">Tanggal Kegiatan</th>
                  <th scope="col">Lokasi</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($jadwal as $data)
                    @php
                        $i = 1;
                    @endphp
                    <tr>
                      <th scope="row">{{$i}}</th>
                      <td>{{$data->tanggal}}</td>
                      <td>{{$data->lokasi}}</td>                      
                    </tr>
                    @php
                        $i++
                    @endphp
                @endforeach
              </tbody>
            </table>
        </div>
      </div>
      
    </div>
  </section><!--/#jadwal--> --}}

  {{-- LOKASI DONOR --}}
  {{-- <section id="blog">
    <div class="container">
      <div class="row">
        <div class="heading text-center col-sm-8 col-sm-offset-2 wow fadeInUp" data-wow-duration="1200ms" data-wow-delay="300ms">
          <h2>Lokasi Donor</h2>
          <p>Lihat lokasi untuk melakukan donor darah.</p>
        </div>
      </div>
      <div class="blog-posts">
        <!-- -0.31380812482125003, 100.03083249897738 -->
        <div id="google-map" class="wow fadeIn" data-latitude="-0.31380812482125003" data-longitude="100.03083249897738" data-wow-duration="1000ms" data-wow-delay="400ms"></div>
      </div>
    </div>
  </section><!--/#lokasi--> --}}

  {{-- FAQ SECTION --}}
  {{-- <section id="contact">
    
    <div id="contact-us" class="parallax">
      <div class="container">
        <div class="row">
          <div class="heading text-center col-sm-8 col-sm-offset-2 wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
            <h2>Frequently Asked Question</h2>
            <p>Kumpulan pertanyaan yang sering ditanyakan seputar donor darah beserta jawabannya</p>
          </div>
        </div>
        <div class="contact-form wow fadeIn" data-wow-duration="1000ms" data-wow-delay="600ms">
          <div class="row">
            <div class="col-sm-6">
              <div class="contact-info wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
                <ul class="address">
                  @foreach ($faq as $item)
                    <li> <h3> <i class="fa fa-question-circle"> </i> <span> {{$item->pertanyaan}}? </span></h3> </li>
                    <li> <h3> <i class="fa fa-comment"> </i> <span> {{$item->jawaban}} </span></h3> </li>
                  @endforeach
                </ul>
              </div> 
                 
            </div>
            <div class="col-sm-6">
              <h3>Pertanyaan anda belum ada? Silahkan tanyakan pada admin.</h3>
              <form id="main-contact-form" name="contact-form" method="post" action="#">
                <div class="row  wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <input type="text" name="name" class="form-control" placeholder="Name" required="required">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <input type="email" name="email" class="form-control" placeholder="Email Address" required="required">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <input type="text" name="subject" class="form-control" placeholder="Subject" required="required">
                </div>
                <div class="form-group">
                  <textarea name="message" id="message" class="form-control" rows="4" placeholder="Enter your message" required="required"></textarea>
                </div>                        
                <div class="form-group">
                  <button type="submit" class="btn-submit">Send Now</button>
                </div>
              </form>                        
            </div>
          </div>
        </div>
      </div>
    </div>        
  </section><!--/#contact--> --}}

  {{-- FOOTER --}}
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

  {{-- Modal --}}
  {{-- Start Status Request --}}
    <div class="modal fade" id="addRequest" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="addRequestLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="addRequestLabel">Tambah Request</h5>
          </div>
          <div class="modal-body">
            <form action="{{route('user.status-request-store')}}" method="POST">
              @csrf
              <div class="mb-3">
                  <label for="golonganDarah" class="form-label">Golongan Darah Yang Dibutuhkan</label>
                  <br>
                  <select class="form-select" id="golonganDarah" name="golonganDarah">
                    <option selected>Pilih Golongan Darah</option>
                    <option value="A+">A+</option>
                    <option value="A-">A-</option>
                    <option value="B+">B+</option>
                    <option value="B-">B-</option>
                    <option value="AB+">AB+</option>
                    <option value="AB-">AB-</option>
                    <option value="O+">O+</option>
                    <option value="O-">O-</option>
                  </select>
              </div>
              <div class="mb-3">
                  <label for="kontak" class="form-label">Kontak</label>
                  <input type="number" class="form-control" id="kontak" name="kontak">
              </div>
              <br>
              <div class="mb-3">
                  <label for="keterangan" class="form-label">Keterangan Keperluan</label>
                  <textarea id="keterangan" rows="5" class="form-control" name="keterangan" placeholder=""></textarea>
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

    <div class="modal fade" id="editRequest" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="editRequestLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="editRequestLabel">Edit Request</h5>
          </div>
          <div class="modal-body" id="editView">
            
          </div>
        </div>
      </div>
    </div>
  {{-- End Status Request  --}}

  {{-- Start Prosedur Persyaratan --}}
  <div class="modal fade" id="prosedurDonor" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="prosedurDonorLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="prosedurDonorLabel">Prosedur Donor</h5>
          </div>
          <div class="modal-body">
            <p>
              @php
                $i = 1;
              @endphp
              @foreach ($prosedur as $item)
                {{$i}}.  {{$item->isi}} <br>
                @php
                    $i++;
                @endphp
              @endforeach
            </p>
        </div>
        <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="syaratDonor" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="syaratDonorLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="syaratDonorLabel">Persyaratan Donor Darah</h5>
          </div>
          <div class="modal-body">
            <p>
              @php
                $i = 1;
              @endphp
              @foreach ($syarat as $item)
                {{$i}}.  {{$item->syarat}} <br>
                @php
                    $i++;
                @endphp
              @endforeach
            </p>
        </div>
        <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  {{-- End Prosedur Persyaratan --}}

  {{-- SCRIPT --}}
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
      // $(document).getElementById("collapse0").classList.add("in");
      // $('#isibox0').css("display", "block")
      $('#btnEdit').on('click', function() {
          // console.log($(this).data('id'));
          
            var id = $(this).data('id');
            var golDarah = $('#golDarah').val();
            var kontak = $('#kontak').val();
            $.ajax({
              type:'GET',
              url:"{{route('user.status-request-edit')}}",
              data: {id: id, golDarah: golDarah, kontak: kontak},
              success: function(res, status, code) {
                if(status == 'success') {
                    $('#editView').html(res);
                    $('#editRequest').modal('show');
                }
              }
            })
      });

      $('#collapse0').addClass("in");
      $('#tableStatus1').DataTable();
      $('#tableStatus2').DataTable();
      $('#isiBox0').css("display", "block");

      
      
      // if (window.location.pathname == '/user') {
      //   var hitung = <?php echo $i; ?>;
      //   // var therow = document.getElementById('tableStatus1').getElementByTagName('tbody')[0].getElementByTagName('tr');
      //   for (var a = 1; a <=hitung; a++) {
      //     if ($('#status_donor' + a).html() == 'Sudah Terpenuhi') {
      //       $('#rowStyle' + a).getElementByTagName('td').addClass("sudahTerpenuhi");
      //       // var cells = $('#rowStyle' + a).getElementsByTagName
      //       // $(therow[a]).getElementByTagName('td').addClass("sudahTerpenuhi");
      //     }
      //   }
      // }

      // if ($('home'))

    });
      
      const url = window.location.href;
      $('#navTop a').each(function() {
          if (url === (this.href)) {
                $(this).closest('li').addClass("active");
            }
      });

      // 


      // $document.getElementById('tableStatus').DataTable();
      

    function showAnswer(num) {
        var rec = num;
        for (var i = 0; i <= rec; i++) {
            if (i == rec) {
                var x = document.getElementById("answer" + i);
                if (x.style.display === "none") {
                  x.style.display = "block";
                } else {
                  x.style.display = "none";
                }
            }
        }
      }

      function showIsi(num) {
        var rec = num;
        var a = document.getElementById("counter").innerHTML;
        for (var i = 0; i <= a; i++) {
            if (i != rec) {
                var x = document.getElementById("isiBox" + i);
                x.style.display = "none";
            } else {
                var x = document.getElementById("isiBox" + i);
                
                if (x.style.display === "none") {
                  x.style.display = "block";
                } 
                
            }
        }
      }

      // var pathname = window.location.pathname;
      // if (pathname === "/user") {
      //   var counter = <?php echo $i; ?>;
      //   for (var i = 1; i <= counter; i++) {
      //     var a = document.getElementById("status_donor" + i);
      //     var b = document.getElementById("rowStyle" + i);
      //     if (a.innerHtml() == 'Sudah Terpenuhi') {
      //         b.addClass('sudahTerpenuhi');
      //     }
      // }

      // function togglePhp() {
      //   const arrayManfaat = ["1", "2"];
      //   var a = document.getElementById("counter").innerHTML;
        
      //   console.log(a);
      // }
  </script>

</body>
</html>

