@extends('teachers.template.master')
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
							List Tugas 
						</h3>
					</div>
				</div>
				<div class="m-portlet__head-tools">
					<!--begin: button  -->
                    <a href="{{ route('tugas-add') }}" class="add btn btn-success m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill"><i class="fa fa-plus"></i> Add New</a>
        		</div>
			</div>
            <div class="m-portlet__body">
                <table id="table" class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul Tugas</th>
                            <th>Mapel Tugas</th>
                            <th>Kelas</th>
                            <th>Deadline Tugas</th>
                            <th>Created At</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table> 
            </div>
        </div>
    </div>
</div>

<!--begin::Modal -->
    <div class="modal fade bd-example-modal-lg" id="Modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">
                        Details Students Works
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">
                            &times;
                        </span>
                    </button>
                </div>
                <div class="modal-body">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#m_tabs_2_1">Finished Works</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#m_tabs_2_2">Unfinished Works</a>
                        </li>
                    </ul> 

                    <div class="tab-content">
                        <div class="tab-pane active" id="m_tabs_2_1" role="tabpanel">
                            <table class="table table-striped table-bordered table-hover" id="table-finish">
                                
                            </table>
                        </div>
                        <div class="tab-pane" id="m_tabs_2_2" role="tabpanel">
                            <table class="table table-striped table-bordered table-hover" id="table-unfinish">

                            </table>
                        </div>
                    </div>  
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>
<!--end::Modal -->

<script type="text/javascript">
    var index              = "{{ route('tugas') }}";
    var loadTable          = "{{ url('teacher/tugas/loadTable') }}";
    var delete_            = "{{ url('teacher/tugas/delete/') }}";
    var edit_              = "{{ url('teacher/tugas/edit/') }}";
    var title_msg          = "{{ Session::get('alert') }}";
    var asset_image        = "{{ asset('images/teacher/tugas') }}";
    var msg                = "{{ Session::get('message') }}";
    var exist              = "{{ Session::has('alert') }}";
    var RouteModalFinish   = "{{ route('tugas-json-finish') }}";
    var RouteModalUnfinish = "{{ route('tugas-json-unfinish') }}";

    $(document).ready(function(){
        $('#Modal').on('show.bs.modal', function (e) {
            var rowid = $(e.relatedTarget).data('id');
            $.ajax({
                type : 'GET',
                url : RouteModalFinish,
                data : {
                    id : rowid
                },
                success: function(result) {
                    $('#table-finish').html(result);
                }
            });

            $.ajax({
                type : 'GET',
                url : RouteModalUnfinish,
                data : {
                    id : rowid
                },
                success: function(result) {
                    $('#table-unfinish').html(result);
                }
            });
        });
    });
</script>
<script type="text/javascript" src="{{ asset('js/backend/tugas/table_tugas.js') }}"></script>
@endsection
