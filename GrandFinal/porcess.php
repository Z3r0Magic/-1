
<?php


$conn = mysqli_connect("localhost", "root", "", "TOGU");

    $idFakul = $_POST['my_list']; 
   
    $ifSpec = $_POST['my_list2']; 
    
    $IdGrup = $_POST['my_list3']; 


$sql = "SELECT `Оценки`.`id_ФИО`, `ФАКУЛЬТЕТЫ`.`Название_ф`, `Группы`.`id_назв_г`, `Оценки`.`Id_оценка`, `Дисциплины`.`id_назв_д`,`Специальности`.`Id_назв_спец`
FROM `Оценки`
LEFT JOIN `ФАКУЛЬТЕТЫ` ON `Оценки`.`id_факультета` = `ФАКУЛЬТЕТЫ`.`id_факультета`
LEFT JOIN `Группы` ON `Оценки`.`id_группы` = `Группы`.`id_группы`
LEFT JOIN `Дисциплины` ON `Оценки`.`Id_Дисциплины` = `Дисциплины`.`Id_Дисцп`
LEFT JOIN `Специальности` ON `Оценки`.`Id_спец` = `Специальности`.`Id_спец`
WHERE `ФАКУЛЬТЕТЫ`.`Название_ф` = '{$idFakul}' and `Специальности`.`Id_назв_спец` = '{$ifSpec}' and `Группы`.`id_назв_г`     = '{$IdGrup}';";

$result = mysqli_query($conn, $sql);


if ($result->num_rows > 0) {
 echo "<table>";
 echo "<tr>";
 foreach ($result->fetch_fields() as $field) {
 echo "<th>". $field->name. "</th>";
 }
 echo "</tr>";
 while ($row = $result->fetch_assoc()) {
 echo "<tr>";
 foreach ($row as $value) {
 echo "<td>". $value. "</td>";
 }
 echo "</tr>";
 }
 echo "</table>";
} else {
 echo "0 результатов";
}


mysqli_close($conn);
?>