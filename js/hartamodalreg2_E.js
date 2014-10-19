var messages;

$('#hartamodalReg2').live('pageshow', function(event) {
    getOfficerList();
});

function getOfficerList() {
    $.getJSON('services/gethartamodalreg2_E.php', function(data) {
       // $('#messageList li').remove();
        messages = data.items;

        $.each(messages, function(index, message) {
            $('#selectOfficer').append('<option value=' + message.ulg_id + '>' + message.uin_firstname + ', ' + message.uin_lastname +  '</option>');
        });
    });
}
