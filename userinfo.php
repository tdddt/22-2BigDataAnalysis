<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UserInfo</title>
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
    session_start();
    //echo $_SESSION['userId'];
    $mysqli = mysqli_connect("localhost","team09","team09","team09");
    if($mysqli==false){
        printf("Connect failed");
        exit();
    }
    else {
        $sql="SELECT age,sex,drink,smoke,height,Uweight,Ulocation FROM userinfo WHERE userId=?";
        if($stmt = mysqli_prepare($mysqli, $sql)){
            //bind preparedStatement
            $stmt->bind_param("s",$_SESSION['userId']);

            //execute preparedStatement
            if($stmt->execute()){
                $result = $stmt->get_result();
                $row = $result->fetch_assoc();
                //오류 처리
                $age = isset($row['age']) ? $row['age'] : 0;
                $sex = isset($row['sex']) ? $row['sex'] : 'female';
                $drink = isset($row['drink']) ? $row['drink'] : 0;
                $smoke = isset($row['smoke']) ? $row['smoke'] : 0;
                $height = isset($row['height']) ? $row['height'] : 0;
                $Uweight = isset($row['Uweight']) ? $row['Uweight'] : 0;
                $Ulocation = isset($row['Ulocation']) ? $row['Ulocation'] : 'oo구';

                //음주여부(0~3): <input type='number' name='drink' class='input'  value='".$drink."'><p>
                //흡연여부(0(아니오),1(예)): <input type='number' name='smoke' class='input'  value='".$smoke."'><p>
                echo "<h1 style='text-align: center;'>추가 정보 입력/수정</h1>
                <form action='userinfosave.php' method='post' style='text-align: center;'>
                    <b>나이</b>(ex: 18): <input type='number' name='age' class='input' value='".$age."'><p>
                    <b>성별</b>(male,female): <input type='text' name='sex' class='input'  value='".$sex."'><p>

                    <b>음주여부</b>(0~3):
                    <select name='drink' class='input'>
                        <option value='0'";
                            echo ($drink==0) ? " selected> 0(아니오)" : ">0(아니오)";
                        echo "<option value='1'";
                            echo ($drink==1) ? " selected> 1(가끔마심)" : ">1(가끔마심)";
                        echo "<option value='2'";
                            echo ($drink==2) ? " selected> 2(자주마심)" : ">2(자주마심)";
                        echo "<option value='3'";
                            echo ($drink==3) ? " selected> 3(많이마심)" : ">3(많이마심)";
                    echo"</select><p>

                    <b>흡연여부</b>(0~1):
                    <select name='smoke' class='input'>
                        <option value='0'";
                            echo ($smoke==0) ? " selected> 0(아니오)" : ">0(아니오)";
                        echo "<option value='1'";
                            echo ($smoke==1) ? " selected> 1(예)" : ">1(예)";
                    echo"</select><p>

                    <b>키</b>(ex: 182): <input type='number' name='height' class='input'  value='".$height."'><p>
                    <b>몸무게</b>(ex: 83): <input type='number' name='weight' class='input'  value='".$Uweight."'><p>
                    <b>지역</b>(ex: 동대문구): <input type='text' name='location' class='input'  value='".$Ulocation."'><p>
                    <input class='button' type='submit' value='저장하기'>
                </form>
                <form action='userinforeset.php' method='post' style='text-align: center;'>
                    <input class='button' type='submit' value='초기화'>
                </form>
                <div style='text-align: center;'><a class='buttonReverse' href='mypage.html' style='text-align: center;'>뒤로가기</a></div>";
                
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