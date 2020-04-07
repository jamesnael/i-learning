@extends('students.template.master')

@section('content')

<style>
    .card{
        
    }
    .card:hover{
        margin-top:-5px;
        color: red;
    }
    a.he{
        text-decoration: none;
    }
</style>
    <br><br><br>
    <main>
       <div class="container">
        <div class="row">
                <div class="col-sm-4">
                    <div class="card">
                    <img class="card-img-top" src="{{ asset('images/contoh_1.jpg') }}" alt="Card image cap" style="height: 290px;">
                    <div class="card-body">
                        <h5 class="card-title">Majas</h5>
                        <p class="card-text">Bu Ria</p>
                        <a href="#" class="btn btn-primary">Tugas Bahasa Indonesia</a>
                        <p class="text-right">April 06,2002</p>
                    </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card">
                    <img class="card-img-top" src="{{ asset('images/5bfe3752a017f_thumb900.jpg') }}" alt="Card image cap" style="width: 100%; height: 290px;">
                    <div class="card-body">
                        <h5 class="card-title">Majas</h5>
                        <p class="card-text">Bu Ria</p>
                        <a href="#" class="btn btn-primary">Tugas Bahasa Indonesia</a>
                        <p class="text-right">April 06,2002</p>
                    </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card">
                    <img class="card-img-top" src="{{ asset('images/5bfe3752a017f_thumb900.jpg') }}" alt="Card image cap" style="width: 100%; height: 290px;">
                    <div class="card-body">
                        <h5 class="card-title">Passive Voice</h5>
                        <p class="card-text">Ms.Rachmi</p>
                        <a href="#" class="btn btn-primary">Exam English</a>
                        <p class="text-right">April 06,2002</p>
                    </div>
                    </div>
                </div>
            </div> <br>
            <div class="row">
                <div class="col-sm-4">
                    <div class="card">
                    <img class="card-img-top" src="{{ asset('images/5bfe3752a017f_thumb900.jpg') }}" alt="Card image cap" style="width: 100%; height: 290px;">
                    <div class="card-body">
                        <h5 class="card-title">Andoid Studio</h5>
                        <p class="card-text">Maulana Yusuf Ibrohim</p>
                        <a href="#" class="btn btn-primary">Tugas Produktif</a>
                        <p class="text-right">April 06,2020</p>
                    </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card">
                    <img class="card-img-top" src="{{ asset('images/5bfe3752a017f_thumb900.jpg') }}" alt="Card image cap" style="width: 100%; height: 290px;">
                    <div class="card-body">
                        <h5 class="card-title">Pendidikan Kewarganegaraan</h5>
                        <p class="card-text">Bu Nunuk Mujiana</p>
                        <a href="#" class="btn btn-primary">Tugas Pendidikan Kewarganegaraan</a>
                        <p class="text-right">April 06,2002</p>
                    </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card">
                    <img class="card-img-top" src="{{ asset('images/5bfe3752a017f_thumb900.jpg') }}" alt="Card image cap" style="width: 100%; height: 290px;">
                    <div class="card-body">
                        <h5 class="card-title">Basis Data</h5>
                        <p class="card-text">Pak Atjep Rahmat</p>
                        <a href="#" class="btn btn-primary">Tugas Basis Data</a>
                        <p class="text-right">April 06,2002</p>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </main>              
@endsection