/* Datatable Server Side */
var DatatableRemoteAjax = function() {

    var demo = function() {

        var oTable = $('#table').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": {
                "url"  : loadTable,
                "type" : "GET",
            },

            "language": {
                "aria": {
                    "sortAscending": ": activate to sort column ascending",
                    "sortDescending": ": activate to sort column descending"
                },
                "emptyTable": "No data available in table",
                "info": "Showing _START_ to _END_ of _TOTAL_ entries",
                "infoEmpty": "No entries found",
                "infoFiltered": "",
                "lengthMenu": "_MENU_ entries",
                "search": "Search:",
                "zeroRecords": "No matching records found"
            },

            "buttons": [],

            "responsive": true,

            "paging": true,

            "order": [
                [1, 'DESC']
            ],
            
            "lengthMenu": [
                [5, 10, 15, 20, -1],
                [5, 10, 15, 20, "All"]
            ],

            "pageLength": 10,

            "bProcessing": true,

            "oLanguage": {
                "sProcessing": "Loading, please wait..."
            },

            "dom": "<'row' <'col-md-12'B>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r><'table-scrollable't><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>", // horizobtal scrollable datatable

            "columns": [
                {
                    "render": function(data, type, row) {
                        return row[0];
                    },
                    "visible": true,
                    "class": 'text-center',
                    "orderable": false,
                    "width": '50px'
                },
                {
                    "render": function(data, type, row) {
                        return row[2];
                    },
                    "visible": true,
                },
                {
                    "render": function(data, type, row) {
                        return row[4];
                    },
                    "visible": true
                },
                {
                    "render": function(data, type, row) {
                        if (row[5] == 'X')
                        {
                            return 'X (Sepuluh)';
                        }
                        else if(row[5] == 'XI') {
                            return 'XI (Sebelas)';
                        }
                        else if(row[5] == 'XII') {
                            return 'XII (Dua belas)';
                        }
                    },
                    "visible": true
                },
                {
                    "render": function(data, type, row) {
                        return '<i class="fa fa-eye"></i> ' + row[7] ;
                    },
                    "visible": true
                },
                {
                    "render": function(data, type, row) {
                        return formattedDateddMMyyyy(row[8]);
                    },
                    "visible": true
                },
                {
                    "render": function(data, type, row) {
                        var id     = '<input type="hidden" id="id" value="' + row[1] + '">';
                        var btnE   = '<a href="'+ edit_ + '/' + row[1] +'" data-toggle="m-tooltip" data-placement="top" data-container="body" class="m-portlet__nav-link btn m-btn m-btn--hover-warning m-btn--icon m-btn--icon-only m-btn--pill edit" title="Edit Data" style="margin-top: 0;"><i class="fa fa-edit"></i></a>';
                        var btnD   = '<a data-toggle="m-tooltip" data-placement="top" data-container="body" class="m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill delete" title="Delete Data" style="margin-top: 0;"><i class="fa fa-trash"></i></a>';
                        var button = id  + '' + '' + btnE + '' + btnD;
                        return button;
                    },
                    "visible": true,
                    "class": 'text-center',
                    "orderable": false,
                    "width": '100px'
                },
            ]

        });

    };

    return {
        // public functions
        init: function() {
            demo();
        },
    };
}();

jQuery(document).ready(function() {
    DatatableRemoteAjax.init();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    /* Handle Datatable ---------------------------------------------------- */
    /* Edit */
     $('#table').on('click', '.edit', function(e) {
        var x    = $(this).closest('td').find('#id').val();
        $(this).attr('href', edit_ + '/' + x);
    });

    /* Delete */
    $('#table').on('click', '.delete', function(e) {
        var x    = $(this).closest('td').find('#id').val();

        e.preventDefault();

        swal({
          title             : "Are you sure ?",
          text              : "Once deleted, you will not be able to recover this data!",
          type              : "warning",
          confirmButtonText : 'Yes',
          showCancelButton  : true,
          allowOutsideClick : false
        })

        .then(function(e) {
           
           e.value ? 

           $.ajax({
                type     : 'DELETE',
                url      : delete_,
                data     : { id : x },
                cache    : false,
                dataType : "json",
                success  : function(result) {

                    if(result.status == 'success')
                    {
                        swal({
                            type: "success",
                            title: result.message,
                            showConfirmButton: !1,
                            timer: 1500
                        });

                        $("#table").dataTable().fnDestroy();
                        DatatableRemoteAjax.init();

                        setTimeout(function() {
                            window.location.href = index;
                        }, 1000);
                    }
                    else
                    {
                        swal({
                            type: "error",
                            title: result.message,
                            showConfirmButton: !1,
                            timer: 1500
                        });
                    }
                }
           })

           : "cancel" === e.dismiss;
        });  

    });

    /* Alert for session action */
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

});