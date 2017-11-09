<?php
  //form for insert or update operation

	//display header
	include_once ("header.php");
	//fetch strings to display
	include_once ("strings.php");

	//if there is passed ID, then fill textbox with data
	if(!empty($_GET['id']))
	{
		include_once("connection.php");

		//display update form title
		$text=$textUpdate." ".$textDepartment;

		// attempt select query execution
		$sql=mysqli_query($con,"SELECT id,code,name,faculty
			FROM department WHERE id='$_GET[id]'");
		$data=mysqli_fetch_array($sql,MYSQLI_ASSOC);

		//fill variable with data from database to show in textfield
		$id=$data['id'];
		$name=$data['name'];
		$code=$data['code'];
    $faculty=$data['faculty'];

		$link="department_func.php?&ops=2";
	}
	else
	{
		$text=$textAdd." ".$textDepartment;
		$id=null;
		$name=null;
		$code=null;
		$faculty=null;

		$link="department_func.php?&ops=1";
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
						<form name="departmentForm" method="post"
							action="<?php echo $link?>" enctype="multipart/form-data"
								class="form-horizontal form-label-left">

								<!-- hidden textfield for id -->
								<input type="hidden" name="id" value="<?php echo $id;?>">

								<!-- Create dynamic listbox -->
                <div class="form-group">
                  <label class="control-label col-md-2 col-sm-3 col-xs-12">
                    <?php echo $formFaculty;?></label>
                  <div class="col-md-3 col-sm-9 col-xs-12">
                    <select name="faculty" id="listBox" class="form-control">
                      <?php
                        include_once("connection.php");
                        $qry="SELECT id,name FROM faculty WHERE active=1 ORDER BY name";
                        $sql=mysqli_query($con,$qry);
                        while($data=mysqli_fetch_array($sql,MYSQLI_ASSOC))
                        { //begin populate list ?>
                          <option value=<?php echo $data['id']; ?>
														<?php if($data['id']==$faculty)
														{?>selected="selected"<?php } ?>>
                            <?php echo $data['name'];?>
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
										<div class="col-md-6 col-sm-9 col-xs-12 col-md-offset-2">
												<a href="department.php">
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
