<?php
$conn= mysqli_connect("localhost","team09","team09","team09");
session_start();
$user_id=$_SESSION['userId'];
echo $user_id;

$sql='DELETE FROM checkresult WHERE USER_ID='.$user_id;
$result = mysqli_query($conn, $sql);
if($result === false){
  echo error_log(mysqli_error($conn));
} else {
  header('Location: checklist_index.html');  //처음으로 돌아감.
}
mysqli_close($conn);
?>
