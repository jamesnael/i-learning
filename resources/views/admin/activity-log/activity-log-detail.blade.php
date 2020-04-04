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
							Detail Activity Log
						</h3>
					</div>
				</div>
				<div class="m-portlet__head-tools">
					
				</div>
			</div>
            <div class="m-portlet__body">
               <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr style="background-color: #464444;font-size: 16px;font-weight: bold; color: #FFF">
                            <th>Actor</th>
                            <th>Role</th>
                            <th>Activities</th>
                            <th>Description</th>
                            <th>Time</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $log->actor }}</td>
                            <td>{{ $log->role }}</td>
                            <td>{{ $log->activity }}</td>
                            <td>{{ $log->message }}</td>
                            <td>{{ date('d F Y H:i:s', strtotime($log->created_on)) }}</td>
                        </tr>
                    </tbody>
                </table>
                <table class="table table-striped table-bordered table-hover">
                @if ($log->activity == "Save" || $log->activity == "Delete")
                    @if ($log->activity == "Save")
                        <?php $logs = json_decode($log->data_new, TRUE); ?>
                    @elseif ($log->activity == 'Delete')
                        <?php $logs = json_decode($log->data_old, TRUE); ?>
                    @endif
                    @if (!empty($logs))
                    <tr>
                        <td colspan="4" style="background-color: #464444;font-size: 16px;font-weight: bold; color: #FFF">Detail Data</td>
                    </tr>
                    @foreach ($logs as $key => $value)
                    <tr>
                        <td colspan="2" width="50%">{{ $key}}</td>
                        <td colspan="2" width="50%">
                            @if(is_array($value))
                            <table>
                                @foreach($value as $row => $row_value)
                                <tr>
                                    <td style="padding: 5px 10px;">{!! $row !!}</td>
                                    <td style="padding: 5px 10px;">:</td>
                                    <td style="padding: 5px 10px;">{!! $row_value !!}</td>
                                </tr>
                                @endforeach
                            </table>
                            @else
                            {!! $value !!}
                            @endif
                        </td>
                    </tr>
                    @endforeach
                    @endif
                @else
                    <?php
                    $logs_new = json_decode($log->data_new, TRUE);
                    $logs_old = json_decode($log->data_old, TRUE);
                    $logs_change = json_decode($log->data_change, TRUE);
                    ?>
                    @if (!empty($logs_new) and ! empty($logs_old))
                        <tr>
                            <td colspan="4" style="background-color: #464444;font-size: 16px;font-weight: bold; color: #FFF">Data Details</td>
                        </tr>
                        <tr>
                            <td colspan="2" style="background-color: #464444;font-size: 16px;font-weight: bold; color: #FFF" width="50%">Old Data</td>
                            <td colspan="2" style="background-color: #464444;font-size: 16px;font-weight: bold; color: #FFF" width="50%">New Data</td>
                        </tr>
                        @foreach ($logs_new as $key => $value)
                        <tr>
                            <td width="25%">{!! $key !!}</td>
                            <td width="25%">
                                @if(is_array($value))
                                <table>
                                    @foreach($logs_old[$key] as $row => $row_value)
                                    <tr>
                                        <td style="padding: 5px 10px;">{!! $row !!}</td>
                                        <td style="padding: 5px 10px;">:</td>
                                        <td style="padding: 5px 10px;">{!! $row_value !!}</td>
                                    </tr>
                                    @endforeach
                                </table>
                                @else
                                {!! $logs_old[$key] !!}
                                @endif
                            </td>
                            <td width="25%">{!! $key !!}</td>
                            <td width="25%">
                                @if(is_array($value))
                                <table>
                                    @foreach($value as $row => $row_value)
                                    <tr>
                                        <td style="padding: 5px 10px;">{!! $row !!}</td>
                                        <td style="padding: 5px 10px;">:</td>
                                        <td style="padding: 5px 10px;">{!! $row_value !!}</td>
                                    </tr>
                                    @endforeach
                                </table>
                                @else
                                {!! $value !!}
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    @endif
                    @if (!empty($logs_change))
                        <tr>
                            <td colspan="4" style="background-color: #464444;font-size: 16px;font-weight: bold; color: #FFF">Update Data</td>
                        </tr>
                        @foreach ($logs_change as $key => $value)
                            <tr>
                                <td colspan="2" width="50%">{!! $key !!}</td>
                                <td colspan="2" width="50%">
                                    @if(is_array($value))
                                    <table>
                                        @foreach($value as $row => $row_value)
                                        <tr>
                                            <td style="padding: 5px 10px;">{!! $row !!}</td>
                                            <td style="padding: 5px 10px;">:</td>
                                            <td style="padding: 5px 10px;">{!! $row_value !!}</td>
                                        </tr>
                                        @endforeach
                                    </table>
                                    @else
                                    {!! $value !!}
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    @endif
                @endif
            </table>
            </div>
            <div class="m-portlet__foot m-portlet__foot--fit">
                <div class="m-form__actions">
                    <br>
                    <a type="" href="javascript:history.back()" class="btn btn-secondary ml-4">Back</a>
                    <br><br>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
