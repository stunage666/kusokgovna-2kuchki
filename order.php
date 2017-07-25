<?php header('Content-Type: text/html; charset=utf-8'); 
session_start(); // Стартуем сессию
?>

<?php $connection = mysqli_connect('localhost', 'root', '', 'aaa') or die(mysqli_error()); // Соединение с базой данных ?> 

<?php if (isset($_POST['exit'])) // Отлавливаем нажатие на кнопку exit 
{
	
			unset($_SESSION['password']); // Чистим сессию пароля
			unset($_SESSION['login']); // Чистим сессию логина
			unset($_SESSION['id']); // Чистим сессию id
			unset($_SESSION['role']); // Чистим сессию роли
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
} 

 elseif ($_SESSION['role'] === "admin") {
 echo "<div id='Role' class='hidden'>1</div>";
}
elseif ($_SESSION['role'] === "Operator") {
 echo "<div id='Role' class='hidden'>2</div>";
}
?>
<!DOCTYPE html>


<html lang="en">
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
                                            <label class="sr-only" for="exampleInputEmail2">Почта</label>
                                            <input type="text" class="form-control" id="exampleInputEmail2" placeholder="Email address" name="login" >
                                        </div>
                                        <div class="form-group">
                                            <label class="sr-only" for="exampleInputPassword2">Пароль</label>
                                            <input type="password" class="form-control" id="exampleInputPassword2" placeholder="Пароль" name ="password">
                                            <div class="help-block text-right"><a href="forget.php">Забыли пароль?</a></div>
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
    
    <form action="php/forward.php" class="rf" method="post"> 
     <div class="row ">
        <div class="col-lg-8 col-lg-offset-2 col">
            <div class="container formm ordder">
                 <div class="input-group ordder ">
                         <span id="MobN" class="OrdForm input-group-addon">Контактное лицо*</span>
                             <input type="text" id="name" class="form-control rfield" name="Name"  placeholder="Ф.И.О.">
                             

                 </div>
                 <div class="input-group ordder">
                         <span id="MobNOrg" class="OrdForm input-group-addon">Название организации</span>
                             <input type="text"class="form-control" name="NameOrg" placeholder="ООО'Лол-кек'">
                 </div>
                 <div class="input-group ordder">
                         <span class="OrdForm input-group-addon">Город*</span>
                             <input type="text" class="form-control rfield" name="City" placeholder="Москва">
                 </div>
                 
                 <div class="input-group ordder">
                         <span class="OrdForm input-group-addon">колличество заявителей*</span>
                             <input type="text" id="quantity" class="form-control rfield" name="quantity" placeholder="10">
                 </div>
                
                  <div class="row">
    <div class="col-lg-6">
    <div class="panel panel-default ordder ">
  <!-- Default panel contents -->
        <div class="panel-heading tabl">Список заявителей</div>
  <!-- Table -->
   <div class="scroll-table-ord">
    <table class="table ">
        <tbody>
          <tr>
              <th>#</th>
              <th>Имя</th>
              <th>Фамилия</th>
              <th>Пол</th>
              <th>Скидка</th>
          </tr>
          <tr id="FormClient">
            <td id="number">1</td>
            <td><input type="text" id="ClearFormF" class="form-control rfield OrdMobile" name="FName1"  placeholder="Иван"></td>
            <td><input type="text" id="ClearFormL" class="form-control rfield OrdMobile" name="LName1"  placeholder="Иванов"></td>
            <td>
              <select class="form-contol rfield OrdMobile" id="Gen" name = "Gen1">
               <option>-</option>
               <option>мужской</option>
               <option>женский</option>
              </select>
              </td>
            <td>
            <select class="form-contol OrdMobile" id="Discount" name="Discount1">
               <option>-</option>
               <option>инвалид</option>
               <option>даун</option>
               <option>грант</option>
              </select>
              </td>
          </tr>
          <tr id="FormClient">
            <td id="number">2</td>
            <td><input type="text" id="ClearFormF" class="form-control rfield OrdMobile" name="FName2" placeholder="Иван"></td>
            <td><input type="text" id="ClearFormL" class="form-control rfield OrdMobile" name="LName2" placeholder="Иванов"></td>
            <td>
              <select class="form-contol rfield OrdMobile" id="Gen" name = "Gen2">
               <option>-</option>
               <option>мужской</option>
               <option>женский</option>
              </select>
              </td>
            <td>
            <select class="form-contol OrdMobile" id="Discount" name="Discount2">
               <option>-</option>
               <option>инвалид</option>
               <option>даун</option>
               <option>грант</option>
              </select>
              </td>
          </tr>
          <tr id="FormClient">
            <td id="number">3</td>
            <td><input type="text" id="ClearFormF" class="form-control rfield OrdMobile" name="FName3" placeholder="Иван"></td>
            <td><input type="text" id="ClearFormL" class="form-control rfield OrdMobile" name="LName3" placeholder="Иванов"></td>
            <td>
                <select class="form-contol rfield OrdMobile" id="Gen" name = "Gen3" placeholder="-">
               <option>-</option>
               <option>мужской</option>
               <option>женский</option>
              </select>
            </td>
            <td>
            <select class="form-contol OrdMobile" id="Discount" name = "Discount3">
               <option>-</option>
               <option>инвалид</option>
               <option>даун</option>
               <option>грант</option>
              </select>
              </td>
          </tr>
          
        </tbody>
      </table>
     </div>  
</div>
   </div>
</div>
               
                 <div class="input-group ordder">
                         <span class="OrdForm input-group-addon ">Телефон*</span>
                             <input type="text" class="form-control  rfield" name="Tel" placeholder="8(800)555-35-35">
                 </div>
                 <div class="input-group ordder">
                         <span class="OrdForm input-group-addon">комментарии</span>
                             <input type="text" class="form-control" name="Comment" placeholder="">
                 </div>
                 
                 
                <button type="submit" name="Send" id="but" class="send-btn btn btn-default btn-lg pull-right"> Отправить заявку</button>
                
                
                
                
                
                <p>С Вами свяжутся по указанному телефону с 09:00 до 17:30 по Московскому времени</p>
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
    
    <!--scripts-->
    <script src="js/hover_menu.js" type="text/javascript"></script>
    <script src="js/AddForm.js" type="text/javascript"></script>
    <script src="js/BlockBtn.js" type="text/javascript"></script>
    <script src="js/MobileOrder.js" type="text/javascript"></script>
    
    
</body>
</html>