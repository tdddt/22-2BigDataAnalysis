<?php
    if(!isset($_SESSION['userId'])){
        echo "<script>alert('๋ก๊ทธ์์');</script>";
        session_start();
        session_destroy();
        echo "<script>location.replace('signin.html');</script>"; 
    } else
?>