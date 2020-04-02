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
							Edit Events	
						</h3>
					</div>
				</div>
			</div>
			<!--begin::Form-->
			{{ Session::get('message') }}
			<form class="m-form m-form--fit m-form--label-align-right m-form--state" id="form_add" method="POST" action="{{ route('event-update', $data->id) }}" enctype="multipart/form-data">
				@method('PUT')
				{{ csrf_field() }}
				<div class="m-portlet__body">
					<div class="form-group m-form__group">
	                    <p>
	                        <strong class="text-danger">(*)</strong>
	                        <b>Required.</b>
	                    </p>
	                    <br>
						<label><strong class="text-danger">* </strong>Event title</label>
						<input type="text" class="form-control m-input" id="event_title" name="event_title" placeholder="Enter Event Title" value="{{ $data->event_title }}">
					</div>
					<div class="form-group m-form__group">
						<label><strong class="text-danger">* </strong>Event Start Date</label>
						<input type="text" class="form-control m-input" id="start_date" name="start_date" placeholder="Select Event Start Date" readonly="" value="{{ date('d F Y', strtotime($data->start_date)) }}">
					</div>
					<div class="form-group m-form__group">
						<label><strong class="text-danger">* </strong>Event End Date</label>
						<input type="text" class="form-control m-input" id="end_date" name="end_date" placeholder="Select Event End Date" readonly="" value="{{ date('d F Y', strtotime($data->end_date)) }}">
					</div>
					<div class="form-group m-form__group">
						<label><strong class="text-danger">* </strong>Event Description</label>
						<textarea class="form-control m-input" id="event_description" name="event_description" placeholder="Enter Event Description" rows="5">{{ $data->event_description }}</textarea>
					</div>
					<div class="form-group m-form__group">
						<label><strong class="text-danger">* </strong>Event Location</label>
						<input type="text" class="form-control m-input" id="event_location" name="event_location" placeholder="Enter Event Location" value="{{ $data->event_location }}">
					</div>
					<div class="form-group m-form__group">
						<label><strong class="text-danger">* </strong>Normal Price</label>
						<input type="text" class="form-control m-input fee" id="normal_price" name="normal_price" placeholder="Enter Normal Price" value="{{ money_formats($data->normal_price) }}">
					</div>
					<div class="form-group m-form__group">
						<label>Early Bird Expired Date</label>
						<input type="text" class="form-control m-input" id="early_bird_expired_date" name="early_bird_expired_date" placeholder="Select Early bird Expired Date" readonly="" value="{{ date('d F Y', strtotime($data->early_bird_expired_date)) }}">
					</div>
					<div class="form-group m-form__group">
						<label>Early Bird Price</label>
						<input type="text" class="form-control m-input fee" id="early_bird_price" name="early_bird_price" placeholder="Enter Early Bird Price" value="{{ money_formats($data->early_bird_price) }}">
					</div>
		            <div class="form-group m-form__group">
		            	<label><strong class="text-danger">* </strong>Event Registration Active Status</label>
		            	<br>
		            	<div>
							<input data-switch="true" name="is_active" type="checkbox" data-on-text="Actived" data-handle-width="70" data-off-text="Closed" data-on-color="success" date-off-color="danger" {{ ($data->is_active == '1') ? 'checked':'' }}>
						</div>
		            </div>
				</div>
				<div class="m-portlet__foot m-portlet__foot--fit">
					<div class="m-form__actions">
						<button type="submit" class="btn btn-primary save">Submit</button>
						<a type="" href="{{ route('event') }}" class="btn btn-secondary">Cancel</a>
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
<script src="{{ asset('js/backend/master/event/event.js') }}" type="text/javascript"></script>
@endsection
