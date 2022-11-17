<?php

    $mysqli = mysqli_connect("localhost","team09","team09","team09");
    if($mysqli==false){
        printf("Connect failed");
        exit();
    }
    else {
        $sql="SELECT COALESCE(department, '합계') department, count(department) cnt FROM doctorinfo GROUP BY department WITH ROLLUP;";
        $res = mysqli_query($mysqli,$sql);
        echo "<style>table {
            margin:auto;
        }
        table, td, th {
            border-collapse : collapse;
            border : 1px solid black;
        };
        </style><table border=1 cellspacing=0 cellpading=0> <tr><th>department</th><th>count</th></tr>";
        while ($row=mysqli_fetch_array($res, MYSQLI_ASSOC)) {
            $department=isset($row['department'])?$row['department']:"알수없음";
            $cnt=isset($row['cnt'])?($row['cnt']):0;
            echo "<tr><td>$department</td><td>$cnt</td></tr>";           
        }
        echo "</table>";
        echo "<link rel='stylesheet' href='style.css'> <div style='text-align: center;'><a class='buttonReverse' href='doctorinfo.php' style='text-align: center;'>뒤로가기</a></div>";
    }
    mysqli_close($mysqli);
?>