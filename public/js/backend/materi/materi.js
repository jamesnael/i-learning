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
    $('#form_add').validate({ // initialize the plugin
        rules: {
            judul_materi: {
                required: true
            },
            materi_mapel: {
                required: true
            },
            materi_kelas: {
                required: true
            },
            isi_materi: {
                required: true,
            }
        },
        highlight: function(element) {
            $(element).closest('.m-form__group').addClass('has-danger');
        },
        unhighlight: function(element) {
            $(element).closest('.m-form__group').removeClass('has-danger');
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

function formatRupiahType(bilangan, prefix)
{
    var number_string = bilangan.replace(/[^,\d]/g, '').toString(),
        split   = number_string.split(','),
        sisa    = split[0].length % 3,
        rupiah  = split[0].substr(0, sisa),
        ribuan  = split[0].substr(sisa).match(/\d{1,3}/gi);
        
    if (ribuan) {
        separator = sisa ? '.' : '';
        rupiah += separator + ribuan.join('.');
    }
    
    rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
    return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
}

function limitCharacter(event)
{
    key = event.which || event.keyCode;
    if ( key != 188 // Comma
         && key != 8 // Backspace
         && key != 17 && key != 86 & key != 67 // Ctrl c, ctrl v
         && (key < 48 || key > 57) // Non digit
         // Dan masih banyak lagi seperti tombol del, panah kiri dan kanan, tombol tab, dll
        ) 
    {
        event.preventDefault();
        return false;
    }
}

$(document).ready(function() {
    $('#content').summernote({
        height: 150,
    });
});