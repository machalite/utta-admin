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
		$text=$textUpdate." ".$textRoom;

		// attempt select query execution
		$sql=mysqli_query($con,"SELECT id,code,name,building,description,floor
			FROM room WHERE id='$_GET[id]'");
		$data=mysqli_fetch_array($sql,MYSQLI_ASSOC);

		//fill variable with data from database to show in textfield
		$id=$data['id'];
		$name=$data['name'];
		$code=$data['code'];
    $floor=$data['floor'];
    $description=$data['description'];
    $building=$data['building'];

		$link="room_func.php?&ops=2";
	}
	else
	{
		$text=$textAdd." ".$textRoom;
		$id=null;
		$name=null;
		$code=null;
    $floor=null;
    $description=null;
    $building=null;

		$link="room_func.php?&ops=1";
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
						<form name="roomForm" method="post"
							action="<?php echo $link?>" enctype="multipart/form-data"
								class="form-horizontal form-label-left">

								<!-- hidden textfield for id -->
								<input type="hidden" name="id" value="<?php echo $id;?>">

                <!-- Create dynamic listbox -->
                <div class="form-group">
                  <label class="control-label col-md-2 col-sm-3 col-xs-12">
                    <?php echo $formBuilding;?>
                  </label>
                  <div class="col-md-3 col-sm-9 col-xs-12">
                    <select name="building" id="listBox" class="form-control">
                      <?php
                        include_once("connection.php");
                        $qry="SELECT id,name FROM building
													WHERE active=1 ORDER BY name";
                        $sql=mysqli_query($con,$qry);
                        while($data=mysqli_fetch_array($sql,MYSQLI_ASSOC))
                        { //begin populate list ?>
                          <option value=<?php echo $data['id'];?>
                          <?php
                            //make listbox default to record's faculty
                            if($data['id']==$building)
                            {?>selected="selected"<?php } ?>>
                            <?php echo $data['name'];?>
                          </option>
                      <?php } //end populate list ?>
                    </select>
                  </div>

									<label class="control-label col-md-1 col-sm-3 col-xs-12">
										<?php echo $formFloor;?> <span class="required">*</span>
									</label>
									<div class="col-md-1 col-sm-9 col-xs-12">
										<input type="text" name="floor" class="form-control"
										required value="<?php echo $floor;?>">
									</div>
                </div>

								<div class="form-group">
									<label class="control-label col-md-2 col-sm-3 col-xs-12">
										<?php echo $formCode;?>
									</label>
									<div class="col-md-9 col-sm-9 col-xs-12">
										<input type="text" name="code" class="form-control"
										value="<?php echo $code;?>">
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
                    <?php echo $formDescription;?>
                  </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                    <textarea type="text" name="description"
                    class="form-control"><?php echo $description;?></textarea>
                  </div>
                </div>

								<div class="form-group">
										<div class="col-md-6 col-sm-9 col-xs-12 col-md-offset-2">
												<a href="room.php">
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
