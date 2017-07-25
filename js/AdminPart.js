var check = $("div#Role").text();
var a;
var b;

if (check == 1) {
    $("div.AdmPic").removeClass("hidden");
}

$("button#AdmBtn").click(function () {
      a = $(".hrefPic").val();
      b = $(".srcPic").val();
    $("img#advertising").attr("src",b);
    $("a#advertising").attr("href",a);
})