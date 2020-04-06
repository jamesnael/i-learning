@extends('students.template.master')

@section('content')
    <br><br><br>
       <main>
       <div class="container">
        <div class="row">
                <div class="col-sm-6">
                    <div class="card">
                    <img class="card-img-top" src="{{ asset('images/contoh_1.jpg') }}" alt="Card image cap" style="width: 100%; height: 290px;">
                    <div class="card-body">
                        <h5 class="card-title">Invers Matematika</h5>
                        <p class="card-text">Bu Annisa</p>
                        <a href="#" class="btn btn-primary">Tugas Matematika</a>
                        <p class="text-right">April 06,2020</p>
                    </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Majas</h5>
                        <p class="card-text">Bu Ria</p>
                        <a href="#" class="btn btn-primary">Tugas Bahasa Indonesia</a>
                        <p class="text-right">April 06,2002</p>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </main>              
@endsection