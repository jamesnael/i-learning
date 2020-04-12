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
			margin-top: 40px;
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15) !important;
            transition:0.6s;
        }
        .col-md-4:hover{
            margin-top: -3px;
        }
	</style>
	<div class="m-portlet m-portlet--mobile delbot">
    	<div class="m-portlet__head">
			<div class="m-portlet__head-caption">
				<div class="m-portlet__head-title">
                    <h2 class="m-widget24__title" style="font-size : 20px;">
                        <i class="flaticon-signs"></i> List Materi
					</h2>
				</div>
			</div>
		</div>
		<div class="m-portlet__body  m-portlet__body--no-padding">
			<div class="row m-row--no-padding m-row--col-separator-xl">
				<div class="col-md-12">
					<div class="m-widget24">					 
					    <div class="m-widget24__item">
							<ul class="nav nav-tabs mt-5" role="tablist">
		                        <li class="nav-item">
		                            <a class="nav-link {{ (Request::segment(2) == 'materi' && Request::segment(3) == '') ? 'active':'' }}" data-toggle="tab" href="#m_tabs_2_1">Materi Terpopuler</a>
		                        </li>
		                        <li class="nav-item">
		                            <a class="nav-link {{ (Request::segment(3) == 'kelas_x') ? 'active':'' }}" data-toggle="tab" href="#m_tabs_2_2">Materi Kelas X</a>
		                        </li>
		                        <li class="nav-item">
		                            <a class="nav-link {{ (Request::segment(3) == 'kelas_xi') ? 'active':'' }}" data-toggle="tab" href="#m_tabs_2_3">Materi Kelas XI</a>
		                        </li>
		                        <li class="nav-item {{ (Request::segment(3) == 'kelas_xii') ? 'active':'' }}">
		                            <a class="nav-link" data-toggle="tab" href="#m_tabs_2_4">Materi Kelas XII</a>
		                        </li>
		                    </ul> 

		                    <div class="tab-content">
		                        <div class="tab-pane {{ (Request::segment(2) == 'materi' && Request::segment(3) == '') ? 'active':'' }}" id="m_tabs_2_1" role="tabpanel">
		                            <div class="mt-3">
										<div class="d-flex">
									        <h2 class="m-widget24__title ml-5 pl-4" style="font-size : 20px;">
									    		List Materi Terpopuler
											</h2>
										</div>
										<div class="container mt-3">
											<div class="row">
												@foreach($populer as $data)
													<div class="col-md-4">
												    	<a href="{{ route('materi-detail', $data->materi_url) }}" class="m-link a-black">
													    	<img src="{{ asset('images/materi/'. $data->thumbnail_image) }}" width="100%">
													    	<div class="mt-3 ml-2">
														    	<h5>{{ $data->judul_materi }}</h5>
														    	<i class="fa fa-eye"></i> {{ $data->view_count }}
														        <p>Materi {{ $data->materi_mapel }} Kelas {{ $data->materi_kelas }}<br>{{ date('d F Y', strtotime($data->created_at)) }}</p>
													    	</div>
													    </a>
													</div>
												@endforeach
											</div>
										</div>
									</div>
		                        </div>
		                        <div class="tab-pane {{ (Request::segment(3) == 'kelas_x') ? 'active':'' }}" id="m_tabs_2_2" role="tabpanel">
		                            <div class="mt-3">
										<div class="d-flex">
									        <h2 class="m-widget24__title ml-5 pl-4" style="font-size : 20px;">
									    		Pembelajaran Untuk Kelas X
											</h2>
										</div>
										<div class="container mt-3">
											<div class="row">
												@foreach($materi_x as $data)
													<div class="0">
												    	<a href="{{ route('materi-detail', $data->materi_url) }}" class="m-link a-black">
													    	<img src="{{ asset('images/materi/'. $data->thumbnail_image) }}" width="100%">
													    	<div class="mt-3 ml-2">
														    	<h5>{{ $data->judul_materi }}</h5>
														        <p>Materi {{ $data->materi_mapel }} Kelas {{ $data->materi_kelas }}<br>{{ date('d F Y', strtotime($data->created_at)) }}</p>
													    	</div>
													    </a>
													</div>
												@endforeach
											</div>
										</div>
									</div>
		                        </div>
		                        <div class="tab-pane {{ (Request::segment(3) == 'kelas_xi') ? 'active':'' }}" id="m_tabs_2_3" role="tabpanel">
		                        	<div class="mt-3">
										<div class="d-flex">
									        <h2 class="m-widget24__title ml-5 pl-4" style="font-size : 20px;">
									    		Pembelajaran Untuk Kelas XI
											</h2>
										</div>
										<div class="container mt-3">
											<div class="row">
												@foreach($materi_xi as $data)
													<div class="0">
												    	<a href="{{ route('materi-detail', $data->materi_url) }}" class="m-link a-black">
													    	<img src="{{ asset('images/materi/'. $data->thumbnail_image) }}" width="100%">
													    	<div class="mt-3 ml-2">
														    	<h5>{{ $data->judul_materi }}</h5>
														        <p>Materi {{ $data->materi_mapel }} Kelas {{ $data->materi_kelas }}<br>{{ date('d F Y', strtotime($data->created_at)) }}</p>
													    	</div>
													    </a>
													</div>
												@endforeach
											</div>
										</div>
									</div>
		                        </div>
		                        <div class="tab-pane {{ (Request::segment(3) == 'kelas_xii') ? 'active':'' }}" id="m_tabs_2_4" role="tabpanel">
		                        	<div class="mt-3">
										<div class="d-flex">
									        <h2 class="m-widget24__title ml-5 pl-4" style="font-size : 20px;">
									    		Pembelajaran Untuk Kelas XII
											</h2>
										</div>
										<div class="container mt-3">
											<div class="row">
												@foreach($materi_xii as $data)
													<div class="0">
												    	<a href="{{ route('materi-detail', $data->materi_url) }}" class="m-link a-black">
													    	<img src="{{ asset('images/materi/'. $data->thumbnail_image) }}" width="100%">
													    	<div class="mt-3 ml-2">
														    	<h5>{{ $data->judul_materi }}</h5>
														        <p>Materi {{ $data->materi_mapel }} Kelas {{ $data->materi_kelas }}<br>{{ date('d F Y', strtotime($data->created_at)) }}</p>
													    	</div>
													    </a>
													</div>
												@endforeach
											</div>
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