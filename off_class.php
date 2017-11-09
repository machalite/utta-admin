<?php
  //displays class data for administration

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
          <h3><?php echo $offClassTitle;?></h3>
        </div>
      </div>
    </div>

  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12 responsive">
      <div class="x_panel">
        <div class="x_title">
          <a href="off_class_form.php">
						<!-- displays add button -->
            <button type="button" class="btn btn-success">
              <i class="fa fa-plus"></i>
							<?php echo (" ".$textManage);?></button>
          </a>
        </div>
        <div class="x_content">
          <table id="datatable" class="table table-striped table-bordered">
            <thead>
              <tr>
                <th><?php echo $tableCourse;?></th>
								<th><?php echo $tableStatus;?></th>
                <th><?php echo $tableDate;?></th>
                <th><?php echo $tableRoom;?></th>
                <th><?php echo $tableStartClass;?></th>
                <th><?php echo $tableEndClass;?></th>
								<th><?php echo $tableDescription;?></th>
								<th><?php echo $tableActive;?></th>
                <th><?php echo $tableAction;?></th>
              </tr>
            </thead>
            <tbody>
              <?php
							//populate table with data from database
							$strDisp="SELECT o.id, s.name AS course, o.status, o.date, o.startclass,
							o.endclass, o.active, o.description, r.name AS room
							FROM offclass o, class c, course s, room r
							WHERE o.class=c.id
							AND c.room=r.id
							AND c.course=s.id";

							$sql=mysqli_query($con,$strDisp);
							while($data=mysqli_fetch_array($sql,MYSQLI_ASSOC))
							{//begin populate table ?>
								<tr>
                  <td><?php echo $data['course'];?></td>
									<td>
										<?php
										switch ($data['status'])
										{
											case 1:echo $statusCancelled;break;
											case 2:echo $statusPostponed;break;
											case 3:echo $statusRelocated;break;
											case 4:echo $statusReplacement;break;
											case 5:echo $statusSupplementary;break;
											default:echo $statusNot;
										}
										?>
									</td>
                  <td><?php echo $data['date'];?></td>
                  <td><?php echo $data['room'];?></td>
                  <td><?php echo date('H:i',strtotime($data['startclass']));?></td>
                  <td><?php echo date('H:i',strtotime($data['endclass']));?></td>
									<td><?php echo $data['description'];?></td>
									<td>
										<input type="checkbox" name="active"
										onclick="actDeact('off_class',<?php echo "'".$data['id']."','".$data['course']."','".$data['active']."'";?>)"
										<?php if($data['active']==1){?>checked<?php } ?>>
									</td>

									<!-- generate action buttons -->
									<td width="160">
										<!-- update button -->
										<a href="off_class_form.php?&id=<?php echo $data['id']; ?>">
											<button type="button" class="btn btn-primary">
												<i class="fa fa-pencil"></i></button>
										</a>

									</td>
								</tr>
							<?php }//end populate table ?>
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
