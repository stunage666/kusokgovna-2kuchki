<?php header('Content-Type: text/html; charset=utf-8'); 
session_start();
?>


<?php $connection = mysqli_connect('localhost', 'root', '', 'aaa') or die(mysqli_error()); // Соединение с базой данных ?> 

<?php if (isset($_POST['exit'])) // Отлавливаем нажатие на кнопку exit 
{
	
			unset($_SESSION['password']); // Чистим сессию пароля
			unset($_SESSION['login']); // Чистим сессию логина
			unset($_SESSION['id']); // Чистим сессию id
			unset($_SESSION['role']); // Чистим сессию Роли
}
?>

<?php if (isset($_POST['submit'])) // Отлавливаем нажатие на кнопку отправить 
{
	if (empty($_POST['login']))  // Условие - если поле логин пустое
{
	echo "<script>alert('Поле логин не заполненно');</script>"; // Выводим сообщение об ошибке
}          
	elseif (empty($_POST['password'])) // Иначе если поле с паролем пустое
{
	echo "<script>alert('Поле логин не заполненно');</script>"; // Выводим сообщение об ошибке
}                      
	else // Иначе если поля не пустые
	{
		$fname =  $_POST['Name'];
		$lname =  $_POST['lname'];
		$mname =  $_POST['mname'];
		$login2 =  $_POST['login'];
		$tel =  $_POST['tel'];
		$nameorg =  $_POST['NameOrg'];
		$password2 = $_POST['password']; // Присваеваем другой переменной значение из поля с паролем
		$query = "INSERT INTO `users` (Name, Lname, Mname, Telephone, NameOrg, Login, Password) VALUES ('$fname','$lname','$mname','$tel','$nameorg','$login2', '$password2')"; // Создаем переменную с запросом к базе данных на отправку нового юзера
		$result = mysqli_query($connection, $query) or die(mysql_error()); // Отправляем переменную с запросом в базу данных 
		echo "<div align='center'>Регистрация прошла успешно!</div>"; // Сообщаем что все получилось
	}
} ?>

<!doctype html>
<html>
<head><script src="https://yastatic.net/jquery/3.1.1/jquery.min.js"></script>
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
    <meta name = "robots" content = "index,nofollow" />
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
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span> <span class="caret"></span></a>
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
                                            <input type="text" class="form-control" id="exampleInputEmail2" placeholder="Почта" name="login" >
                                        </div>
                                        <div class="form-group">
                                            <label class="sr-only" for="exampleInputPassword2">Password</label>
                                            <input type="password" class="form-control" id="exampleInputPassword2" placeholder="Пароль" name ="password">
                                            <div class="help-block text-right"><a href="forget.php">Забыли Пароль?</a></div>
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
    <form action="reg.php" class="rf" method="post"> 
    <div class="row ">
        <div class="col-lg-8 col-lg-offset-2">
            <div class="container formm ">
                <? echo $login ?>
                 <div class="input-group ordder ">
                         <span class="RegForm input-group-addon">Имя*</span>
                             <input type="text" id="fname" class="form-control rfield" name="Name"  placeholder="Иван">
                             

                 </div>
                 <div class="input-group ordder">
                         <span class="RegForm input-group-addon">Фамилия*</span>
                             <input type="text" class="rfield form-control" name="lname" placeholder="Иванов">
                 </div>
                 <div class="input-group ordder">
                         <span class="RegForm input-group-addon">Отчество*</span>
                             <input type="text" class="form-control rfield" name="mname" placeholder="Иванович">
                 </div>
                 
                 <div class="input-group ordder">
                         <span class="RegForm input-group-addon">Почтовый адрес*</span>
                             <input type="text" id="quantity" class="form-control rfield" name="login" placeholder="kek-cheburek@mail.ru">
                 </div>
                
                 
               
                 <div class="input-group ordder">
                         <span class="RegForm input-group-addon ">Телефон*</span>
                             <input type="text" class="form-control  rfield" name="tel" placeholder="8(800)555-35-35">
                 </div>
                 <div class="input-group ordder">
                         <span class="RegForm input-group-addon">Компания</span>
                             <input type="text" class="form-control" name="NameOrg" placeholder="ООО'Кек-чебурек'">
                 </div>
                 <div class="input-group ordder">
                         <span class="RegForm input-group-addon">Пароль*</span>
                             <input type="password" class="rfield form-control" name="password">
                 </div>
                 <div class="panel panel-default" id="panel">
                    <div class="panel-heading">Секретный вопрос:
                     <select class="input-group form-contol rfield OrdMobile  pull-right" name = "Question">
                      <option>1.Город где вы родились?</option>
                      <option>2.Девечья фамилия матери?</option>
                      <option>3.Ваша первая Машина?</option>
                      <option>4.Имя вашего дедушки?</option>
                     </select>
                 </div>
                    <input type="text" id="answer" class="form-control rfield" name="Answer"  placeholder="">
                </div>
                 
                 
                <button type="submit" name="submit" id="but" class="send-btn btn btn-default btn-lg pull-right"> Регистрация</button>
                <p>* Обязательное поле</p>
                
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
   
    <script src="js/hover_menu.js" type="text/javascript"></script>
    <script src="js/BlockBtn.js" type="text/javascript"></script>
   

</body>
</html>