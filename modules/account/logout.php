<?php 
    session_start();
    unset ($_SESSION['is_login']);
    unset ($_SESSION['is_user']);
    redirect();
?>