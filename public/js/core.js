let inputUrlIn = 'vehicleIn';
let inputUrlOut = 'vehicleOut';

$('#success-msg-in').css('display', 'none');
$('#alert-msg-in').css('display', 'none');
$('#success-msg-out').css('display', 'none');
$('#alert-msg-out').css('display', 'none');

$('#input-btn-in').click(function () {
    let policeNumberIn = $('#police_number_in').val();
    if(policeNumberIn == '') {
        $('#alert-msg-in').html('Empty Input Cok!');
        $('#alert-msg-in').css('display', '');
    } else {
        var data = {
            police_number: policeNumberIn
        }

        var headers = {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }

        var request = $.ajax({
            url: inputUrlIn,
            type: 'post',
            headers: headers,
            data: data,
            dataType: 'json'
        })

        request.done(function(response,textStatus,JqXHR) {
            console.log(response);

            if(response.result) {
                $('#police_number_in').val('');
                $('#success-msg-in').html(response.message);
                $('#success-msg-in').css('display', '');
                $('#alert-msg-in').css('display', 'none');
            } else {
                $('#alert-msg-in').html(response.message);
                $('#success-msg-in').css('display', 'none');
                $('#alert-msg-in').css('display', '');
            }
        })

        request.fail(function(jqXHR, textStatus) {
            console.log("Request failed: " + textStatus);
        });
    }
})

$('#input-btn-out').click(function () {
    let policeNumberOut = $('#police_number_out').val();
    if(policeNumberOut == '') {
        $('#alert-msg-out').html('Empty Input Cok!');
        $('#alert-msg-out').css('display', '');
    } else {
        var data = {
            police_number: policeNumberOut
        }

        var headers = {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }

        var request = $.ajax({
            url: inputUrlOut,
            type: 'post',
            headers: headers,
            data: data,
            dataType: 'json'
        })

        request.done(function(response,textStatus,JqXHR) {
            console.log(response);

            if(response.result) {
                $('#police_number_out').val('');
                $('#success-msg-out').html(response.message);
                $('#success-msg-out').css('display', '');
                $('#alert-msg-out').css('display', 'none');
            } else {
                $('#alert-msg-out').html(response.message);
                $('#success-msg-out').css('display', 'none');
                $('#alert-msg-out').css('display', '');
            }
        })

        request.fail(function(jqXHR, textStatus) {
            console.log("Request failed: " + textStatus);
        });
    }
})

$('input').on('keypress', function (event) {
    var regex = new RegExp("^[a-zA-Z0-9]+$");
    var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
    if (!regex.test(key)) {
       event.preventDefault();
       return false;
    }
});
