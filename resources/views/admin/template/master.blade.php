<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>i-Learning | Administrator</title>
	    <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="description" content="Latest updates and statistic charts"> 
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">

        <!--begin::Web font -->
        <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
        <script>
          WebFont.load({
            google: {"families":["Poppins:300,400,500,600,700","Roboto:300,400,500,600,700"]},
            active: function() {
                sessionStorage.fonts = true;
            }
          });
        </script>
        <!--end::Web font -->

        <!--begin::Css -->
        <link rel="shortcut icon" href="{{ asset('images/logo.png') }}" /> 
        <link href="{{ asset('assets/vendors/custom/fullcalendar/fullcalendar.bundle.css') }}" rel="stylesheet" type="text/css" />
   		<link href="{{ asset('assets/vendors/base/vendors.bundle.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('assets/demo/demo11/base/style.bundle.css') }}" rel="stylesheet" type="text/css" />
	    <link href="{{ asset('assets/vendors/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
	    @yield('css')
		<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
        <!--end::Css -->
    </head>

    <body class="m-content--skin- m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-light m-aside--offcanvas-default">
        
    	<!-- begin:: Page -->
		<div class="m-grid m-grid--hor m-grid--root m-page">
		@include('admin.template.topbar')
			
			<!-- begin::Body -->
			<div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">
			@include('admin.template.aside')
			   	<div class="m-grid__item m-grid__item--fluid m-wrapper">
					<!-- BEGIN: Subheader -->
					<div class="m-subheader ">
						<div class="d-flex align-items-center">
					 		<div class="mr-auto">
					 			<ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
		                            <li class="m-nav__item m-nav__item--home">
		                                <a href="{{ route('dashboard') }}" class="m-nav__link m-nav__link--icon">
		                                    <i class="m-nav__link-icon la la-home"></i>
		                                </a>
		                            </li>
		                            @isset ($page->breadcrumbs)
		                                @foreach ($page->breadcrumbs as $element)
		                                    <li class="m-nav__separator">
		                                        -
		                                    </li>
		                                    <li class="m-nav__item">
		                                        <a href="{{$element['url']}}" class="m-nav__link">
		                                            <span class="m-nav__link-text">
		                                                {{$element['title']}}
		                                            </span>
		                                        </a>
		                                    </li>
		                                @endforeach
		                            @endisset
		                        </ul>
					 		</div>
					  		<div>
								<span class="m-subheader__daterange" id="m_dashboard_daterangepicker">
									<span class="m-subheader__daterange-label">
										<span class="m-subheader__daterange-title"></span>
										<span class="m-subheader__daterange-date m--font-brand"></span>
									</span>
									<a href="#" class="btn btn-sm btn-brand m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill">
										<i class="la la-angle-down"></i>
									</a>
								</span>
					  		</div>
						</div>
					</div>
					<!-- END: Subheader -->	

					<div class="m-content">
						@yield('content')
					</div>

				</div>
			</div>
			@include('admin.template.footer')
			<!-- end:: Body -->
		</div>
		<!-- end:: Page -->

	    <!-- begin::Scroll Top -->
			<div id="m_scroll_top" class="m-scroll-top">
				<i class="la la-arrow-up"></i>
			</div>
		<!-- end::Scroll Top -->

        <!--begin::Javascript -->
		    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
		    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
			<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js"></script>
		    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
		    <script src="{{ asset('js/plugins/general/general-plugin.js') }}"></script>
		    <script src="{{ asset('assets/demo/demo11/custom/crud/forms/widgets/select2.js') }}"></script>
			<script src="{{ asset('assets/vendors/base/vendors.bundle.js') }}" type="text/javascript"></script>
			<script src="{{ asset('assets/demo/demo11/base/scripts.bundle.js') }}" type="text/javascript"></script>
		    <script src="{{ asset('assets/vendors/custom/fullcalendar/fullcalendar.bundle.js') }}" type="text/javascript"></script>
		    <script src="{{ asset('assets/app/js/dashboard.js') }}" type="text/javascript"></script>
		    <script src="{{ asset('assets/vendors/custom/datatables/datatables.bundle.js') }}"></script>
		    @yield('script')

		    <script>
			    $("[data-switch=true]").bootstrapSwitch();
			</script>
		<!-- end::Javascript -->
    </body>
</html>