<?php
/*DB 연결*/
$conn= mysqli_connect("localhost","root","","team09");

$user_id=$_GET['id'];
echo $user_id;
$sql = 'SELECT * FROM 체크리스트 WHERE USER_ID="'.$user_id.'"';
$result = mysqli_query($conn,$sql);
?>

<html>
<head>
  <meta charset="utf-8">
  <title>저장된 체크리스트</title>
  <style>
  .button{
    background-color: #00462A;border: none;color: white;
    text-align: center;text-decoration: none; font-size: 12px;
    display: inline-block;cursor: pointer; padding: 15px 15px;
  }
  .button:hover{
   background-color: #779c74;
 }
  </style>
</head>
<body><center><br>
<h2>저장된 체크리스트</h2>
<?php

while($row=mysqli_fetch_array($result)){
  $cancer=$row['암종류'];
  $checked_num=$row['체크정보'];
  echo '<h3>당신의 '.$cancer.' 증상</h3>';
  //이제 체크된 리스트로 질문 테이블에서 쿼리수행해서 빼오기
  $sql2='SELECT * FROM '.$cancer.'체크리스트 WHERE id IN ('.$checked_num.')';
  $result2=mysqli_query($conn,$sql2);
  while($row2=mysqli_fetch_array($result2)){
    echo $row2['질문'].'<br>';
  }
}
?>
<p><a href="checklist_index.html" class="button">체크리스트 홈으로 돌아가기</a></p>

</center>
</body>
</html>
