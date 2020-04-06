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
							Add Tugas	
						</h3>
					</div>
				</div>
			</div>
			<!--begin::Form-->
			{{ Session::get('message') }}
			<form class="m-form m-form--fit m-form--label-align-right m-form--state" id="form_add" method="POST" action="{{ route('tugas-store') }}" enctype="multipart/form-data">
				{{ csrf_field() }}
				<div class="m-portlet__body">
					<div class="form-group m-form__group">
	                    <p>
	                        <strong class="text-danger">(*)</strong>
	                        <b>Required.</b>
	                    </p>
	                    <br>
						<label><strong class="text-danger">* </strong>Judul Tugas</label>
						<input type="text" class="form-control m-input" id="judul_tugas" name="judul_tugas" placeholder="Enter Judul Tugas" autocomplete="off">
					</div>
					<div class="form-group m-form__group">
						<label><strong class="text-danger">* </strong>Mata Pelajaran</label>
						<select class="input-xxlarge form-control" name="tugas_mapel" id="m_select2_12_1">
							<option></option>
							<option>Matematika</option>
							<option>B.Indonesia</option>
							<option>B.Inggris</option>
							<option>B.Sunda</option>
							<option>PPKN</option>
							<option>Fisika</option>
							<option>Produktif</option>
						</select>
					</div>
					<div class="form-group m-form__group">
						<label><strong class="text-danger">* </strong>Kelas</label>
						<select class="input-xxlarge form-control" name="tugas_kelas" id="m_select2_12_2">
							<option></option>
							<option value="X">X (Sepuluh)</option>
							<option value="XI">XI (Sebelas)</option>
							<option value="XII">XII (Dua belas)</option>
						</select>
					</div>
					<div class="form-group m-form__group">
						<label><strong class="text-danger">* </strong>Isi tugas</label>
						<textarea class="span8 form-control" name="isi_tugas" id="content" cols="40" rows="10"></textarea>
					</div>
					<div class="form-group m-form__group">
						<label><strong class="text-danger">* </strong>Deadline Tugas</label>
						<input type="text" class="form-control m-input" id="deadline_tugas" name="deadline_tugas" readonly="" placeholder="Select a date">
					</div>
					<div class="form-group m-form__group">
						<label>File Tugas</label>
						<center style="border: solid 1px #ebedf2;padding: 20px 0 20px 0;border-radius: 5px">
                        	<img id="justFile" src="{{ asset('images/file.png') }}" class="img-responsive" style="width: 20%;margin-left: auto;margin-right: auto; ">
                        	<br>
                        	<p class="mt-2" id="detailFile"></p>
                        	<br>
                        	<button type="button" class="btn btn-info waves-effect waves-light" onclick="$('#file_upload').click();">
	                        	<span>Upload</span>
                        	</button>
                        	<br>
                        	<label class="error mt-3">Format : pdf / doc / docx. Maks size : 5 mb.</label>
                     	</center>
                     	<strong class="text-danger">* </strong>Keep empty if don't have a File
                     	<input type="file" onchange="ValidateSingleInputFile(this);" id="file_upload" style="display: none;" name="file_upload" accept="application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document" />
		           	</div>
				</div>
				<div class="m-portlet__foot m-portlet__foot--fit">
					<div class="m-form__actions">
						<button type="submit" class="btn btn-primary save">Submit</button>
						<a type="" href="{{ route('tugas') }}" class="btn btn-secondary">Cancel</a>
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
	<script src="{{ asset('js/backend/tugas/tugas.js') }}" type="text/javascript"></script>
@endsection
