<?php
$conn= mysqli_connect("localhost","root","","team09");


$var=$_POST['name'];
$user_id=$_POST['id'];
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
    echo '<p>'.$var.'에 해당하는 증상이'.count($usr_res).'개 입니다.</p>';
    //테이블에 추가
    $input=implode(",",$usr_res);
    echo $input;
    $sql='INSERT INTO 체크리스트 (USER_ID,암종류,체크정보) VALUES ("'.$user_id.'","'.$var.'","'.$input.'")';
    $res=mysqli_query($conn,$sql);
    if ($res === TRUE) {
      echo "행 insert 성공";
    } else {
      printf("error: %s\n", mysqli_error($conn));
    }
  }
}
else{
  echo $var.'에 해당하는 증상이 없습니다.';
}
 ?>

<p>//위암은 어쩌고 저쩌고....</p><br><br>

<p><a href="checklist_index.html" class="button">체크리스트 홈으로 돌아가기</a></p>

</center></body>
</html>
