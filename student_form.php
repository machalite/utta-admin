<?php
  //form for insert or update operation

	//display header
	include_once ("header.php");
	//fetch strings to display
	include_once ("strings.php");

	function random_str()
	{
		$random = substr(md5(mt_rand()), 0, 7);
		return $random;
	}

	//if there is passed ID, then fill textbox with data
	if(!empty($_GET['id']))
	{
		include_once("connection.php");

		//display update form title
		$text=$textUpdate." ".$textStudent;

		// attempt select query execution
		$sql=mysqli_query($con,"SELECT id,code,name,department,authCode,lineId
			FROM student WHERE id='$_GET[id]'");
		$data=mysqli_fetch_array($sql,MYSQLI_ASSOC);

		//fill variable with data from database to show in textfield
		$id=$data['id'];
		$name=$data['name'];
		$code=$data['code'];
    $department=$data['department'];
		$authCode=$data['authCode'];
		$lineId=$data['lineId'];


		$link="student_func.php?&ops=2";
	}
	else
	{
		$text=$textAdd." ".$textStudent;
		$id=null;
		$name=null;
		$code=null;
    $department=null;
		$authCode=random_str(3);
		$lineId=null;

		$link="student_func.php?&ops=1";
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
						<form name="studentForm" method="post"
							action="<?php echo $link?>" enctype="multipart/form-data"
								class="form-horizontal form-label-left">

								<!-- hidden textfield for id -->
								<input type="hidden" name="id" value="<?php echo $id;?>">

                <!-- Create dynamic listbox -->
                <div class="form-group">
                  <label class="control-label col-md-2 col-sm-3 col-xs-12">
                    <?php echo $formDepartment;?></label>
                  <div class="col-md-3 col-sm-9 col-xs-12">
                    <select name="department" id="listBox" class="form-control">
                      <?php
                        include_once("connection.php");
                        $qry="SELECT d.id, d.name, f.name AS faculty
                        FROM department d, faculty f
                        WHERE d.faculty=f.id AND d.active=1
                        ORDER BY f.name";
                        $sql=mysqli_query($con,$qry);
                        while($data=mysqli_fetch_array($sql,MYSQLI_ASSOC))
                        { //begin populate list ?>
                          <option value=<?php echo $data['id']; ?>
														<?php if($data['id']==$department)
														{?>selected="selected"<?php } ?>>
                            <?php echo $data['faculty']." - ".$data['name'];?>
                          </option>
                      <?php } //end populate list ?>
                    </select>
                  </div>
                </div>

								<div class="form-group">
									<label class="control-label col-md-2 col-sm-3 col-xs-12">
										<?php echo $formCode;?> <span class="required">*</span>
									</label>
									<div class="col-md-9 col-sm-9 col-xs-12">
										<input type="text" name="code" class="form-control"
										required value="<?php echo $code;?>">
									</div>
								</div>

								<div class="form-group">
									<label class="control-label col-md-2 col-sm-3 col-xs-12">
										<?php echo $formName;?> <span class="required">*</span>
									</label>
									<div class="col-md-9 col-sm-9 col-xs-12">
										<input type="text" name="name" class="form-control"
										required value="<?php echo $name;?>">
									</div>
								</div>

								<div class="form-group">
									<label class="control-label col-md-2 col-sm-3 col-xs-12">
										<?php echo $formAuthCode;?>
									</label>
									<div class="col-md-9 col-sm-9 col-xs-12">
										<input type="text" name="authCode" class="form-control"
										 value="<?php echo $authCode;?>">
									</div>
								</div>

								<div class="form-group">
									<label class="control-label col-md-2 col-sm-3 col-xs-12">
										<?php echo $formLineId;?>
									</label>
									<div class="col-md-9 col-sm-9 col-xs-12">
										<input type="text" name="lineId" class="form-control"
										value="<?php echo $lineId;?>">
									</div>
								</div>

								<div class="form-group">
										<div class="col-md-6 col-sm-9 col-xs-12 col-md-offset-2">
												<a href="student.php">
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
