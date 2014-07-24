$(document).live('pageinit', '#regHartaModal' ,function() {


    /* For jquery.chained.remote.js */
    // category
    $("#series-remote").remoteChained({
        parents: "#asset-remote",
        url: "json.php?sleep=1",
        loading: "--",
        clear: true
    });

    // sub-category
    $("#model-remote").remoteChained({
        parents: "#series-remote",
        url: "json.php?sleep=1",
        loading: "--",
        clear: true
    });

    // type
    $("#engine-remote").remoteChained({
        parents: "#series-remote, #model-remote",
        url: "json.php?sleep=1",
        loading: "--",
        clear: true
    });

    /* Show button after each pulldown has a value. */
    $("#engine-remote").bind("change", function (event) {
        if ("" != $("option:selected", this).val() && "" != $("option:selected", $("#model-remote")).val()) {
            $("#button-remote").fadeIn();
        } else {
            $("#button-remote").hide();
        }
    });
});


/*


 $(document).live('pageinit', '#regHartaModal' ,function(){
 $("#series").chained("#class");
 $("#model").chained("#series");
 $("#engine").chained("#series, #model");

 });


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