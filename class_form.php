<?php
  //form for insert or update operation

	//display header
	include_once ("header.php");
	//fetch strings to display
	include_once ("strings.php");

  //Added days array for listbox
  $days = array(
     1 => $dayMon,
     2 => $dayTue,
     3 => $dayWed,
     4 => $dayThu,
     5 => $dayFri,
     6 => $daySat,
     0 => $daySun
  );

	//if there is passed ID, then fill textbox with data
	if(!empty($_GET['id']))
	{
		include_once("connection.php");

		//display update form title
		$text=$textUpdate." ".$textClass;

		// attempt select query execution
		$sql=mysqli_query($con,"SELECT id, day, startclass, endclass,
      course, room, year FROM class WHERE id='$_GET[id]'");
		$data=mysqli_fetch_array($sql,MYSQLI_ASSOC);

		//fill variable with data from database to show in textfield
		$id=$data['id'];
		$day=$data['day'];
		$startClass=$data['startclass'];
    $endClass=$data['endclass'];
    $course=$data['course'];
    $room=$data['room'];
    $year=$data['year'];

		$link="class_func.php?&ops=2";
	}
	else
	{
		$text=$textAdd." ".$textClass;
    $id=null;
		$day=null;
		$startClass=null;
    $endClass=null;
    $course=null;
    $room=null;
    $year=null;

		$link="class_func.php?&ops=1";
	}

?>
	<!-- PAGE CONTENT -->
	<div class="right_col" role="main">
		<div class="">
			<div class="page-title">
				<div class="title_left">
					<h3><?php echo $text;?></h3>
				</div>
            </div>
		</div>

		<div class="row">
			<div class="col-md-12 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
					</div>

					<div class="x_content">
					<br />
						<!-- FORM -->
						<form name="classForm" method="post"
							action="<?php echo $link?>" enctype="multipart/form-data"
								class="form-horizontal form-label-left">

								<!-- hidden textfield for id -->
								<input type="hidden" name="id" value="<?php echo $id;?>">

                <!-- Create dynamic listbox -->
                <div class="form-group">
                  <label class="control-label col-md-2 col-sm-3 col-xs-12">
                    <?php echo $formYear;?></label>
                  <div class="col-md-5 col-sm-9 col-xs-12">
                    <select name="year" id="listBox" class="form-control">
                      <?php
                        include_once("connection.php");
                        $qry="SELECT id, name FROM year WHERE active=1
                          ORDER BY id DESC";
                        $sql=mysqli_query($con,$qry);
                        while($data=mysqli_fetch_array($sql,MYSQLI_ASSOC))
                        { //begin populate list ?>
                          <option value=<?php echo $data['id']; ?>
														<?php if($data['id']==$year)
														{?>selected="selected"<?php } ?>>
                            <?php echo $data['name'];?>
                          </option>
                      <?php } //end populate list ?>
                    </select>
                  </div>
                </div>

                <!-- Create dynamic listbox -->
                <div class="form-group">
                  <label class="control-label col-md-2 col-sm-3 col-xs-12">
                    <?php echo $formCourse;?></label>
                  <div class="col-md-5 col-sm-9 col-xs-12">
                    <select name="course" id="listBox" class="form-control">
                      <?php
                        include_once("connection.php");
                        $qry="SELECT id, name, code FROM course WHERE active=1
                        ORDER BY name";
                        $sql=mysqli_query($con,$qry);
                        while($data=mysqli_fetch_array($sql,MYSQLI_ASSOC))
                        { //begin populate list ?>
                          <option value=<?php echo $data['id']; ?>
                            <?php if($data['id']==$course)
                            {?>selected="selected"<?php } ?>>
                            <?php echo $data['code']." - ".$data['name'];?>
                          </option>
                      <?php } //end populate list ?>
                    </select>
                  </div>
                </div>

                <!-- Create dynamic listbox -->
                <div class="form-group">
                  <label class="control-label col-md-2 col-sm-3 col-xs-12">
                    <?php echo $formRoom;?></label>
                  <div class="col-md-5 col-sm-9 col-xs-12">
                    <select name="room" id="listBox" class="form-control">
                      <?php
                        include_once("connection.php");
                        $qry="SELECT r.id, r.name, b.name AS building
                        FROM building b, room r
                        WHERE r.building=b.id AND r.active=1
                        ORDER BY r.name";
                        $sql=mysqli_query($con,$qry);
                        while($data=mysqli_fetch_array($sql,MYSQLI_ASSOC))
                        { //begin populate list ?>
                          <option value=<?php echo $data['id']; ?>
														<?php if($data['id']==$room)
														{?>selected="selected"<?php } ?>>
                            <?php echo $data['building']." - ".$data['name'];?>
                          </option>
                      <?php } //end populate list ?>
                    </select>
                  </div>
                </div>

								<!-- Create listbox -->
  							<div class="form-group">
  								<label class="control-label col-md-2 col-sm-3 col-xs-12">
  									<?php echo $formDay?>
  								</label>
  								<div class="col-md-3 col-sm-9 col-xs-12">
  									<select name="day" id="listBox" class="form-control">
  									   <?php foreach($days as $valueDay=>$stringDay){?>
  									   <option value=<?php echo $valueDay; ?>
												 <?php if($valueDay==$day)
												 {?>selected="selected"<?php } ?>>
                         <?php echo $stringDay; ?></option>
  									   <?php } ?>
  									</select>
  								</div>
                </div>

								<div class="form-group">
									<label class="control-label col-md-2 col-sm-3 col-xs-12">
										<?php echo $formStartClass;?> <span class="required">*</span>
									</label>
									<div class="col-md-9 col-sm-9 col-xs-12">
										<input type="time" name="startClass"
                      value=<?php echo $startClass; ?>>
									</div>
								</div>

                <!-- <div class="form-group">
									<label class="control-label col-md-2 col-sm-3 col-xs-12">
										<?php //echo $formStartClass;?> <span class="required">*</span>
									</label>
									<div class="col-md-9 col-sm-9 col-xs-12">
                    <div class="input-group bootstrap-timepicker timepicker">
                      <input id="startClass" type="text"
                        class="form-control input-small">
                      <span class="input-group-addon">
                        <i class="glyphicon glyphicon-time"></i></span>
                    </div>
                  </div>
								</div> -->

                <div class="form-group">
                  <label class="control-label col-md-2 col-sm-3 col-xs-12">
                    <?php echo $formEndClass;?> <span class="required">*</span>
                  </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                    <input type="time" name="endClass"
                      value=<?php echo $endClass; ?>>
                  </div>
                </div>

								<div class="form-group">
										<div class="col-md-6 col-sm-9 col-xs-12 col-md-offset-2">
												<a href="class.php">
														<button type="button" class="btn btn-danger">
														<i class="fa fa-reply"></i>
																<?php echo $textCancel;?></button></a>

												<button type="reset" class="btn btn-secondary">
														<i class="fa fa-undo"></i>
																<?php echo $textReset;?></button>

												<button type="submit" class="btn btn-primary">
														<i class="fa fa-check"></i>
																<?php echo $textSubmit;?></button>
										</div>
								</div>
						</form>
						<!-- END OF FORM -->
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- END OF PAGE CONTENT -->

<?php
	//display footer
	include("footer.php");
?>
