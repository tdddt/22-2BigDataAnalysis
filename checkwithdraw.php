<?php
    session_start();
    $mysqli = mysqli_connect("localhost","team09","team09","team09");
    if($mysqli==false){
        printf("Connect failed");
        exit();
    }
    else { //delete on cascade 써서 자동 삭제됨
        //탈퇴하시겠습니까라는 최종 안내창 
        echo "<script>
            if(confirm('정말 탈퇴하시겠습니까?')){
                location.href='./withdraw.php';
            }
            else {
                alert('탈퇴를 취소했습니다.');
                location.href='./main.html';
            }
        </script>";
    }
    mysqli_close($mysqli);
?>