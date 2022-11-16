<?php
$mysqli = mysqli_connect("localhost","team09","team09","team09");

$replycontents = $_POST["replytextarea"];

$commentId = rand() % 240;

if($replycontents)
{
  $sql = "insert into cancerComment (commentId, userId, cancertype, comment) values('$commentId','".$_SESSION['userId']."','$_SESSION['cancername']','.$replycontents.')";
  echo "<script>alert('댓글이 작성되었습니다.');
        cancerinfo.php';</script>";
  $res = mysqli_query($mysqli, $sql);

  $sql2 = "select * from cancerComment where cancertype = '$_SESSION['cancername']'";
  $res2 = mysqli_query($mysqli, $sql2);
  while($row2 = mysqli_fetch_array($res2, MYSQLI_ASSOC))
  {
    echo $row2['commentId']." ".$row2['userId']." ".$row2['cancertype']."<br>".str_replace("<", "&lt", $row2['comment'])."<br><br>";
  }
}
else
{
  echo "<script>alert('댓글 작성에 실패했습니다.');
  history.back();</script>";
}
?>
