var assetclass;

$('#assetClassListPage').bind('pageinit', function(event) {
	getAssetClass();
});

function getAssetClass() {
	$.getJSON('http://www.myassetmobile.com/assetclass.php', function(data) {
		$('#assetClassList li').remove();
		assetclass = data.items;
		$.each(assetclass, function(index, acl) {
			$('#assetClassList').append('<li><a href="assetcategory.html?id=' + acl.acl_id + '">'+ acl.acl_name +
					'<span class="ui-li-count">' + acl.act_count + '</span></li>');
		});
		$('#assetClassList').listview('refresh');
	});
}