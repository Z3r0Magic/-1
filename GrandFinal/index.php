<?php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'TOGU');

$conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

if ($conn->connect_errno) {
    exit('Ошибка при подключении к базе данных');
}

$conn->set_charset('utf8');

$sql = "SELECT Название_ф FROM ФАКУЛЬТЕТЫ";
$result_select = $conn->query($sql);
?>


<html>
<head>
</head>
<body>
<form action="porcess.php" method="GET">
    
    <?php
    // 1 
    $sql = "SELECT Название_ф FROM ФАКУЛЬТЕТЫ";
    $result_select = $conn->query($sql);
    echo "<font size='14' color='aqua '> Успеваемость </font>";
    echo "<br style='text-indent: 100px;'><font size='14' color='blue '>студентов</font>";
    echo "<br>Выбирите факультет ";
if (!$result_select) {
    echo "Запрос не выполнен.";
} else {
    echo "<select name='my_list'><option value=''>Выберите значение</option>";
    while ($object = $result_select->fetch_assoc()) {
        echo "<option value='" . $object['Название_ф'] . "'>" . $object['Название_ф'] . "</option>";
    }
    echo "</select>";
}


    // 2 
    $sql2 = "SELECT Id_назв_спец FROM Специальности";
    $result_select2 = $conn->query($sql2);

    echo "<br>Выбирите специальность ";
if (!$result_select2) {
    echo "Запрос не выполнен.";
} else {
    echo "<select name='my_list2'><option value=''>Выберите значение</option>";
    while ($object2 = $result_select2->fetch_assoc()) {
        echo "<option value='" . $object2['Id_назв_спец'] . "'>" . $object2['Id_назв_спец'] . "</option>";
    }
    echo "</select>";
}

// 3
$sql3 = "SELECT id_назв_г FROM Группы";
    $result_select3 = $conn->query($sql3);


echo "<br>Выбирите группу ";
if (!$result_select3) {
echo "Запрос не выполнен.";
} else {
echo "<select name='my_list3'><option value=''>Выберите значение</option>";
while ($object3 = $result_select3->fetch_assoc()) {
    echo "<option value='" . $object3['id_назв_г'] . "'>" . $object3['id_назв_г'] . "</option>";
}
echo "</select>";
}



$conn->close();
?>
<input type="submit" value="Submit">;
</form>
</body>
</html>
