(function () {
    'use strict'

    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.querySelectorAll('.needs-validation')

    // Loop over them and prevent submission
    Array.prototype.slice.call(forms)
        .forEach(function (form) {
            form.addEventListener('submit', function (event) {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }

                form.classList.add('was-validated')
            }, false)
        })
})()
const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))


// change login or registation
$('.lorrconform')
$('.toglelr').on("click", function (e) {
    e.preventDefault();
    if ($('.linfo').hasClass('d-none')) {
        $('.linfo').removeClass('d-none');
        $('.lorrconform').html('Create an account  <a href="" class="toglelr">Reginstar</a>')
    } else {
        $('.linfo').addClass('d-none');
    }
    if ($('.rinfo').hasClass('d-none')) {
        $('.rinfo').removeClass('d-none');
        $('.lorrconform').html('i have already an account <a href="" class="toglelr">Login</a>')
    } else {
        $('.rinfo').addClass('d-none');
    }
})

// login or registration 

//login section
$(document).on('submit', '#lform', function (e) {
    e.preventDefault();
    let fdata = new FormData(this);
    fdata.append("login", "start");
    // console.log(fdata)
    $.ajax({
        url: "response.php",
        type: "post",
        data: fdata,
        processData: false,
        contentType: false,
        beforSent: function () {

        },
        success: function (d) {
            if (d == 'no') {
                $('.lerror').html('Email or password not match')
            } else {
                window.history.back();
            }
        }

    })

})
// logout
$('#logout').on("click", function (e) {
    $.ajax({
        url: "response.php",
        type: "post",
        data: {
            logout: "logout"
        },
        success: function (e) {
            if (e == "success") {
                window.location.href = 'index.php';
            }
        }
    })
})
// Registation 

$(document).on("submit", "#rform", function (e) {
    e.preventDefault();
    var checkval = "";
    if ($('#checkme').is(":checked")) {
        checkval = "checked";
    }
    var fdata = new FormData(this);
    fdata.append("ischeck", checkval);
    fdata.append('adduser', "adduser");
    $.ajax({
        url: "response.php",
        type: "post",
        data: fdata,
        processData: false,
        contentType: false,
        success: function (e) {
            if (e == 'success') {
                window.history.back();

            } else {
                // alert(e);
                $('.rerror').html('Email has alredy heare..! please login.')
            }
        }
    })
})

// edit prifile
$('.edit_profile').on("click", function (e) {
    e.preventDefault();
    $.ajax({
        url: "response.php",
        type: 'post',
        data: {
            get_user: "add"
        },
        success: function (e) {
            $('.profile_info').html(e)
        }
    })
})

//update user
$(document).on("submit", "#edit_profile", function (e) {
    e.preventDefault();
    let fdata = new FormData(this);
    fdata.append("upuser", "start");
    // console.log(fdata)
    $.ajax({
        url: "response.php",
        type: "post",
        data: fdata,
        processData: false,
        contentType: false,
        beforSent: function () {

        },
        success: function (d) {
            if (d == 'success') {
                window.location.reload();

            } else {
                // alert("email has already here");
                alert(d)
            }
        }

    })
})

// Animati
/// change profile
$('.change_pp').on("click", function (e) {
    $("#pp").click()
    //binds to onchange event of your input field
    $('#pp').bind('change', function () {
        const file = this.files[0];
        $('#change_pp_form').removeClass('d-none')
        if (file) {
            let reader = new FileReader();
            reader.onload = function (event) {
                $('.user_image').attr("src", event.target.result);
            };
            reader.readAsDataURL(file);
        }



    });

})
// hide pp

$('.hide_pp').on("click", function () {
    $('#change_pp_form').addClass("d-none")
})
$(document).on("submit", "#change_pp_form", function (e) {
    e.preventDefault();
    var fdata = new FormData(this);
    fdata.append("up_profile", "sus")
    $.ajax({
        url: "response.php",
        type: "post",
        data: fdata,
        processData: false,
        contentType: false,
        success: function (e) {
            if (e == 'success') {
                alert('update success');
                window.location.reload();
            } else {
                alert('file is too big')
            }
            // alert(e)
        }
    })
})

// appintment cancel 
$(document).on("click", ".appc_btn", function (e) {
    e.preventDefault()
    var data = $(this).attr('data-attr');
    var dd = ' <div class="modal-content"><div class="modal-header"><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></div><div class="modal-body"><h4>Are you sure to Cancel Appointment</h4></div><div class="modal-footer"><button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button><button type="button" class="btn btn-info" id="Cancel_appointment" data-attr = "' + data + '" class="btn-close" data-bs-dismiss="modal">OK</button></div> </div>'
    $('#scancel .modal-dialog').html(dd)
    $('#scancel').modal('show')
})
$(document).on("click", '#Cancel_appointment', function (e) {
    var data = $(this).attr("data-attr");
    $.ajax({
        url: "response.php",
        type: "post",
        data: {
            cancel_appint: data
        },
        success: function (d) {
            $('.user_app_his tbody').html(d)
            // $('#scancel').modal('hide')
        }
    })
})


/// open appintment form

function opena_form(doctor) {
    var d = doctor;
    $.ajax({
        url: 'response.php',
        type: 'post',
        data: {
            open_app_form: d
        },
        success: function (e) {
            $('#appointmentForm').html(e);
            // alert(e)
        }
    })
}
$('.app_btn').on("click", function (e) {
    $.ajax({
        url: "response.php",
        type: "post",
        data: {
            check_session: "dd"
        },
        success: function (e) {
            if (e == "success") {
                opena_form(0)
            } else {
                alert("please login first");
            }
        }
    })

})
// chenge Department
// $('body').on("change", "#app_dep_select", function (e) {
//     alert("ball");
// })

function app_change_department() {
    var val = $('#app_dep_select').val();
    $.ajax({
        url: "response.php",
        type: "post",
        data: {
            change_dep: val
        },
        success: function (e) {
            $('#app_doctor_select').html(e)
        }
    })
}

function app_change_doctor() {
    var val = $('#app_doctor_select').val();

    $.ajax({
        url: "response.php",
        type: "post",
        data: {
            get_fee: val
        },
        success: function (e) {
            $('#afees').val(e)
        }
    })

}
// submit appointment
$('#appointmentForm').submit(function (event) {
    event.preventDefault();
    if ($('#appointmentForm')[0].checkValidity() === false) {
        event.stopPropagation();
    } else {
        var fdata = new FormData(this);
        fdata.append("add_apppintment", "");
        $.ajax({
            url: "response.php",
            type: "post",
            data: fdata,
            processData: false,
            contentType: false,
            success: function (e) {
                if (e == 'success') {
                    alert('Appointment success');
                    $('#appointment').modal("hide");
                } else {
                    alert("something Went to worong")
                }
            }
        })
    }
    $('#appointmentForm').addClass('was-validated');
});
// $('#appointmentForm').on("submit", function (e) {
//     // e.preventDefault()
//     alert("submitted")

// })

// filter doctor
$('.filter_dep').on("change", function () {
    var val = $(this).val();
    var val2 = $('.fil_doc_fee').val();
    $.ajax({
        url: "response.php",
        type: "post",
        data: {
            filter_dep: val,
            price_to: val2
        },
        success: function (e) {
            $('#doctors').html(e);
        }
    })
})
// filter doctor by fee
$('.fil_doc_fee').on("change", function () {
    var val = $('.filter_dep').val();
    var val2 = $(this).val();
    $.ajax({
        url: "response.php",
        type: "post",
        data: {
            filter_dep: val,
            price_to: val2
        },
        success: function (e) {
            $('#doctors').html(e);
        }
    })
})

// sent contact form

$(document).on("submit", "#contact_form", function (e) {
    e.preventDefault()
    var fdata = new FormData(this);
    fdata.append("insert_contact", "success");

    $.ajax({
        url: "response.php",
        type: "post",
        data: fdata,
        processData: false,
        contentType: false,
        success: function (e) {
            alert(e)
            window.location.href = 'index.php';
        }
    })
})

// show notilfication 
$(document).on("click", ".badgee", function (e) {
    $.ajax({
        url: "response.php",
        type: "post",
        data: {
            read_noti: "success"
        },
        success: function (e) {
            if (e == 'success') {
                $('.badge .visually').html(0);
            }
        }
    })
})