<?php
  //form for insert or update operation

	//display header
	include_once ("header.php");
	//fetch strings to display
	include_once ("strings.php");

  //Added status array for listbox
  $classStatus = array(
     1 => $statusCancelled,
     2 => $statusPostponed,
     3 => $statusRelocated,
     4 => $statusReplacement,
     5 => $statusSupplementary,
  );

	//if there is passed ID, then fill textbox with data
	if(!empty($_GET['id']))
	{
		include_once("connection.php");

		//display update form title
		$text=$textUpdate;

		// attempt select query execution
		$sql=mysqli_query($con,"SELECT id, class, status, startclass, endclass,
      description, room, date FROM offclass WHERE id='$_GET[id]'");
		$data=mysqli_fetch_array($sql,MYSQLI_ASSOC);

		//fill variable with data from database to show in textfield
		$id=$data['id'];
    $class=$data['class'];
		$status=$data['status'];
		$startClass=$data['startclass'];
    $endClass=$data['endclass'];
    $description=$data['description'];
    $room=$data['room'];
    $date=$data['date'];

		$link="off_class_func.php?&ops=2";
	}
	else
	{
		$text=$textAdd;
    $id=null;
    $class=null;
    $status=null;
		$startClass=null;
    $endClass=null;
    $description=null;
    $room=null;
    $date=null;

		$link="off_class_func.php?&ops=1";
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
                    <?php echo $formClass;?></label>
                  <div class="col-md-5 col-sm-9 col-xs-12">
                    <select name="class" id="listBox" class="form-control">
                      <?php
                        include_once("connection.php");
                        $qry="SELECT c.id , c.day, cr.name AS course
												FROM class c, course cr
												WHERE c.course=cr.id AND c.active=1
                          ORDER BY cr.name";
                        $sql=mysqli_query($con,$qry);
                        while($data=mysqli_fetch_array($sql,MYSQLI_ASSOC))
                        { //begin populate list ?>
                          <option value=<?php echo $data['id']; ?>
														<?php if($data['id']==$class)
														{?>selected="selected"<?php } ?>>
                            <?php
														echo $data['course']." - ";
														switch ($data['day'])
														{
															case 1:echo $dayMon;break;
															case 2:echo $dayTue;break;
															case 3:echo $dayWed;break;
															case 4:echo $dayThu;break;
															case 5:echo $dayFri;break;
															case 6:echo $daySat;break;
															case 7:echo $daySun;break;
															default:echo $dayNot;
														}?>
                          </option>
                      <?php } //end populate list ?>
                    </select>
                  </div>
                </div>

                <!-- Create listbox -->
                <div class="form-group">
                  <label class="control-label col-md-2 col-sm-3 col-xs-12">
                    <?php echo $formStatus?>
                  </label>
                  <div class="col-md-3 col-sm-9 col-xs-12">
                    <select name="status" id="listBox" class="form-control">
                       <?php foreach($classStatus as $value=>$string){?>
                       <option value=<?php echo $value; ?>
                         <?php if($value==$status)
                         {?>selected="selected"<?php } ?>>
                         <?php echo $string; ?></option>
                       <?php } ?>
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

								<div class="form-group">
									<label class="control-label col-md-2 col-sm-3 col-xs-12">
										<?php echo $formDate;?></label>
									<div class="col-md-9 col-sm-9 col-xs-12">
										<input type="date" name="date" value="<?php echo $date?>">
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
									<label class="control-label col-md-2 col-sm-3 col-xs-12">
										<?php echo $formDescription;?>
									</label>
									<div class="col-md-9 col-sm-9 col-xs-12">
										<textarea type="text" name="description"
										class="form-control"><?php echo $description;?></textarea>
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
