<?php
    session_start();
    $mysqli = mysqli_connect("localhost","team09","team09","team09");
    if($mysqli==false){
        printf("Connect failed");
        exit();
    } else {
        $sql='INSERT into doctorcomment(userId, doctor_ID, comment) values (?,?,?)';
        $stmt = mysqli_prepare($mysqli, $sql);
        $stmt->bind_param("iis",$_SESSION['userId'],$_SESSION['doctorId'],$_POST['inputcomment']);
        $stmt->execute();
        echo "<script>alert('후기 추가 완료');</script>";
        echo "<script>location.href='./doctorinfo.php';</script>";
    }
?>