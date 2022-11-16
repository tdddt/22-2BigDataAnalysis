<?php
    echo "
    <link rel='stylesheet' href='style.css'>
    <h1 style='text-align: center;'>의사 정보 확인</h1>
    <form action='./doctorinfo.php' method='post' style='text-align: center;'>
    <input type='text' name='name' placeholder='의사 이름'>
    <input type='submit' value='검색'>
    <div style='text-align: center;'></div><a class='buttonReverse' href='main.html' style='text-align: center;'>뒤로가기</a></div>
    </body>";

    $mysqli = mysqli_connect("localhost","team09","team09","team09");
    if($mysqli==false){
        printf("Connect failed");
        exit();
    }
    else {
        $name = isset($_POST['name']) ? $_POST['name'] : "";
        $sql="";
        if($name==""){
            $sql='SELECT * from doctorinfo';
        }
        else {
            $sql='SELECT * from doctorinfo where doctor_name like "%'.$name.'%"';
        }
        $result = mysqli_query($mysqli,$sql);

        echo "<style>table {
            margin:auto; 
        }
        table, td, th {
            border-collapse : collapse;
            border : 1px solid black;
        };
        </style><table border=1 cellspacing=0 cellpading=0> <tr><td>의사아이디</td><td>이름</td><td>병원</td><td>진료과</td><td>진료암</td><td>사이트</td><td>후기</td></tr>";
        while($row=mysqli_fetch_array($result)){
            $doctor_ID=isset($row['doctor_ID'])?$row['doctor_ID']:0;
            $doctor_name=isset($row['doctor_name'])?($row['doctor_name']):0;
            $hospital=isset($row['hospital'])?$row['hospital']:0;
            $department=isset($row['department'])?($row['department']):0;
            $field=isset($row['field'])?($row['field']):0;
            $site=isset($row['site'])?($row['site']):0;
            // echo "
            // <form action='doctorcomment.php' method='post' style='text-align:center:'>
            // <tr><td>$doctor_ID</td><td>$doctor_name</td><td>$hospital</td><td>$department</td><td>$field</td><td><a href='".$site."'>$site</a></td><td><input class='button' type='submit' name='ii' value='후기'></td></tr>
            // </form>";
            echo "
            <form action='doctorcomment.php' method='post' style='text-align:center:'>
            <tr><td>$doctor_ID</td><td>$doctor_name</td><td>$hospital</td><td>$department</td><td>$field</td><td><a href='".$site."'>$site</a></td><td><button name='comment' value='".$doctor_ID."' type='submit' class='button'>후기</td></tr>
            <td>$doctor_ID</td></form>";
        }
        echo "</table>";
    }
    mysqli_free_result($result);
    mysqli_close($mysqli);
?>