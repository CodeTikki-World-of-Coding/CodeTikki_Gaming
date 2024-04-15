<?php
include 'setting.php';

// // Start the session
// session_start();
// header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
// header("Pragma: no-cache"); // HTTP 1.0.
// header("Expires: 0"); // Proxies.

// // Check if 'userid' key is set in the session
// if(isset($_SESSION['userid'])) {
//     // Destroy the session to logout the user
//     session_destroy();

//     // Redirect the user to the login page or another appropriate page after logout
//     header("Location: index.php");
//     exit(); // Ensure no further code is executed after the redirect
// } else {
//     // Handle the case when the user is not logged in
//     echo "You are not logged in.";
// }

session_start();
session_destroy();
header("Location: index.php");
exit();

?>
