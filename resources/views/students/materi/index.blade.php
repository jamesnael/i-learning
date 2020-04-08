@extends('students.template.master')

@section('content')
	<style type="text/css">
		.item:hover{
			margin-top: -5px;
		}
		.item{
			transition: 0.3s;
		}
		.a-black{
			color: #575962 !important;
		}
		.a-black:hover{
			color: #6167e6 !important;
		}
        .col-md-4{
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15) !important;
            transition:0.4s;
        }
        .col-md-4:hover{
            margin-top: -7px;
        }
	</style>
	<div class="m-portlet ">
		<div class="m-portlet__body  m-portlet__body--no-padding">
			<div class="row m-row--no-padding m-row--col-separator-xl">
				<div class="col-md-12">
					<div class="m-widget24">					 
					    <div class="m-widget24__item">
							<div class="d-flex">
						        <h2 class="m-widget24__title ml-5 pl-3" style="font-size : 20px;">
						    		Materi Terbaru
								</h2>
							</div>
							
							<div class="mt-5">
								<div class="d-flex">
							        <h2 class="m-widget24__title ml-5 pl-4" style="font-size : 20px;">
							    		Pembelajaran Untuk Kelas X
									</h2>
								</div>
								<div class="container mt-3">
									<div class="row">
										<div class="col-md-4">
									    	<a href="#" class="m-link a-black">
										    	<img src="{{ asset('images/contoh_1.jpg') }}" width="100%">
										    	<div class="mt-3 ml-2">
											    	<h5>Invers Matriks</h5>
											        <p>Materi Matematika Kelas 12<br>April 05, 2020</p>
										    	</div>
										    </a>
										</div>
										<div class="col-md-4">
									    	<a href="#" class="m-link a-black">
										    	<img src="{{ asset('images/contoh_2.jpg') }}" width="100%">
										    	<div class="mt-3 ml-2">
											    	<h5>Invers Matriks</h5>
											        <p>Materi Matematika Kelas 12<br>April 05, 2020</p>
										    	</div>
										    </a>
										</div>
										<div class="col-md-4">
									    	<a href="#" class="m-link a-black">
										    	<img src="{{ asset('images/contoh_1.jpg') }}" width="100%">
										    	<div class="mt-3 ml-2">
											    	<h5>Invers Matriks</h5>
											        <p>Materi Matematika Kelas 12<br>April 05, 2020</p>
										    	</div>
										    </a>
										</div>
									</div>
								</div>
							</div>
							<div class="mt-5">
								<div class="d-flex">
							        <h2 class="m-widget24__title ml-5 pl-4" style="font-size : 20px;">
							    		Pembelajaran Untuk Kelas XI
									</h2>
								</div>
								<div class="container mt-3">
									<div class="row">
										<div class="col-md-4">
									    	<a href="#" class="m-link a-black">
										    	<img src="{{ asset('images/contoh_1.jpg') }}" width="100%">
										    	<div class="mt-3 ml-2">
											    	<h5>Invers Matriks</h5>
											        <p>Materi Matematika Kelas 12<br>April 05, 2020</p>
										    	</div>
										    </a>
										</div>
										<div class="col-md-4">
									    	<a href="#" class="m-link a-black">
										    	<img src="{{ asset('images/contoh_2.jpg') }}" width="100%">
										    	<div class="mt-3 ml-2">
											    	<h5>Invers Matriks</h5>
											        <p>Materi Matematika Kelas 12<br>April 05, 2020</p>
										    	</div>
										    </a>
										</div>
										<div class="col-md-4">
									    	<a href="#" class="m-link a-black">
										    	<img src="{{ asset('images/contoh_1.jpg') }}" width="100%">
										    	<div class="mt-3 ml-2">
											    	<h5>Invers Matriks</h5>
											        <p>Materi Matematika Kelas 12<br>April 05, 2020</p>
										    	</div>
										    </a>
										</div>
									</div>
								</div>
							</div>
							<div class="mt-5">
								<div class="d-flex">
							        <h2 class="m-widget24__title ml-5 pl-4" style="font-size : 20px;">
							    		Pembelajaran Untuk Kelas XII
									</h2>
								</div>
								<div class="container mt-3">
									<div class="row">
										<div class="col-md-4">
									    	<a href="#" class="m-link a-black">
										    	<img src="{{ asset('images/contoh_1.jpg') }}" width="100%">
										    	<div class="mt-3 ml-2">
											    	<h5>Invers Matriks</h5>
											        <p>Materi Matematika Kelas 12<br>April 05, 2020</p>
										    	</div>
										    </a>
										</div>
										<div class="col-md-4">
									    	<a href="#" class="m-link a-black">
										    	<img src="{{ asset('images/contoh_2.jpg') }}" width="100%">
										    	<div class="mt-3 ml-2">
											    	<h5>Invers Matriks</h5>
											        <p>Materi Matematika Kelas 12<br>April 05, 2020</p>
										    	</div>
										    </a>
										</div>
										<div class="col-md-4">
									    	<a href="#" class="m-link a-black">
										    	<img src="{{ asset('images/contoh_1.jpg') }}" width="100%">
										    	<div class="mt-3 ml-2">
											    	<h5>Invers Matriks</h5>
											        <p>Materi Matematika Kelas 12<br>April 05, 2020</p>
										    	</div>
										    </a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				<!--End::Timeline 3 -->
				<div class="mt-5"></div>
			</div>
		</div>
	</div>
</div>
@endsection