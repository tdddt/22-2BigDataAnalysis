<?php
$mysqli = mysqli_connect("localhost","team09","team09","team09");
if(mysqli_connect_errorno()){
    printf("Connect failed: %s\n",mysqli_connect_error());
    exit();
}
else {
    $sql = "select 아이디, 비밀번호 from 유저 where 아이디=? and 비밀번호=?";
    if($stmt = mysqli_prepare($mysqli, $sql)){
        mysqli_stmt_bind_param($stmt, "ss", $inputId, $inputPw);
        $inputId = $_POST['id'];
        $inputPw = $_POST['pw'];

        if(mysqli_stmt_execute($stmt)){
            printf($sql); //일단 어떻게 보여지는지 확인하기
            //일치하면 main.html로 들어가기
        } else { //sql null이라면? 
            //alert 팝업 띄우기
            //signIn화면으로 돌아가기
        }
    } else {
        echo "ERROR: Could not prepare query: $sql.".mysqli_error($mysqli);
    }
    //$sql = "select 아이디, 비밀번호 from 유저 where 아이디=$_POST['id'] and 비밀번호=$_POST['pw']";
}
mysqli_stmt_close($stmt);
mysqli_close($mysqli);
?>