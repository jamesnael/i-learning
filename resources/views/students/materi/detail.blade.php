@extends('students.template.master')
@section('content')
    <link rel="stylesheet" href="https://allyoucan.cloud/cdn/icofont/1.0.1/icofont.css">
    <style type="text/css">
        .a-black{
            color: #575962 !important;
        }
        .a-black:hover{
            color: #6167e6 !important;
        }
    </style>
    <div class="m-portlet ">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <h2 class="m-widget24__title" style="font-size : 17px;">
                        <i class="flaticon-signs"></i> &nbsp;Materi {{ $materi->judul_materi }}
                    </h2>
                </div>
            </div>
        </div>
        <div class="m-portlet__body m-portlet__body--no-padding">
            <div class="row m-row--no-padding m-row--col-separator-xl">
                <div class="container">
                    <div class="row my-5">
                        <div class="col-md-8">
                            <h3>{{ $materi->judul_materi }}</h3>
                            <p>Materi {{ $materi->materi_mapel }} Kelas {{ $materi->materi_kelas }}</p>
                            <h6 class="text-info mb-3">{{ $materi->teacher->name }}</h6>
                            <p><i class="fa fa-calendar-alt"></i> {{ date('d F Y', strtotime($materi->created_at)) }} &nbsp;-&nbsp; <i class="fa fa-eye"></i> {{ $materi->view_count }}</p>
                            @php
                                $url = Request::fullUrl();
                            @endphp
                            <span>Share to : </span>
                            <a class="btn btn-secondary" href="https://www.facebook.com/sharer/sharer.php?u={{urlencode($url)}}" target="_blank"><i class="icofont-facebook"></i></a>
                            <a class="btn btn-secondary" href="https://twitter.com/intent/tweet?url={{urlencode($url)}}" target="_blank"><i class="ico icofont-twitter"></i></a>
                            <a class="btn btn-secondary" href="https://wa.me/?text={{urlencode($url)}}" data-action="share/whatsapp/share" target="_blank"><i class="icofont-whatsapp"></i></a>

                            <hr>
                            <p style="text-align: justify;">{!! $materi->isi_materi !!}</p>
                            <div width="100%" class="fb-comments mt-4" data-order-by="reverse_time" data-href="http://192.168.1.191/i-learning/public/student/materi/detail/{{ $materi->materi_url }}" data-numposts="5" data-width="500"></div>
                        </div>
                        <div class="col"></div>
                        <div class="col-md-3">
                            <h5>Materi Populer</h5>
                            @foreach($populer as $data)
                                <div class="row my-3">
                                    <div class="col">
                                        <a href="{{ route('materi-detail', $data->materi_url) }}" class="m-link a-black">
                                            <img src="{{ asset('images/materi/'. $data->thumbnail_image) }}" width="100%">
                                            <div class="mt-3">
                                                <h5>{{ $data->judul_materi }}</h5>
                                                <p>Materi {{ $data->materi_mapel }} Kelas {{ $data->materi_kelas }}<br>{{ date('d F Y', strtotime($data->created_at)) }}</p>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v9.0" nonce="QuLkDCkW"></script>
@endsection