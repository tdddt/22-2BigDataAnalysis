<?php
    session_start();
    $_SESSION['commentId'] = $_POST['commentId'];

    $mysqli = mysqli_connect("localhost","team09","team09","team09");
    if($mysqli==false){
        printf("Connect failed");
        exit();
    } else {

        echo "<script>
            if(confirm('댓글을 편집하시려면 (확인)을, 삭제하시려면 (취소)를 클릭해주세요.')){
                location.href='./cancercommentedit.html';
            }
            else {
                    if(confirm('정말 삭제하시겠습니까?')){
                        location.href='./cancercommentdelete.php';
                    }
                    else {
                        alert('댓글 삭제를 취소했습니다.');
                        location.href='./cancerinfo.html';
                    }
            }
        </script>";
    }
    mysqli_close($mysqli);
?>
