<?php
    $link = mysqli_connect('localhost', 'root', 'rootroot', 'dbp_hw');

    $filtered = array(
        'name' => mysqli_real_escape_string($link, $_POST['name']),
        'room' => mysqli_real_escape_string($link, $_POST['room'])
    );
    $query = "
        INSERT INTO professor
            (name,room)
            VALUES(
                '{$filtered['name']}',
                '{$filtered['room']}'
            )
    ";

    $result = mysqli_query($link, $query);
    if ($result == false) {
        echo '저장하는 과정에서 문제가 생겼습니다. 관리자에게 문의해주세요';
        error_log(mysqli_error($link));
    } else {
        header('Location: professor.php');
    }
