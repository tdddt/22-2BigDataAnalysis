<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignUp</title>
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
        <h1 >회원가입</h1>
    </div>
    
    <?php
    $mysqli = mysqli_connect("localhost","team09","team09","team09");
    if($mysqli==false){
        printf("Connect failed");
        exit;
    }
    else { 
        $sql = "INSERT into userlog(userName,id,pw,email) values (?,?,?,?);";
        if($stmt = mysqli_prepare($mysqli, $sql)){
            mysqli_stmt_bind_param($stmt, "ssss", $inputName, $inputId, $inputPw, $inputEmail);
            if(empty($_POST['name'])) {
              echo "<script>alert('이름을 입력해주세요.');</script>";
              echo("<script>location.href='./signup.html';</script>");
              exit;
            }
            $inputName = $_POST['name'];

            if(empty($_POST['id'])) {
              echo "<script>alert('아이디를 입력해주세요.');</script>";
              echo("<script>location.href='./signup.html';</script>");
              exit;
            }
            $inputId = $_POST['id'];

            if(empty($_POST['pw'])) {
              echo "<script>alert('비밀번호를 입력해주세요.');</script>";
              echo("<script>location.href='./signup.html';</script>");
              exit;
            }
            $inputPw = $_POST['pw'];

            if(empty($_POST['email'])) {
              echo "<script>alert('이메일을 입력해주세요.');</script>";
              echo("<script>location.href='./signup.html';</script>");
              exit;
            }
            $inputEmail = $_POST['email'];

            if(mysqli_stmt_execute($stmt)){
                echo "<script>alert('회원가입성공');</script>";
                //페이지 이동
                echo("<script>location.href='./signin.html';</script>"); 
            } else { 
                echo("<div>ERROR: Could not execute query: $sql.".mysqli_error($mysqli));
            }
        } else {
            echo "ERROR: Could not prepare query: $sql.".mysqli_error($mysqli);
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($mysqli);
    ?>
</body>
</html>