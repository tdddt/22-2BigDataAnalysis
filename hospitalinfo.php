<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>searching hospital by <?=$_POST['choice']?></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
$mysqli = mysqli_connect("localhost","team09","team09","team09");
if(mysqli_connect_errno()){
    printf("Connect failed: %s\n",mysqli_connect_error());
    exit();
}
else
{
    $type=$_POST['choice'];
    $value=$_POST['value'];

    if ($type=='location') {$sql='select * from hospitalinfo where location like "%'.$value.'%"';}
    //if ($type=='hospital') {$sql = 'select * from doctorinfo where doctor_name like "%'.$value.'%"';}
    //병원을 선택했을 때 검색하면 나오는거 똑같이 hospitalinfo 인듯? 검색을 병원명으로 하는건가
    if ($type=='hospital') {$sql = 'select * from hospitalinfo where hospital_name like "%'.$value.'%"';}

    $res=mysqli_query($mysqli, $sql);
    if($res){
      echo '<p>검색어 "'.$value.'"의 검색 결과를 출력합니다.</p>';
      echo '<table>
      <tr><th>병원명</th><th>위치</th><th>세부 주소</th><th>연락처</th><th>사이트주소</th></th></tr>';
        while ($newArray=mysqli_fetch_array($res, MYSQLI_ASSOC)) {
            $hospital_name=$newArray['hospital_name'];
            $location=$newArray['location'];
            $location_detail=$newArray['location_detail'];
            $number=$newArray['number'];
            $site=$newArray['site'];
            echo '<tr><td>'.$hospital_name.'</td><td>'.$location.'</td><td>'.$location_detail.'</td><td>'.$number.'</td><td><a href="'.$site.'">'.$site.'</a></td></tr>';
            }
            echo '</table>';
        }
    else {
        printf("Could not retrieve records: %s\n", mysqli_error($mysqli));
    }
}
mysqli_free_result($res);
mysqli_close($mysqli);
?>
