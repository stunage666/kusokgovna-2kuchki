<?php header('Content-Type: text/html; charset=utf-8'); 
session_start(); // Стартуем сессию

$link = mysql_connect('localhost','root','');
mysql_select_db('aaa');
$query = "SELECT * FROM aaa.orders";
$result = mysql_query($query, $link) or die("Ошибка " . mysql_error($link)); 

$result1 = mysql_query("SELECT COUNT(1) FROM aaa.users");
$count = mysql_fetch_array($result1);

$num = $count[0];
$idx=array(); $namex=array(); $lnamex=array(); $mnamex=array(); $telx=array(); $nameorgx=array(); $loginx = array(); $pasx = array(); $rolex=array();

	for ($i = 1; $i <= $num; $i++)//собираем логины
	{
		$query1 = ("SELECT Login FROM users WHERE UserID = $i");
		$result = mysql_query($query1) or die($query1." ".mysql_error());
		$login = mysql_fetch_array($result);
		$loginx[$i] = $login[0];
	}
	for ($i = 1; $i <= $num; $i++)//собираем пароли
	{
		$query1 = ("SELECT Password FROM users WHERE UserID = $i");
		$result = mysql_query($query1) or die($query1." ".mysql_error());
		$pas = mysql_fetch_array($result);
		$pasx[$i] = $pas[0];
	}
	for ($i = 1; $i <= $num; $i++)//собираем айди
	{
		$query1 = ("SELECT UserID FROM users WHERE UserID = $i");
		$result = mysql_query($query1) or die($query1." ".mysql_error());
		$id = mysql_fetch_array($result);
		$idx[$i] = $id[0];
	}
	for ($i = 1; $i <= $num; $i++)//собираем имена
	{
		$query1 = ("SELECT Name FROM users WHERE UserID = $i");
		$result = mysql_query($query1) or die($query1." ".mysql_error());
		$name = mysql_fetch_array($result);
		$namex[$i] = $name[0];
	}
	for ($i = 1; $i <= $num; $i++)
	{
		$query1 = ("SELECT Lname FROM users WHERE UserID = $i");
		$result = mysql_query($query1) or die($query1." ".mysql_error());
		$lname = mysql_fetch_array($result);
		$lnamex[$i] = $lname[0];
	}
	for ($i = 1; $i <= $num; $i++)
	{
		$query1 = ("SELECT Mname FROM users WHERE UserID = $i");
		$result = mysql_query($query1) or die($query1." ".mysql_error());
		$mname = mysql_fetch_array($result);
		$mnamex[$i] = $mname[0];
	}
	for ($i = 1; $i <= $num; $i++)
	{
		$query1 = ("SELECT Telephone FROM users WHERE UserID = $i");
		$result = mysql_query($query1) or die($query1." ".mysql_error());
		$tel = mysql_fetch_array($result);
		$telx[$i] = $tel[0];
	}
	for ($i = 1; $i <= $num; $i++)
	{
		$query1 = ("SELECT NameOrg FROM users WHERE UserID = $i");
		$result = mysql_query($query1) or die($query1." ".mysql_error());
		$nameorg = mysql_fetch_array($result);
		$nameorgx[$i] = $nameorg[0];
	}
	for ($i = 1; $i <= $num; $i++)
	{
		$query1 = ("SELECT Role FROM users WHERE UserID = $i");
		$result = mysql_query($query1) or die($query1." ".mysql_error());
		$role = mysql_fetch_array($result);
		$rolex[$i] = $role[0];
	}
	
	for ($i = 1; $i <= $num; $i++)
	{
		$logn = 'login'.$i;
		$_SESSION[$logn] = $loginx[$i];
		$pasn = 'password'.$i;
		$_SESSION[$pasn] = $pasx[$i];
		$idn = 'id'.$i;
		$_SESSION[$idn] = $idx[$i];
		$namn = 'name'.$i;
		$_SESSION[$namn] = $namex[$i];
		$lnamn = 'lname'.$i;
		$_SESSION[$lnamn] = $lnamex[$i];
		$mnamn = 'mname'.$i;
		$_SESSION[$mnamn] = $mnamex[$i];
		$teln = 'tel'.$i;
		$_SESSION[$teln] = $telx[$i];
		$orgn = 'org'.$i;
		$_SESSION[$orgn] = $nameorgx[$i];
		$roln = 'role'.$i;
		$_SESSION[$roln] = $rolex[$i];	
	}
$_SESSION['userneed']=1;
header('Location: http://localhost/sait/admin.php ');
?>