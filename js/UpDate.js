var Data = new Date();
var Year = Data.getFullYear();
var Month = Data.getMonth();
var Day = Data.getDate();
 
// Преобразуем месяца
switch (Month)
{
  case 0: var fMonth="января"; break;
  case 1: var fMonth="февраля"; break;
  case 2: var fMonth="марта"; break;
  case 3: var fMonth="апреля"; break;
  case 4: var fMonth="мае"; break;
  case 5: var fMonth="июня"; break;
  case 6: var fMonth="июля"; break;
  case 7: var fMonth="августа"; break;
  case 8: var fMonth="сентября"; break;
  case 9: var fMonth="октября"; break;
  case 10:var  fMonth="ноября"; break;
  case 11:var  fMonth="декабря"; break;
}
 
// Вывод

$("time#Time").text(Day+" "+fMonth+" "+Year+" года");

$("input#StartDate").attr("value",Year+"-0"+Month+"-"+Day);
$("input#StopDate").attr("value",Year+"-0"+Month+"-"+Day);