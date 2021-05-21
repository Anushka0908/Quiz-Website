<?php
$submit = false;
if((isset($_POST['opinion']) && $_POST['opinion'] !='') && (isset($_POST['email']) && $_POST['email'] !='')){
	
$server = "localhost";
$username= "root";
$password = "";

$con = mysqli_connect($server, $username, $password, "feedback");
if(!$con){
	die("Connection failed due to" . mysqli_connect_error());
}

    $email = $_POST['email'];
    $name = $_POST['name'];
    $opinion = $_POST['opinion'];
	
	$sql = " INSERT INTO `feed` ( `email`, `name`, `opinion`, `date`) VALUES ( '$email', '$name', '$opinion', current_timestamp()); ";
    
	
	if($con -> query($sql) == true){
		$submit = true;	
	}
	else{
		echo "ERROR: $sql <br> $con -> error";

	}
	
     $con->close();
}     
?>
 <!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Feedback</title>
	
<link href="https://fonts.googleapis.com/css2?family=Pattaya&display=swap" rel="stylesheet">
	<style type="text/css">
		*{
			margin: 0;
			padding: 0;
			box-sizing: border-box;
		}
		
.img{
	display: flex;
	height: 100vh;
	background-size: cover;
    min-width:100%;
	 background-position: center;
    position: absolute;
    z-index: -1;
    align-items: center;
    justify-content: center;
    opacity:0.9;
}
.msg{
	border: 1px solid black;
	background: #a0552d;
	color: white;
	border-radius: 4px;
	display: flex;
	justify-content: center;
	align-items:center;
	 font-family: 'Pattaya', sans-serif;

}
.feedback-page{
	position: absolute;
	top: 50%;
	left:50%;
	transform: translate(-50%,-50%);
	border-radius: 10px;
  width: 360px;
  background-color: white;
  padding:5px;
  margin: 0;
  box-shadow: 0 0 8px rgba(250,250,250,0.6) ;
  opacity: 0.5;
  margin-right: -50%;
  /*align-items: baseline;*/
  /*justify-content: center;*/
}
.feedback-page form{
  width: 100%;
  text-align: center;
  padding: 15px 20px;

}
			
form h1{
  padding: 10px 0;
  font-weight: 900;
  font-family: 'Pattaya', sans-serif;
  color: #a0552d ;
  font-size:38px;
 
}
form .id{
  position: relative;
  color: white;
  font-weight: 700;

}
form input{
  width: 100%;
  height: 50px ;
  margin : 4px 0;
  border: 3px solid #a0552d;
  border-radius: 4px;
  
  padding: 0 18px;
  padding-right: 45px;
  font-size: 18px;
}
form textarea{
   border: 3px solid #a0552d;
  border-radius: 4px;
  resize: none;
  padding : 5px 15px;
  font-size: 19px;
  width: 100%;
  margin: 3px 0;
}
form button{
  margin-top: 5 px;
  border: 4px solid #a0552d;
  background: #a0552d;
  color: white;
  width: 100%
  padding:10px 0;
  font-size: 24px;
  font-weight: 400;
  cursor: wait;
  border-radius: 5px;

}
form button:hover{
	border: 4px solid #a0552d;
	background: white;
	color:#a0552d;
	font-family: 'Pattaya', sans-serif;
}
form input:focus , form textarea:focus{
  border: 1px solid #a0552d ;
  transition: all 0.3s ease;
  color:#a0552d;
  font-weight: 600;
  font-size:20px;
}
form input:focus::placeholder,form textarea:focus::placeholder{
  color:#a0552d;
  font-weight: 500;
  transition: all 0.1s ease;
  padding-left: 3px;
}
	</style>
</head>
<body>

	<img src="Images/Feedback.jpg" class="img">
	<div  class="feedback-page">
		   
          <form method="post" action="Feedback.php">
            <div class="msg">
            <?php
              if($submit == true ){
                echo "Thanks for Submitting Your Feedback";
              }
            ?>
          </div>
            <h1>Give Your Feedback</h1>
            <div class="id">
              <input type="email"  placeholder="Email Id" name="email" id="email" required="Please fill it.">
              
            </div>
            <div class="id">
              <input type="text"  placeholder="Full name" name="name" id="name" required="please fill it.">

            </div>
            <textarea cols="30" rows="8" placeholder="Give your Feedback here!" name="opinion" id="opinion"></textarea>
             <button>Submit it</button>
          </form>
        </div>
       
</body>
</html>
