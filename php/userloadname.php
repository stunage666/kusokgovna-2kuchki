<?php header('Content-Type: text/html; charset=utf-8'); 
session_start(); // Стартуем сессию

$link = mysql_connect('localhost','root','');
mysql_select_db('aaa');
$query = "SELECT * FROM aaa.orders";
$result = mysql_query($query, $link) or die("Ошибка " . mysql_error($link)); 
if ($_SESSION['userneed']==0)
{
if($_SERVER['REQUEST_METHOD'] == 'POST') {
$search = $_POST['Search'];
}
echo $search;
$result1 = mysql_query("SELECT COUNT(1) FROM aaa.users");
$count = mysql_fetch_array($result1);

$num = $count[0];
$idx=array(); $namex=array(); $lnamex=array(); $mnamex=array(); $telx=array(); $nameorgx=array(); $loginx = array(); $pasx = array(); $rolex=array();
if( isset( $_POST['Search1'] ) )
{

	for ($i = 1; $i <= $num; $i++)//собираем логины
	{
		$query1 = ("SELECT Login FROM users WHERE UserID = $i AND Name = '$search'");
		$result = mysql_query($query1) or die($query1." ".mysql_error());
		$login = mysql_fetch_array($result);
		$loginx[$i] = $login[0];
	}
	for ($i = 1; $i <= $num; $i++)//собираем пароли
	{
		$query1 = ("SELECT Password FROM users WHERE UserID = $i AND Name = '$search'");
		$result = mysql_query($query1) or die($query1." ".mysql_error());
		$pas = mysql_fetch_array($result);
		$pasx[$i] = $pas[0];
	}
	for ($i = 1; $i <= $num; $i++)//собираем айди
	{
		$query1 = ("SELECT UserID FROM users WHERE UserID = $i AND Name = '$search'");
		$result = mysql_query($query1) or die($query1." ".mysql_error());
		$id = mysql_fetch_array($result);
		$idx[$i] = $id[0];
	}
	for ($i = 1; $i <= $num; $i++)//собираем имена
	{
		$query1 = ("SELECT Name FROM users WHERE UserID = $i AND Name = '$search'");
		$result = mysql_query($query1) or die($query1." ".mysql_error());
		$name = mysql_fetch_array($result);
		$namex[$i] = $name[0];
	}
	for ($i = 1; $i <= $num; $i++)
	{
		$query1 = ("SELECT Lname FROM users WHERE UserID = $i AND Name = '$search'");
		$result = mysql_query($query1) or die($query1." ".mysql_error());
		$lname = mysql_fetch_array($result);
		$lnamex[$i] = $lname[0];
	}
	for ($i = 1; $i <= $num; $i++)
	{
		$query1 = ("SELECT Mname FROM users WHERE UserID = $i AND Name = '$search'");
		$result = mysql_query($query1) or die($query1." ".mysql_error());
		$mname = mysql_fetch_array($result);
		$mnamex[$i] = $mname[0];
	}
	for ($i = 1; $i <= $num; $i++)
	{
		$query1 = ("SELECT Telephone FROM users WHERE UserID = $i AND Name = '$search'");
		$result = mysql_query($query1) or die($query1." ".mysql_error());
		$tel = mysql_fetch_array($result);
		$telx[$i] = $tel[0];
	}
	for ($i = 1; $i <= $num; $i++)
	{
		$query1 = ("SELECT NameOrg FROM users WHERE UserID = $i AND Name = '$search'");
		$result = mysql_query($query1) or die($query1." ".mysql_error());
		$nameorg = mysql_fetch_array($result);
		$nameorgx[$i] = $nameorg[0];
	}
	for ($i = 1; $i <= $num; $i++)
	{
		$query1 = ("SELECT Role FROM users WHERE UserID = $i AND Name = '$search'");
		$result = mysql_query($query1) or die($query1." ".mysql_error());
		$role = mysql_fetch_array($result);
		$rolex[$i] = $role[0];
	}
	
	for($i=1;$i<=$num;$i++)
	{
		if ($namex[$i]!='')
			$realnum++;
		$_SESSION['realnum']=$realnum;
	}
}
if( isset( $_POST['Search3'] ) )
{

	for ($i = 1; $i <= $num; $i++)//собираем логины
	{
		$query1 = ("SELECT Login FROM users WHERE UserID = $i AND NameOrg = '$search'");
		$result = mysql_query($query1) or die($query1." ".mysql_error());
		$login = mysql_fetch_array($result);
		$loginx[$i] = $login[0];
	}
	for ($i = 1; $i <= $num; $i++)//собираем пароли
	{
		$query1 = ("SELECT Password FROM users WHERE UserID = $i AND NameOrg = '$search'");
		$result = mysql_query($query1) or die($query1." ".mysql_error());
		$pas = mysql_fetch_array($result);
		$pasx[$i] = $pas[0];
	}
	for ($i = 1; $i <= $num; $i++)//собираем айди
	{
		$query1 = ("SELECT UserID FROM users WHERE UserID = $i AND NameOrg = '$search'");
		$result = mysql_query($query1) or die($query1." ".mysql_error());
		$id = mysql_fetch_array($result);
		$idx[$i] = $id[0];
	}
	for ($i = 1; $i <= $num; $i++)//собираем имена
	{
		$query1 = ("SELECT Name FROM users WHERE UserID = $i AND NameOrg = '$search'");
		$result = mysql_query($query1) or die($query1." ".mysql_error());
		$name = mysql_fetch_array($result);
		$namex[$i] = $name[0];
	}
	for ($i = 1; $i <= $num; $i++)
	{
		$query1 = ("SELECT Lname FROM users WHERE UserID = $i AND NameOrg = '$search'");
		$result = mysql_query($query1) or die($query1." ".mysql_error());
		$lname = mysql_fetch_array($result);
		$lnamex[$i] = $lname[0];
	}
	for ($i = 1; $i <= $num; $i++)
	{
		$query1 = ("SELECT Mname FROM users WHERE UserID = $i AND NameOrg = '$search'");
		$result = mysql_query($query1) or die($query1." ".mysql_error());
		$mname = mysql_fetch_array($result);
		$mnamex[$i] = $mname[0];
	}
	for ($i = 1; $i <= $num; $i++)
	{
		$query1 = ("SELECT Telephone FROM users WHERE UserID = $i AND NameOrg = '$search'");
		$result = mysql_query($query1) or die($query1." ".mysql_error());
		$tel = mysql_fetch_array($result);
		$telx[$i] = $tel[0];
	}
	for ($i = 1; $i <= $num; $i++)
	{
		$query1 = ("SELECT NameOrg FROM users WHERE UserID = $i AND NameOrg = '$search'");
		$result = mysql_query($query1) or die($query1." ".mysql_error());
		$nameorg = mysql_fetch_array($result);
		$nameorgx[$i] = $nameorg[0];
	}
	for ($i = 1; $i <= $num; $i++)
	{
		$query1 = ("SELECT Role FROM users WHERE UserID = $i AND NameOrg = '$search'");
		$result = mysql_query($query1) or die($query1." ".mysql_error());
		$role = mysql_fetch_array($result);
		$rolex[$i] = $role[0];
	}
	
	for($i=1;$i<=$num;$i++)
	{
		if ($nameorgx[$i]!='')
			$realnum++;
		$_SESSION['realnum']=$realnum;
	}
}
if( isset( $_POST['Search2'] ) )
{

	for ($i = 1; $i <= $num; $i++)//собираем логины
	{
		$query1 = ("SELECT Login FROM users WHERE UserID = $i AND Lname = '$search'");
		$result = mysql_query($query1) or die($query1." ".mysql_error());
		$login = mysql_fetch_array($result);
		$loginx[$i] = $login[0];
	}
	for ($i = 1; $i <= $num; $i++)//собираем пароли
	{
		$query1 = ("SELECT Password FROM users WHERE UserID = $i AND Lname = '$search'");
		$result = mysql_query($query1) or die($query1." ".mysql_error());
		$pas = mysql_fetch_array($result);
		$pasx[$i] = $pas[0];
	}
	for ($i = 1; $i <= $num; $i++)//собираем айди
	{
		$query1 = ("SELECT UserID FROM users WHERE UserID = $i AND Lname = '$search'");
		$result = mysql_query($query1) or die($query1." ".mysql_error());
		$id = mysql_fetch_array($result);
		$idx[$i] = $id[0];
	}
	for ($i = 1; $i <= $num; $i++)//собираем имена
	{
		$query1 = ("SELECT Name FROM users WHERE UserID = $i AND Lname = '$search'");
		$result = mysql_query($query1) or die($query1." ".mysql_error());
		$name = mysql_fetch_array($result);
		$namex[$i] = $name[0];
	}
	for ($i = 1; $i <= $num; $i++)
	{
		$query1 = ("SELECT Lname FROM users WHERE UserID = $i AND Lname = '$search'");
		$result = mysql_query($query1) or die($query1." ".mysql_error());
		$lname = mysql_fetch_array($result);
		$lnamex[$i] = $lname[0];
	}
	for ($i = 1; $i <= $num; $i++)
	{
		$query1 = ("SELECT Mname FROM users WHERE UserID = $i AND Lname = '$search'");
		$result = mysql_query($query1) or die($query1." ".mysql_error());
		$mname = mysql_fetch_array($result);
		$mnamex[$i] = $mname[0];
	}
	for ($i = 1; $i <= $num; $i++)
	{
		$query1 = ("SELECT Telephone FROM users WHERE UserID = $i AND Lname = '$search'");
		$result = mysql_query($query1) or die($query1." ".mysql_error());
		$tel = mysql_fetch_array($result);
		$telx[$i] = $tel[0];
	}
	for ($i = 1; $i <= $num; $i++)
	{
		$query1 = ("SELECT NameOrg FROM users WHERE UserID = $i AND Lname = '$search'");
		$result = mysql_query($query1) or die($query1." ".mysql_error());
		$nameorg = mysql_fetch_array($result);
		$nameorgx[$i] = $nameorg[0];
	}
	for ($i = 1; $i <= $num; $i++)
	{
		$query1 = ("SELECT Role FROM users WHERE UserID = $i AND Lname = '$search'");
		$result = mysql_query($query1) or die($query1." ".mysql_error());
		$role = mysql_fetch_array($result);
		$rolex[$i] = $role[0];
	}
	
	for($i=1;$i<=$num;$i++)
	{
		if ($lnamex[$i]!='')
			$realnum++;
		$_SESSION['realnum']=$realnum;
	}
}

	for ($i = 1; $i <= $num; $i++)
	{
		if ($idx[$i]!='')
		{
		$z++;
		$logn = 'login'.$z;
		$_SESSION[$logn] = $loginx[$i];
		$pasn = 'password'.$z;
		$_SESSION[$pasn] = $pasx[$i];
		$idn = 'id'.$z;
		$_SESSION[$idn] = $idx[$i];
		$namn = 'name'.$z;
		$_SESSION[$namn] = $namex[$i];
		$lnamn = 'lname'.$z;
		$_SESSION[$lnamn] = $lnamex[$i];
		$mnamn = 'mname'.$z;
		$_SESSION[$mnamn] = $mnamex[$i];
		$teln = 'tel'.$z;
		$_SESSION[$teln] = $telx[$i];
		$orgn = 'org'.$z;
		$_SESSION[$orgn] = $nameorgx[$i];
		$roln = 'role'.$z;
		$_SESSION[$roln] = $rolex[$i];
		}			
	
$_SESSION['userneed']=1;
	}
}

if( isset( $_POST['IDSearch'] ) )
{	$_SESSION['send'] = 1;
	$idsearch = $_POST['IDSer']; //по введёному id ищем нужного пользователя по айди
	//и собираем все данные в поисковые переменные
	//_______________________________________________________________________
	$query1 = ("SELECT Login FROM users WHERE UserID = '$idsearch'");
	$result = mysql_query($query1) or die($query1." ".mysql_error());
	$kek = mysql_fetch_array($result);
	$loginsearch = $kek[0];
	$query1 = ("SELECT Password FROM users WHERE UserID = '$idsearch'");
	$result = mysql_query($query1) or die($query1." ".mysql_error());
	$kek0 = mysql_fetch_array($result);
	$passwordsearch = $kek0[0];
	$query1 = ("SELECT UserID FROM users WHERE UserID = '$idsearch'");
	$result = mysql_query($query1) or die($query1." ".mysql_error());
	$kek1 = mysql_fetch_array($result);
	$idsearch = $kek1[0];
	$query1 = ("SELECT Name FROM users WHERE UserID = '$idsearch'");
	$result = mysql_query($query1) or die($query1." ".mysql_error());
	$kek2 = mysql_fetch_array($result);
	$namesearch = $kek2[0];
	$query1 = ("SELECT Lname FROM users WHERE UserID = '$idsearch'");
	$result = mysql_query($query1) or die($query1." ".mysql_error());
	$kek3 = mysql_fetch_array($result);
	$lnamesearch = $kek3[0];
	$query1 = ("SELECT Mname FROM users WHERE UserID = '$idsearch'");
	$result = mysql_query($query1) or die($query1." ".mysql_error());
	$kek4 = mysql_fetch_array($result);
	$mnamesearch = $kek4[0];
	$query1 = ("SELECT Telephone FROM users WHERE UserID = '$idsearch'");
	$result = mysql_query($query1) or die($query1." ".mysql_error());
	$kek5 = mysql_fetch_array($result);
	$telsearch = $kek5[0];
	$query1 = ("SELECT NameOrg FROM users WHERE UserID = '$idsearch'");
	$result = mysql_query($query1) or die($query1." ".mysql_error());
	$kek6 = mysql_fetch_array($result);
	$orgsearch = $kek6[0];
	$query1 = ("SELECT Role FROM users WHERE UserID = '$idsearch'");
	$result = mysql_query($query1) or die($query1." ".mysql_error());
	$kek7 = mysql_fetch_array($result);
	$rolesearch = $kek7[0];
	//_______________________________________________________________________
	 //затем закидываем эти переменные в данные сессии
	$_SESSION['serid']=$idsearch;
	$_SESSION['sername']=$namesearch;
	$_SESSION['serlname']=$lnamesearch;
	$_SESSION['sermname']=$mnamesearch;
	$_SESSION['sertel']=$telsearch;
	$_SESSION['serorg']=$orgsearch;
	$_SESSION['serlogin']=$loginsearch;
	$_SESSION['serpass']=$passwordsearch;
	$_SESSION['serrole']=$rolesearch;
}

if( isset( $_POST['Send'] ) )
{
	
	$inputid = $_SESSION['serid'];
	$input1 = $_POST['FNamechange'];
	$result1 = mysql_query("UPDATE users SET Name = '$input1' WHERE UserID = '$inputid'");
	$input2 = $_POST['LNamechange'];
	$result2 = mysql_query("UPDATE users SET Lname = '$input2' WHERE UserID = '$inputid'");
	$input3 = $_POST['MNamechange'];
	$result3 = mysql_query("UPDATE users SET Mname = '$input3' WHERE UserID = '$inputid'");
	$input4 = $_POST['Telchange'];
	$result4 = mysql_query("UPDATE users SET Telephone = '$input4' WHERE UserID = '$inputid'");
	$input5 = $_POST['NameOrgchange'];
	$result5 = mysql_query("UPDATE users SET NameOrg = '$input5' WHERE UserID = '$inputid'");
	$input6 = $_POST['Loginchange'];
	$result6 = mysql_query("UPDATE users SET Login = '$input6' WHERE UserID = '$inputid'");
	$input7 = $_POST['Passwordchange'];
	$result7 = mysql_query("UPDATE users SET Password = '$input7' WHERE UserID = '$inputid'");
	$input8 = $_POST['Rolechange'];
	$result8 = mysql_query("UPDATE users SET Role = '$input8' WHERE UserID = '$inputid'");
		
	mysql_query($result1);
	mysql_query($result2);
	mysql_query($result3);
	mysql_query($result4);
	mysql_query($result5);
	mysql_query($result6);
	mysql_query($result7);
	mysql_query($result8);
}
header('Location: http://localhost/sait/admin.php ');
/*and Name = '$search'*/
?>