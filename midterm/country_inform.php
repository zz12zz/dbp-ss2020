<?php
    $link = mysqli_connect('localhost', 'root', 'rootroot', 'midterm2');
    if (isset($_GET['name'])) {
        $cou_name = mysqli_real_escape_string($link, $_GET['name']);
    } else {
        $cou_name = mysqli_real_escape_string($link, $_POST['name']);
    }
    $query = "
    SELECT *
    FROM dictionary
    WHERE country = '{$cou_name}'
    ";

    $result = mysqli_query($link, $query);
    $name_info = '';
    while ($row = mysqli_fetch_array($result)) {
        $name_info .= '<tr>';
        $name_info .= '<td>'.$row['Country'].'</td>';
        $name_info .= '<td>'.$row['Code'].'</td>';
        $name_info .= '<td>'.$row['Population'].'</td>';
        $name_info .= '<td>'.$row['GDP per Capita'].'</td>';
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
    <h2><a href="main.php">메인</a> | 나라 정보 </h2>
    <table border="1">
        <tr>
            <th>나라</th>
            <th>code</th>
            <th>인구수</th>
            <th>수도의 GDP</th>
        </tr>
        <?=$name_info?>
    </table>
</body>

</html>
