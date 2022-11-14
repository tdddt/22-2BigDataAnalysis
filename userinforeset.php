<?php
    session_start();
    $mysqli = mysqli_connect("localhost","team09","team09","team09");
    if($mysqli==false){
        printf("Connect failed");
        exit();
    }
    else {
        $sql="delete FROM userinfo WHERE userId=?";
        if($stmt = mysqli_prepare($mysqli, $sql)){
            //bind preparedStatement
            $stmt->bind_param("s",$_SESSION['userId']);
            //execute preparedStatement
            if($stmt->execute()){
                echo "<script>alert('입력정보를 초기화했습니다.');</script>";
                echo "<script>location.href='./userinfo.php';</script>";
                exit();
            } else { 
                echo("<div>ERROR: Could not execute query: $sqlID.".mysqli_error($mysqli));
            }
        } else {
            echo "ERROR: Could not prepare query: $sqlID.".mysqli_error($mysqli);
        }
    }
    $stmt->close();
    mysqli_close($mysqli);
?>