@extends('students.template.master')

@section('content')
	<div class="m-portlet ">
		<div class="m-portlet__body  m-portlet__body--no-padding">
			<div class="row m-row--no-padding m-row--col-separator-xl">
				<div class="col md 12">
                    <div class="m-widthget 24">
                        <div class="m-widget24__item"><br>
                            <div class="d-flex">
                                <h2 class="m-widget24__title mt-3 ml-5 pl-3" style="font-size : 20px;">
                                    SEND US A MESSAGE
                                    <hr width="45%" align="left" style="border: none; height:2px; color:#333; background-color:#333;">
                                </h2>
                                <div class="ml-auto mr-auto">
                                    <h2 class="m-widget24__title mt-3 ml-5 pl-5" style="font-size : 20px;margin-right:-20px">
                                        OUR LOCATION
                                        <hr width="45%" align="left" style="border: none; height:2px; color:#333; background-color:#333;">
                                    </h2>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-7 col-md-offset-7 mt-3">
                                    <form action="{{ route('contactus-add') }}" method="POST" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <div class="form-group m-form__group">
                                            <label for="name">Name</label>
                                            <input class="form-control m-input" type="text" name="name" placeholder="Enter your name"  autocomplete="off" required="" />
                                        </div>
                                        <div class="form-group m-form__group">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="email">Email</label>
                                                    <input class="form-control m-input" type="email" name="email" placeholder="Enter your email address" autocomplete="off" required="" />
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="phone_number">Phone Number</label>
                                                    <input class="form-control m-input" type="number" name="phone_number" placeholder="Enter your phone number" autocomplete="off" required="" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group m-form__group">
                                            <label for="subject">Subject</label>
                                            <input class="form-control m-input" type="text" name="subject" placeholder="Enter your subject" autocomplete="off" required="" />
                                        </div>
                                        <div class="form-group m-form__group">
                                            <label for="message">Message</label>
                                            <textarea class="form-control m-input" name="message" id="" placeholder="Enter your message" cols="30" rows="5" autocomplete="off" required="" ></textarea>
                                        </div>
                                        <button class="btn btn-primary btn-block">SEND MESSAGE</button>
                                    <form>
                                </div>
                                <div class="col-md-5">
                                    <div class="card shadow ml-3 mt-3">
                                        <div class="card-body">
                                            <div class="maps mb-3">
                                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.0134905349473!2d106.84164111449732!3d-6.6452456668095365!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c89505b4c37d%3A0x307fc4a38e65fa2b!2sWikrama%20Bogor%20Vocational%20School!5e0!3m2!1sen!2sid!4v1586505668926!5m2!1sen!2sid" height="250" width="400" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                                            </div>
                                            <strong>SMK WIKRAMA BOGOR</strong>
                                            <p class="mb-4">
                                               Jl. Raya Wangun No. 21<br>RT.01 / RW.06, Sindangsari, Kec. Bogor Timur<br>Kota Bogor, Jawa Barat 16146
                                            </p>
                                            <div class="mt-3">
                                                <div class="row mb-1">
                                                    <div class="col-md-10">
                                                        <div class="row">
                                                            <div class="col-3 info-label"><strong>Phone</strong></div>
                                                            <div class="col">(0251) 8242411 Ext. 16146</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mb-1">
                                                    <div class="col-md-10">
                                                        <div class="row">
                                                            <div class="col-3 info-label"><strong>Fax</strong></div>
                                                            <div class="col">(0251) 8242411</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mb-1">
                                                    <div class="col-md-10">
                                                        <div class="row">
                                                            <div class="col-3 info-label"><strong>Email</strong></div>
                                                            <div class="col"> smkwikrama@sch.id</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-5"></div>
                                </div>
                            </div>
                            <div class="mt-5"></div>
                        </div>
                    <!-- End -->
                    </div>
                </div>
			</div>
		</div>
	</div>
@endsection
@section('script')
    <script type="text/javascript">
        var title_msg   = "{{ Session::get('alert') }}";
        var msg         = "{{ Session::get('message') }}";
        var exist       = "{{ Session::has('alert') }}";
        if(exist){
            swal({
                type: 'success',
                title: title_msg,
                text: msg,
                showConfirmButton: false,
                icon: "success",
                timer: 1500
            });
        }
    </script>
@endsection