<?php
//process submitted username and password

	session_start();
  //fetch connection settings
	include_once("connection.php");
  //fetch strings to display
  include_once("strings.php");

	//Escape user inputs for security
	$username = mysqli_real_escape_string($con, $_POST['username']);
  //password MD5 encrypted
	$password = mysqli_real_escape_string($con,md5($_POST['password']));

	// attempt select query execution
	$sql = mysqli_query($con,"SELECT id,username,password FROM user
		WHERE username='$username' AND password='$password' AND active=1");

	$data=mysqli_fetch_array($sql,MYSQLI_ASSOC);

	//contain the amount of record with matching username and password
	$userNum=mysqli_num_rows($sql);

  //check if there is error
	if($userNum==0)
  {
?>
		<script>
		// No matching username and password
		// displays invalid password message and redirect to login page
			alert("<?php echo $logProcInvLogin;?>");
			window.location.href = "login.php";
		</script>
<?php
	}
	else if($userNum>1)
  {
		?>
				<script>
				// There are several matching username and password
				// displays duplicate password message and redirect to login page
					alert("<?php echo $logProcDupLogin;?>");
					window.location.href = "login.php";
				</script>
		<?php
	}
	else
  {
    //set session if log in successful
    //it will be used to access administration pages
		$_SESSION['id']=$data['id'];
		$userId=$data['id'];
    $_SESSION['username']=$data['username'];
    $_SESSION['password']=$data['password'];

		//Get login date and time
		$dateTime=date('Y-m-d H:i:s');

		//updates user's last login
		$sql = "UPDATE user SET lastlogin='$dateTime'WHERE id=$userId";
		mysqli_query($con, $sql);

		//insert new login in activity log
		$sql = "INSERT INTO activitylog (user,activity)
			VALUES($userId,'$actLogin')";
		mysqli_query($con, $sql);

		//close connection
		mysqli_close($con);

		//redirect to main page
    header("Location: index.php");
	}
?>
