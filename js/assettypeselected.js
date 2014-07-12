$('#assetCategoryListPage').live('pageshow', function(event) {
	var id = getUrlVars()["id"];
	$.getJSON('services/getassettypeselected.php?id='+id, displayAssetSelected);
});

function displayAssetSelected(data) {
	var assettypeselected = data.item;
	$('#assetTypeSelectedId').text(assettypeselected.acl_id);
	$('#assetTypeSelectedName').text(assettypeselected.acl_name);
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
