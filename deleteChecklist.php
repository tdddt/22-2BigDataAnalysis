<?php
$conn= mysqli_connect("localhost","team09","team09","team09");
$user_id=$_POST['id'];
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
