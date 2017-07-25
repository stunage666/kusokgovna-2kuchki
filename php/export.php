<?php
//header('Content-Type: text/html; charset=utf8 without bom');
 // указываем файл, с которым будем работать
$link = mysql_connect('localhost','root','');
mysql_select_db('aaa');
$query = "SELECT * FROM aaa.orders";
$result = mysql_query($query, $link) or die("Ошибка " . mysql_error($link)); 


mysql_query ("SET NAMES cp1251");

$csv_file = '';//переменная со строками
$query = "SELECT OrderID, Date, ContactName FROM aaa.orders";
$result = mysql_query($query);
if ($result)
{
   while ($row = mysql_fetch_assoc($result))
   {
      $csv_file .= '"'.$row["OrderID"].'","'.$row["Date"].'","'.$row["ContactName"].'"'."\r\n";
      // в качестве начала и конца полей я указал " (двойные кавычки)
      // в качестве разделителей полей я указал , (запятая)
      // \r\n - это перенос строки
   }
}

$file_name = 'export.csv'; // название файла
$file = fopen($file_name,"w"); // открываем файл для записи, если его нет, то создаем его в текущей папке, где расположен скрипт
fwrite($file,trim($csv_file)); // записываем в файл строки
fclose($file); // закрываем файл

header('Content-type: application/csv'); // указываем, что это csv документ
header("Content-Disposition: inline; filename=".$file_name);
// задаем заголовки. то есть задаем всплывающее окошко, которое позволяет нам сохранить файл.

readfile($file_name); // считываем файл
unlink($file_name); // удаляем файл. то есть когда вы сохраните файл на локальном компе, то после он удалится с сервера
?>