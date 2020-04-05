@extends('teachers.template.master')

@section('content')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<div class="m-portlet ">
		<div class="m-portlet__body  m-portlet__body--no-padding">
			<div class="row m-row--no-padding m-row--col-separator-xl">
				<div class="col-md-12 col-lg-6 col-xl-4">
					<!--begin::Total Profit-->
					<div class="m-widget24">					 
					    <div class="m-widget24__item">
					        <h3 class="m-widget24__title">
					    		Invers Matriks
							</h3>
							<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="..." alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="..." alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="..." alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
							<br>
							<br>
							<br>
					        <div class="m--space-10"></div>
							<span class="m-widget24__desc">
					            Latihan Matematika Kelas 12
					        </span><br>
							<span class="m-widget24__change">
								April 05, 2020
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
					            New Feedbacks
					        </h4><br>
					        <span class="m-widget24__desc">
					            Customer Review
					        </span>
					        <span class="m-widget24__stats m--font-info">
					            1349
					        </span>		
					        <div class="m--space-10"></div>
							<div class="progress m-progress--sm">
								<div class="progress-bar m--bg-info" role="progressbar" style="width: 84%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
							</div>
							<span class="m-widget24__change">
								Change
							</span>
							<span class="m-widget24__number">
								84%
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
					            New Orders
					        </h4><br>
					        <span class="m-widget24__desc">
					            Fresh Order Amount
					        </span>
					        <span class="m-widget24__stats m--font-danger">
					            567
					        </span>		
					        <div class="m--space-10"></div>
							<div class="progress m-progress--sm">
								<div class="progress-bar m--bg-danger" role="progressbar" style="width: 69%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
							</div>
							<span class="m-widget24__change">
								Change
							</span>
							<span class="m-widget24__number">
								69%
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