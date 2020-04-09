@extends('students.template.master')
@section('content')
    <style>
        .card:hover{
            margin-top:-7px;
        }
        .card{
            transition: 0.4s;
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
                    <span class="m-portlet__head-icon">
                        <i class="flaticon-signs"></i>
                    </span>
                    <h1 class="m-portlet__head-text">List Tugas Siswa</h1>
                </div>
            </div>
        </div>
        <div class="m-portlet__body m-portlet__body--no-padding">
            <div class="row m-row--no-padding m-row--col-separator-xl">
                <div class="container">
                    <div class="row mx-2 my-5">
                        @if($tugas == '[]')
                            <h4>- Belum ada tugas</h4>
                        @else
                            @foreach($tugas as $data)
                                <div class="col-sm-4">
                                    <a href="{{ route('tugas-detail', $data->tugas_url) }}" class="t-none a-black">
                                        <div class="card shadow">
                                            <img class="card-img-top" src="{{ asset('images/5bfe3752a017f_thumb900.jpg') }}" alt="i-Learning" style="width: 100%; height: 290px;">
                                            <div class="card-body">
                                                <div class="d-flex">
                                                    <h5 class="card-title">{{ $data->judul_tugas }}</h5>
                                                    @php
                                                        $pengumpulan = \App\Models\PengumpulanTugas::where('task_id', $data->id)->where('student_id', Auth::user()->id)->first();
                                                    @endphp
                                                    @if($pengumpulan->status == 1)
                                                        <div class="ml-auto">
                                                            <span class="m-badge m-badge--success m-badge--wide">Selesai</span>
                                                        </div>
                                                    @endif
                                                </div>
                                                <p class="card-text">{{ $data->teacher->name }}</p>
                                                <button type="button" readonly="" class="btn btn-primary">Tugas {{ $data->tugas_mapel }}</button>
                                                <p class="text-right">{{ date('d F Y', strtotime($data->created_at)) }}</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection