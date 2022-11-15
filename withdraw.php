<?php
    session_start();
    $mysqli = mysqli_connect("localhost","team09","team09","team09");
    if($mysqli==false){
        printf("Connect failed");
        exit();
    }
    else { //delete on cascade 써서 자동 삭제됨
        //transaction
        $mysqli->autocommit(false); 
        try {
            $sql="DELETE FROM userlog WHERE userId=?";
            $sql="DELETE FROM userlog WHERE userId=?";
            $stmt = mysqli_prepare($mysqli, $sql);

            //bind preparedStatement
            $stmt->bind_param("s",$_SESSION['userId']);

            //execute preparedStatement
            $stmt->execute();

            echo "<script>alert('회원탈퇴성공');</script>";
            echo "<script>location.href='./signin.html';</script>";
            
            /* if-else error handle */
            // if($stmt = mysqli_prepare($mysqli, $sql)){
            //     //bind preparedStatement
            //     $stmt->bind_param("s",$_SESSION['userId']);
            //     //execute preparedStatement
            //     if($stmt->execute()){
            //         echo "<script>alert('회원탈퇴성공');</script>";
            //         echo "<script>location.href='./signin.html';</script>";
            //         exit();
            //     } else { 
            //         echo("<div>ERROR: Could not execute query: $sqlID.".mysqli_error($mysqli));
            //     }
            // } else {
            //     echo "ERROR: Could not prepare query: $sqlID.".mysqli_error($mysqli);
            // }

            $mysqli->autocommit(true);
        } catch (mysqli_sql_exception $exception) {
            $mysqli->rollback();
            throw $exception;
            echo "<script>alert('회원탈퇴실패');</script>";
            echo "<script>location.href='./main.html';</script>";
        }
    }
    $stmt->close();
    mysqli_close($mysqli);
?>