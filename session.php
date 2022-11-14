<?php
    if(!isset($_SESSION['userId'])){
        echo "<script>alert('로그아웃');</script>";
        session_start();
        session_destroy();
        echo "<script>location.replace('signin.html');</script>"; 
    } else
?>