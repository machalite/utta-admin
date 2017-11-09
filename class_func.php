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
      //get user inputs from the form
      $id = mysqli_real_escape_string($con, $_POST['id']);
      $day = mysqli_real_escape_string($con, $_POST['day']);
      $course = mysqli_real_escape_string($con, $_POST['course']);
      $year = mysqli_real_escape_string($con, $_POST['year']);
      $room = mysqli_real_escape_string($con, $_POST['room']);
      $startClass = mysqli_real_escape_string($con, $_POST['startClass']);
      $endClass = mysqli_real_escape_string($con, $_POST['endClass']);

      //attempt insert query execution
      $strIns = "INSERT INTO class (day,course,year,room,startclass,
        endclass)VALUES('$day','$course','$year','$room','$startClass',
        '$endClass')";

      if(!mysqli_query($con, $strIns))
      {
        //displays fail message and sql error
        echo $msgInsFail. mysqli_error($con);
      }
      else
      {
        //get course name
        $qry="SELECT name FROM course WHERE id=$course";
        $sql=mysqli_query($con,$qry);
        $data=mysqli_fetch_array($sql,MYSQLI_ASSOC);
        $name=$data['name'];

        //concatenate activity description
  		  $strAct=$actCreate." ".$textClass." : ".$name;
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
      echo "<meta http-equiv='refresh' content='1; url=class.php'>";
    }
    //------------------------------UPDATE--------------------------------------
    elseif ($ops==2)
    {
      //get user inputs from the form
      $id = mysqli_real_escape_string($con, $_POST['id']);
      $day = mysqli_real_escape_string($con, $_POST['day']);
      $course = mysqli_real_escape_string($con, $_POST['course']);
      $year = mysqli_real_escape_string($con, $_POST['year']);
      $room = mysqli_real_escape_string($con, $_POST['room']);
      $startClass = mysqli_real_escape_string($con, $_POST['startClass']);
      $endClass = mysqli_real_escape_string($con, $_POST['endClass']);

      //attempt update query execution
      $sql = "UPDATE class SET day='$day', course='$course',
        year='$year', room='$room', startclass='$startClass',
          endclass='$endClass' WHERE id=$id";
      if(!mysqli_query($con, $sql))
      {
        //display fail message and sql error
        echo $msgUpdFail. mysqli_error($con);
        }
      else
      {
        //get course name
        $qry="SELECT name FROM course WHERE id=$course";
        $sql=mysqli_query($con,$qry);
        $data=mysqli_fetch_array($sql,MYSQLI_ASSOC);
        $name=$data['name'];

        //concatenate activity description
        $strAct=$actUpdated." ".$textClass.$msgWithId.$id.$msgWithName.$name;
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
      echo "<meta http-equiv='refresh' content='1; url=class.php'>";
    }
    //--------------------------------DELETE------------------------------------
    elseif ($ops==3)
    {
      //get selected record's id and username
      $id=$_GET['id'];
      $name=$_GET['name'];

      // attempt delete
      $sql="DELETE FROM class WHERE id='$id'";

      if(!mysqli_query($con, $sql))
      {
          echo "<center>".$msgDelFail.$sql."</center>" . mysqli_error($con);
      }
      else
      {
        echo "<center>".$msgDelSucceed."</center><br>";

        //get course name
        $qry="SELECT name FROM course WHERE id=$course";
        $sql=mysqli_query($con,$qry);
        $data=mysqli_fetch_array($sql,MYSQLI_ASSOC);
        $name=$data['name'];

        //record deletion in activity log
        //get user id from session
        $userId=$_SESSION['id'];
        $strAct=$actDeleted." ".$textClass.$msgWithId.$id.$msgWithName.$name;
        $sql = "INSERT INTO activitylog (user,activity)
          VALUES($userId,'$strAct')";
        mysqli_query($con, $sql);
    	}
      //close connection
      mysqli_close($con);
      echo "<meta http-equiv='refresh' content='1; url=class.php'>";
    }
    //------------------------------DEACTIVATE----------------------------------
    elseif ($ops==4)
    {
      //get selected record's id and name
      $id=$_GET['id'];
      $name=$_GET['name']; //get course ID
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
      $sql = "UPDATE class SET active=$active WHERE id=$id";
      if(!mysqli_query($con, $sql))
      {
        //display fail message and sql error
        echo $msgFail. mysqli_error($con);
      }
      else
      {
        //concatenate activity description
        $strDeAct=$msgAct." ".$textClass.
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
      echo "<meta http-equiv='refresh' content='1; url=class.php'>";
    }

?>
