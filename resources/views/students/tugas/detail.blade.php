@extends('students.template.master')
@section('content')
    <style type="text/css">
        .file-button{
            background-color: #fff !important;
        }
        .file-button:hover{
            background-color: rgb(246 248 252) !important;
        }
    </style>
	<div class="m-portlet ">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <h2 class="m-widget24__title" style="font-size : 17px;">
                        <i class="flaticon-signs"></i> &nbsp;Detail Tugas {{ $tugas->judul_tugas }}
                    </h2>
                </div>
            </div>
        </div>
        <div class="m-portlet__body m-portlet__body--no-padding">
            <div class="row m-row--no-padding m-row--col-separator-xl">
                <div class="container">
                    <div class="row my-5">
                    	<div class="col-md-8">
                            <h3>{{ $tugas->judul_tugas }}</h3>
                            <p>Tugas {{ $tugas->tugas_mapel }} Kelas {{ $tugas->tugas_kelas }}</p>
                            <h6 class="text-info mb-3">{{ $tugas->teacher->name }}</h6>
                            <p><i class="fa fa-calendar-alt"></i> {{ date('d F Y', strtotime($tugas->created_at)) }}</p>
                            <p><strong>Tenggat : {{ date('d F Y', strtotime($tugas->deadline_tugas)) }} Pukul {{ date('h:i:s', strtotime($tugas->deadline_tugas)) }}</strong></p>
                            <hr>
                            {!! $tugas->isi_tugas !!}
                            @if(!empty($tugas->file_tugas))
	                            <a href="{{ asset('files/tugas/'.$tugas->file_tugas) }}" target="_blank" class="btn btn-primary mt-3"><i class="fa fa-download"></i> &nbsp;Download File Tugas</a>
                            @endif
                    	</div>
                    	<div class="col-md-4">
                    		<div class="card shadow">
                    			<div class="card-title mx-4 my-3">
                    				<div class="d-flex">
		                    			<h4>Tugas Anda</h4>
                    					<div class="ml-auto mt-1">
                    						<h6>{{ ($pengumpulan->status == '0') ? 'Ditugaskan':'Selesai' }}</h6>
                    					</div>
                    				</div>
	                    		</div>
                    			<div class="card-body">
                    				@if($pengumpulan->status == 0)
	                    				<form method="POST" action="{{ route('tugas-kirim') }}" enctype="multipart/form-data">
	                    					{{ csrf_field() }}
				                            <input type="hidden" name="id_tugas" value="{{ $tugas->id }}">
		                    				<input type="file" class="btn btn-outline-primary btn-block file-button" name="file_tugas" required="" style="color: #5867dd !important;">
		                    				<button type="submit" class="btn btn-primary btn-block mt-4">Tandai Sebagai Selesai</button>
	                    				</form>
	                    			@else
	                    				<a class="btn btn-outline-primary btn-block file-button" name="lihat" href="{{ asset('files/pengumpulan_tugas/'.$pengumpulan->file_tugas) }}" target="_blank" style="color: #5867dd !important;">{{ $pengumpulan->file_tugas }}</a>
	                    				<button type="submit" class="btn btn-primary btn-block mt-4" disabled="">Selesai</button>
	                    			@endif
                    			</div>
                    		</div>
                    	</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header"></div>
                <div class="modal-body">
                    <h5 align="center"><b>Information</b></h5>
                    <p align="center" class="mt-3">Tugas ini telah melewati waktu tenggat dan Tidak bisa diakses kembali saat ini.</p>
                </div>
                <div class="modal-footer">
                    <a href="{{ route('tugas-student') }}" class="btn btn-danger">Ok</a>
                </div>
            </div>
        </div>
    </div>
    @php
        date_default_timezone_set('Asia/Jakarta');
    @endphp
    @if($tugas->deadline_tugas <= date('Y-m-d h:i:s') && $pengumpulan->status == 0)
        <script type="text/javascript">
            $(window).on('load',function(){
                $('#myModal').modal('show');
            });
        </script>
    @endif
@endsection
@section('script')
	<script type="text/javascript">
	    var title_msg   = "{{ Session::get('alert') }}";
	    var msg         = "{{ Session::get('message') }}";
	    var exist       = "{{ Session::has('alert') }}";
		if(exist){
	        swal({
	            type: 'success',
	            title: title_msg,
	            text: msg,
	            showConfirmButton: false,
	            icon: "success",
	            timer: 1500
	        });
	    }
	</script>
@endsection