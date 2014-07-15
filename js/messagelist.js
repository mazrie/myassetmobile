var messages;

$('#messageListPage').live('pageshow', function(event) {
	getMessageList();
});

function getMessageList() {
	$.getJSON('services/getmessages.php', function(data) {
		$('#messageList li').remove();
		messages = data.items;
		$.each(messages, function(index, message) {
			$('#messageList').append('<li><a href="messagedetails.html?id=' + message.um_id + '">' +
					'<h4>' + message.um_subject + '</h4>' +
					'<span class="ui-li-count">' + message.um_status + '</span></a></li>');
		});
		$('#messageList').listview('refresh');
	});
}

