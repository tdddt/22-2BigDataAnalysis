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
  <h1 style="text-align: center;">암 환자 정보 확인</h1>
  <div style="text-align: center;" ><a href="cancerpatientinfo.html" class="buttonReverse" style="text-align: center;">뒤로가기</a></div>
  <div class="v1_5">
  <div class="v2_21"></div>
  <div class="v2_20"></div>
  <div class="v2_19"></div>
  <div class="v2_18"></div>
  <div class="v2_17"></div>
  <div class="v2_16"></div>
  <div class="v2_14"></div>
  <span class="v3_29">평균 나이</span>
  <span class="v3_30">음주 여부</span>
  <span class="v3_31">흡연 여부</span>
  <span class="v3_32">평균 키</span>
  <span class="v3_33">평균 체중</span>
  <span class="v3_34">사망 여부</span>
  <span class="v3_36">평균 진단<br>후 생존일</span>

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

      $sql1 = "select avg(age) as avgage from patient where cancertype = '$name'";
      $res1 = mysqli_query($mysqli, $sql1);
      while($row = mysqli_fetch_array($res1, MYSQLI_ASSOC))
      {
        echo '<span class = "v4_1">'.$row['avgage'].'</span>';
      }

      $sql2 = "select avg(drink) as avgdrink from patient where cancertype = '$name'";
      $res2 = mysqli_query($mysqli, $sql2);
      while($row = mysqli_fetch_array($res2, MYSQLI_ASSOC))
      {
        echo '<span class = "v4_2">'.$row['avgdrink'].'</span>';
      }

      $sql3 = "select avg(smoke) as avgsmoke from patient where cancertype = '$name'";
      $res3 = mysqli_query($mysqli, $sql3);
      while($row = mysqli_fetch_array($res3, MYSQLI_ASSOC))
      {
        echo '<span class = "v4_3">'.$row['avgsmoke'].'</span>';
      }

      $sql4 = "select avg(height) as avgheight from patient where cancertype = '$name'";
      $res4 = mysqli_query($mysqli, $sql4);
      while($row = mysqli_fetch_array($res4, MYSQLI_ASSOC))
      {
        echo '<span class = "v4_4">'.$row['avgheight'].'</span>';
      }

      $sql5 = "select avg(Pweight) as avgweight from patient where cancertype = '$name'";
      $res5 = mysqli_query($mysqli, $sql5);
      while($row = mysqli_fetch_array($res5, MYSQLI_ASSOC))
      {
        echo '<span class = "v4_5">'.$row['avgweight'].'</span>';
      }

      $sql6 = "select avg(death) as avgdeath from patient where cancertype = '$name'";
      $res6 = mysqli_query($mysqli, $sql6);
      while($row = mysqli_fetch_array($res6, MYSQLI_ASSOC))
      {
        echo '<span class = "v4_6">'.$row['avgdeath'].'</span>';
      }

      $sql7 = "select avg(survivaldays) as avgsurvival from patient where cancertype = '$name'";
      $res7 = mysqli_query($mysqli, $sql7);
      while($row = mysqli_fetch_array($res7, MYSQLI_ASSOC))
      {
        echo '<span class = "v4_7">'.$row['avgsurvival'].'</span>';
      }
  }
  mysqli_free_result($res1);
  mysqli_free_result($res2);
  mysqli_free_result($res3);
  mysqli_free_result($res4);
  mysqli_free_result($res5);
  mysqli_free_result($res6);
  mysqli_free_result($res7);
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
  .v2_21 {
    width: 142px;
    height: 90px;
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
    width: 181px;
    color: rgba(0,0,0,1);
    position: absolute;
    top: 100px;
    left: 58px;
    font-family: Inter;
    font-weight: Regular;
    font-size: 32px;
    opacity: 1;
    text-align: center;
  }
  .v3_30 {
    width: 181px;
    color: rgba(0,0,0,1);
    position: absolute;
    top: 221px;
    left: 58px;
    font-family: Inter;
    font-weight: Regular;
    font-size: 32px;
    opacity: 1;
    text-align: center;
  }
  .v3_31 {
    width: 181px;
    color: rgba(0,0,0,1);
    position: absolute;
    top: 342px;
    left: 58px;
    font-family: Inter;
    font-weight: Regular;
    font-size: 32px;
    opacity: 1;
    text-align: center;
  }
  .v3_32 {
    width: 181px;
    color: rgba(0,0,0,1);
    position: absolute;
    top: 463px;
    left: 58px;
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
    width: 181px;
    color: rgba(0,0,0,1);
    position: absolute;
    top: 705px;
    left: 58px;
    font-family: Inter;
    font-weight: Regular;
    font-size: 32px;
    opacity: 1;
    text-align: center;
  }
  .v3_36 {
    width: 181px;
    color: rgba(0,0,0,1);
    position: absolute;
    top: 816px;
    left: 58px;
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
  </style>
