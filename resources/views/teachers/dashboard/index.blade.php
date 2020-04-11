@extends('teachers.template.master')

@section('content')
	<div class="m-portlet ">
		<div class="m-portlet__head">
	        <div class="m-portlet__head-caption">
	            <div class="m-portlet__head-title">
	                <span class="m-portlet__head-icon">
	                    <i class="  flaticon-alert-2"></i>
	                </span>
	                <h3 class="m-portlet__head-text">
	                    Notifications
	                </h3>
	            </div>
	        </div>
	        <div class="m-portlet__head-tools"></div>
	    </div>
		<div class="m-portlet__body  m-portlet__body--no-padding">
			<div class="row m-row--no-padding m-row--col-separator-xl">
                <div class="col-md-12 p-4">
                	@if(!empty($total_done))
	                    <h5 class="my-3 mx-3"><a href="{{ route('tugas') }}" style="text-decoration: underline;">There is <span class="m-badge m-badge--danger m-badge--wide" style="font-weight: 600">  {{ $total_done }}  </span> students have doing your new task!</a></h5>
                	@endif
                </div>
            </div>
		</div>
	</div>
@endsection