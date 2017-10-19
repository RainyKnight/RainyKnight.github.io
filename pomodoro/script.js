//Run Our jQuery
$(document).ready(function(){
  var buzzer = $("#buzzer")[0];
  var count = parseInt($("#num").html());
  var breakTime = parseInt($("#breakNum").html());
  var bigNumber = parseInt($("#bigNum").html());
  $("#reset").hide();
  $("#bigNum").hide();

$("#start").click(function(){
  var counter = setInterval(timer, 1000);
  count*=60;
  breakTime*=60;

  function timer(){
    //Hide variables
    $("#start, #minus5Clock, #add5Clock, #minus5Break, #add5Break, #title1, #title2, #breakNum, #num, #owner").hide();
    $("#timeType, #bigNum").show();
    $("#timeType").html("Session Time: ");
    count -=1;
    bigNumber = count
    console.log(bigNumber)
    if(count === 0){
      buzzer.play();
      clearInterval(counter);
      var startBreak = setInterval(breakTimer, 1000);
      $("#num").hide();
    }
    if(count%60>=10){
      $("#bigNum").html(Math.floor(bigNumber/60)+":"+bigNumber%60);
    }
    else{
      $("#bigNum").html(Math.floor(bigNumber/60)+":"+"0"+bigNumber%60);
    }

    function breakTimer(){
      $("#timeType").html("Break Time: ");
      breakTime -=1;
      bigNumber = breakTime
      if(breakTime === 0){
        buzzer.play();
        clearInterval(startBreak);
        $("#reset").show();
        $("#breakNum, #timeType").hide();
      }
      //Formatting to make the time look more readable works from 11-60 seconds
      if(breakTime%60>=10){
          $("#bigNumb").html(Math.floor(bigNumber/60)+":"+bigNumber%60);
      }
      //This covers 0-10 seconds
      else{
          $("#bigNum").html(Math.floor(bigNumber/60)+":"+"0"+bigNumber%60);
      }
    }
  }

});

  $("#reset").click(function(){
    count = 25;
    breakTime = 5;
    $("#num").html(count);
    $("#breakNum").html(breakTime);
    $("#start, #minus5Clock, #add5Clock, #minus5Break, #add5Break, #breakNum, #num, #title1, #title2, #owner").show();
    $("#reset, #bigNum").hide();
  });

  $("#minus5Clock").click(function(){
    if(count > 5){
          count -= 5;
    $("#num").html(count);
    }
  });

  $("#add5Clock").click(function(){
    if(count < 60){
          count += 5;
    $("#num").html(count);
    }
  });

  $("#minus5Break").click(function(){
    if(breakTime > 1){
          breakTime -= 1;
    $("#breakNum").html(breakTime);
    }
  })

    $("#add5Break").click(function(){
    if(breakTime < 30){
          breakTime += 1;
    $("#breakNum").html(breakTime);
    }
  })

});
