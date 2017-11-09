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
      $studentId = mysqli_real_escape_string($con, $_POST['studentId']);
      $studentCode = mysqli_real_escape_string($con, $_POST['studentCode']);
      $course = mysqli_real_escape_string($con, $_POST['course']);

      //attempt insert query execution
      $strIns = "INSERT INTO takencourse (course,student)
        VALUES('$course','$studentId')";

      if(!mysqli_query($con, $strIns))
      {
        //displays fail message and sql error
        echo $msgInsFail. mysqli_error($con);
      }
      else
      {
        //concatenate activity description
  		  $strAct=$actAdded." ".$textCourse." : ".$course." ".$textOnstudent." ".
          $studentCode;
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
      echo "<meta http-equiv='refresh' content='1; url=student.php'>";
    }
    //------------------------------DELETE--------------------------------------
    elseif ($ops==3)
    {
      //get record id and course id
      $id=$_GET['id'];
      $course=$_GET['course'];

      //attempt DELETE execution
      $strDel = "DELETE FROM takencourse WHERE id='$id'";

      if(!mysqli_query($con, $strDel))
      {
        //displays fail message and sql error
        echo $msgDelFail. mysqli_error($con);
      }
      else
      {
        //concatenate activity description
        $strAct=$statusCancelled." ".$textCourse." : ".$course;
        //record deletion in activity log
        $sql = "INSERT INTO activitylog (user,activity)
        VALUES($userId,'$strAct')";
        //execute SQL statement
        mysqli_query($con, $sql);
        //displays success message
        echo "<center>".$msgDelSucceed."</center><br>";
      }
      //close connection
      mysqli_close($con);
      echo "<meta http-equiv='refresh' content='1; url=student.php'>";
    }
?>
