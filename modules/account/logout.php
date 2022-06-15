<?php 
    session_start();
    unset ($_SESSION['is_login']);
    unset ($_SESSION['is_user']);
    unset ($_SESSION['id_user']);
    unset ($_SESSION['permission']);
    redirect();
?>