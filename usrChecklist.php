<?php
$conn= mysqli_connect("localhost","team09","team09","team09");


$var=$_POST['name'];
$user_id=$_POST['id'];
echo $user_id;
?>
<html>
<head>
  <meta charset="utf-8">
  <title><?=$var?>체크리스트 - 결과</title>
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
  <h2><?=$var?>체크리스트 결과</h2>
<?php
if(isset($_POST['list'])){
  if(!empty($_POST['list'])){
    $usr_res=$_POST['list'];
    $count=count($usr_res);
    echo '<p>'.$var.'에 해당하는 증상이'.$count.'개 입니다.</p>';
    //테이블에 추가할 정보
    $input=implode(",",$usr_res);
    echo $input;
    //이미 그 암의 체크리스트 했는지 확인하고
    $sql='SELECT * FROM checkresult WHERE USER_ID='.$user_id.' AND 암종류="'.$var.'"';
    $res=mysqli_query($conn,$sql);
    //한 전적 있으면 update
    if($res->num_rows > 0){
      $sql2='UPDATE checkresult
      SET 체크정보="'.$input.'", count='.$count.'
      WHERE USER_ID='.$user_id.' AND 암종류="'.$var.'"';
      echo "<p>업데이트 진행</p>";
    }
    //아니면 insert
    else{
      $sql2='INSERT INTO checkresult (USER_ID,암종류,체크정보,count)
      VALUES ('.$user_id.',"'.$var.'","'.$input.'",'.$count.')';
      echo "<p>인서트 진행</p>";
    }
    $res2=mysqli_query($conn,$sql2);
    if ($res2 === TRUE) {
      echo "<p>성공</p>";
    } else {
      printf("error: %s\n", mysqli_error($conn));
  }
  }
}
else{
  echo $var.'에 해당하는 증상이 없습니다.';
}
mysqli_close($conn);
 ?>

<p><a href="checklist_index.html" class="button">체크리스트 홈으로 돌아가기</a></p>

</center></body>
</html>
