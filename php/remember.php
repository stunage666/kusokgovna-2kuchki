<?php header('Content-Type: text/html; charset=utf-8'); 
session_start();

$link = mysql_connect('localhost','root','');
mysql_select_db('aaa');
$query = "SELECT * FROM aaa.orders";
$result = mysql_query($query, $link) or die("Ошибка " . mysql_error($link)); 

$result1 = mysql_query("SELECT COUNT(1) FROM aaa.users");
$count = mysql_fetch_array($result1);



if( isset( $_POST['logincheck'] ) )
{
	$userlogin = $_SESSION['userlogin'];
	$_SESSION['userlogin'] = $_POST['userlogin'];
	$query = ("SELECT * FROM users WHERE Login = '$userlogin'");
	$result = mysql_query($query) or die($query1." ".mysql_error());
	if($result)
	{
		$_SESSION['check']=1;
		$query1 = mysql_query("SELECT Question FROM users WHERE Login = '$userlogin'");
		$que = mysql_fetch_array($query1);
		$_SESSION['question'] = $que[0];		
	}
}
echo $_SESSION['userlogin'];
if (isset ($_POST['answercheck']))
{
	$userlogin = $_SESSION['userlogin'];
	$query2 = mysql_query("SELECT Answer FROM users WHERE Login = '$userlogin'");
	$ans = mysql_fetch_array($query2);
	if ($ans[0]==$_POST['answer'])
	{
		$query3 = mysql_query("SELECT Password FROM users WHERE Login = '$userlogin'");
		$pass = mysql_fetch_array($query3);
		$_SESSION['pass'] = $pass[0];
		//unset($_SESSION['check']);
	}
echo $pass[0];	
}
if (isset ($_POST['ok']))
{
	$_SESSION['check']=0;
	unset($_SESSION['question']);
	unset($_SESSION['answer']);
	unset($_SESSION['pass']);
}
header('Location: http://localhost/sait/forget.php ');	
?>