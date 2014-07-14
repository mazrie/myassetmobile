$('#assetCategoryListPage').live('pageshow', function(event) {
	var id = getUrlVars()["id"];
	$.getJSON('http://www.myassetmobile.com/services/getassetclassselected.php?id='+id, displayAssetSelected);
});

function displayAssetSelected(data) {
	var assetselected = data.item;
	$('#assetClassSelectedId').text(assetselected.acl_id);
	$('#assetClassSelectedName').text(assetselected.acl_name);
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
