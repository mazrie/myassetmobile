$('#assetTypeListPage').live('pageshow', function(event) {
	var id = getUrlVars()["id"];
	$.getJSON('services/getassetcategoryselected.php?id='+id, displayAssetSelected);
});

function displayAssetSelected(data) {
	var assettypeselected = data.item;
	$('#assetClassSelectedName').text(assettypeselected.acl_name);
	$('#assetCategorySelectedName').text(assettypeselected.act_name);
	$('#assetCategorySelectedId').text(assettypeselected.act_id);
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
