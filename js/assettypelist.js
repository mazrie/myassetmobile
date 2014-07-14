
$('#assetTypeListPage').live('pageshow', function(event) {
	var id = getUrlVars()["id"];
	$.getJSON('http://www.myassetmobile.com/services/getassettype.php?id='+id, displayAssetType);
});

function displayAssetType(data) {
	var assettype = data.items;
	console.log(assettype);
		$.each(assettype, function(index, aty) {
			$('#assetTypeList').append('<li><a href="assetregister.html?id=' + aty.aty_id + '">'+ aty.aty_name +
					'<span class="ui-li-count">' + aty.aty_count + '</span></li>');
		});
		$('#assetTypeList').listview('refresh');
	
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
