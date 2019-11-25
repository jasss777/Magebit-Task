
var flagLeft = 0;
var flagRight = 0;

    $(document).ready(function() {
        $('#slide-left').click(function() {
          flagLeft ++;
          flagRight = 0;
          if(flagLeft == 1){
            $('.input-fields').animate({
            'marginLeft' : "-=425px" //moves left
            });
            $("#signup-field").fadeIn(700);
            $("#login-field").fadeOut(100);
          }
        });

        $('#slide-right').click(function() {
          flagLeft = 0;
          flagRight++;
          if(flagRight == 1){
            $('.input-fields').animate({
            'marginLeft' : "+=425px" //moves right
            });
            $("#signup-field").fadeOut(100);
            $("#login-field").fadeIn(700);
          }
        });
    });