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
        //transaction
        $mysqli->autocommit(false); 
        try {
            //이미 존재하는 아이디라면 새로 생성할 수 없음.
            $check = "SELECT id from userlog";
            $res = mysqli_query($mysqli,$check);
            if ($res) {
                while ($newArray=mysqli_fetch_array($res, MYSQLI_ASSOC)) {
                    if($newArray['id']===$_POST['id']){
                        echo "<script>alert('이미 존재하는 아이디입니다. 다른 아이디로 입력해주세요.');</script>";
                        echo("<script>location.href='./signup.html';</script>");
                        exit;  
                    }                
                }
            }
            else {
                printf("Could not retrieve records: %s\n", mysqli_error($mysqli));
            }
                
            $sql = "INSERT into userlog(userName,id,pw,email) values (?,?,?,?);";
            $stmt = mysqli_prepare($mysqli, $sql);
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

            mysqli_stmt_execute($stmt);
            echo "<script>alert('회원가입성공');</script>";
            echo("<script>location.href='./signin.html';</script>"); 
            
            $mysqli->autocommit(true);
        } catch (mysqli_sql_exception $exception) {
            $mysqli->rollback();
            throw $exception;
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($mysqli);
    ?>
</body>
</html>