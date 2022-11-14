<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignIn</title>
    <style>
        .container {
            flex-direction: column;
            text-align: center;
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
        div{
            margin-top: 30px;
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 >로그인</h1>
    </div>
    
    <?php
    $mysqli = mysqli_connect("localhost","team09","team09","team09");
    if($mysqli==false){
        printf("Connect failed");
        exit();
    }
    else {
        $sql="SELECT id,pw FROM userlog WHERE id=?";
        if($stmt = mysqli_prepare($mysqli, $sql)){
            //bind preparedStatement
            $stmt->bind_param("s",$_POST['id']);

            //execute preparedStatement
            if($stmt->execute()){
                $result = $stmt->get_result();
                $row = $result->fetch_assoc();
                //오류 처리
                $id = isset($row['id']) ? $row['id'] : false;
                $pw = isset($row['pw']) ? $row['pw'] : false;
                
                if(empty($_POST['id'])){
                    echo "<script>alert('아이디를 입력해주세요.');</script>";
                    echo "<script>location.href='./signin.html';</script>";
                    exit();
                } else if (empty($id)){
                    echo "<script>alert('존재하지 않는 아이디입니다.');</script>";
                    echo "<script>location.href='./signin.html';</script>";
                    exit();
                } else { 
                    if(empty($_POST['pw'])){
                        echo "<script>alert('비밀번호를 입력해주세요.');</script>";
                        echo "<script>location.href='./signin.html';</script>";
                        exit();
                    } else if($pw===($_POST['pw'])){
                        echo "<script>alert('로그인 성공');</script>";
                        echo("<script>location.href='./main.html';</script>"); 
                        //select문으로 userId찾기
                            if($mysqli==false){
                                printf("Connect failed");
                                exit();
                            }
                            else {
                                $sql="SELECT userId FROM userlog WHERE id=?";
                                if($stmt = mysqli_prepare($mysqli, $sql)){
                                    //bind preparedStatement
                                    $stmt->bind_param("s",$_POST['id']);

                                    //execute preparedStatement
                                    if($stmt->execute()){
                                        $result = $stmt->get_result();
                                        $row = $result->fetch_assoc();
                                        //오류 처리
                                        $userId = isset($row['userId']) ? $row['userId'] : false;
                                        //session에 저장
                                        session_start();
                                        $_SESSION['userId'] = isset($row['userId']) ? $row['userId'] : 0;
                                    } else { 
                                        echo("<div>ERROR: Could not execute query: $sqlID.".mysqli_error($mysqli));
                                    }
                                } else {
                                    echo "ERROR: Could not prepare query: $sqlID.".mysqli_error($mysqli);
                                }
                            }
                            $stmt->close();
                            mysqli_close($mysqli);
                    } else {
                        echo "<script>alert('비밀번호가 틀렸습니다.');</script>";
                        echo "<script>location.href='./signin.html';</script>";
                        exit();
                    }
                }
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
</body>
</html>