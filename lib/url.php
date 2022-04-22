<?php
function redirect($url = "?mod=home"){
    header("Location: {$url}");
}