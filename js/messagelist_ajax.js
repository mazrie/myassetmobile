$(document).on('pageshow', '#messageListPage', function () {

            $.ajax({
                url: 'http://localhost/myassetmobile/services/getmessages.php',
                dataType: "jsonp",
                async: true,

                beforeSend: function () {
                    // This callback function will trigger before data is sent
                    $.mobile.showPageLoadingMsg(true); // This will show ajax spinner
                },
                complete: function () {
                    // This callback function will trigger on data sent/received complete
                    $.mobile.hidePageLoadingMsg(); // This will hide ajax spinner
                },
                success: function (result) {
                    // This callback function will trigger result
                    ajax.parseJSONP(result);


                },
                error: function (request, error) {
                    // This callback function will trigger on unsuccessful action
                    alert('Network error has occurred please try again!' + error);
                }
            });
});

var ajax = {
    parseJSONP:function(result){
        $.each(result, function(index, row) {
            $('#messageList').append('<li><a href="messagedetails.html?id=' + row.um_id + '">' +
                '<h4>' + row.um_subject + '</h4>' +
                '<span class="ui-li-count">' + row.um_status + '</span></a></li>');
        });
        $('#messageList').listview('refresh');
    }
}