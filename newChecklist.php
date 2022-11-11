<?php
/*DB 연결*/
$conn= mysqli_connect("localhost","root","","team09");

$var=$_GET['name'];
$user_id=$_GET['id'];
?>
<html>
<head>
  <meta charset="utf-8">
  <title><?=$var?>체크리스트</title>
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
<h2><?=$var?>체크리스트</h2>
<p>해당되는 항목을 선택해주세요</p>
<form method="post" action="usrChecklist.php">

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
      .$row['질문'].'</label></p>';
  $i=$i+1;
}
?>
<input type="hidden" name="name" value="<?=$var?>">
<?php echo '<input type="hidden" name="id" value="'.$user_id.'">';?>
<p><input type="submit" class="button" value="결과 저장하기"></p>
</form>
<a href="checklist_index.html" class="button">체크리스트 홈으로 돌아가기</a>

</center>
</body>
</html>
