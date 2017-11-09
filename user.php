<?php
  //displays user data for administration

	//display header
	include_once ("header.php");
	//fetch strings to display
	include_once ("strings.php");
	//fetch connection settings
	include("connection.php");
?>

<!-- PAGE CONTENT -->
  <div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3><?php echo $userTitle;?></h3>
        </div>
      </div>
    </div>

  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12 responsive">
      <div class="x_panel">
        <div class="x_title">
          <a href="user_form.php">
						<!-- displays add button -->
            <button type="button" class="btn btn-success">
              <i class="fa fa-plus"></i>
							<?php echo (" ".$textAdd." ".$textUser);?></button>
          </a>
        </div>
        <div class="x_content">
          <table id="datatable" class="table table-striped table-bordered">
            <thead>
              <tr>
                <th><?php echo $tableUsername;?></th>
                <th><?php echo $tableLastLogin;?></th>
								<th><?php echo $tableActive;?></th>
                <th><?php echo $tableAction;?></th>
              </tr>
            </thead>
            <tbody>
              <?php
							//populate table with data from database

							$sql=mysqli_query($con,"SELECT id,username,lastlogin,active
								FROM user");
								while($data=mysqli_fetch_array($sql,MYSQLI_ASSOC))
							{//begin populate table?>

							<tr>
								<td><?php echo $data['username'];?></td>
								<td><?php echo $data['lastlogin'];?></td>
								<td>
									<input type="checkbox" name="active"
									onclick="actDeact('user',<?php echo "'".$data['id']."','".$data['username']."','".$data['active']."'";?>)"
									<?php if($data['active']==1){?>checked<?php } ?>>
								</td>

								<!-- generate action buttons -->
								<td width="160">
									<!-- update button -->
									<a href="user_form.php?&id=<?php echo $data['id']; ?>">
										<button type="button" class="btn btn-primary">
											<i class="fa fa-pencil"></i></button>
									</a>
								</td>
							</tr>
						<?php } //end populate table ?>
            </tbody>
          </table>
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
