<?php
    $link = mysqli_connect('localhost', 'root', 'rootroot', 'midterm2');
    if (isset($_GET['name'])) {
        $ath_name = mysqli_real_escape_string($link, $_GET['name']);
    } else {
        $ath_name = mysqli_real_escape_string($link, $_POST['name']);
    }
    $query = "
    SELECT distinct year,city,sport,event
    FROM summer
    WHERE athlete = '{$ath_name}'
    ";
    $result = mysqli_query($link, $query);
    $name_info = '';
    while ($row = mysqli_fetch_array($result)) {
        $name_info .= '<tr>';
        $name_info .= '<td>'.$row['year'].'</td>';
        $name_info .= '<td>'.$row['city'].'</td>';
        $name_info .= '<td>'.$row['sport'].'</td>';
        $name_info .= '<td>'.$row['event'].'</td>';
        $name_info .= '</tr>';
    }
    $query = "
    SELECT distinct year,city,sport,event
    FROM winter
    WHERE athlete = '{$ath_name}'
    ";
    $result = mysqli_query($link, $query);
    while ($row = mysqli_fetch_array($result)) {
        $name_info .= '<tr>';
        $name_info .= '<td>'.$row['year'].'</td>';
        $name_info .= '<td>'.$row['city'].'</td>';
        $name_info .= '<td>'.$row['sport'].'</td>';
        $name_info .= '<td>'.$row['event'].'</td>';
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
    <h2><a href="main.php">메인</a> | 선수별 올림픽 정보 조회 </h2>
    <table border="1">
        <tr>
            <th>실행년도</th>
            <th>개최지</th>
            <th>종목</th>
            <th>게임</th>
        </tr>
        <?=$name_info?>
    </table>
</body>

</html>
