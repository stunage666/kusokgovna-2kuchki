$("#quantity").change(function() {
    
    var x = $("#quantity").val();
    var i;
    var g =$("tr#FormClient").length;
    var y=g;
      
   
     if (g>x) {
         while (g>x){
             if (g==1) break;
            $("tr#FormClient:last").remove();
            g--;
         }
     } else {
          for (i=0;i<(x-g);i++){
              if (y==60) break;
           $("#FormClient").clone(true).appendTo('tbody');
              y++;
           $("td#number:last").text(y);
              $("input#ClearFormF:last").val("");
              $("input#ClearFormL:last").val("");
                $("input#ClearFormF:last").attr("name","FName"+y);
                $("input#ClearFormL:last").attr("name","LName"+y);
                  $("select#Gen:last").attr("name","Gen"+y);
                  $("select#Discount:last").attr("name","Discount"+y);
              

          }
       }
});
