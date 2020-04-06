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
            if (size > 2000) {
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
    $('#form_add').validate({ // initialize the plugin
        rules: {
            full_name: {
                required: true
            },
            date_of_birth: {
                required: true
            },
            email: {
                required: true,
            },
            password: {
                required: true,
            },
            phone_number: {
                required: true,
            },
            confirm_password: {
              equalTo: "#password"
            },
            gender: {
                required: true,
            },
            role: {
                required: true,
            },
            foto: {
                required: true,
            }
        },
        highlight: function(element) {
            $(element).closest('.validate').addClass('has-danger');
        },
        unhighlight: function(element) {
            $(element).closest('.validate').removeClass('has-danger');
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

/*-------------------- Begin JS For Profile Page  --------------------*/
    /* Datepicker Date of Birth*/
    // $('#m_datepicker_2').datepicker({
    //     format: "dd MM yyyy",
    //     autoclose: true
    // });
    
    /* Input Mask Number Phone */
    $('#phone-number').inputmask('+629999999999999');

    /* Begin Hover Display Password */
    $('.pw-1').hover(function () {
        $('#password').attr('type', 'text'); 
    }, function () {
        $('#password').attr('type', 'password'); 
    });

    $('.pw-2').hover(function () {
       $('#password-confirm').attr('type', 'text'); 
    }, function () {
       $('#password-confirm').attr('type', 'password'); 
    });
    /* End Hover Display Password */

    /* Begin Handle Change User Profile Image */
    $('#profile_photo').change(function(){
        var oFReader = new FileReader();
        var id_photo = document.getElementById("profile_photo");
        var FileSize = id_photo.files[0].size / 1024 / 1024;

        if (FileSize > 1) {
            $('#profile_photo').val("");
            swal('File size is too large. Max image size: 1 MB');
            $('.change-pict').attr('disabled', true);
        } 
        else 
        {
            $('.change-pict').removeAttr('disabled', true);
            oFReader.readAsDataURL(id_photo.files[0]);
            oFReader.onload = function (oFREvent) {
                document.getElementById("profilePreview").src = oFREvent.target.result;
            };
        }
    });
    /* End Handle Change User Profile Image */

    /* Begin Update Profile Photo */
    $('.change-pict').click(function() {
        var form = $(this).closest('form');

        mApp.blockPage({
            overlayColor : '#000000',
            type         : 'loader',
            state        : 'success',
            size         : 'lg'
        });

        $.ajax({
            type        : 'POST',
            url         : form.attr('action'),
            data        : new FormData(document.getElementById("form-photo")),
            processData : false,
            contentType : false,
            cache       : false,
            success     : function(data) {
                
                if(data.status == 'success')
                {
                    toastr.success(data.messages);
                    setTimeout(function() {
                        window.location.reload();
                    }, 2000);
                }
                else
                {
                    toastr.error(data.messages);
                    // setTimeout(function() {
                    //     window.location.reload();
                    // }, 2000);
                }
            }
        })
    });
    /* End Update Profile Photo */

    /* Begin Update Profile: Personal Details */
    $('.save-profile').click(function() {
        var form = $(this).closest('form');

        form.validate({
            rules: {
                full_name: {
                    required: true
                },
                date_of_birth: {
                    required: true
                },
                gender:{
                    required: true
                },
                address: {
                    required: true
                },
                phone_number: {
                    required: true
                }
            }
        });

        if(form.valid()) {

            swal({
                title                 : "Are You Sure To Change Profile Information ?",
                text                  : "This action will change your personal information",
                type                  : "warning",
                confirmButtonText     : 'Yes',
                showCancelButton      : true,
                allowOutsideClick     : false
            })

            .then((willSave) => {
                if (willSave) {

                    mApp.blockPage({
                        overlayColor : '#000000',
                        type         : 'loader',
                        state        : 'success',
                        size         : 'lg'
                    });

                    $.ajax({
                        type    : 'POST',
                        url     : form.attr('action'),
                        data    : form.serialize(),
                        cache   : false,
                        success : function(data) {

                            if(data.status == 'success')
                            {   
                                toastr.success(data.messages); 
                                setTimeout(function() {
                                    window.location.reload();
                                }, 2000);   
                            }
                            else
                            {
                                toastr.error(data.messages);
                                setTimeout(function() {
                                    window.location.reload();
                                }, 2000);
                            }
                        }
                    });
                }
            });
        }
    }); 
    /* End Update Profile: Personal Details */

    /* Begin Change Password */
    $('.change-password').click(function() {
        
        var form  = $(this).closest('form');
        
        form.validate({
            errorElement: 'div',
            errorClass: 'text-danger',
            rules: {
                password: {
                    required: true
                },
                password_confirmation: {
                    required: true,
                    equalTo: '#password'
                }
            }
        });

        if (form.valid()) {
            swal({
              title                 : "Are You Sure To Change Password ?",
              text                  : "Make Sure Your Password Is Has Same Value",
              type                  : "warning",
              confirmButtonText     : 'Yes',
              showCancelButton      : true,
              allowOutsideClick     : false
            })

            .then((willSave) => {
                if (willSave) {

                    mApp.blockPage({
                        overlayColor : '#000000',
                        type         : 'loader',
                        state        : 'success',
                        size         : 'lg'
                    });

                    $.ajax({
                        type    : 'POST',
                        url     : form.attr('action'),
                        data    : form.serialize(),
                        cache   : false,
                        success : function(data) {

                            if(data.status == 'success')
                            {   
                                toastr.success(data.messages); 
                                setTimeout(function() {
                                    window.location.reload();
                                }, 2000);   
                            }
                            else
                            {
                                toastr.error(data.messages);
                                setTimeout(function() {
                                    window.location.reload();
                                }, 2000);
                            }
                        }
                    });
                }
            });
        }
    });
    /* End Change Password */
    
/*-------------------- End JS For Profile Page  --------------------*/

