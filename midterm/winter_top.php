<?php
    $link = mysqli_connect("localhost", "root", "rootroot", "midterm2");
    if (isset($_GET['number'])) {
        $filtered_num = mysqli_real_escape_string($link, $_GET['number']);
    } else {
        $filtered_num = mysqli_real_escape_string($link, $_POST['number']);
    }


    $query = "
      select athlete, count(*) from winter group by athlete order by count(*) desc limit {$filtered_num}
      ";



    $result = mysqli_query($link, $query);
    $name_info = '';
    while ($row = mysqli_fetch_array($result)) {
        $name_info .= '<tr>';
        $name_info .= '<td>'.$row['athlete'].'</td>';
        $name_info .= '<td>'.$row['count(*)'].'</td>';
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
    <h2><a href="main.php">메인</a> | 동계 메달 TOP </h2>
    <table border="1">
        <tr>
            <th>이름</th>
            <th>메달 총 개수</th>
            <th>올림픽 정보 조회</th>
        </tr>
        <?=$name_info?>
    </table>
</body>

</html>
