<?php
    $link = mysqli_connect("localhost", "root", "rootroot", "midterm2");

    $query = "
      select distinct s.athlete
      from summer s,winter w
      where s.athlete = w.athlete
      ";



    $result = mysqli_query($link, $query);
    $name_info = '';
    while ($row = mysqli_fetch_array($result)) {
        $name_info .= '<tr>';
        $name_info .= '<td>'.$row['athlete'].'</td>';
        $name_info .= '<td><a href="athlete_inform.php?name='.$row['athlete'].'">조회하기</a></td>';
        $name_info .= '</tr>';
    }


?>

<!DOCTYPE html>
<html>

<head>
    <meta charser-"uft-8">
    <title> 올림픽 데이터 분석 </title>
</head>

<body>
    <h2><a href="main.php">메인</a> | 하계 메달 TOP </h2>
    <table border="1">
        <tr>
            <th>이름</th>
            <th>올림픽 이름 조회</th>
        </tr>
        <?=$name_info?>
    </table>
</body>

</html>
