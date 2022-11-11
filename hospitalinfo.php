<?php
$mysqli = mysqli_connect("localhost","team09","team09","team09");
if(mysqli_connect_errorno()){
    printf("Connect failed: %s\n",mysqli_connect_error());
    exit();
}
else {
    $type=$_POST['choice']
    $search=$_POST['search']
    if ($type=='지역'){
        $search='지역'
        $sql="select * from hospitalinfo where location like "%value%";
    }
    if ($type='병원'){
        $search='병원'
        $sql = "select * from doctorinfo where doctor_name=value";
    }
    $res=mysqli_query($mysqli, $sql);
    if($res){
        while ($newArray=mysqli_fetch_array($res, MYSQLI_ASSOC)) {
            $hospital_name=$newArray['hospital_name']
            $location=$newArray['location']
            $location_detail=$newArray['location_detail']
            $number=$newArray['number']
            $site=$newArray['site']
            echo <tr><td>hospital_name</td><td>location</td><td>location_detail</td><td>number</td><td>site</td></tr>
            <tr><td>$hospital_name</td><td>$location</td><td>$location_detail</td><td>$number</td><td>$site</td></tr>
        }
        else {
            printf("Could not retrieve records: %s\n", mysqli_error($mysqli));
        }
    }
}
mysqli_free_result($res);
mysqli_close($mysqli);
?>