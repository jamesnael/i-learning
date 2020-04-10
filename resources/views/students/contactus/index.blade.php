@extends('students.template.master')

@section('content')
	<div class="m-portlet ">
		<div class="m-portlet__body  m-portlet__body--no-padding">
			<div class="row m-row--no-padding m-row--col-separator-xl">
				<div class="col md 12">
                    <div class="m-widthget 24">
                        <div class="m-widget24__item"><br>
                                <div class="d-flex">
                                    <h2 class="m-widget24__title ml-5 pl-3" style="font-size : 20px;">
                                        Contact Us
                                    </h2>
                                </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-4 col-md-offset-4">  

                                    @if(Session::has('status'))
                                    <div class="alert alert-success">{{ Session::get('status') }}</div>
                                    @endif
                                    <form action="" method="post">
                                        {{ csrf_field() }}
                                        <label for="name">Name</label>
                                        <input class="form-control" type="text" name="name" placeholder="you name" />
            
                                        <label for="email">Email</label>
                                        <input class="form-control" type="email" name="email" placeholder="you email address" />
                                        
                                        <label for="message">Message</label>
                                        <textarea class="form-control" name="message" id="" placeholder="your message" cols="30" rows="10"></textarea>

                                        <br><br>

                                        <button class="btn btn-primary btn-block">Send</button>
                                    <form>
                                </div>
                            </div>
                        </div>
                        <br>
                    <!-- End -->
                    </div>
                </div>
			</div>
		</div>
	</div>
@endsection