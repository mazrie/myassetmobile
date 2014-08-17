	$(document).on('pageinit', '#loginValidate', function (e, data) {
    $(document).on('click', '#loginSubmit', function () { // catch the form's submit event
        if ($('#username').val().length > 0 && $('#password').val().length > 0) {
            // Send data to server through the ajax call
            // action is functionality we want to call and outputJSON is our data

            console.log('ade tak? ' + $('#checkUser').serialize());
            $.ajax({
                url: 'services/getloginvalidate.php',
                data: "action=login&" + $('#checkUser').serialize(),
                //data: {action : 'login', formData : $('#checkUser').serialize()},
                type: 'POST',
                async: 'true',
                dataType: 'json',

                beforeSend: function () {
                    // This callback function will trigger before data is sent
                    $.mobile.showPageLoadingMsg(true); // This will show ajax spinner
                },
                complete: function () {
                    // This callback function will trigger on data sent/received complete
                    $.mobile.hidePageLoadingMsg(); // This will hide ajax spinner
                },
                success: function (result) {
                    //obj = JSON.parse(result);
                    console.log(result)
                    if (result.status == true) {
                        //alert("betul " + result.status);
                        $.mobile.changePage("main.html");
                    } else {
                        alert("email dan/atau password dimasukkan tidak sah " + result.status);
                    }

                },
                error: function (request, error) {
                    // This callback function will trigger on unsuccessful action
                    alert("An error occurred: " + status + "nError: " + error);
                }
            });
        } else {
            alert('Sila Masukkan email dan/atau katalaluan');
        }
    return false; // cancel original event to prevent form submitting
});
});