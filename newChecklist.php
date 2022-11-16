<?php
/*DB 연결*/
$conn= mysqli_connect("localhost","team09","team09","team09");

$var=$_GET['name'];
session_start();
$user_id=$_SESSION['userId'];
$usernameSQL='SELECT * FROM userlog WHERE userId='.$user_id;
$usernameRES=mysqli_query($conn,$usernameSQL);
$userName=mysqli_fetch_array($usernameRES)['userName'];
?>
<html>
<head>
  <meta charset="utf-8">
  <title><?=$var?>체크리스트</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <p>
  <a href="mypage.html" class="upperMenu">Hi, <?=$userName?></a>
  <a href="main.html" class="upperMenu">메인으로 이동</a>
  </p><br>
<center><br>
<h1><?=$var?>체크리스트</h1>
<p>해당되는 항목을 선택해주세요</p>
<form method="post" action="usrChecklist.php">


<div align="left" class="checklistBox">

<?php
$sql = 'SELECT * FROM '.$var.'체크리스트';
$result = mysqli_query($conn,$sql);

/*질문 체크박스 출력*/
//질문 테이블 번호-질문 행으로 있다고 치고
$i=1;
/*인덱스로 사용 -> 유저가 체크한 질문들의 번호가 리스트로 저장됨. -> 리스트를 텍스트로 변환하여 저장.
문제 테이블에서 번호에 해당하는것만 출력가능함 WHERE id IN (1,2,4....) 이런식으로*/
while($row=mysqli_fetch_array($result)){
  echo '<p><input type="checkbox" name="list[]" value="'.$i.'"><label>'
      .$row['question'].'</label></p>';
  $i=$i+1;
}
mysqli_close($conn);
?>


</div>
<input type="hidden" name="name" value="<?=$var?>">
<div><p><input type="submit" class="button_long" value="결과 저장하기"></p></div>
</form>
<div><a href="checklist_index.html" class="buttonReverse">체크리스트 홈으로 돌아가기</a></div>
</center>
</body>
</html>
