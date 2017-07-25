<?php

header('Content-Type: text/html; charset=utf-8');
header('Location: http://localhost/sait/order.php ');

if($_SERVER['REQUEST_METHOD'] == 'POST') {
	$name = $_POST['Name'];
	$nameorg = $_POST['NameOrg'];
	$city = $_POST['City'];
	$quantity = $_POST['quantity'];
	$phone = $_POST['Tel'];
	$comment = $_POST['Comment'];
	$date = date("Y-m-d");
	$time = date("h:i");
	echo $name."<br />".$nameorg."<br />".$city."<br />".$time."<br />";
} else { // дополнительно :)
	header("Location: ../index.php"); // можно использовать конструкцию header("Location: ...") для редиректа на страницу
}
$link = mysql_connect('localhost','root','');
mysql_select_db('aaa');
$query = "SELECT * FROM aaa.orders";
$result = mysql_query($query, $link) or die("Ошибка " . mysql_error($link)); 
if($result)
{
    echo "Good request";
}
$result2 = mysql_query("INSERT INTO aaa.orders(Date,Time,ContactName,CompanyName,Town,Quantity,Telephone,Comments) VALUES ('$date','$time','$name','$nameorg','$city','$quantity','$phone','$comment')");
if($result2) 
{
	echo "Complete update";
}
mysql_query($result2);

mysql_close('localhost','root','');

/*	*/

$link = mysql_connect('localhost','root','');
mysql_select_db('aaa');
$query = "SELECT * FROM aaa.clients";
$result = mysql_query($query, $link) or die("Ошибка " . mysql_error($link)); 
if($result)
{
    echo "Good request";
}

if($_SERVER['REQUEST_METHOD'] == 'POST') {
	$num = $_POST['quantity'];
$fname = array(); $lname = array(); $gen = array(); $dis = array();
//Запихиваем имена в массив с именами
for ($i = 1; $i <=$num; $i++)
	{
		$Fname = 'FName'.$i;
		$fname[$i]=$_POST[$Fname];
	}
//Запихиваем фамилии в массив с фамилиями
for ($i = 1; $i <=$num; $i++)
	{
		$Lname = 'LName'.$i;
		$lname[$i]=$_POST[$Lname];		
	}
//Запихиваем пол в массив с полами
for ($i = 1; $i <=$num; $i++)
	{
		$Gen = 'Gen'.$i;
		$gen[$i]=$_POST[$Gen];
	}
//Запихиваем скики в массив со скидками
for ($i = 1; $i <=$num; $i++)
	{
		$Dis = 'Discount'.$i;
		$dis[$i]=$_POST[$Dis];
	}

} 

for ($i = 1; $i <=$num; $i++)
{
$result = mysql_query("INSERT INTO aaa.clients(FirstName,LastName,Gender,Discount) VALUES ('$fname[$i]','$lname[$i]','$gen[$i]','$dis[$i]')");
mysql_query($result);
}
?>