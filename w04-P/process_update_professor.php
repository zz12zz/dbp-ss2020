<?php
  $link = mysqli_connect("localhost", "root", "rootroot", "dbp_hw");
  $filtered = array(
    'id' => mysqli_real_escape_string($link, $_POST['id']),
    'name' => mysqli_real_escape_string($link, $_POST['name']),
    'room' => mysqli_real_escape_string($link, $_POST['room'])
  );

  $query = "
    UPDATE professor
      SET
        name='{$filtered['name']}',
        room = '{$filtered['room']}'
      WHERE
        id = '{$filtered['id']}'
  ";

  $result = mysqli_query($link, $query);
  if ($result==false) {
      echo '수정하는 과정에서 문제가 발생했습니다. 관리자에게 문의하세요.';
      error_log(mysql_error($link));
  } else {
      header('Location: professor.php');
  }
