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
    							List Contacts
    						</h3>
    					</div>
    				</div>
    				<div class="m-portlet__head-tools">
    					<!--begin: button  -->
            		</div>
    			</div>
                <div class="m-portlet__body">
                    <table id="table" class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone Number</th>
                                <th>Subject Message</th>
                                <th>Submitted Date</th>
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
                        Detail Messages
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">
                            &times;
                        </span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-stripped" id="tables">
                    </table>
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
    var index             = "{{ route('contact') }}";
    var loadTable         = "{{ url('admin/contact/loadTable') }}";
    var title_msg         = "{{ Session::get('alert') }}";
    var msg               = "{{ Session::get('message') }}";
    var exist             = "{{ Session::has('alert') }}";
    var RouteModalContact = "{{ route('contact-json') }}";
    $(document).ready(function(){
        $('#Modal').on('show.bs.modal', function (e) {
            var rowid = $(e.relatedTarget).data('id');
            $.ajax({
                type : 'GET',
                url : RouteModalContact,
                data : {
                    id : rowid
                },
                success: function(result) {
                    $('#tables').html(result)
                }
            });
        });
    });
</script>
<script type="text/javascript" src="{{ asset('js/backend/contact/table_contact.js') }}"></script>
@endsection
