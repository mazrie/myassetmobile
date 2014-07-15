<?php
// Prevent caching.
header('Cache-Control: no-cache, must-revalidate');

// Get username
$username = $_POST['username'];
// Get password
$password = md5($_POST['password']); 

if ($username == "mac"){
    // Lets say everything is in order
    $output = array('status' => true, 'login' => true);
    echo json_encode($output);
    setcookie('LOGIN', $username, time()+72000);
}else{
    // Lets say everything is in order
    $output = array('status' => true, 'login' => false, 'username' => $username);
    echo json_encode($output);
}
?>