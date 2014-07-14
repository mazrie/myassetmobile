
$('#assetCategoryListPage').live('pageshow', function(event) {
	var id = getUrlVars()["id"];
	$.getJSON('http://www.myassetmobile.com/services/getassetcategory.php?id='+id, displayAssetCategory);
});

function displayAssetCategory(data) {
	var assetcategory = data.items;
	console.log(assetcategory);
		$.each(assetcategory, function(index, act) {
			$('#assetCategoryList').append('<li><a href="assettype.html?id=' + act.act_id + '">'+ act.act_name +
					'<span class="ui-li-count">' + act.aty_count + '</span></li>');
		});
		$('#assetCategoryList').listview('refresh');
	
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
