<?php
$mysqli = mysqli_connect("localhost","team09","team09","team09");
if(mysqli_connect_errorno()){
    printf("Connect failed: %s\n",mysqli_connect_error());
    exit();
}
else 
{
    $type=$_POST['choice'];

    if ($type=='location') {$sql="select * from hospitalinfo where location=".$value;}
    if ($type='hospital') {$sql = "select * from doctorinfo where doctor_name=".$value;}

    $res=mysqli_query($mysqli, $sql);
    if($res){
        while ($newArray=mysqli_fetch_array($res, MYSQLI_ASSOC)) {
            $hospital_name=$newArray['hospital_name'];
            $location=$newArray['location'];
            $location_detail=$newArray['location_detail'];
            $number=$newArray['number'];
            $site=$newArray['site'];
            echo "<table border=1 cellspacing=0 cellpading=0>
            <tr><td>hospital_name</td><td>location</td><td>location_detail</td><td>number</td><td>site</td></tr>
            <tr><td>$hospital_name</td><td>$location</td><td>$location_detail</td><td>$number</td><td>$site</td></tr>
            </table>";
            }
        }
    else {
        printf("Could not retrieve records: %s\n", mysqli_error($mysqli));
    }
    
}
mysqli_free_result($res);
mysqli_close($mysqli);
?>