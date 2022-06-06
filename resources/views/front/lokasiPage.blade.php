@extends('index')
@section('content')
    <section id="blog">
        <div class="container">
        <div class="row">
            <div class="heading text-center col-sm-8 col-sm-offset-2 wow fadeInUp" data-wow-duration="1200ms" data-wow-delay="300ms">
            <h2>Lokasi Donor</h2>
            <p>Lihat lokasi untuk melakukan donor darah.</p>
            </div>
        </div>
        <div class="blog-posts">
            {{-- -0.31380812482125003, 100.03083249897738 --}}
            <div id="google-map" class="wow fadeIn" data-latitude="-0.31380812482125003" data-longitude="100.03083249897738" data-wow-duration="1000ms" data-wow-delay="400ms"></div>
        </div>
        </div>
    </section><!--/#lokasi-->
@endsection

