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


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Восстановление Пароля</title>
 <link rel="stylesheet/less" type="text/css" href="stylesheet/bootstrap.css">
    <link rel="stylesheet/less" type="text/css" href="stylesheet/style.css">
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
    <form action="php/remember.php" class="rf" method="post"> 
    <div class="row ">
        <div class="col-lg-8 col-lg-offset-2">
            <div class="container formm ">
                <? if ($_SESSION['check']==0)
				{echo '
                
                <div class="panel panel-default">
                    <div class="panel-heading">Введите почтовый ящик</div>
                  <div class="panel-body answer">
                   <div class="input-group">
                             <input type="text" id="answer" class="form-control rfield" name="userlogin"  placeholder="kek-cheburek@bk.ru">
                          <div class="input-group-btn">
                              <button class="btn btn-default" type="submit" name="logincheck">отправить</button>
                          </div>
                 </div>   
            </div>
           </div>';
				}?>
		   <?if ($_SESSION['check']==1)
		   {
                echo'
                 <div class="panel panel-default">
                    <div class="panel-heading">ответьте на секретный вопрос:<br />'.$_SESSION['question'].'
					</div>
                  <div class="panel-body answer">
                   <div class="input-group">
                             <input type="text" id="answer" class="form-control rfield" name="answer"  placeholder="ответ">
                          <div class="input-group-btn">
                              <button class="btn btn-default" type="submit" name = "answercheck">отправить</button>
                          </div>
                 </div>   
            </div>
           </div>
                
                   <div class="panel panel-default">
                     <div class="panel-heading">Ваш пароль:</div>
                       <div class="panel-body">
                        <p>'.$_SESSION['pass'].'</p>
                       </div>
           </div>
             <button class="btn btn-default" type="submit" name = "ok">Я запомнил свой пароль</button>';
			}?>

                
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

<script src="https://cdn.jsdelivr.net/less/2.7.2/less.min.js"></script>
    <script src="https://yastatic.net/jquery/3.1.1/jquery.min.js"></script>
    <script src="js/hover_menu.js" type="text/javascript"></script>
   <!-- <script src="js/bootstrap.js" type="text/javascript"></script>-->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</body>
</html>