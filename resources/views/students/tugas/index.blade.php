@extends('students.template.master')
@section('content')
    <style>
        .card:hover{
            margin-top:-2px;
        }
        .card{
            transition: 0.15s;
        }
        a.t-none{
            text-decoration: none;
        }
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
                        <i class="flaticon-signs"></i> &nbsp;List Tugas Siswa
                    </h2>
                </div>
            </div>
        </div>
        <div class="m-portlet__body m-portlet__body--no-padding">
            <div class="row m-row--no-padding m-row--col-separator-xl">
                <div class="container">
                    @if($tugas == '[]')
                        <div class="row my-5">
                            <h4>Horeee, tidak ada tugas yang perlu diselesaikan!</h4>
                        </div>
                    @else
                        @foreach($tugas as $data)
                            <div class="row my-5">
                                <div class="col-sm-9">
                                    <a href="{{ route('tugas-detail', $data->tugas_url) }}" class="t-none a-black">
                                        <div class="card shadow">
                                            <div class="card-body">
                                                <div class="d-flex">
                                                    <h5 class="card-title">{{ $data->teacher->name }} memposting tugas baru : <strong class="text-info">{{ $data->judul_tugas }}</strong></h5>
                                                    @php
                                                        $pengumpulan = \App\Models\PengumpulanTugas::where('task_id', $data->id)->where('student_id', Auth::user()->id)->first();
                                                    @endphp
                                                    @if($pengumpulan->status == 1)
                                                        <div class="ml-auto">
                                                            <span class="m-badge m-badge--success m-badge--wide">Sudah Selesai</span>
                                                        </div>
                                                    @endif
                                                    @if($pengumpulan->status == 0 && $data->deadline_tugas <= date('Y-m-d h:i:s'))
                                                        <div class="ml-auto">
                                                            <span class="m-badge m-badge--danger m-badge--wide">Sudah Tenggat</span>
                                                        </div>
                                                    @endif
                                                </div>
                                                <p class="card-text">Tugas {{ $data->tugas_mapel }}</p>
                                                <!-- <button type="button" readonly="" class="btn btn-primary">Tugas {{ $data->tugas_mapel }}</button> -->
                                                <p class="text-right">Tenggat : {{ date('d F Y', strtotime($data->deadline_tugas)) }}</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                @if($loop->first)
                                    <div class="col-sm-3">
                                        <div class="card shadow">
                                            <div class="card-body">
                                                <p class="card-text">
                                                    Berikut adalah tugas yang harus kamu selesaikan, Ayo Semangat kamu pasti bisa!!
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection