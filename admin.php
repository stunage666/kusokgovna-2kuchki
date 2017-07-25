<?php header('Content-Type: text/html; charset=utf-8'); 
session_start(); // Стартуем сессию

$link = mysql_connect('localhost','root','');
mysql_select_db('aaa');
$query = "SELECT * FROM aaa.orders";
$result = mysql_query($query, $link) or die("Ошибка " . mysql_error($link)); 

$result1 = mysql_query("SELECT COUNT(1) FROM aaa.users");
$count = mysql_fetch_array($result1);

$num = $count[0];

if($_SESSION['userneed']==0)
{	for ($i = 1; $i <= $num; $i++)
	{
		$logn = 'login'.$i;
		unset($_SESSION[$logn]);
		$pasn = 'password'.$i;
		unset($_SESSION[$pasn]);
		$idn = 'id'.$i;
		unset($_SESSION[$idn]);
		$namn = 'name'.$i;
		unset($_SESSION[$namn]);
		$lnamn = 'lname'.$i;
		unset($_SESSION[$lnamn]);
		$mnamn = 'mname'.$i;
		unset($_SESSION[$mnamn]);
		$teln = 'tel'.$i;
		unset($_SESSION[$teln]);
		$orgn = 'org'.$i;
		unset($_SESSION[$orgn]);
		$roln = 'role'.$i;
		unset($_SESSION[$roln]);	
	}
}


?>
<!DOCTYPE html>


<html lang="ru">
<head>
     <script src="https://yastatic.net/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name = "author" content = "Grigory Zdanovich & Andrey Zaitsev"/>
    <meta name = "reply-to" content = "gic0@bk.ru" />
    <meta name = "site-created" content = "24.07.2017" />
    <meta name = "generator" content = "Bootstrap" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name = "description" content = "Краткое описание этой страницы." />
    <meta name = "keywords" content = "страница, описание" />
    <meta name = "robots" content = "noindex,nofollow" />
    <title>Выгрузка</title>
    <link rel="stylesheet/less" type="text/css" href="stylesheet/bootstrap.css">
    <link rel="stylesheet/less" type="text/css" href="stylesheet/style.css">
    <script src="https://cdn.jsdelivr.net/less/2.7.2/less.min.js"></script>
</head>
<body>
<div class="page-wrap">
    
    <!--меню-->
   <div class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">Project name</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li class="menuu"><a href="order.php">Заказать</a></li>
            <li class="menuu"><a href="uploading.php">Выгрузка</a></li>
            <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span><span class="caret"></span></a>
                    <ul id="login-dp" class="dropdown-menu">
                        <li>
                            <div class="row">
                                <div class="col-md-12">
								<?php if ($_SESSION['id'] != '')
								{	
									echo '<form class="form" role="form"  action="reg.php" method="post" id="login-nav">
                                        <div class="form-group">
                                            <label class="sr-only" for="exampleInputEmail2">Login</label>
                                           <div name="login" class="well well-sm">';
                                               echo $_SESSION['login'];
                                           echo'</div>
                                        </div>
                                        <div class="form-group">
                                            <label class="sr-only" for="exampleInputPassword2">Password</label>
                                           <div name="role" class="well well-sm">';
                                               echo $_SESSION['role'];
                                         echo'  </div>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" name="exit" class="btn btn-primary btn-block">Выйти</button>
                                        </div>
								</form>';
								}
									else
									{
										echo '<form class="form" role="form" action="index.php" method="post" id="login-nav">
                                        <div class="form-group">
                                            <label class="sr-only" for="exampleInputEmail2">Email address</label>
                                            <input type="text" class="form-control" id="exampleInputEmail2" placeholder="Email address" name="login" >
                                        </div>
                                        <div class="form-group">
                                            <label class="sr-only" for="exampleInputPassword2">Password</label>
                                            <input type="password" class="form-control" id="exampleInputPassword2" placeholder="Password" name ="password">
                                            <div class="help-block text-right"><a href="">Забыли Пароль?</a></div>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary btn-block" name="submit" >Войти</button>
                                        </div>
                                       <div class="bottom text-center">
                                          <a href="reg.php">
                                          <b>Регистрация</b>
                                          </a>
                                        </div>
                                    </form>';
									}
									?>
                                </div>
                            </div>
                        </li>
          </ul>
              </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>
    <form action="php/userloadname.php" class="rf" method="post"> 
    <div class="row ">
        <div class="col-lg-8 col-lg-offset-2">
            <div class="container formm ordder">
                
                 <div class="input-group ordder ">
                         <span class="input-group-addon AdmSpan">Поиск:</span>
                             <input type="text" id="name" class="form-control rfield" name="Search"  placeholder="Жанна">
                         <div class="input-group-btn">
        <button id="cerfr" type="button" class="btn btn-default dropdown-toggle " data-toggle="dropdown">Поиск По <span class="caret"></span></button>
        <ul class="dropdown-menu pull-right">
         <li>
          <form class="form" role="form" action="userloadname.php" method="post" id="login-nav">
                 <button type="submit" name="Search1" id="Sbtn" class="btn btn-default btn-xs pull-right">Поиск по имени</button> 
                 <button type="submit" name="Search2" id="Sbtn" class="btn btn-default btn-xs pull-right">Поиск по Фамилии</button> 
                <button type="submit" name="Search3" id="Sbtn" class="btn btn-default btn-xs pull-right">Поиск по Орг.</button> 
          </form>
         </li>
        </ul>
      </div><!-- /btn-group -->
                 </div>
                   
                  <div class="row">
    <div class="col-lg-12">
    <div class="panel panel-default ordder">
  <? if ($_SESSION['userneed']==1)
{
	$_SESSION['userneed']=0;
	echo '
	<!-- Default panel contents -->
	<div class="panel-heading tabl">Список заявителей</div>
  <!-- Table -->
  <div class="scroll-table">
    <table class="table">
        <tbody>
          <tr>
              <th>#ID</th>
              <th>Имя</th>
              <th>Фамилия</th>
              <th>Отчество</th>
              <th>телефон</th>
              <th>Название Орг.</th>
              <th>Логин</th>
              <th>Пароль</th>
              <th>Роль</th>
          </tr>';
		   for ($i = 1; $i <= $_SESSION['realnum']; $i++)
		  {	
			$logn = 'login'.$i;
			$pasn = 'password'.$i;
			$idn = 'id'.$i;
			$namn = 'name'.$i;
			$lnamn = 'lname'.$i;
			$mnamn = 'mname'.$i;
			$teln = 'tel'.$i;
			$orgn = 'org'.$i;
			$roln = 'role'.$i;	
			  echo '<tr id="FormClient">
            <td id="number">'.$_SESSION[$idn].'</td>
              <td><div id="ClearFormF" class="AdmPanel well" name="FName1">'.$_SESSION[$namn].'</div></td>
              <td><div id="ClearFormL" class="AdmPanel well" name="LName1">'.$_SESSION[$lnamn].'</div></td>
              <td><div id="ClearFormL" class="AdmPanel well" name="MName1">'.$_SESSION[$mnamn].'</div></td>
              <td><div id="ClearFormL" class="AdmPanel well" name="Tel1">'.$_SESSION[$teln].'</div></td>
              <td><div id="ClearFormL" class="AdmPanel well" name="NameOrg1">'.$_SESSION[$orgn].'</div></td>
              <td><div id="ClearFormL" class="AdmPanel well" name="Login1">'.$_SESSION[$logn].'</div></td>
              <td><div id="ClearFormL" class="AdmPanel well" name="Password1">'.$_SESSION[$pasn].'</div></td>
              <td><div id="ClearFormL" class="AdmPanel well" name="Role1">'.$_SESSION[$roln].'</div></td>
           </tr>';
		  }
		echo'          
        </tbody>
      </table>
</div>';
unset($_SESSION[$namn]);
}
?> 
   </div>
               
                <div class="input-group ordder ">
                         <span class="input-group-addon AdmSpan">Поиск по ID:</span>
                             <input type="text" id="name" class="form-control rfield" name="IDSer"  placeholder="12345">
                          <div class="input-group-btn">
                              <button class="btn btn-default" type="submit" Name = "IDSearch" >Искать</button>
                              
                          </div>       

                 </div>         
                  
  <? if ($_SESSION['send']==1)
  {
	  $_SESSION['send'] = 0;
  echo '    
    <div class="row">
	<div class="col-lg-12">
    <div class="panel panel-default ordder">
  <!-- Default panel contents -->
        <div class="panel-heading tabl">результат поиска для изменения</div>

  <!-- Table -->
  <div class="scroll-table OneSearch">
    <table class="table">
        <tbody>
          <tr>
              <th>#ID</th>
              <th>Имя</th>
              <th>Фамилия</th>
              <th>Отчество</th>
              <th>телефон</th>
              <th>Название Орг.</th>
              <th>Логин</th>
              <th>Пароль</th>
              <th>Роль</th>
          </tr>
          <tr id="FormClient">
            <td id="number">'.$_SESSION['serid'].'</td>
              <td><input type="text" id="ClearFormF" class="form-control AdmUpdate" name="FNamechange" value = "'.$_SESSION["sername"].'" placeholder="Иван"></td>
            <td><input type="text" id="ClearFormL" class="form-control AdmUpdate" name="LNamechange" value = "'.$_SESSION["serlname"].'" placeholder="Иванович"></td>
            <td><input type="text" id="ClearFormL" class="form-control AdmUpdate" name="MNamechange" value = "'.$_SESSION["sermname"].'" placeholder="Иванов"></td>
            <td><input type="text" id="ClearFormL" class="form-control AdmUpdate" name="Telchange" value = "'.$_SESSION["sertel"].'" placeholder="88005553535"></td>
            <td><input type="text" id="ClearFormL" class="form-control AdmUpdate" name="NameOrgchange" value = "'.$_SESSION["serorg"].'" placeholder="Организация"></td>
            <td><input type="text" id="ClearFormL" class="form-control AdmUpdate" name="Loginchange" value = "'.$_SESSION["serlogin"].'" placeholder="123@post.ru"></td>
            <td><input type="text" id="ClearFormL" class="form-control AdmUpdate" name="Passwordchange" value = "'.$_SESSION['serpass'].'" placeholder="******"></td>
            <td><input type="text" id="ClearFormL" class="form-control AdmUpdate" name="Rolechange"  value = "'.$_SESSION["serrole"].'"placeholder="user"></td>
        </tr>
        </tbody>
      </table>
</div>

     
     
      
   </div>
</div>

            </div>
            <div class="row">
          <button type="submit" name="Send" id="but" class="btn btn-default btn-lg pull-right"> Применить</button>  
          </div>
            ';}?>   
            </div>
        </div>
    </div>
    </div>
        </div>
        

    </form>
   
    
  
</div>

  
  
   <footer class="site-footer">
   <table width="100%">
    <td width="33%">
     <p class="foot-p">ООО "Беспроводные Технологии"</p>
    </td>
    <td width="33%">
     <p class=" text-center foot-p">2017</p>
    </td>
    <td width="33%">
     <p class="pull-right foot-p">8-800-555-35-35</p>
    </td>
 </table>
</footer>
    <!--scripts-->
    <script src="js/hover_menu.js" type="text/javascript"></script>
    
    
</body>
</html>