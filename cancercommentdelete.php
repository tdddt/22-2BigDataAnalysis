<?php
    //권한있는지 확인하고 삭제
    session_start();
    $mysqli = mysqli_connect("localhost","team09","team09","team09");
    if($mysqli==false){
        printf("Connect failed");
        exit();
    } else
    {
        $commentId = $_SESSION['commentId'];
        $showId = "select * from cancercomment where commentId = '$commentId'";
        $res = mysqli_query($mysqli, $showId);
        $row = mysqli_fetch_array($res, MYSQLI_ASSOC);

        if($row['userId'] == $_SESSION['userId'])
        {
          $newcomment = $_POST['inputcomment'];
          $sql = "delete from cancercomment where commentId = '$commentId'";
          $res = mysqli_query($mysqli, $sql);
          echo "<script>alert('댓글이 삭제되었습니다.');</script>";
          echo "<script>location.href='./cancerinfo.html';</script>";
        }
        else
        {
            echo "<script>alert('본인이 작성한 댓글만 삭제할 수 있습니다.');</script>";
            echo "<script>location.href='./cancerinfo.html';</script>";
        }
    }
?>
