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

<script type="text/javascript">
    var index       = "{{ route('tugas') }}";
    var loadTable   = "{{ url('teacher/tugas/loadTable') }}";
    var delete_     = "{{ url('teacher/tugas/delete/') }}";
    var edit_       = "{{ url('teacher/tugas/edit/') }}";
    var title_msg   = "{{ Session::get('alert') }}";
    var asset_image = "{{ asset('images/teacher/tugas') }}";
    var msg         = "{{ Session::get('message') }}";
    var exist       = "{{ Session::has('alert') }}";
</script>
<script type="text/javascript" src="{{ asset('js/backend/tugas/table_tugas.js') }}"></script>
@endsection
