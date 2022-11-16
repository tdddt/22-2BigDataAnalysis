<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DoctorComment</title>
    <style>
        .input {
            width:250px;
            height: 40px;
        }
        .button {
            background-color: #00462A;
            border: none;
            color: white;
            font-size: 16px;
            padding: 15px 30px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            cursor: pointer;
        }
        .button:hover {
            background-color: #779c74;
        }
        .buttonReverse {
            color: #00462A;
            font-size: 16px;
            padding: 15px 30px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <?php
    //echo $_POST['comment'];
    $mysqli = mysqli_connect("localhost","team09","team09","team09");
    if($mysqli==false){
        printf("Connect failed");
        exit();
    } else {
        session_start();
        //for 코멘트 작성
        $_SESSION['doctorId'] = $_POST['comment'];
    ?>
    <form action="doctorcommentadd.php" method="post" style="text-align: center;">
        후기: <input type="text" name="inputcomment" class="input">
        <input class="button" type="submit" value="작성">
    </form>
    <p><p><p>
    <?php
        //코멘트 보여주기 - update, delete 필요
        $sql='SELECT * from doctorcomment where doctor_ID="'.$_POST['comment'].'"';
        $result = mysqli_query($mysqli,$sql);
        
        echo "
        <link rel='stylesheet' href='style.css'>
        <div style='text-align: center;'>
        <a href='doctorinfo.php' class='buttonReverse' style='text-align:center;'>뒤로가기</a></div>";

        echo "<style>table {
            margin:auto; 
        }
        table, td, th {
            border-collapse : collapse;
            border : 1px solid black;
        };
        </style><table border=1 cellspacing=0 cellpading=0> <tr><td>회원이름</td><td>의사이름</td><td>후기</td><td>편집</td></tr>";
        while($row=mysqli_fetch_array($result)){
            $comment_ID = isset($row['commentId'])?($row['commentId']):0;

            $userId=isset($row['userId'])?($row['userId']):0;
            //유저 이름 찾기
                $sql2='SELECT userName from userlog where userId="'.$userId.'"';
                $result2 = mysqli_query($mysqli,$sql2);
                $row2=mysqli_fetch_array($result2);
                $userName = $row2['userName'];
                mysqli_free_result($result2);

            $doctor_ID=isset($row['doctor_ID'])?$row['doctor_ID']:0;
            //의사 이름 찾기
                $sql3='SELECT doctor_name from doctorinfo where doctor_ID="'.$doctor_ID.'"';
                $result3 = mysqli_query($mysqli,$sql3);
                $row3=mysqli_fetch_array($result3);
                $doctor_name = $row3['doctor_name'];
                mysqli_free_result($result3);

            $comment=isset($row['comment'])?$row['comment']:0;

            echo "
            <form action='doctorcommentcheck.php' method='post' style='text-align:center:'>
            <tr>
            <td>$userName</td><td>$doctor_name</td><td>$comment</td>
            <td><button name='commentId' value='".$comment_ID."' type='submit' class='button'>편집</td>
            </tr>
            </form>
            ";
        }
        echo "</table>";    
    }
    mysqli_free_result($result);
    mysqli_close($mysqli);
    ?>
</body>
</html>