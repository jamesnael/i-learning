/* Datatable Server Side */
var DatatableRemoteAjax = function() {

    var demo = function() {

        var oTable = $('#table').DataTable();

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

    // /* Handle Datatable ---------------------------------------------------- */
    // /* Edit */
    //  $('#table').on('click', '.edit', function(e) {
    //     var x    = $(this).closest('td').find('#id').val();
    //     $(this).attr('href', edit_ + '/' + x);
    // });

    // /* Delete */
    // $('#table').on('click', '.delete', function(e) {
    //     var x    = $(this).closest('td').find('#id').val();

    //     e.preventDefault();

    //     swal({
    //       title             : "Are you sure ?",
    //       text              : "Once deleted, you will not be able to recover this data!",
    //       type              : "warning",
    //       confirmButtonText : 'Yes',
    //       showCancelButton  : true,
    //       allowOutsideClick : false
    //     })

    //     .then(function(e) {
           
    //        e.value ? 

    //        $.ajax({
    //             type     : 'GET',
    //             url      : delete_,
    //             data     : { id : x },
    //             cache    : false,
    //             dataType : "json",
    //             success  : function(result) {

    //                 if(result.status == 'success')
    //                 {
    //                     swal({
    //                         type: "success",
    //                         title: result.message,
    //                         showConfirmButton: !1,
    //                         timer: 1500
    //                     });

    //                     $("#table").dataTable().fnDestroy();
    //                      DatatableRemoteAjax.init();
    //                 }
    //                 else
    //                 {
    //                     swal({
    //                         type: "error",
    //                         title: result.message,
    //                         showConfirmButton: !1,
    //                         timer: 1500
    //                     });
    //                 }
    //             }
    //        })

    //        : "cancel" === e.dismiss;
    //     });  

    // });

    // /* Alert for session action */
    // if(exist){
    //     swal({
    //         type: 'success',
    //         title: title_msg,
    //         text: msg,
    //         showConfirmButton: false,
    //         icon: "success",
    //         timer: 1500
    //     });
    // }

});