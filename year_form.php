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
		$text=$textUpdate." ".$textYear;

		// attempt select query execution
		$sql=mysqli_query($con,"SELECT id,name,startdate,enddate
			FROM year WHERE id='$_GET[id]'");
		$data=mysqli_fetch_array($sql,MYSQLI_ASSOC);

		//fill variable with data from database to show in textfield
		$id=$data['id'];
		$name=$data['name'];
		$startDate=$data['startdate'];
    $endDate=$data['enddate'];

		$link="year_func.php?&ops=2";
	}
	else
	{
		$text=$textAdd." ".$textYear;
		$id=null;
		$name=null;
		$startDate=null;
    $endDate=null;

		$link="year_func.php?&ops=1";
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
						<form name="yearForm" method="post"
							action="<?php echo $link?>" enctype="multipart/form-data"
								class="form-horizontal form-label-left">

								<!-- hidden textfield for id -->
								<input type="hidden" name="id" value="<?php echo $id;?>">

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
										<?php echo $formStartDate;?></label>
									<div class="col-md-9 col-sm-9 col-xs-12">
										<input type="date" name="startDate" value="<?php echo $startDate?>">
									</div>
								</div>

                <div class="form-group">
                  <label class="control-label col-md-2 col-sm-3 col-xs-12">
                    <?php echo $formEndDate;?></label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                    <input type="date" name="endDate" value="<?php echo $endDate?>">
                  </div>
                </div>

								<div class="form-group">
										<div class="col-md-6 col-sm-9 col-xs-12 col-md-offset-2">
												<a href="year.php">
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
