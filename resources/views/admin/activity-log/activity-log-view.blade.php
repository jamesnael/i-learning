@extends('admin.template.master')
@section('content')
<div class="row">
    <div class="col-md-12 ">
        <div class="m-portlet m-portlet--mobile delbot">
        	<div class="m-portlet__head">
				<div class="m-portlet__head-caption">
					<div class="m-portlet__head-title">
                        <span class="m-portlet__head-icon">
                            <i class="flaticon-signs"></i>
                        </span>
						<h3 class="m-portlet__head-text">
							Activity Log View List
						</h3>
					</div>
				</div>
				<div class="m-portlet__head-tools">
					
				</div>
			</div>
            <div class="m-portlet__body">
                <table id="table" class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th width="10">No</th>
                            <th>Actor</th>
                            <th>Role</th>
                            <th>Activities</th>
                            <th>Description</th>
                            <th>Time</th>
                            <th width="10">Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @php 
                            $no = 1 
                        @endphp

                        @foreach(array_reverse($log) as $log)

                            <tr>
                                <td>{{ $no }}</td>
                                <td>{{ $log->actor }}</td>
                                <td>{{ $log->role }}</td>
                                <td>{{ $log->activity }}</td>
                                <td>{{ $log->message }}</td>
                                <td>{{ date('d F Y H:i:s', strtotime($log->created_on)) }}</td>
                                <td align="center"><a href="{{ url('admin/activity-log/view/'. str_replace(' ','_',strtolower($log->menu)).'/detail'.'/'.$log->id.'/') }}" class="m-portlet__nav-link btn m-btn m-btn--hover-warning m-btn--icon m-btn--icon-only m-btn--pill" title="Detail "><i class="la la-eye"></i></a></td>
                            </tr>

                            @php 
                                $no++ 
                            @endphp

                        @endforeach
                    </tbody>
                </table> 
            </div>
            <div class="m-portlet__foot m-portlet__foot--fit">
                <div class="m-form__actions">
                    <br>
                    <a type="" href="{{ route('activity-log') }}" class="btn btn-secondary ml-4">Back</a>
                    <br><br>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="{{ asset('js/backend/activity-log/table-activity-log.js') }}"></script>
@endsection
