<!DOCTYPE html>
<html lang = "en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CancerInfo</title>
  <link href="https://fonts.googleapis.com/css?family=Inter&display=swap" rel="stylesheet" />
</head>
<body>
  <h1 style="text-align: center;">암 정보 확인</h1>
  <div style="text-align: center;" ><a href="cancerinfofind.html" class="buttonReverse" style="text-align: center;">뒤로가기</a></div>
  <div class="v1_5">
  <div class="v2_26"></div>
  <div class="v2_23"></div>
  <div class="v2_22"></div>
  <div class="v2_21"></div>
  <div class="v2_20"></div>
  <div class="v2_19"></div>
  <div class="v2_18"></div>
  <div class="v2_17"></div>
  <div class="v2_16"></div>
  <div class="v2_14"></div>
  <span class="v3_29">암 종류</span>
  <span class="v3_30">정의</span>
  <span class="v3_31">원인</span>
  <span class="v3_32">증상</span>
  <span class="v3_33">진단/검사</span>
  <span class="v3_34">치료</span>
  <span class="v3_36">경과</span>
  <span class="v3_37">합병증</span>
  <span class="v3_38">예방/<br>조기발견</span>
  <span class="v3_39">진료과</span>
<?php
$mysqli = mysqli_connect("localhost","team09","team09","team09");
if(mysqli_connect_errno())
{
    printf("Connect failed: %s\n",mysqli_connect_error());
    exit();
}
else
{
    $name = $_POST['cancername'];
    $sql ="select * from cancerinfo where cancer_name='$name'";

    $res = mysqli_query($mysqli, $sql);

    $row = mysqli_fetch_array($res, MYSQLI_ASSOC);

    echo '<span class = "v4_1">'.$row["cancer_name"].'</span>';
    echo '<span class = "v4_2">'.$row["definition"].'</span>';
    echo '<span class = "v4_3">'.$row["cause"].'</span>';
    echo '<span class = "v4_4">'.$row["symptom"].'</span>';
    echo '<span class = "v4_5">'.$row["diagnosis"].'</span>';
    echo '<span class = "v4_6">'.$row["cure"].'</span>';
    echo '<span class = "v4_7">'.$row["progress"].'</span>';
    echo '<span class = "v4_8">'.$row["complication"].'</span>';
    echo '<span class = "v4_9">'.$row["prevention"].'</span>';
    echo '<span class = "v4_10">'.$row["department"].'</span>';
}
mysqli_free_result($res);
mysqli_close($mysqli);
?>
</body>
</html>
<style>* {
  box-sizing: border-box;
}
body {
  font-size: 14px;
}
.v1_5 {
  width: 100%;
  height: 1445px;
  background: rgba(255,255,255,1);
  opacity: 1;
  position: relative;
  top: 0px;
  left: 0px;
  overflow: hidden;
}
.v2_26 {
  width: 142px;
  height: 65px;
  background: rgba(217,217,217,1);
  opacity: 1;
  position: absolute;
  top: 1197px;
  left: 77px;
}
.v2_23 {
  width: 142px;
  height: 83px;
  background: rgba(217,217,217,1);
  opacity: 1;
  position: absolute;
  top: 1058px;
  left: 77px;
}
.v2_22 {
  width: 142px;
  height: 65px;
  background: rgba(217,217,217,1);
  opacity: 1;
  position: absolute;
  top: 937px;
  left: 77px;
}
.v2_21 {
  width: 142px;
  height: 65px;
  background: rgba(217,217,217,1);
  opacity: 1;
  position: absolute;
  top: 816px;
  left: 77px;
}
.v2_20 {
  width: 142px;
  height: 65px;
  background: rgba(217,217,217,1);
  opacity: 1;
  position: absolute;
  top: 695px;
  left: 77px;
}
.v2_19 {
  width: 142px;
  height: 65px;
  background: rgba(217,217,217,1);
  opacity: 1;
  position: absolute;
  top: 574px;
  left: 77px;
}
.v2_18 {
  width: 142px;
  height: 65px;
  background: rgba(217,217,217,1);
  opacity: 1;
  position: absolute;
  top: 453px;
  left: 77px;
}
.v2_17 {
  width: 142px;
  height: 65px;
  background: rgba(217,217,217,1);
  opacity: 1;
  position: absolute;
  top: 332px;
  left: 77px;
}
.v2_16 {
  width: 142px;
  height: 65px;
  background: rgba(217,217,217,1);
  opacity: 1;
  position: absolute;
  top: 211px;
  left: 77px;
}
.v2_14 {
  width: 142px;
  height: 65px;
  background: rgba(217,217,217,1);
  opacity: 1;
  position: absolute;
  top: 90px;
  left: 77px;
}
.v3_29 {
  width: 135px;
  color: rgba(0,0,0,1);
  position: absolute;
  top: 100px;
  left: 81px;
  font-family: Inter;
  font-weight: Regular;
  font-size: 32px;
  opacity: 1;
  text-align: center;
}
.v3_30 {
  width: 98px;
  color: rgba(0,0,0,1);
  position: absolute;
  top: 221px;
  left: 99px;
  font-family: Inter;
  font-weight: Regular;
  font-size: 32px;
  opacity: 1;
  text-align: center;
}
.v3_31 {
  width: 98px;
  color: rgba(0,0,0,1);
  position: absolute;
  top: 342px;
  left: 99px;
  font-family: Inter;
  font-weight: Regular;
  font-size: 32px;
  opacity: 1;
  text-align: center;
}
.v3_32 {
  width: 98px;
  color: rgba(0,0,0,1);
  position: absolute;
  top: 463px;
  left: 99px;
  font-family: Inter;
  font-weight: Regular;
  font-size: 32px;
  opacity: 1;
  text-align: center;
}
.v3_33 {
  width: 181px;
  color: rgba(0,0,0,1);
  position: absolute;
  top: 584px;
  left: 58px;
  font-family: Inter;
  font-weight: Regular;
  font-size: 32px;
  opacity: 1;
  text-align: center;
}
.v3_34 {
  width: 98px;
  color: rgba(0,0,0,1);
  position: absolute;
  top: 705px;
  left: 99px;
  font-family: Inter;
  font-weight: Regular;
  font-size: 32px;
  opacity: 1;
  text-align: center;
}
.v3_36 {
  width: 98px;
  color: rgba(0,0,0,1);
  position: absolute;
  top: 826px;
  left: 99px;
  font-family: Inter;
  font-weight: Regular;
  font-size: 32px;
  opacity: 1;
  text-align: center;
}
.v3_37 {
  width: 140px;
  color: rgba(0,0,0,1);
  position: absolute;
  top: 947px;
  left: 78px;
  font-family: Inter;
  font-weight: Regular;
  font-size: 32px;
  opacity: 1;
  text-align: center;
}
.v3_38 {
  width: 198px;
  color: rgba(0,0,0,1);
  position: absolute;
  top: 1057px;
  left: 49px;
  font-family: Inter;
  font-weight: Regular;
  font-size: 32px;
  opacity: 1;
  text-align: center;
}
.v3_39 {
  width: 138px;
  color: rgba(0,0,0,1);
  position: absolute;
  top: 1207px;
  left: 79px;
  font-family: Inter;
  font-weight: Regular;
  font-size: 32px;
  opacity: 1;
  text-align: center;
}
.v4_1 {
  width: 1200px;
  color: rgba(0,0,0,1);
  position: absolute;
  top: 100px;
  left: 230px;
  font-family: Inter;
  font-weight: Regular;
  font-size: 32px;
  opacity: 1;
  text-align: left;
}
.v4_2 {
  width: 1200px;
  color: rgba(0,0,0,1);
  position: absolute;
  top: 221px;
  left: 230px;
  font-family: Inter;
  font-weight: Regular;
  font-size: 32px;
  opacity: 1;
  text-align: left;
}
.v4_3 {
  width: 1200px;
  color: rgba(0,0,0,1);
  position: absolute;
  top: 342px;
  left: 230px;
  font-family: Inter;
  font-weight: Regular;
  font-size: 32px;
  opacity: 1;
  text-align: left;
}
.v4_4 {
  width: 1200px;
  color: rgba(0,0,0,1);
  position: absolute;
  top: 463px;
  left: 230px;
  font-family: Inter;
  font-weight: Regular;
  font-size: 32px;
  opacity: 1;
  text-align: left;
}
.v4_5 {
  width: 1200px;
  color: rgba(0,0,0,1);
  position: absolute;
  top: 584px;
  left: 230px;
  font-family: Inter;
  font-weight: Regular;
  font-size: 32px;
  opacity: 1;
  text-align: left;
}
.v4_6 {
  width: 1200px;
  color: rgba(0,0,0,1);
  position: absolute;
  top: 705px;
  left: 230px;
  font-family: Inter;
  font-weight: Regular;
  font-size: 32px;
  opacity: 1;
  text-align: left;
}
.v4_7 {
  width: 1200px;
  color: rgba(0,0,0,1);
  position: absolute;
  top: 826px;
  left: 230px;
  font-family: Inter;
  font-weight: Regular;
  font-size: 32px;
  opacity: 1;
  text-align: left;
}
.v4_8 {
  width: 1200px;
  color: rgba(0,0,0,1);
  position: absolute;
  top: 947px;
  left: 230px;
  font-family: Inter;
  font-weight: Regular;
  font-size: 32px;
  opacity: 1;
  text-align: left;
}
.v4_9 {
  width: 1200px;
  color: rgba(0,0,0,1);
  position: absolute;
  top: 1082px;
  left: 230px;
  font-family: Inter;
  font-weight: Regular;
  font-size: 32px;
  opacity: 1;
  text-align: left;
}
.v4_10 {
  width: 1200px;
  color: rgba(0,0,0,1);
  position: absolute;
  top: 1207px;
  left: 230px;
  font-family: Inter;
  font-weight: Regular;
  font-size: 32px;
  opacity: 1;
  text-align: left;
}
</style>
