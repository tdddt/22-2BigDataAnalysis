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
        <h1>UserInfo</h1>
    </div>
    
    <?php
    $mysqli = mysqli_connect("localhost","team09","team09","team09");
    if($mysqli==false){
        printf("Connect failed");
        exit;
    }
    else { 
        //userId, age,sex,drink,smoke,height,Uweight,Ulocation
        //18	male	0	0	182.1	83	동대문구
        //int	varchar(10)	int	int	int	int	varchar(20)
        $sql = "Update userinfo Set ? = ?";
        if($stmt = mysqli_prepare($mysqli, $sql)){
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