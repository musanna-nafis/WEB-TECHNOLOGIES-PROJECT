$(document).ready(function(){
    $("#hide").click(function(){
      $("table").hide();
    });
    $("#show").click(function(){
      $("table").show();
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

  $(document).ready(function(){
    $("#out").click(function(){
      $("body").removeClass("important");
    
    });
  });