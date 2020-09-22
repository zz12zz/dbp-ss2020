<?php
    $link = mysqli_connect('localhost', 'root', 'rootroot', 'dbp_hw');

    $query = "SELECT * FROM professor";
    $result = mysqli_query($link, $query);
    $professor_info = '';
    while ($row = mysqli_fetch_array($result)) {
        $filtered = array(
            'id' => htmlspecialchars($row['id']),
            'name' => htmlspecialchars($row['name']),
            'room' => htmlspecialchars($row['room'])
        );
        $professor_info .= '<tr>';
        $professor_info .= '<td>'.$filtered['id'].'</td>';
        $professor_info .= '<td>'.$filtered['name'].'</td>';
        $professor_info .= '<td>'.$filtered['room'].'</td>';
        $professor_info .= '<td><a href="professor.php?id='.$filtered['id'].'">update</a></td>';
        $professor_info .= '<td>
            <form action="process_delete_professor.php" method="post">
                <input type="hidden" name="id" value="'.$filtered['id'].'">
                <input type="submit" value="delete">
            </form></td>
        ';
        $professor_info .= '</tr>';
    };

    $escaped = array(
        'name' => '',
        'room' => ''
    );

    $label_submit = 'Create professor';
    $form_action = 'process_create_professor.php';
    $form_id = '';

    if (isset($_GET['id'])) {
        $filtered_id = mysqli_real_escape_string($link, $_GET['id']);
        settype($filtered_id, 'integer');
        $query = "SELECT * FROM professor WHERE id = {$filtered_id}";
        $result = mysqli_query($link, $query);
        $row = mysqli_fetch_array($result);
        $escaped['name'] = htmlspecialchars($row['name']);
        $escaped['room'] = htmlspecialchars($row['room']);
        $label_submit = 'Update professor';
        $form_action = 'process_update_professor.php';
        $form_id = '<input type="hidden" name="id" value="'.$_GET['id'].'">';
    };
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>컴퓨터공학과</title>
    </head>
    <body>
        <h1><a href="index.php">컴퓨터공학과 수업</a></h1>
        <p><a href="index.php">수업목록</a></p>

        <table border="1">
            <tr>
                <th>id</th>
                <th>name</th>
                <th>room</th>
                <th>update</th>
                <th>delete</th>
            </tr>
            <?= $professor_info ?>
        </table>
        <br>
        <form action="<?=$form_action?>" method="post">
            <?=$form_id?>
            <label for="fname">name:</label><br>
            <input type="text" id="name" name="name" placeholder="name" value="<?=$escaped['name']?>"><br>
            <label for="lname">room:</label><br>
            <input type="text" id="room" name="room" placeholder="room" value="<?=$escaped['room']?>"><br><br>
            <input type="submit" value="<?=$label_submit?>">
        </form>
    </body>
</html>
