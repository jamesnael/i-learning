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
							Add New Users
						</h3>
					</div>
				</div>
			</div>
			<!--begin::Form-->
			{{ Session::get('message') }}
			<form class="m-form m-form--fit m-form--label-align-right m-form--state" id="form_add" method="POST" action="{{ route('user-store') }}" enctype="multipart/form-data">
				{{ csrf_field() }}
				<div class="m-portlet__body">
					<div class="form-group m-form__group row">
						<div class="m-form__group-sub col-lg-6">
							<label><strong class="text-danger">* </strong>Roles</label>
							<select class="form-control m-input" id="roles" name="roles">
								<option></option>
								<option value="teacher">Teachers</option>
								<option value="student">Students</option>
							</select>
						</div>
		                <div class="m-form__group-sub col-lg-6 d-none nip">
							<label><strong class="text-danger">* </strong>NIP</label>
							<input type="number" class="form-control m-input" id="nip" name="nip" placeholder="Enter NIP">
						</div>
						<div class="m-form__group-sub col-lg-6 d-none kelas">
							<label><strong class="text-danger">* </strong>Kelas</label>
							<select class="form-control m-input selectpicker" id="kelas" name="kelas">
								<option></option>
								<option value="X">X (Sepuluh)</option>
								<option value="XI">XI (Sebelas)</option>
								<option value="XII">XII (Dua belas)</option>
							</select>
						</div>
					</div>
					<div class="form-group m-form__group row">
						<div class="m-form__group-sub col-lg-6">
							<label><strong class="text-danger">* </strong>Full Name</label>
							<input type="text" class="form-control m-input" id="name" name="name" placeholder="Enter Full Name">
						</div>
		                <div class="m-form__group-sub col-lg-6">
							<label><strong class="text-danger">* </strong>Email</label>
							<input type="email" class="form-control m-input" id="email" name="email" placeholder="Enter Email">
						</div>
					</div>
					<div class="form-group m-form__group row">
						<div class="m-form__group-sub col-lg-6">
							<label><strong class="text-danger">* </strong>Phone Number</label>
							<input type="tel" class="form-control m-input" id="phone_number" name="phone_number" placeholder="Enter Phone Number">
						</div>
						<div class="m-form__group-sub col-lg-6">
							<label><strong class="text-danger">* </strong>Gender</label>
							<select class="form-control m-input selectpicker" id="gender" name="gender">
								<option></option>
								<option value="L">Laki-laki</option>
								<option value="P">Perempuan</option>
							</select>
						</div>
					</div>
					<div class="form-group m-form__group row">
		                <div class="m-form__group-sub col-lg-6">
							<label><strong class="text-danger">* </strong>Password</label>
							<input type="password" class="form-control m-input" id="password" name="password" placeholder="Enter Password">
						</div>
		                <div class="m-form__group-sub col-lg-6">
							<label><strong class="text-danger">* </strong>Confirm Password</label>
							<input type="password" class="form-control m-input" id="c_password" name="c_password" placeholder="Enter Confirm Password">
						</div>
					</div>
				</div>
				<div class="m-portlet__foot m-portlet__foot--fit">
					<div class="m-form__actions">
						<button type="submit" class="btn btn-primary save">Submit</button>
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
