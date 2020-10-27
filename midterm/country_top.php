<?php
    $link = mysqli_connect("localhost", "root", "rootroot", "midterm2");
    $filtered = array(
        'season' => mysqli_real_escape_string($link, $_POST['season']),
        'medal' => mysqli_real_escape_string($link, $_POST['medal']),
        'number' => mysqli_real_escape_string($link, $_POST['number'])
    );


    $query = "SELECT d.country,count(*)
        FROM dictionary d
        inner JOIN {$filtered['season']} s on d.code = s.country
        where s.medal = '{$filtered['medal']}'
        group by d.country
        order by count(*) desc
        limit {$filtered['number']}
        ";


    $result = mysqli_query($link, $query);
    if (!$result) {
        printf("Error: %s\n", mysqli_error($link));
        exit();
    }


    $medal_info = '';
    while ($row = mysqli_fetch_array($result)) {
        $medal_info .= '<tr>';
        $medal_info .= '<td>'.$row['country'].'</td>';
        $medal_info .= '<td>'.$row['count(*)'].'</td>';
        $medal_info .= '<td><a href="country_inform.php?name='.$row['country'].'">나라 정보 조회</a></td>';
        $medal_info .= '</tr>';
    }


?>

<!DOCTYPE html>
<html>

<head>
    <meta charser-"uft-8">
    <title> 올림픽 데이터 분석 </title>
</head>

<body>
    <h2><a href="main.php">메인</a> | 메달 획득 나라 TOP</h2>
    <table border="1">
        <tr>
            <th>나라</th>
            <th>메달 총 개수</th>
            <th>정보 조회</th>
        </tr>
        <?=$medal_info?>
    </table>
</body>

</html>
