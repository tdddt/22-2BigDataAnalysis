편집 -> promt...ㅋ큐ㅠㅠ
<?php
    //권한있는지 확인
    session_start();
    $mysqli = mysqli_connect("localhost","team09","team09","team09");
    if($mysqli==false){
        printf("Connect failed");
        exit();
    } else {
        //commentId의 userId와 로그인한 userId가 같은지 확인
        $showId = 'select userId from doctorcomment where commentId=?';
        $stmt = mysqli_prepare($mysqli, $showId);
        $stmt->bind_param("i",$_SESSION['commentId']);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        
        //writeId
        $writeId = isset($row['userId']) ? $row['userId'] : false;

        if($writeId===$SESSION['userId']){
            echo "<form action="" method="post" style="text-align: center;">
            후기: <input type="text" name="inputcomment" class="input">
            <input class="button" type="submit" value="작성">
            </form>";
        } else {
            echo "<script>alert('본인이 작성한 후기만 편집할 수 있습니다.');</script>";
            echo "<script>location.href='./doctorinfo.php';</script>";
        }
    }
?>