<?php
	//Displays the main page

	//display header
	include_once ("header.php");
	//fetch strings to display
	include_once ("strings.php");
?>

	<!-- PAGE CONTENT -->
	<div class="right_col" role="main">
		<div class="row">
			<center>
				<h1><?php echo $indexTitle;?></h1>
				<img src="img/logo.png" alt="" height="200" width="200">
			</center>
		</div>
	</div>
	<!-- END OF PAGE CONTENT -->

<?php
	//display footer
	require("footer.php");
?>
