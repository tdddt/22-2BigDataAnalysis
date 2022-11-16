<?php
    session_start();
    $mysqli = mysqli_connect("localhost","team09","team09","team09");
    if($mysqli==false){
        printf("Connect failed");
        exit();
    }
    else {
        //transaction
        $mysqli->autocommit(false); 
        try {
            $sql3="select * FROM userinfo WHERE userId=?";
            $stmt3 = mysqli_prepare($mysqli,$sql3);
            $stmt3->bind_param("s",$_SESSION['userId']);
            $stmt3->execute();
            $result3 = $stmt3->get_result();
            $row3 = mysqli_fetch_array($result3);

            if(($_POST['sex']!='female') AND ($_POST['sex']!='male')){
                echo "<script>alert('성별은 female 혹은 male로 입력해주세요.');</script>";
                echo "<script>location.href='./userinfo.php';</script>";
                exit();
            }

            if(!isset($row3['userId'])){ //없으면 생성
                //userinfo에 userId가 없다면 insert
                $sql="INSERT into userinfo values (?,?,?,?,?,?,?,?)";
                if($stmt = mysqli_prepare($mysqli, $sql)){
                    //bind preparedStatement
                    $stmt->bind_param("sisiiiis",$_SESSION['userId'],$_POST['age'],$_POST['sex'],$_POST['drink'],$_POST['smoke'],$_POST['height'],$_POST['weight'],$_POST['location']);
                    //execute preparedStatement
                    if($stmt->execute()){
                        $mysqli->autocommit(true);
                        echo "<script>alert('입력정보를 저장했습니다.');</script>";
                        echo "<script>location.href='./userinfo.php';</script>";
                        exit();
                    } else { 
                        echo("<div>ERROR: Could not execute query: $sqlID.".mysqli_error($mysqli));
                    }
                } else {
                    echo "ERROR: Could not prepare query: $sqlID.".mysqli_error($mysqli);
                }
                            
            } else { //있으면 업데이트
                $sql="UPDATE userinfo set age=?, sex=?, drink=?, smoke=?, height=?, Uweight=?, Ulocation=? WHERE userId=?";
                if($stmt = mysqli_prepare($mysqli, $sql)){
                    //bind preparedStatement
                    $stmt->bind_param("isiiiiss",$_POST['age'],$_POST['sex'],$_POST['drink'],$_POST['smoke'],$_POST['height'],$_POST['weight'],$_POST['location'],$_SESSION['userId']);
                    //execute preparedStatement
                    if($stmt->execute()){
                        $mysqli->autocommit(true);
                        echo "<script>alert('입력정보를 저장했습니다.');</script>";
                        echo "<script>location.href='./userinfo.php';</script>";
                        exit();
                    } else { 
                        echo("<div>ERROR: Could not execute query: $sqlID.".mysqli_error($mysqli));
                    }
                } else {
                    echo "ERROR: Could not prepare query: $sqlID.".mysqli_error($mysqli);
                }
            }
        } catch (mysqli_sql_exception $exception) {
            $mysqli->rollback();
            throw $exception;
        }
    }
    $stmt3->close();
    mysqli_close($mysqli);
?>