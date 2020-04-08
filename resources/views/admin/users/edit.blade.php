@extends('admin.template.master')
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
							Edit Users
						</h3>
					</div>
				</div>
			</div>
			<!--begin::Form-->
			{{ Session::get('message') }}
			<form class="m-form m-form--fit m-form--label-align-right m-form--state" id="form_add" method="POST" action="{{ route('user-update',$data->id) }}" enctype="multipart/form-data">
				@method('PUT')
				{{ csrf_field() }}
				<div class="m-portlet__body">
					<div class="form-group m-form__group row">
						<div class="m-form__group-sub col-lg-6">
							<label><strong class="text-danger">* </strong>Roles</label>
							<select class="form-control m-input" id="roles" name="roles" readonly="">
								<option></option>
								<option value="teacher" {{ ($data->role == 'teacher') ? 'selected':'' }}>Teachers</option>
								<option value="student" {{ ($data->role == 'student') ? 'selected':'' }}>Students</option>
							</select>
						</div>
		                <div class="m-form__group-sub col-lg-6 nip {{ ($data->role == 'teacher') ? '':'d-none' }}">
							<label><strong class="text-danger">* </strong>NIP</label>
							<input type="number" class="form-control m-input" id="nip" name="nip" placeholder="Enter NIP" value="{{ $data->nip }}">
						</div>
						<div class="m-form__group-sub col-lg-6 kelas {{ ($data->role == 'student') ? '':'d-none' }}">
							<label><strong class="text-danger">* </strong>Kelas</label>
							<select class="form-control m-input selectpicker" id="kelas" name="kelas">
								<option></option>
								<option value="X" {{ ($data->kelas == 'X') ? 'selected':'' }}>X (Sepuluh)</option>
								<option value="XI" {{ ($data->kelas == 'XI') ? 'selected':'' }}>XI (Sebelas)</option>
								<option value="XII" {{ ($data->kelas == 'XII') ? 'selected':'' }}>XII (Dua belas)</option>
							</select>
						</div>
					</div>
					<div class="form-group m-form__group row">
		                <div class="m-form__group-sub col-lg-6">
							<label><strong class="text-danger">* </strong>Full Name</label>
							<input type="text" class="form-control m-input" id="name" name="name" placeholder="Enter Full Name" value="{{ $data->name }}">
						</div>
						<div class="m-form__group-sub col-lg-6">
							<label><strong class="text-danger">* </strong>Email</label>
							<input type="email" class="form-control m-input" id="email" name="email" placeholder="Enter Email" value="{{ $data->email }}" readonly="">
						</div>
					</div>
					<div class="form-group m-form__group row">
		                <div class="m-form__group-sub col-lg-6">
							<label><strong class="text-danger">* </strong>Phone Number</label>
							<input type="tel" class="form-control m-input" id="phone_number" name="phone_number" placeholder="Enter Phone Number" value="{{ $data->phone_number }}">
						</div>
						<div class="m-form__group-sub col-lg-6">
							<label><strong class="text-danger">* </strong>Gender</label>
							<select class="form-control m-input selectpicker" id="gender" name="gender">
								<option></option>
								<option value="L" {{ ($data->gender == 'L') ? 'selected':'' }}>Laki-laki</option>
								<option value="P" {{ ($data->gender == 'P') ? 'selected':'' }}>Perempuan</option>
							</select>
						</div>
					</div>
					<div class="form-group m-form__group row">
		                <div class="m-form__group-sub col-lg-6">
							<label><strong class="text-danger">* </strong>Password</label>
							<input type="password" class="form-control m-input" id="password_edit" name="password_edit" placeholder="Keep empty if you don't want to change password">
						</div>
		                <div class="m-form__group-sub col-lg-6">
							<label><strong class="text-danger">* </strong>Confirm Password</label>
							<input type="password" class="form-control m-input" id="c_password_edit" name="c_password_edit" placeholder="Enter Confirm Password">
						</div>
					</div>
				</div>
				<div class="m-portlet__foot m-portlet__foot--fit">
					<div class="m-form__actions">
						<button type="submit" class="btn btn-primary update">Submit</button>
						<a type="" href="{{ route('user') }}" class="btn btn-secondary">Cancel</a>
					</div>
				</div>
			</form>
			<!--end::Form-->			
		</div>
		<!--end::Portlet-->
	</div>
</div>
@endsection

@section('script')
	<script type="text/javascript">
		var route_check = "{{ route('user-check') }}";
	</script>
	<script src="{{ asset('js/backend/user/user.js') }}" type="text/javascript"></script>
@endsection
