<?php
    echo "
    <link rel='stylesheet' href='style.css'>
    <h1 style='text-align: center;'>의사 정보 확인</h1>
    <form action='./doctorinfo.php' method='post' style='text-align: center;'>
    <input type='text' name='name' placeholder='의사 이름'>
    <input type='submit' value='검색'>
    <div style='text-align: center;'></div><a class='buttonReverse' href='main.html' style='text-align: center;'>뒤로가기</a></div>
    <input type='submit' name='review' value='후기순으로 보기'></form>";

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

        if(isset($_POST['review'])){
          $sql="SELECT commentcount,
          rank() over (order by commentcount desc) as ranking,
          doctor_name, hospital, department, field, site
          FROM
          (select doctor_ID, count(*) as commentcount from doctorcomment group by doctor_ID) as t,doctorinfo
          WHERE t.doctor_ID = doctorinfo.doctor_ID";
        }
        $result = mysqli_query($mysqli,$sql);
        if($result==false) echo mysqli_error($mysqli);
        if(isset($_POST['review'])){
          echo "<style>table {
              margin:auto;
          }
          table, td, th {
              border-collapse : collapse;
              border : 1px solid black;
          };
          </style><table border=1 cellspacing=0 cellpading=0> <tr><th>후기 수</th><th>이름</th><th>병원</th><th>진료과</th><th>진료암</th><th>사이트</th><th>후기</th></tr>";

          while($row=mysqli_fetch_array($result)){
            if($row==false)echo mysqli_error($mysqli);
              $commentnum=isset($row['commentcount'])?$row['commentcount']:0;
              $doctor_ID=isset($row['doctor_ID'])?$row['doctor_ID']:0;
              $doctor_name=isset($row['doctor_name'])?($row['doctor_name']):0;
              $hospital=isset($row['hospital'])?$row['hospital']:0;
              $department=isset($row['department'])?($row['department']):0;
              $field=isset($row['field'])?($row['field']):0;
              $site=isset($row['site'])?($row['site']):0;
              echo "
              <form action='doctorcomment.php' method='post' style='text-align:center:'>
              <tr><td>$commentnum</td><td>$doctor_name</td><td>$hospital</td><td>$department</td><td>$field</td><td><a href='".$site."'>$site</a></td></tr></form>";
          }
        }

        else{
          echo "<style>table {
              margin:auto;
          }
          table, td, th {
              border-collapse : collapse;
              border : 1px solid black;
          };
          </style><table border=1 cellspacing=0 cellpading=0> <tr><th>의사아이디</th><th>이름</th><th>병원</th><th>진료과</th><th>진료암</th><th>사이트</th><th>후기</th></tr>";
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
              <tr><td>$doctor_ID</td><td>$doctor_name</td><td>$hospital</td><td>$department</td><td>$field</td><td><a href='".$site."'>$site</a></td><td><button name='comment' value='".$doctor_ID."' type='submit' class='button'>후기</td></tr></form>";
          }
          echo "</table>";

        }
    }
    mysqli_free_result($result);
    mysqli_close($mysqli);
?>
