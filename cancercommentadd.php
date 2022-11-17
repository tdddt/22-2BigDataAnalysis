<?php
session_start();
$_SESSION['cancername'] = $_POST['cancername'];
$mysqli = mysqli_connect("localhost","team09","team09","team09");

$commentcontents = $_POST["commenttextarea"];

$commentId = rand() % 240;

$_SESSION['commentId'] = $commentId;

if($commentcontents)
{
  $sql = "insert into cancerComment (commentId, userId, cancertype, comment) values('$commentId','".$_SESSION['userId']."','".$_SESSION['cancername']."','$commentcontents')";
  $result = mysqli_query($mysqli,$sql);
  echo "<script>alert('댓글이 작성되었습니다.');</script>";
  echo "<script>location.href='cancerinfo.html';</script>";
}
else
{
  echo "<script>alert('댓글 작성에 실패했습니다.')";
  echo "<script>location.href='cancerinfo.html';</script>";
}
?>
