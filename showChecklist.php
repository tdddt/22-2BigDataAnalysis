<?php
/*DB 연결*/
$conn=mysqli_connect("localhost","team09","team09","team09");

session_start();
$user_id=$_SESSION['userId'];
$usernameSQL='SELECT * FROM userlog WHERE userId='.$user_id;
$usernameRES=mysqli_query($conn,$usernameSQL);
$userName=mysqli_fetch_array($usernameRES)['userName'];

$sql = 'SELECT * FROM checkresult WHERE USER_ID='.$user_id;
$result = mysqli_query($conn,$sql);
?>

<html>
<head>
  <meta charset="utf-8">
  <title>저장된 체크리스트</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<p>
<a href="mypage.html" class="upperMenu">Hi, <?=$userName?></a>
<a href="main.html" class="upperMenu">메인으로 이동</a>
</p><br><center>
<h2>저장된 체크리스트</h2>

<?php
while($row=mysqli_fetch_array($result)){
  $cancer=$row['암종류'];
  $checked_num=$row['체크정보'];
  echo '<div align="left" class="checklistBox"><h3>당신의 '.$cancer.' 증상</h3>';
  //이제 체크된 리스트로 질문 테이블에서 쿼리수행해서 빼오기
  $sql2='SELECT * FROM '.$cancer.'체크리스트 WHERE id IN ('.$checked_num.')';
  $result2=mysqli_query($conn,$sql2);
  while($row2=mysqli_fetch_array($result2)){
    echo $row2['question'].'<br>';
  }
  echo '</div>';
}
?>


<form method="post" action="deleteChecklist.php">
 <?php echo '<input type="hidden" name="id" value="'.$user_id.'">';?>
 <p><input type="submit" class="button_long" value="모든 결과 삭제하기"
   onclick="return  confirm('정말 삭제하시겠습니까?\n확인버튼을 누르시면, 삭제 후 체크리스트 홈으로 돌아갑니다.')"></p>
</form>
<div><p><a href="checklist_index.html" class="buttonReverse">체크리스트 홈으로 돌아가기</a></p></div>

<br><br><h2>다른 참여자들의 통계보기</h2>
<div class="boxWrapper">
<?php
echo '<div align="left" class="statisticsBox"><h3>암종 별 체크리스트 참여자 수</h3>'; //GROUP BY, COUNT
$sql = 'SELECT 암종류,count(*) AS numbers FROM checkresult GROUP BY 암종류';
$result = mysqli_query($conn,$sql);
while($row=mysqli_fetch_array($result)){
  echo '<p>'.$row['암종류'].': '.$row['numbers'].'명</p>';
}
echo '</div>';
echo '<div align="left" class="statisticsBox"><h3>암종 별 평균 체크 개수</h3>'; //AVG
$sql = 'SELECT 암종류,avg(count) AS numbers FROM checkresult GROUP BY 암종류';
$result = mysqli_query($conn,$sql);
while($row=mysqli_fetch_array($result)){
  echo '<p>'.$row['암종류'].': '.$row['numbers'].'개</p>';
}
echo '</div>';
mysqli_close($conn);
 ?>
</div>

</center>
</body>
</html>
