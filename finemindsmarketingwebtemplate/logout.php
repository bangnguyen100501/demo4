<?php
    session_start();
    // huy session
    session_destroy();
    header('location:index.php');
?>