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
    </style>
    <div class="m-portlet ">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <span class="m-portlet__head-icon">
                        <i class="flaticon-signs"></i>
                    </span>
                    <h1 class="m-portlet__head-text">Materi Siswa</h1>
                </div>
            </div>
        </div>
        <div class="m-portlet__body m-portlet__body--no-padding">
            <div class="row m-row--no-padding m-row--col-separator-xl">
                <div class="container">
                    <div class="row mx-2 my-5">
                        <h1>Materi Siswa</h1>
                    </div>
                    <div class="row mx-2 my-5">
                        <div class="col-sm-4">
                            <a href="#" class="t-none">
                                <div class="card shadow">
                                    <img class="card-img-top" src="{{ asset('images/5bfe3752a017f_thumb900.jpg') }}" alt="Card image cap" style="width: 100%; height: 290px;">
                                    <div class="card-body">
                                        <h5 class="card-title">Majas</h5>
                                        <p class="card-text">Bu Ria</p>
                                        <button type="button" readonly="" class="btn btn-primary">Tugas Bahasa Indonesia</button>
                                        <p class="text-right">April 06,2002</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-sm-4">
                            <a href="#" class="t-none">
                                <div class="card shadow">
                                    <img class="card-img-top" src="{{ asset('images/5bfe3752a017f_thumb900.jpg') }}" alt="Card image cap" style="width: 100%; height: 290px;">
                                    <div class="card-body">
                                        <h5 class="card-title">Passive Voice</h5>
                                        <p class="card-text">Ms.Rachmi</p>
                                        <button type="button" readonly="" class="btn btn-primary">Exam English</button>
                                        <p class="text-right">April 05,2002</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-sm-4">
                            <a href="#" class="t-none">
                                <div class="card shadow">
                                    <img class="card-img-top" src="{{ asset('images/5bfe3752a017f_thumb900.jpg') }}" alt="Card image cap" style="width: 100%; height: 290px;">
                                    <div class="card-body">
                                        <h5 class="card-title">Invers Matriks</h5>
                                        <p class="card-text">Bu Annisa</p>
                                        <button type="button" readonly="" class="btn btn-primary">Tugas Matematika</button>
                                        <p class="text-right">April 03,2002</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="row mx-2 my-5">
                        <div class="col-sm-4">
                            <a href="#" class="t-none">
                                <div class="card shadow">
                                    <img class="card-img-top" src="{{ asset('images/5bfe3752a017f_thumb900.jpg') }}" alt="Card image cap" style="width: 100%; height: 290px;">
                                    <div class="card-body">
                                        <h5 class="card-title">Android Studio</h5>
                                        <p class="card-text">Maulana Yusuf Ibrohim</p>
                                        <button type="button" readonly="" class="btn btn-primary">Tugas Produktif</button>
                                        <p class="text-right">Maret 26,2020</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-sm-4">
                            <a href="#" class="t-none">
                                <div class="card shadow">
                                    <img class="card-img-top" src="{{ asset('images/5bfe3752a017f_thumb900.jpg') }}" alt="Card image cap" style="width: 100%; height: 290px;">
                                    <div class="card-body">
                                        <h5 class="card-title">Pendidikan Kewarganegaraan</h5>
                                        <p class="card-text">Bu Nunuk Mujiana</p>
                                        <button type="button" readonly="" class="btn btn-primary">Tugas PPKN</button>
                                        <p class="text-right">Maret 16,2002</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-sm-4">
                            <a href="#" class="t-none">
                                <div class="card shadow">
                                    <img class="card-img-top" src="{{ asset('images/5bfe3752a017f_thumb900.jpg') }}" alt="Card image cap" style="width: 100%; height: 290px;">
                                    <div class="card-body">
                                        <h5 class="card-title">Basis Data</h5>
                                        <p class="card-text">Pak Atjep Rahmat</p>
                                        <button type="button" readonly="" class="btn btn-primary">Tugas Basis Data</button>
                                        <p class="text-right">Maret 06,2002</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection