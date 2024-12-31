<?php
session_start();
 
if (isset($_SESSION['zWuppkgTT6o0Y44'])) {
    $_SESSION['zWuppkgTT6o0Y44'] = array();

    session_destroy();

    header("Location: ../");
} else {
    header("Location: ../login.php");
}

?>