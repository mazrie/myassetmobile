$('#msgDetailsPage').live('pageshow', function(event) {
	var id = getUrlVars()["id"];
	$.getJSON('services/getmessage.php?id='+id, displayMessage);
});

function displayMessage(data) {
	var message = data.item;
	console.log(message);
	$('#messageSubject').text(message.um_subject);
	$('#messageContent').text(message.um_message);
	$('#actionList').listview('refresh');
	
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
