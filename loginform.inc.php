<?php
	if(isset($_POST['userName']) && isset($_POST['userPass'])){
		$user = $_POST['userName'];
		$pass = $_POST['userPass'];
		$query = "SELECT `pass`,`speed_min`,`speed_max` FROM user_table WHERE `user`='$user'";
		$timer = $_POST['timer_'];
		if($query_run = mysql_query($query)){
			$user_pass = mysql_result($query_run,0,'pass');
			$user_min = mysql_result($query_run,0,'speed_min');
			$user_max = mysql_result($query_run,0,'speed_max');
			
			$ids = explode(',', $user_max);
			$ids2 = explode(',', $user_min);
			$ids3 = explode(',', $timer);
			$bool = "si";
			
			if($pass==$user_pass){
				$lentgh = count($ids3);
				for ($i = 0; $i<$lentgh;$i++){
					if($ids[$i]<$ids3[$i] || $ids2[$i]>$ids3[$i]){$bool = "no";}
				}
				if($bool == "si"){
					header("Location: profile.php");
				}
				else{
					echo "WRONG TIMING";
				}
			}
			else {
				echo "Wrong password";
			}
			
			
			
			
		}else{
			
		}
	}
?>

<form action ="<?php echo $current_file; ?>" method="POST">
	<h1> Welcome to TimedLoginSystem </h1>
	<hr>
	<h4><font color="red"> Sorry, as you can see we are not web developers ^^</font></h4>
	<img src="http://res.cloudinary.com/urbandictionary/image/upload/a_exif,c_fit,h_200,w_200/v1395991705/gjn81wvxqsq6yzcwubok.png">
	<br>
	Username:
	<input type="text" id="userName" name="userName"/> <br />
	Password:   
	<input type="text" id="userPass" name="userPass" onkeypress="keyPress()" /> <br />
	<input type="submit" value="Log In" onclick="log_in()">
	<br>
	<a href="register.php">Register new user</a>
	<br>
	<p id="demo"></p>
	<input type="hidden" id="timer_" name="timer_"/>
	<p id="0"></p>
	<p id="1"></p>
	<p id="2"></p>
	<p id="3"></p>
	<p id="4"></p>
	<p id="5"></p>
</form>