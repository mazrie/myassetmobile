	$(document).on('pageinit', '#loginValidate', function () {
    $(document).on('click', '#loginSubmit', function () { // catch the form's submit event
        if ($('#username').val().length > 0 && $('#password').val().length > 0) {
            // Send data to server through the ajax call
            // action is functionality we want to call and outputJSON is our data

            console.log($('#checkUser').serialize());
            $.ajax({
                url: 'services/getloginvalidate_ori.php',
                data: $('#checkUser').serialize(),
                type: 'POST',
                beforeSend: function () {
                    // This callback function will trigger before data is sent
                    $.mobile.showPageLoadingMsg(true); // This will show ajax spinner
                },
                complete: function () {
                    // This callback function will trigger on data sent/received complete
                    $.mobile.hidePageLoadingMsg(); // This will hide ajax spinner		
									},
  						success: function (result) {
                    if (result.login == true) {
												alert("betul " + result.username);
                        //$.mobile.changePage("home.php");
                    } else {
                        alert("wrong credentials " + result.username);
                    }

									},
            error: function (request, error) {
                // This callback function will trigger on unsuccessful action                
                alert("An error occurred: " + status + "nError: " + error);
            }
        });
    } else {
        alert('Please fill all necessary fields');
    }
    return false; // cancel original event to prevent form submitting
});
});