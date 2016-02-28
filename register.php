<html>
<head>
<title>Register</title>
</head>
<body>

<?php
	require 'core.inc.php';
	require 'connect.inc.php';
	if(isset($_POST['userName']) && isset($_POST['hidden1']) && isset($_POST['hidden2'])){
		
		$user = $_POST['userName'];
		$max = $_POST['hidden1'];
		$min = $_POST['hidden2'];
		$passw = $_POST['userPass1'];
		echo $user;
		echo $min;
		echo $max;
		echo $passw;
		$ids = explode(',', $max);
		var_dump($ids);
		echo "<br>";
		$ids2 = explode(',', $min);
		var_dump($ids2);
		echo "<br>";
		$query = "INSERT INTO `user_table` (`id`, `user`, `pass`, `speed_min`, `speed_max`) VALUES ('', '$user', '$passw', '$min', '$max');";
			if($query_run = mysql_query($query)){
				echo "GJ";
			}else{
				echo "BJ";
			}
	}
?>
<form action ="<?php echo $current_file; ?>" method="POST">
	
	<h1>Register New User</h1>
	<hr>
	User Name <br>
	<input type="text" id="userName" name="userName"/> <br />
	Password <br>
	<input type="text" id="userPass1" name="userPass1" onkeypress="keyPress()" />
	<button type="button" onclick="checkPass_first()"> Check_1 </button><br />
	<input type="text" id="userPass2" name="userPass2" onkeypress="keyPress()" />
	<button type="button" onclick="checkPass()"> Check </button><br />
	<input type="text" id="userPass3" name="userPass3" onkeypress="keyPress()" />
	<button type="button" onclick="checkPass()"> Check </button><br />
	<input type="text" id="userPass4" name="userPass4" onkeypress="keyPress()" />
	<button type="button" onclick="checkPass()"> Check </button><br />
	<input type="text" id="userPass5" name="userPass5" onkeypress="keyPress()" />
	<button type="button" onclick="checkPass()"> Check </button><br />
	<input type="submit" value="Register" onclick="register()"> <br />
	<input type="hidden" id="hidden1" name="hidden1"/>
	<input type="hidden" id="hidden2" name="hidden2"/>
	
	<p id="demo"></p>
	<p id="0"></p>
	<p id="1"></p>
	<p id="2"></p>
	<p id="3"></p>
	<p id="4"></p>
	<p id="5"></p>
</form>

<script>
	var timer = [];
	var passMin = [];
	var passMax = [];
	var d;
	var n;
	var it = 0;
	var i;
	var longitud;
	function keyPress(){
		d = new Date();
		n = d.getTime();
		if(it == 0) base = n;
		document.getElementById(it).innerHTML = n-base;
		timer.push(n-base);
		base = n;
		it = it +1;
	}
	function checkPass_first(){
		passMin = timer.slice();
		passMax = timer.slice();
		timer = [];
		it = 0;
	}
	function checkPass(){
		longitud = timer.length;
		
		for(i=0; i < longitud; i++){
			if(passMax[i]<timer[i]){
				passMax[i]=timer[i];
			}
			if(passMin[i]>timer[i]){
				passMin[i]=timer[i];
			}
		}
		timer=[];
		it = 0;
	}
	function register(){
		document.getElementById('hidden1').value = passMax;
		document.getElementById('hidden2').value = passMin;
	}
</script>

</body>
</html>



