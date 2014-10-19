$('#hartamodalReg2').live('pageshow', function(event) {
    var cat = getUrlVars()["cat"];
    var sub = getUrlVars()["sub"];
    var type = getUrlVars()["type"];

    $.getJSON('services/gethartamodalreg2_A.php?sub='+sub,'&type='+type, displayMessage);
});

function displayMessage(data) {
    var message = data.item;
    //console.log('for Danny A', message);
    $('#Category').text(message.acl_name);
    $('#SubCategory').text(message.act_name);
    $('#Type').text(message.aty_name);

}

function getUrlVars() {
    var vars = [], hash;
    var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
    for(var i = 0; i < hashes.length; i++)
    {
        hash = hashes[i].split('=');
        vars.push(hash[0]);
        vars[hash[0]] = hash[1];
    }
    return vars;
}
