$(document).on('pageinit', '#regHartaModal' ,function() {


    /* For jquery.chained.remote.js */
    // category
    $("#sub").remoteChained({
        parents : "#cat",
        url : "http://localhost/myassetmobile/services/gethartamodalreg1_cat.php"
    });

    $("#type").remoteChained({
        parents : "#sub",
        url : "http://localhost/myassetmobile/services/gethartamodalreg1_sub.php"
    });


});


