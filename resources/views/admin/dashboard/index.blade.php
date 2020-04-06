@extends('admin.template.master')

@section('content')
	<div class="m-portlet ">
		<div class="m-portlet__body  m-portlet__body--no-padding">
			<div class="row m-row--no-padding m-row--col-separator-xl">
				<div class="col-md-12 col-lg-6 col-xl-4">
					<!--begin::Total Profit-->
					<div class="m-widget24">					 
					    <div class="m-widget24__item">
					        <h4 class="m-widget24__title">
					            Total Students
					        </h4><br>
					        <span class="m-widget24__desc">
					            All Students
					        </span>
					        <span class="m-widget24__stats m--font-brand">
					            {{ $total_student }}
					        </span>		
					        <div class="m--space-10"></div>
							<div class="progress m-progress--sm">
								<div class="progress-bar m--bg-brand" role="progressbar" style="width: {{ $total_student }}%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
							</div>
							<span class="m-widget24__change">
								Percentage
							</span>
							<span class="m-widget24__number">
								{{ $total_student }}%
						    </span>
					    </div>				      
					</div>
					<!--end::Total Profit-->
				</div>
				<div class="col-md-12 col-lg-6 col-xl-4">
					<!--begin::New Feedbacks-->
					<div class="m-widget24">
						 <div class="m-widget24__item">
					        <h4 class="m-widget24__title">
					            Total Teachers
					        </h4><br>
					        <span class="m-widget24__desc">
					            All Teachers
					        </span>
					        <span class="m-widget24__stats m--font-info">
					            {{ $total_teacher }}
					        </span>		
					        <div class="m--space-10"></div>
							<div class="progress m-progress--sm">
								<div class="progress-bar m--bg-info" role="progressbar" style="width: {{ $total_teacher }}%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
							</div>
							<span class="m-widget24__change">
								Percentage
							</span>
							<span class="m-widget24__number">
								{{ $total_teacher }}%
						    </span>
					    </div>		
					</div>
					<!--end::New Feedbacks--> 
				</div>
				<div class="col-md-12 col-lg-6 col-xl-4">
					<!--begin::New Orders-->
					<div class="m-widget24">
						<div class="m-widget24__item">
					        <h4 class="m-widget24__title">
					            Total Learning
					        </h4><br>
					        <span class="m-widget24__desc">
					            All Learnings
					        </span>
					        <span class="m-widget24__stats m--font-danger">
					            {{ $total_learning }}
					        </span>		
					        <div class="m--space-10"></div>
							<div class="progress m-progress--sm">
								<div class="progress-bar m--bg-danger" role="progressbar" style="width: {{ $total_learning }}%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
							</div>
							<span class="m-widget24__change">
								Percentage
							</span>
							<span class="m-widget24__number">
								{{ $total_learning }}%
				            </span>
					    </div>		
					</div>
					<!--end::New Orders--> 
				</div>
				<!--End::Timeline 3 -->
			</div>
		</div>
	</div>
@endsection