<?php
$conn= mysqli_connect("localhost","team09","team09","team09");

$var=$_POST['name'];
session_start();
$user_id=$_SESSION['userId'];
$usernameSQL='SELECT * FROM userlog WHERE userId='.$user_id;
$usernameRES=mysqli_query($conn,$usernameSQL);
$userName=mysqli_fetch_array($usernameRES)['userName'];
?>
<html>
<head>
  <meta charset="utf-8">
  <title><?=$var?>체크리스트 - 결과</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <p>
  <a href="mypage.html" class="upperMenu">Hi, <?=$userName?></a>
  <a href="main.html" class="upperMenu">메인으로 이동</a>
  </p><br>
  <center>
  <h2><?=$var?>체크리스트 결과</h2>
<?php
if(isset($_POST['list'])){
  if(!empty($_POST['list'])){
    $usr_res=$_POST['list'];
    $count=count($usr_res);
    echo '<p>'.$var.'에 해당하는 증상이 '.$count.'개 입니다.';
    //테이블에 추가할 정보
    $input=implode(",",$usr_res);
    echo ' (선택한 문항 id: '.$input.')</p>';
    //이미 그 암의 체크리스트 했는지 확인하고
    $sql='SELECT * FROM checkresult WHERE USER_ID='.$user_id.' AND 암종류="'.$var.'"';
    $res=mysqli_query($conn,$sql);
    //한 전적 있으면 update
    if($res->num_rows > 0){
      $sql2='UPDATE checkresult
      SET 체크정보="'.$input.'", count='.$count.'
      WHERE USER_ID='.$user_id.' AND 암종류="'.$var.'"';
      echo "<p>체크리스트 업데이트를 진행...</p>";
    }
    //아니면 insert
    else{
      $sql2='INSERT INTO checkresult (USER_ID,암종류,체크정보,count)
      VALUES ('.$user_id.',"'.$var.'","'.$input.'",'.$count.')';
    }
    $res2=mysqli_query($conn,$sql2);
    if ($res2 === TRUE) {
      echo "<p>체크리스트 결과를 저장하였습니다.</p>";
    } else {
      printf("<p>저장 중 에러 발생 - error: %s\n</p>", mysqli_error($conn));
  }
  }
}
else{
  echo $var.'에 해당하는 증상이 없습니다.';
}
mysqli_close($conn);
 ?>

<div><form method="get" action="showChecklist.php">
  <p><input type="submit" class="button_long" value="저장된 결과 확인하기"></p>
</form></div>

<div><p><a href="checklist_index.html" class="buttonReverse">체크리스트 홈으로 돌아가기</a></p></div>

</center></body>
</html>
