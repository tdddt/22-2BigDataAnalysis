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
    <!--18	male	0	0	182.1	83	동대문구-->
    <!--name,sex,drink,smoke,height,weight,location-->
    <!--정보 보여주기-->
    <?php
        session_start();
        echo $_SESSION['userId'];
    ?>
    <h1 style="text-align: center;">추가 정보 입력/수정</h1>
    <form action="userinfo.php" method="post" style="text-align: center;">
        나이(ex: 18): <input type="text" name="name" class="input" placeholder="0"><p>
        성별(male,female): <input type="text" name="sex" class="input"><p>
        음주여부: <input type="text" name="drink" class="input"><p>
        흡연여부: <input type="text" name="smoke" class="input"><p>
        키(ex: 182.1): <input type="text" name="height" class="input"><p>
        몸무게(ex: 83): <input type="text" name="weight" class="input"><p>
        지역(ex: 동대문구): <input type="text" name="location" class="input"><p>
        <input class="button" type="submit" value="저장하기">
        <input class="button" type="submit" value="초기화">
    </form>
    <div style="text-align: center;"><a class="buttonReverse" href="mypage.html" style="text-align: center;">뒤로가기</a></div>
    <?php
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
                $sex = isset($row['sex']) ? $row['age'] : 'malefemale';
                $drink = isset($row['drink']) ? $row['drink'] : 0;
                $smoke = isset($row['smoke']) ? $row['smoke'] : 0;
                $height = isset($row['height']) ? $row['height'] : 0;
                $Uweight = isset($row['Uweight']) ? $row['Uweight'] : 0;
                $Ulocation = isset($row['Ulocation']) ? $row['Ulocation'] : 'oo구';
                
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