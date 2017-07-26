// document.getElementById("save_draft").addEventListener("click", function() {
//     console.log("hello!");
// });
$(document).ready(function() {
    document.getElementById("save_draft").addEventListener("click",function(){
        // get form values and compose a data string
        var faxId = $("#faxId").val();
        var subject = $("#subject").val();
        var toName = $("#toName").val();
        var toFax = $("#toFax").val();
        var faxMessage = $("#faxMessage").val();
        var url = OC.generateUrl('/apps/faxapp/fax/' + faxId);
        var data = {
            "id": faxId,
            "subject": subject,
            "to_name": toName,
            "to_fax": toFax,
            "fax_message": faxMessage
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
