let index_number=0;
let  que = quiz.sort(function(){
   return 0.5 - Math.random();

});
let attemptque = 0;
let correctans=0;
let wrongans=0;
var k;
que.length=10;
let totalque=que.length;


$(function ()
{
  alert(" Click 'OK' to GET START...");
  let totaltime=200;
  let sec=0;
  
  let counter=0;
  let timer= setInterval(function () {
    counter++;
  
    sec= totaltime- counter;
    $("#countdown ").text( sec);
    if(counter == totaltime){
      alert("TimeLimit Completed !!! Press 'OK' to Check Your Result");
      getresult();
      clearInterval(timer);
    }

  },1000);

    printQuestion(index_number);
});
function printQuestion(i) {
  
    $(".que-box-easy").text(que[i].question);
    $(".option-box span").eq(0).text(que[i].option[0]);
    $(".option-box span").eq(1).text(que[i].option[1]);
    $(".option-box span").eq(2).text(que[i].option[2]);
    $(".option-box span").eq(3).text(que[i].option[3]);
  }
  
  function answercheck(option){
    attemptque++;
    let optclicked = $(option).data("opt");
    if(optclicked == que[index_number].answer){
             $(option).addClass("correct");
             correctans++;
    }
    else{
      $(option).addClass("wrong");
      wrongans++;
    }
    $(".easy-score span").text(correctans);
    $(".option-box span").attr("onclick","");
  }
  
  function nextQue(){
    if(index_number >= que.length-1){
      resultshow(0);
        return;
      }
        index_number++;
        $(".option-box span").removeClass();
        $(".option-box span").attr("onclick", "answercheck(this)");
        printQuestion(index_number);
    }
    function resultshow(k){
      if( k  == 1 && index_number < que.length - 1 && !confirm("You Have Not Attempted All Questions ! Click 'OK' to Get Your Final Result...")){
        return;
      }
      getresult();
    }
    function getresult() {
      $("#sport-box-easy").hide();
      $("#result-screen").show();
      $("#total-que").text(totalque);
      $("#attempted-que").text(attemptque);
        $("#correct-ans").text(correctans);
        $("#wrong-ans").text(wrongans);
    
    }
