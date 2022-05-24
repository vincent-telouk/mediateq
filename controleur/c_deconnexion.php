<?php   
if(!isset($_SESSION)){
    session_start();
} //to ensure you are using same session
session_destroy(); //destroy the session_abort
// session_unset();
// unset($_SESSION);
header("location: ../"); //to redirect back to "index.php" after logging out
exit();

include "$racine/vue/header.php";

?>
