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
                        //alertify.alert("Betul! pandainyee..");

                        //add session username
                        var myName = document.getElementById("username");

                        try {
                            localStorage.setItem("username", myName.value);
                            myName.value = "";
                        }
                        catch (e) {
                            if (e == QUOTA_EXCEEDED_ERR) {
                                console.log("Error: Local Storage limit exceeds.");
                            }
                            else {
                                console.log("Error: Saving to local storage.");
                            }
                        }



                        //$.mobile.changePage("main.html");
                        $.mobile.changePage("main.html", { reloadPage: true }, { transition: "slide" });
                    } else {
                        alertify.alert("Email dan/atau Password yang dimasukkan tidak sah");

                        //alert("email dan/atau password dimasukkan tidak sah " + result.status);
                    }

                },
                error: function (request, error) {
                    // This callback function will trigger on unsuccessful action
                    alertify.alert("Sila periksa talian internet anda");
                }
            });
        } else {
            alertify.alert("Sila Masukkan email dan/atau kata laluan")
        }
    return false; // cancel original event to prevent form submitting
});
});