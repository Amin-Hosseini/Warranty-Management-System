<?PHP
if ( !isset($_SESSION) ) { session_start(); }
unset($_SESSION['ResID']);
$_SESSION['ResStatus'] = "Logout";
session_destroy();
header('Location: index.php?Page=Main');
?>