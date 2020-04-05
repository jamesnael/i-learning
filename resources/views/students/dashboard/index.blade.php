@extends('students.template.master')

@section('content')
	<div class="m-portlet ">
		<div class="m-portlet__body  m-portlet__body--no-padding">
			<div class="row m-row--no-padding m-row--col-separator-xl">
				<div class="col-md-10">
					<div class="m-widget24">					 
					    <div class="m-widget24__item">
					        <h3 class="m-widget24__title">
					    		Invers Matriks
							</h3>
							<div class="container">
								<div id="carouselExampleControls" class="carousel slide w-50" data-ride="carousel">
								  	<div class="carousel-inner">
								    	<div class="carousel-item active">
								      		<img class="d-block w-100" src="{{ asset('images/contoh_1.jpg') }}" alt="First slide">
								    	</div>
								    	<div class="carousel-item">
								      		<img class="d-block w-100" src="{{ asset('images/contoh_2.jpg') }}" alt="Second slide">
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
							</div>
					        <div class="m--space-10 my-5"></div>
							<span class="m-widget24__desc">
					            Latihan Matematika Kelas 12
					        </span><br>
							<span class="m-widget24__change">
								April 05, 2020
							</span>
					    </div>				      
					</div>
				</div>
				<!--End::Timeline 3 -->
			</div>
		</div>
	</div>
@endsection