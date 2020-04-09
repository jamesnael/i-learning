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
                    <span class="m-portlet__head-icon">
                        <i class="flaticon-file"></i>
                    </span>
                    <h1 class="m-portlet__head-text">Details Materi {{ $materi->judul_materi }}</h1>
                </div>
            </div>
        </div>
        <div class="m-portlet__body m-portlet__body--no-padding">
            <div class="row m-row--no-padding m-row--col-separator-xl">
                <div class="container">
                    <div class="row my-5">
                        <div class="col-md-9">
                            <h3>{{ $materi->judul_materi }}</h3>
                            <p>Materi {{ $materi->materi_mapel }} Kelas {{ $materi->materi_kelas }}</p>
                            <p>From : {{ $materi->teacher->name }}</p>
                            <p><i class="fa fa-calendar-alt"></i> {{ date('d F Y', strtotime($materi->created_at)) }} - <i class="fa fa-eye"></i> {{ $materi->view_count }}</p>
                            @php
                                $url = Request::fullUrl();
                            @endphp
                            <span>Share to : </span>
                            <a class="btn btn-secondary" href="https://www.facebook.com/sharer/sharer.php?u={{urlencode($url)}}" target="_blank"><i class="icofont-facebook"></i></a>
                            <a class="btn btn-secondary" href="https://twitter.com/intent/tweet?url={{urlencode($url)}}" target="_blank"><i class="ico icofont-twitter"></i></a>
                            <a class="btn btn-secondary" href="https://wa.me/?text={{urlencode($url)}}" data-action="share/whatsapp/share" target="_blank"><i class="icofont-whatsapp"></i></a>

                            <hr>
                            <p style="text-align: justify;">{!! $materi->isi_materi !!}</p>
                        </div>
                        <div class="col-md-3">
                            <h5>Materi Populer</h5>
                            @foreach($populer as $data)
                                <div class="row my-3">
                                    <div class="col">
                                        <a href="{{ route('materi-detail', $data->materi_url) }}" class="m-link a-black">
                                            <img src="{{ asset('images/contoh_1.jpg') }}" width="100%">
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
@endsection