<?php
require 'head.php';
if(isset($_GET['p'])){
    $page = $_GET['p'];
}else{
    $page = 'templates.login';
}

if($page === 'templates.login'){
    require 'login.php';
}else{
    require 'body.php';
}

