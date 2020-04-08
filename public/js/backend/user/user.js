var _validFileExtensions = [".jpg", ".jpeg", ".png"];
function PreviewImageCover() {
    var oFReader = new FileReader();
    oFReader.readAsDataURL(document.getElementById("cover").files[0]);
    oFReader.onload = function (oFREvent)
    {
        document.getElementById("uploadPreviewCover").src = oFREvent.target.result;
    };
}
function ValidateSingleInputCover(oInput) {
    if (oInput.type == "file") {
        var sFileName = oInput.value;
        if (typeof (oInput.files) != "undefined") {
            var size = parseFloat(oInput.files[0].size / 1024).toFixed(2);
            if (size > 1024) {
                $("#cover").val('');
                toastr.error("Size exceeds limit!", "Notifications");
                oInput.value = "";
                document.getElementById("uploadPreviewCover").src = BASE_URL + "/backend/images/no_image.png";
                return false;
            }else{
              if (sFileName.length > 0) {
                  var blnValid = false;
                  for (var j = 0; j < _validFileExtensions.length; j++) {
                      var sCurExtension = _validFileExtensions[j];
                      if (sFileName.substr(sFileName.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) {
                          blnValid = true;
                          PreviewImageCover();
                          break;
                      }
                  }

                  if (!blnValid) {
                      $("#cover").val('');
                      toastr.error("Format is not suitable!", "Notifications");
                      oInput.value = "";
                      document.getElementById("uploadPreviewCover").src = BASE_URL + "assets/backend/image/no_image.png";
                      return false;
                  }
              }
            }
        } else {
            toastr.error("The browser does not support this feature!", "Notifications");
        }
    }
    return true;
}

$('.save').click(function(event) {

    event.preventDefault();

    var email = $('input[name="email"]').val();

    if(email != "")
    {
        $.ajax({
            type    : 'GET',
            url     : route_check,
            data    : {email : email},
            success: function(result) {
                if(result == 'true')
                {
                    Swal({
                        title: 'Email is already exist!',
                        type : 'warning',
                        timer: 3000,
                    });
                } 
                else
                {
                    $('#form_add').validate({ // initialize the plugin
                        rules: {
                            name: {
                                required: true
                            },
                            email: {
                                required: true,
                            },
                            phone_number: {
                                required: true,
                            },
                            gender: {
                                required: true,
                            },
                            password: {
                                required: true,
                                minlength: 6
                            },
                            password_edit : {
                                minlength: 6
                            },
                            c_password: {
                                equalTo: "#password"
                            },
                            c_password_edit: {
                                equalTo: "#password_edit"
                            },
                        },
                        highlight: function(element) {
                            $(element).closest('.m-form__group-sub').addClass('has-danger');
                        },
                        unhighlight: function(element) {
                            $(element).closest('.m-form__group-sub').removeClass('has-danger');
                        },
                        errorElement: 'span',
                        errorClass: 'form-control-feedback',
                        errorPlacement: function(error, element) {
                            if(element.parent('.input-group').length) {
                                error.insertAfter(element.parent());
                            } else {
                                error.insertAfter(element);
                            }
                        }
                    });

                    if($('#form_add').valid())
                    {
                        $('#form_add').submit();
                    }
                }
            }
        });
    }
    else
    {
        toastr.error("Please Enter All value!", "Notifications");
    }
});

$(".update").click(function(){
    $('#form_add').validate({ // initialize the plugin
        rules: {
            name: {
                required: true
            },
            email: {
                required: true,
            },
            phone_number: {
                required: true,
            },
            gender: {
                required: true,
            },
            password: {
                required: true,
                minlength: 6
            },
            password_edit : {
                minlength: 6
            },
            c_password: {
                equalTo: "#password"
            },
            c_password_edit: {
                equalTo: "#password_edit"
            },
        },
        highlight: function(element) {
            $(element).closest('.m-form__group-sub').addClass('has-danger');
        },
        unhighlight: function(element) {
            $(element).closest('.m-form__group-sub').removeClass('has-danger');
        },
        errorElement: 'span',
        errorClass: 'form-control-feedback',
        errorPlacement: function(error, element) {
            if(element.parent('.input-group').length) {
                error.insertAfter(element.parent());
            } else {
                error.insertAfter(element);
            }
        }
    });
});

$(document).ready(function(){
    var phones = [{ "mask": "+62############"}];
    $('#phone_number').inputmask({ 
        mask: phones, 
        greedy: false, 
        definitions: { '#': { validator: "[0-9]", cardinality: 1}} 
    });

    $("#roles").select2({
        placeholder: "Select a roles"
    });
});

$('#roles').on('change',function(){
    if($(this).find(':selected').val() == "teacher"){
        console.log('teacher bor');
        $(".nip").removeClass('d-none');
        $("#kelas").html("<option></option><option value='X'>X (Sepuluh)</option><option value='XI'>XI (Sebelas)</option><option value='XII'>XII (Dua belas)</option>");
        $(".kelas").addClass('d-none');
    }else{
        console.log('student bor');
        $(".nip").addClass('d-none');
        $(".nip").val('');
        $(".kelas").removeClass('d-none');
    }
});