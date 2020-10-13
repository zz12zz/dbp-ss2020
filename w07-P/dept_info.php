<?php
    $link = mysqli_connect('localhost','admin','admin','employees');
    if(mysqli_connect_errno()){
        echo "MariaDB 접속에 실패했습니다. 관리자에게 문의하세요.";
        echo "<br>";
        echo mysqli_connect_error();
        exit();
    }


    $query = "
        SELECT d.dept_name, e.first_name, e.last_name
        FROM departments d
        inner JOIN dept_manager m on m.dept_no=d.dept_no
        inner join employees e on e.emp_no = m.emp_no
    ";

    $article = '';
    $result = mysqli_query($link, $query);
    while($row = mysqli_fetch_array($result)){
        $article .= '<tr><td>';
        $article .= $row['dept_name'];
        $article .= '</td><td>';
        $article .= $row['first_name'];
        $article .= '</td><td>';
        $article .= $row['last_name'];
        $article .= '</td><td>';

        $article .= '</tr></td>';
    }

    mysqli_free_result($result);
    mysqli_close($link);
?>

<DOCTYPE html>
<html>
<head>
    <meta charset ="utf-8">
    <title> 부서 정보 </title>
    <style>
        body{
            font-family : Consolas, monospace;
            font-family : 12px;
        }
        table{
            width: 100%;
        }
        th,td{
            padding : 10px;
            border-bottom: 1px solid #dadada;
        }
    </style>
</head>
<body>
        <h2><a href="index.php">직원 관리 시스템</a> | 부서 정보</h2>
        <table>
            <tr>
                <th>부서명</th>
                <th>매니저 이름</th>
                <th>매니저 성</th>
            </tr>
            <?= $article ?>
        </table>
</body>


</html>