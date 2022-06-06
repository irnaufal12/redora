@extends('index')
@section('content')
    <section id="contact">
        <div id="contact-us" class="parallax">
            <div class="container">
                <div class="row">
                <div class="heading text-center col-sm-8 col-sm-offset-2 wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
                    @if (session('success'))
                        <div class="alert alert-success">
                            <span>{{ session('success') }}</span>
                        </div>
                    @endif
                    <h2 class="title">Frequently Asked Question</h2>
                    
                    {{-- <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingOne">
                            <h4 class="panel-title">
                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Collapsible Group Item #1
                                </a>
                            </h4>
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                            <div class="panel-body">
                                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                            </div>
                            </div>
                        </div>
                    </div> --}}
                </div>
                </div>
                <div class="contact-form wow fadeIn" data-wow-duration="1000ms" data-wow-delay="600ms">
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 contact-info wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
                            {{-- <ul class="address"> --}}
                            @php
                                $i = 0;
                            @endphp
                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true" >
                            @foreach ($faq as $item)
                                {{-- <li> <h3> <i class="fa fa-question-circle"> </i> <span> {{$item->pertanyaan}}? </span></h3> </li>
                                <button class="btn btn-loadmore" onclick="showAnswer({{$i}})">Show/Hide Answer</button>
                                <div id="answer{{$i}}" style="display: none">
                                    <li> <h3> <i class="fa fa-comment"> </i> <span> {{$item->jawaban}} </span></h3> </li>
                                </div> --}}
                                
                                    <div class="panel panel-default">
                                        <div class="panel-heading" role="tab" id="heading{{$i}}">
                                        <h4 class="panel-title">
                                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse{{$i}}" aria-expanded="false" aria-controls="collapse{{$i}}">
                                            {{$item->pertanyaan}}
                                            </a>
                                        </h4>
                                        </div>
                                        <div id="collapse{{$i}}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading{{$i}}">
                                        <div class="panel-body">
                                            <p>
                                                {{$item->jawaban}}
                                            </p>
                                        </div>
                                        </div>
                                    </div>
                                
                                @php
                                    $i++;
                                @endphp
                            @endforeach
                            </div>
                            {{-- </ul> --}}
                        </div> 
                    </div>
                <div class="row">
                    <div class="col-sm-8 col-sm-offset-2 text-center" style="margin-top: 40px">
                        <h3>Ada pertanyaan lain?</h3>
                        {{-- id="main-contact-form" name="contact-form" --}}
                        <form  method="POST" action="{{route('user.send-email')}}">
                            @csrf
                            <div class="row  wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
                            <div class="col-sm-6">
                                <div class="form-group">
                                <input type="text" name="nama" class="form-control" placeholder="Nama" required="required">
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
                            <textarea name="pertanyaan" id="pertanyaan" class="form-control" rows="4" placeholder="Enter your message" required="required"></textarea>
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
    </section><!--/#contact-->
@endsection

