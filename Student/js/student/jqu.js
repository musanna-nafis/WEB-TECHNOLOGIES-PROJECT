$(document).ready(function(){
    $("#hide").click(function(){
      $("tr").hide(1000);
    });

    $(document).ready(function(){
      $("#out").click(function(){
        $("body").removeClass("important");
      
      });
    });
    $("#show").click(function(){
      $("tr").show(1000);
    });
  });
  $(document).ready(function(){
    $("#flip").click(function(){
      $("#panel").slideToggle("slow");
    });
  });
  $(document).ready(function(){
    $("#in").click(function(){
      $("body").addClass("important");
    
    });
  });


