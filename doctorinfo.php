<?php
$mysqli = mysqli_connect("localhost","team09","team09","team09");
if(mysqli_connect_errorno()){
    printf("Connect failed: %s\n",mysqli_connect_error());
    exit();
}
else {
    $sql = "select * from doctorinfo where doctor_name=name";
    $res=mysqli_query($mysqli, $sql);
    if($res){
        while ($newArray=mysqli_fetch_array($res, MYSQLI_ASSOC)) {
            $doctor_name=$newArray['doctor_name']
            $hospital=$newArray['hospital']
            $department=$newArray['department']
            $field=$newArray['field']
            $site=$newArray['site']
            echo <tr><td>doctor_name</td><td>hospital</td><td>department</td><td>field</td><td>site</td></tr>
            <tr><td>$doctor_name</td><td>$hospital</td><td>$department</td><td>$field</td><td>$site</td></tr>
        }
        else {
            printf("Could not retrieve records: %s\n", mysqli_error($mysqli));
        }
    }
}
mysqli_free_result($res);
mysqli_close($mysqli);
?>