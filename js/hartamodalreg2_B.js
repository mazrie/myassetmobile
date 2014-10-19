var messages;

$('#hartamodalReg2').live('pageshow', function(event) {
    getUnitList();
    getWarrantyList();
});

function getUnitList() {
    $.getJSON('services/gethartamodalreg2_B.php?unit=1', function(data) {
       // $('#messageList li').remove();
        messages = data.items;

        $.each(messages, function(index, message) {
            $('#selectUnit').append('<option value=' + message.lkl_id + '>' + message.lkl_name + '</option>');
        });
    });
}


function getWarrantyList() {
    $.getJSON('services/gethartamodalreg2_B.php?unit=2', function(data) {
        // $('#messageList li').remove();
        messages = data.items;

        $.each(messages, function(index, message) {
            $('#selectWarranty').append('<option value=' + message.lkl_id + '>' + message.lkl_name + '</option>');
        });
    });
}
