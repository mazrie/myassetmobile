$('#selectAssetCategory').live('pageshow', function(event) {
    getSelectAssetCategory();
});


function getSelectAssetCategory() {
    $.getJSON("services/gethartamodal.php",function(data){
        var select = $('#selectAssetCategory');
        if (select.prop) {
            var options = select.prop('options');
        }
        else {
            var options = select.attr('options');
        }
        $('option', select).remove();
        $.each(data.items, function(key, value){
            options[options.length] = new Option(value['acl_name'], value['acl_id']);
        });
    });
}


/*
var messages;

$('#selectAssetCategory').live('pageshow', function(event) {
	getMessageList();
});

function getMessageList() {


    //get a reference to the select element
    var $select = $('#selectAssetCategory');

    //request the JSON data and parse into the select element
    $.getJSON('services/gethartamodal.php', function(data){

        //clear the current content of the select
        $select.html('');

        //iterate over the data and append a select option
        $.each(data.items, function(key, val){
            $select.append('<option id="' + val.id + '">' + val.acl_name + '</option>');
        })
    });

}


/*
//get a reference to the select element
var $select = $('#selectAssetCategory');

//request the JSON data and parse into the select element
$.getJSON('services/gethartamodal.php', function(data){

    //clear the current content of the select
    $select.html('');

    //iterate over the data and append a select option
    $.each(data.items, function(key, val){
        $select.append('<option id="' + val.id + '">' + val.acl_name + '</option>');
    })
});


$("#country").change(function () {
    $("#state, #city").find("option:gt(0)").remove();
    $("#state").find("option:first").text("Loading...");
    $.getJSON("/get/states", {
        country_id: $(this).val()
    }, function (json) {
        $("#state").find("option:first").text("");
        for (var i = 0; i < json.length; i++) {
            $("<option/>").attr("value", json[i].id).text(json[i].name).appendTo($("#state"));
        }
    });
});

var $select = $('#selectAssetCategory');

//request the JSON data and parse into the select element
$.getJSON('services/gethartamodal.php', function(data){

    //clear the current content of the select
    $select.html('');

    //iterate over the data and append a select option
    $.each(data.items, function(key, val){
        $select.append('<option id="' + val.id + '">' + val.acl_name + '</option>');
    })
});
    */