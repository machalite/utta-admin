<?php
    @session_start();
    //fetch strings to display
    include_once ("strings.php");
    //fetch connection settings
    include("connection.php");

    //get operation ID
    $ops=$_GET['ops'];
    //get user id from session
    $userId=$_SESSION['id'];

    //------------------------------INSERT--------------------------------------
    if ($ops==1)
    {
      //escape user inputs for security
      $username = mysqli_real_escape_string($con, $_POST['username']);
      $id = mysqli_real_escape_string($con, $_POST['id']);

      //encrypt submitted passwords using MD5
      $password =md5(mysqli_real_escape_string($con,$_POST['pass']));
      $reppassword =md5(mysqli_real_escape_string($con,$_POST['repass']));

      //Check if password repetition match
      if($password!=$reppassword)
      {
        echo "<center>".$msgPassNotMatch."</center><br>";
  			echo "<meta http-equiv='refresh' content='1; url=user_form.php'>";
      }
      else
      {
        //attempt insert query execution
        $sql = "INSERT INTO user (username,password)
          VALUES('$username','$password')";

        if(!mysqli_query($con, $sql))
  			{
  				//displays fail message and sql error
          echo $msgInsFail. mysqli_error($con);
        }
  			else
  			{
  				//concatenate activity description
  				$strAct=$actCreate." ".$textUser." : ".$username;
  				//record insertion in activity log
  				$sql = "INSERT INTO activitylog (user,activity)
  					VALUES($userId,'$strAct')";

  				//execute SQL statement
  				mysqli_query($con, $sql);
  				//displays success message
  				echo "<center>".$msgInsSucceed."</center><br>";
  			}
        //close connection
        mysqli_close($con);
  			echo "<meta http-equiv='refresh' content='1; url=user.php'>";
      }
    }
    //------------------------------UPDATE--------------------------------------
    elseif ($ops==2)
    {
      //escape user inputs for security
    	$username = mysqli_real_escape_string($con, $_POST['username']);
    	$id = mysqli_real_escape_string($con, $_POST['id']);

    	//encrypt submitted passwords using MD5
    	$password =md5(mysqli_real_escape_string($con,$_POST['pass']));
      $reppassword =md5(mysqli_real_escape_string($con,$_POST['repass']));
      $newpassword =md5(mysqli_real_escape_string($con,$_POST['newpass']));

  		//Old password already encrypted in MD5
  		$oldpassword =mysqli_real_escape_string($con,$_POST['oldpassword']);

  		//Check if submitted password match with previous password
      if($password!=$oldpassword)
      {
  			echo "<center>".$msgPassInv."</center><br>";
  			echo "<meta http-equiv='refresh' content='1; url=user.php'>";
      }
  		//Check if new password repetition match
  		elseif ($newpassword!=$reppassword)
  		{
  			echo "<center>".$msgNewPassNotMatch."</center><br>";
  			echo "<meta http-equiv='refresh' content='1; url=user.php'>";
  		}
  		//submitted password match with old password
  		//and password repetition matches
  		else
  		{
  			//attempt update query execution
  			$sql = "UPDATE user SET username='$username', password='$newpassword'
  				WHERE id=$id";
  			if(!mysqli_query($con, $sql))
  			{
  				//display fail message and sql error
  				echo $msgUpdFail. mysqli_error($con);
  			}
  			else
  			{
  				//concatenate activity description
  				$strAct=$actUpdated." ".$textUser.$msgWithId
            .$id.$msgWithName.$username;

  				//record update in activity log
  				$sql = "INSERT INTO activitylog (user,activity)
  					VALUES($userId,'$strAct')";
  				//execute SQL statement
  				mysqli_query($con, $sql);
  				//displays success message
  				echo "<center>".$msgUpdSucceed."</center><br>";
  			}
        //close connection
        mysqli_close($con);
  			//redirect page
  			echo "<meta http-equiv='refresh' content='1; url=user.php'>";
  		}
    }
    //--------------------------------DELETE------------------------------------
    elseif ($ops==3)
    {
      //get selected record's id and username
      $id=$_GET['id'];
      $name=$_GET['name'];

      // attempt delete
      $sql="DELETE FROM user WHERE id='$id'";

      if(!mysqli_query($con, $sql))
      {
    		echo "<center>".$msgDelFail.$sql."</center>" . mysqli_error($con);
    	}
      else
      {
        echo "<center>".$msgDelSucceed."</center><br>";

        //record deletion in activity log
        //Get login date and time
        //get user id from session
        $userId=$_SESSION['id'];
        $strAct=$actDeleted." ".$textUser.$msgWithId.$id.$msgWithName.$name;
        $sql = "INSERT INTO activitylog (user,activity)
          VALUES($userId,'$strAct')";
        mysqli_query($con, $sql);
    	}

      //close connection
      mysqli_close($con);
      echo "<meta http-equiv='refresh' content='1; url=user.php'>";
    }
    //------------------------------DEACTIVATE----------------------------------
    elseif ($ops==4)
    {
      //get selected record's id and username
      $id=$_GET['id'];
      $name=$_GET['name'];
      $active=$_GET['active'];

      //deactivate or activate record
      if($active==1)
      {
        $active=0;
        $msgFail=$msgDeActFail;
        $msgSuccess=$msgDeActSucceed;
        $msgAct=$actDeActivated;
      }
      elseif($active==0)
      {
        $active=1;
        $msgFail=$msgActFail;
        $msgSuccess=$msgActSucceed;
        $msgAct=$actActivated;
      }

      //attempt update query execution
      $sql = "UPDATE user SET active=$active WHERE id=$id";
      if(!mysqli_query($con, $sql))
      {
        //display fail message and sql error
        echo $msgFail. mysqli_error($con);
      }
      else
      {
        //concatenate activity description
        $strDeAct=$msgAct." ".$textUser.
          $msgWithId.$id.$msgWithName.$name;

        //record update in activity log
        $sql = "INSERT INTO activitylog (user,activity)
          VALUES($userId,'$strDeAct')";
        //execute SQL statement
        mysqli_query($con, $sql);
        //displays success message
        echo "<center>".$msgSuccess."</center><br>";
      }
      //close connection
      mysqli_close($con);
      //redirect page
      echo "<meta http-equiv='refresh' content='1; url=user.php'>";
    }

?>
