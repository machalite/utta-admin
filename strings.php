<?php
  //collection of strings to be displayed on the front end
  //default written in English

  //time zone for date time display
  //change this variable to display in another timezone
  // use this link for list of supported timezones
  //http://id1.php.net/manual/en/timezones.php
  $timeZone                           ='Asia/Jakarta';

  //university information
  $univName                           ="UTTA University";
  $univLogoFileName                   ="logo.png";

  //login.php
  $loginHeadTitle                     ="UTTA log in";
  $loginTitle                         ="UTTA log in";
  $loginButton                        ="Log In";

  //connection.php
  $connectionDbConFail                ="Error connecting to database!";

  //login_proc.php
  $logProcDupLogin                    ="Error duplicate user detected!";
  $logProcInvLogin                    ="Invalid username or password!";

  //index.php
  $indexTitle                         ="Welcome to the administration page!";

  //header.php
  $headerTitle                        ="UTTA Administration";
  $headerHelp                         ="Help";
  $headerLogout                       ="Log Out";
  $sidebarTitle                       =$univName; //displays university name
  $sidebarMenu                        ="Menu";
  $sidebarDepartment                  ="Department";
  $sidebarFaculty                     ="Faculty";
  $sidebarBuilding                    ="Building";
  $sidebarCourse                      ="Course";
  $sidebarYear                        ="School Year";
  $sidebarRoom                        ="Room";
  $sidebarClass                       ="Class";
  $sidebarLecturer                    ="Lecturer";
  $sidebarUser                        ="User";
  $sidebarStudent                     ="Student";
  $sidebarOffClass                    ="Reschedule / Cancel Class";
  $sidebarActivityLog                 ="Activity logs";
  $sidebarUsageLog                    ="Request logs";

  //footer.php
  $footerText                         ="Created by Jonathan Huang 2017";

  //general table strings
  $tableUsername                      ="Username";
  $tableLastLogin                     ="Last Login";
  $tableAction                        ="Action";
  $tableName                          ="Name";
  $tableCode                          ="Code";
  $tableDescription                   ="Description";
  $tableActive                        ="Active";
  $tableAction                        ="Actions";
  $tableFaculty                       ="Faculty";
  $tableBuilding                      ="Building";
  $tableFloor                         ="Floor number";
  $tableDepartment                    ="Department";
  $tableLecturer                      ="Lecturer";
  $tableDate                          ="Date";
  $tableClass                         ="Class";
  $tableStartDate                     ="Start Date";
  $tableEndDate                       ="End Date";
  $tableStartClass                    ="Starts";
  $tableEndClass                      ="Ends";
  $tableDay                           ="Day";
  $tableYear                          ="School Year";
  $tableCourse                        ="Course";
  $tableRoom                          ="Room";
  $tableStatus                        ="Status";


  //General forms
  $formUsername                       ="Username";
  $formPassword                       ="Password";
  $formNewPassword                    ="New password";
  $formRePassword                     ="Repeat password";
  $formRenewPassword                  ="Repeat new password";
  $formLastLogin                      ="Last logged in";
  $formName                           ="Name";
  $formCode                           ="Code";
  $formAuthCode                       ="Authentication Code";
  $formLineId                         ="Line ID";
  $formDescription                    ="Description";
  $formBuilding                       ="Building";
  $formFaculty                        ="Faculty";
  $formDepartment                     ="Department";
  $formLecturer                       ="Lecturer";
  $formFloor                          ="Floor";
  $formDate                           ="Date";
  $formStartDate                      ="Start Date";
  $formEndDate                        ="End Date";
  $formClass                          ="Class";
  $formStartClass                     ="Start";
  $formEndClass                       ="End";
  $formDay                            ="Day";
  $formYear                           ="Year";
  $formCourse                         ="Course";
  $formRoom                           ="Room";
  $formStatus                         ="Status";

  //Page Titles
  $userTitle                          ="User administration";
  $facultyTitle                       ="Manage Faculties";
  $departmentTitle                    ="Manage Departments";
  $buildingTitle                      ="Manage Buildings";
  $roomTitle                          ="Manage Rooms";
  $lecturerTitle                      ="Manage Lecturers";
  $studentTitle                       ="Manage Students";
  $courseTitle                        ="Manage Courses";
  $yearTitle                          ="Manage School Year";
  $classTitle                         ="Manage Classes";
  $offClassTitle                      ="Alter Class Schedule";
  $takenCourseTitle                   ="Manage Taken Courses";

  //activity_log.php
  $actLogTitle                        ="User activities";
  $actLogUsername                     ="Username";
  $actLogActivity                     ="Activities";
  $actLogTime                         ="Timestamp";

  //usage_log.php
  $usageLogTitle                      ="Bot request log";
  $usageLogName                       ="Student name";
  $usageLogActivity                   ="Activities";
  $usageLogTime                       ="Timestamp";
  $usageLogLineId                     ="Line ID";
  $usageRegister                      ="!register";
  $usageToday                         ="!today";
  $usageCheckroom                     ="!checkroom";
  $usageSchedule                      ="!register";
  $usageNext                          ="!next";
  $usageWhere                         ="!where";
  $usageCheckcourse                   ="!checkcourse";
  $usageChanges                       ="!changes";


  //logs
  $actLogin                           ="Logged in";
  $actLogout                          ="Logged out";
  $actCreate                          ="Created new";
  $actDeleted                         ="Deleted";
  $actUpdated                         ="Updated";
  $actActivated                       ="Activated";
  $actDeActivated                     ="Deactivated";
  $actAdded                           ="Added";

  //general strings
  $textAdd                            ="Add";
  $textUpdate                         ="Update";
  $textDeactivate                     ="Deactivate";
  $textDelete                         ="Delete";
  $textDepartment                     ="DEPARTMENT";
  $textFaculty                        ="FACULTY";
  $textBuilding                       ="BUILDING";
  $textCourse                         ="COURSE";
  $textYear                           ="YEAR";
  $textRoom                           ="ROOM";
  $textReset                          ="Reset";
  $textLecturer                       ="LECTURER";
  $textStudent                        ="STUDENT";
  $textClass                          ="CLASS";
  $textUser                           ="USER";
  $textManage                         ="Manage";
  $textCancel                         ="Cancel";
  $textSubmit                         ="Submit";
  $textReset                          ="Reset";
  $textOnstudent                      ="on student ID :";
  $textFor                            ="For";
  $textView                           ="View";

  //messages
  $msgDel                             ="Proceed delete ?";
  $msgDelSucceed                      ="Deleted succesfully";
  $msgDelFail                         ="Deletion failed!";
  $msgNewPassNotMatch                 ="New password does not match!";
  $msgPassNotMatch                    ="Password does not match!";
  $msgPassInv                         ="Invalid Password!";
  $msgInsFail                         ="Addition failed!";
  $msgInsSucceed                      ="Added succesfully!";
  $msgUpdFail                         ="Update failed!";
  $msgUpdSucceed                      ="Updated succesfully!";
  $msgActFail                         ="Activation failed!";
  $msgActSucceed                      ="Activated succesfully!";
  $msgDeActFail                       ="Deactivation failed!";
  $msgDeActSucceed                    ="Deactivated succesfully!";
  $msgWithCode                        =" with code: ";
  $msgWithId                          =" with ID: ";
  $msgWithName                        =", NAME: ";
  $msgOn                              =" on: ";

  //days
  $dayMon                             ="Monday";
  $dayTue                             ="Tuesday";
  $dayWed                             ="Wednesday";
  $dayThu                             ="Thursday";
  $dayFri                             ="Friday";
  $daySat                             ="Saturday";
  $daySun                             ="Sunday";
  $dayNot                             ="Day not set";

  //off class status
  $statusCancelled                    ="Cancelled";
  $statusPostponed                    ="Postponed";
  $statusRelocated                    ="Relocated";
  $statusReplacement                  ="Replacement";
  $statusReplaced                     ="Created replacement for";
  $statusSupplementary                ="Supplementary";
  $statusCreateSupplementary          ="Created supplementary for";
  $statusNot                          ="Status not set";

?>
