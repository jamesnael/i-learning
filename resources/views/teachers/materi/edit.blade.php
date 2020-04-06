@extends('teachers.template.master')
@section('content')
<div class="row">
	<div class="col-md-12">
		<!--begin::Portlet-->
		<div class="m-portlet m-portlet--tab">
			<div class="m-portlet__head">
				<div class="m-portlet__head-caption">
					<div class="m-portlet__head-title">
						<span class="m-portlet__head-icon m--hide">
						<i class="la la-gear"></i>
						</span>
						<h3 class="m-portlet__head-text">
							Edit Materi	
						</h3>
					</div>
				</div>
			</div>
			<!--begin::Form-->
			{{ Session::get('message') }}
			<form class="m-form m-form--fit m-form--label-align-right m-form--state" id="form_add" method="POST" action="{{ route('materi-update', $data->id) }}" enctype="multipart/form-data">
				@method('PUT')
				{{ csrf_field() }}
				<div class="m-portlet__body">
					<div class="form-group m-form__group">
	                    <p>
	                        <strong class="text-danger">(*)</strong>
	                        <b>Required.</b>
	                    </p>
	                    <br>
						<label><strong class="text-danger">* </strong>Judul Materi</label>
						<input type="text" class="form-control m-input" id="judul_materi" name="judul_materi" placeholder="Enter Materi Title" autocomplete="off" value="{{ $data->judul_materi }}">
					</div>
					<div class="form-group m-form__group">
						<label><strong class="text-danger">* </strong>Mata Pelajaran</label>
						<select class="input-xxlarge form-control" name="materi_mapel" id="m_select2_12_1">
							<option></option>
							<option {{ ($data->materi_mapel == 'Matematika') ? 'selected':'' }}>Matematika</option>
							<option {{ ($data->materi_mapel == 'B.Indonesia') ? 'selected':'' }}>B.Indonesia</option>
							<option {{ ($data->materi_mapel == 'B.Inggris') ? 'selected':'' }}>B.Inggris</option>
							<option {{ ($data->materi_mapel == 'B.Sunda') ? 'selected':'' }}>B.Sunda</option>
							<option {{ ($data->materi_mapel == 'PPKN') ? 'selected':'' }}>PPKN</option>
							<option {{ ($data->materi_mapel == 'Fisika') ? 'selected':'' }}>Fisika</option>
							<option {{ ($data->materi_mapel == 'Produktif') ? 'selected':'' }}>Produktif</option>
						</select>
					</div>
					<div class="form-group m-form__group">
						<label><strong class="text-danger">* </strong>Kelas</label>
						<select class="input-xxlarge form-control" name="materi_kelas" id="m_select2_12_2">
							<option></option>
							<option value="X" {{ ($data->materi_kelas == 'X') ? 'selected':'' }}>X (Sepuluh)</option>
							<option value="XI" {{ ($data->materi_kelas == 'XI') ? 'selected':'' }}>XI (Sebelas)</option>
							<option value="XII" {{ ($data->materi_kelas == 'XII') ? 'selected':'' }}>XII (Dua belas)</option>
						</select>
					</div>
					<div class="form-group m-form__group">
						<label><strong class="text-danger">* </strong>Isi Materi</label>
						<textarea class="span8 form-control" name="isi_materi" id="content" cols="40" rows="10">{{ $data->isi_materi }}</textarea>
					</div>
				</div>
				<div class="m-portlet__foot m-portlet__foot--fit">
					<div class="m-form__actions">
						<button type="submit" class="btn btn-primary save">Submit</button>
						<a type="" href="{{ route('materi') }}" class="btn btn-secondary">Cancel</a>
					</div>
				</div>
			</form>
			<!--end::Form-->			
		</div>
		<!--end::Portlet-->
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function() {
	    $('#content').summernote({
	        height: 150,
	    });
	});
</script>
@endsection

@section('script')
	<script src="{{ asset('js/backend/materi/materi.js') }}" type="text/javascript"></script>
@endsection
