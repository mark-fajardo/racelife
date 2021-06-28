<?php

    session_start();
    if (isset($_SESSION['username']) == true) {
        echo $_SESSION['username'];
    } else {
        echo 0;
    }

?>