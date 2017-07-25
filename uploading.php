<?php header('Content-Type: text/html; charset=utf-8'); 
session_start();
 // указываем файл, с которым будем работать
$link = mysql_connect('localhost','root','');
mysql_select_db('aaa');
$query = "SELECT * FROM aaa.orders";
$result = mysql_query($query, $link) or die("Ошибка " . mysql_error($link)); 

$result1 = mysql_query("SELECT COUNT(1) FROM aaa.orders");
$count = mysql_fetch_array($result1);
//echo $count[0];

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
    <meta name = "robots" content = "noindex,nofollow" />
    <title>Выгрузка</title>
    <link rel="stylesheet/less" type="text/css" href="stylesheet/bootstrap.css">
    <link rel="stylesheet/less" type="text/css" href="stylesheet/style.css">
    <script src="https://cdn.jsdelivr.net/less/2.7.2/less.min.js"></script>
</head>
<body>
     <div class="page-wrap">
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
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>
    
    
    <div class="row ">
        <div class="col-lg-8 col-lg-offset-2">
            <div class="row">
               <div class="col-sm-4 col-sm-offset-2">
                  <nav class="navbar navbar-default">
                      <div class="form-group">
                       <div class="hidden"><? echo $flag;?></div>
                        <p class="navbar-text">Дата</p> <time id="Time" class="navbar-text pull-right">дата</time>
                      </div>
                  </nav>
                </div>
                <div class="col-sm-4">
                     <nav class="navbar navbar-default">
                      <div class="form-group">
                        <p class="navbar-text">Всего заявок</p> <p name="AllOrders" class="navbar-text pull-right"><?php echo $count[0]?></p>
                      </div>
                  </nav>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4 col-sm-offset-2">
                  <nav class="navbar navbar-default">
                      <div class="form-group">
                        <p name="OName" class="navbar-text">Имя оператора</p> <time class="navbar-text pull-right">И.И.Иванов</time>
                      </div>
                  </nav>
                </div>
                <div class="col-sm-4">
                     <nav class="navbar navbar-default">
                      <div class="form-group">
                        <p class="navbar-text">Кол-во новых заявок</p> <p name="NewOrders" class="navbar-text pull-right">число</p>
                      </div>
                  </nav>
                </div>
            </div>
			<form action="php/exportbetween.php" method="post">
             <div class="row">
              <div class="col-sm-8 col-sm-offset-2">
               <nav class=" navbar navbar-default">
                 <p class="load-nav-p navbar-text">выгрузка заявок </p>
                 
                 <p class="load-p-C navbar-text">С <input class="date" id="StartDate" name="StartDate" type="date" value="2012-06-01"></p>
                 
                 <p class="load-p-C navbar-text">До <input class="date" id="StopDate" name="StopDate" type="date" value="2012-06-01"></p>
                 
                 <form action="php/exportbetween.php">
                  <button type="submit" name="load" class="load-btn btn btn-default btn-xs center-block">Выгрузить</button>
                   </form>
                
               </nav>
              </div>
              </div>
               <div class="row">
                <div class="col-sm-4 col-sm-offset-2">
                <form action="php/export.php">
                 <button type="submit" name="LoadAll" class="load-btn-date btn btn-default btn-lg">Все</button>
                 </form>
                </div>
                <div class="col-sm-4">
                     <button type="submit" name="LoadNew" class="load-btn-new btn btn-default btn-lg pull-right">Выгрузить новые</button>
                </div>
            </div> 
             </form>
           </div>
		   <?php if (isset($_GET['exit'])) 
			{// если вызвали переменную "exit"
			unset($_SESSION['password']); // Чистим сессию пароля
			unset($_SESSION['login']); // Чистим сессию логина
			unset($_SESSION['id']); // Чистим сессию id
			} ?>

			<?php if (isset($_SESSION['id']) && isset($_SESSION['id'])) // если в сессии загружены логин и id
			{
			echo '<div align="center"><a href="index.php?exit">Выход</a></div>'; // Выводим нашу ссылку выхода
			} ?>		   
        </div>    
   
   
    
    <!--фуутер-->
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
    <script src="js/UpDate.js" type="text/javascript"></script>
   
</body>
</html>