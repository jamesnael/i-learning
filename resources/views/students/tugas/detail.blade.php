@extends('students.template.master')
@section('content')
	<div class="m-portlet ">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <span class="m-portlet__head-icon">
                        <i class="flaticon-file"></i>
                    </span>
                    <h1 class="m-portlet__head-text">Detail Tugas {{ $tugas->judul_tugas }}</h1>
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
                            <p>From : {{ $tugas->teacher->name }}</p>
                            <p><i class="fa fa-calendar-alt"></i> {{ date('d F Y', strtotime($tugas->created_at)) }}</p>
                            <p>Tenggat : {{ date('d F Y', strtotime($tugas->deadline_tugas)) }}</p>
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
                    					<div class="ml-auto">
                    						<h6>{{ ($pengumpulan->status == '0') ? 'Ditugaskan':'Selesai' }}</h6>
                    					</div>
                    				</div>
	                    		</div>
                    			<div class="card-body">
                    				@if($pengumpulan->status == 0)
	                    				<form method="POST" action="{{ route('tugas-kirim') }}" enctype="multipart/form-data">
	                    					{{ csrf_field() }}
				                            <input type="hidden" name="id_tugas" value="{{ $tugas->id }}">
		                    				<input type="file" class="btn btn-outline-primary btn-block" name="file_tugas" required="">
		                    				<button type="submit" class="btn btn-primary btn-block mt-4">Tandai Sebagai Selesai</button>
	                    				</form>
	                    			@else
	                    				<a class="btn btn-outline-primary btn-block" name="lihat" href="{{ asset('files/pengumpulan_tugas/'.$pengumpulan->file_tugas) }}" target="_blank">{{ $pengumpulan->file_tugas }}</a>
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