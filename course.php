<?php
  //displays course data for administration

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
          <h3><?php echo $courseTitle;?></h3>
        </div>
      </div>
    </div>

  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12 responsive">
      <div class="x_panel">
        <div class="x_title">
          <a href="course_form.php">
						<!-- displays add button -->
            <button type="button" class="btn btn-success">
              <i class="fa fa-plus"></i>
							<?php echo (" ".$textAdd." ".$textCourse);?></button>
          </a>
        </div>
        <div class="x_content">
          <table id="datatable" class="table table-striped table-bordered">
            <thead>
              <tr>
								<th><?php echo $tableFaculty;?></th>
                <th><?php echo $tableDepartment;?></th>
                <th><?php echo $tableCode;?></th>
                <th><?php echo $tableName;?></th>
                <th><?php echo $tableLecturer;?></th>
								<th><?php echo $tableActive;?></th>
                <th><?php echo $tableAction;?></th>
              </tr>
            </thead>
            <tbody>
              <?php
							//populate table with data from database
							$strDisp="SELECT c.id,c.code,c.name,c.active,
                f.name AS faculty, d.name AS department, l.name AS lecturer
								FROM course c, faculty f , department d, lecturer l
                WHERE c.department=d.id AND d.faculty=f.id AND c.lecturer=l.id";

							$sql=mysqli_query($con,$strDisp);
							while($data=mysqli_fetch_array($sql,MYSQLI_ASSOC))
							{//begin populate table ?>
								<tr>
									<td><?php echo $data['faculty'];?></td>
                  <td><?php echo $data['department'];?></td>
									<td><?php echo $data['code'];?></td>
									<td><?php echo $data['name'];?></td>
                  <td><?php echo $data['lecturer'];?></td>
									<td>
										<input type="checkbox" name="active"
										onclick="actDeact('course',<?php echo "'".$data['id']."','".$data['name']."','".$data['active']."'";?>)"
										<?php if($data['active']==1){?>checked<?php } ?>>
									</td>

									<!-- generate action buttons -->
									<td width="160">
										<!-- update button -->
										<a href="course_form.php?&id=<?php echo $data['id']; ?>">
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
