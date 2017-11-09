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
		$text=$textUpdate." ".$textUser;

		// attempt select query execution
		$sql=mysqli_query($con,"SELECT id,username,password,lastlogin
			FROM user WHERE id='$_GET[id]'");
		$data=mysqli_fetch_array($sql,MYSQLI_ASSOC);

		//fill variable with data from database to show in textfield
		$id=$data['id'];
		$username=$data['username'];
		$password=$data['password'];
		$lastlogin=$data['lastlogin'];

		$link="user_func.php?&ops=2";
	}
	else
	{
		$text=$textAdd." ".$textUser;
		$id=null;
		$username=null;
		$password=null;
		$lastlogin=null;

		$link="user_func.php?&ops=1";
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
						<form name="userForm" method="post"
							action="<?php echo $link?>" enctype="multipart/form-data"
								class="form-horizontal form-label-left">

								<!-- hidden textfield for id -->
								<input type="hidden" name="id" value="<?php echo $id;?>">

								<!-- hidden textfield for old username -->
								<input type="hidden" name="oldusername"
									value="<?php echo $username;?>">

								<!-- hidden textfield for old password -->
								<input type="hidden" name="oldpassword"
									value="<?php echo $password;?>">

								<div class="form-group">
									<label class="control-label col-md-2 col-sm-3 col-xs-12">
										<?php echo $formUsername;?> <span class="required">*</span>
									</label>
									<div class="col-md-9 col-sm-9 col-xs-12">
										<input type="text" name="username" class="form-control"
										required value="<?php echo $username;?>">
									</div>
								</div>

								<div class="form-group">
									<label class="control-label col-md-2 col-sm-3 col-xs-12">
										<?php echo $formPassword;?> <span class="required">*</span>
									</label>
									<div class="col-md-9 col-sm-9 col-xs-12">
										<input type="password" name="pass"
										class="form-control" required>
									</div>
								</div>
								<?php
									if(empty($_GET['id']))
										{ //Reveal textfields only if update user
								?>
								<div class="form-group">
									<label class="control-label col-md-2 col-sm-3 col-xs-12">
										<?php echo $formRePassword;?>
											<span class="required">*</span>
									</label>
									<div class="col-md-9 col-sm-9 col-xs-12">
										<input type="password" name="repass"
										class="form-control" required>
									</div>
								</div>
								<?php
							}
								?>

								<?php
									if(!empty($_GET['id']))
										{ //Reveal textfields only if update user
								?>
								<div class="form-group">
									<label class="control-label col-md-2 col-sm-3 col-xs-12">
										<?php echo $formNewPassword;?>
											<span class="required">*</span>
									</label>
									<div class="col-md-9 col-sm-9 col-xs-12">
										<input type="password" name="newpass"
										class="form-control" required>
									</div>
								</div>

								<div class="form-group">
									<label class="control-label col-md-2 col-sm-3 col-xs-12">
										<?php echo $formRenewPassword;?>
											<span class="required">*</span>
									</label>
									<div class="col-md-9 col-sm-9 col-xs-12">
										<input type="password" name="repass"
										class="form-control" required>
									</div>
								</div>

								<div class="form-group">
									<label class="control-label col-md-2 col-sm-3 col-xs-12">
										<?php echo $formLastLogin;?>
									</label>
									<div class="col-md-9 col-sm-9 col-xs-12">
										<input type="text" name="lastlogin" class="form-control"
										 value="<?php echo $lastlogin;?>" disabled="true">
									</div>
								</div>

								<?php
							} //end if bracket
								?>

								<div class="form-group">
									<div class="col-md-6 col-sm-9 col-xs-12 col-md-offset-2">
										<a href="user.php">
											<button type="button" class="btn btn-danger">
											<i class="fa fa-reply"></i>
												<?php echo $textCancel;?></button>
										</a>

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
