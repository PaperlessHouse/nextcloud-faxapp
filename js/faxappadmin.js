$('#apply_settings').on('click', function(){

    // get form values and compose a data string
    var twilio_account_sid = $("#twilio_account_sid").val();
    var twilio_auth_token = $("#twilio_auth_token").val();
    var url = OC.generateUrl('/apps/faxapp/admin/apply_settings');
    var data = {
        twilio_account_sid: twilio_account_sid,
        twilio_auth_token: twilio_auth_token
    }
    // AJAX call passing dataString in POST
    $.ajax({
        type: 'POST',
        data: data,
        url: url,
        success: function(){
            // success callback
            console.log('message sent! :D');
        }
    });

    // prevent the default submit action
    return false;
});
