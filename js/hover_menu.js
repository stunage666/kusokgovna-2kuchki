$ ("li.menuu").hover(
  function() {
      $(this).addClass("active"); 
  }, function() {
      $(this).removeClass("active");
  }
);
