<?php
  //displays lists user activities

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
          <h3><?php echo $actLogTitle;?></h3>
        </div>
      </div>
    </div>

  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12 responsive">
      <div class="x_panel">
        <div class="x_title">
        </div>
        <div class="x_content">
          <table id="datatable" class="table table-striped table-bordered">
            <thead>
              <tr>
                <th><?php echo $actLogUsername;?></th>
								<th><?php echo $actLogActivity?></th>
								<th><?php echo $actLogTime;?></th>
              </tr>
            </thead>
            <tbody>
              <?php
							//populate the table with activity log from database
							$strDisp="SELECT a.id,username,activity,timestamp
							FROM activitylog a, user u
							WHERE a.user=u.id ORDER BY timestamp DESC";
							$sql=mysqli_query($con,$strDisp);
							while($data=mysqli_fetch_array($sql,MYSQLI_ASSOC))
							{//begin populate table?>
							<tr>
								<td><?php echo $data['username'];?></td>
								<td><?php echo $data['activity'];?></td>
								<td><?php
								//echo $data['timestamp'];
								$date = new DateTime($data['timestamp'], new DateTimeZone('UTC'));
								$date->setTimezone(new DateTimeZone($timeZone));
								echo $date->format('Y-m-d H:i:s');
								?></td>
							</tr>
							<?php  }//end populate table ?>
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
	require("footer.php");
?>
