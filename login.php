<!-- Displays the login page -->
<!DOCTYPE html>
<html>
<head>
	<!-- META TAG -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- END OF META TAG -->

  <!-- CSS -->
  	<!-- Bootstrap -->
  	<link href="css/bootstrap.css" rel="stylesheet">
  	<!-- Font Awesome -->
  	<link href="css/font-awesome.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="css/custom.css" rel="stylesheet">
	<!-- END OF CSS -->

  <!-- display favicon -->
	<link rel="shortcut icon" type="image/png" href="img/favicon.ico"/>

  <!-- fetch string file for display-->
  <?php
    include_once("strings.php");
  ?>
  <!-- display title -->
	<title><?php echo $loginHeadTitle;?></title>

</head>

<body class="login">
  		<div class="login_wrapper">
  			<div class="animate form login_form">
  				<section class="login_content">
  					<form method="post" action="login_proc.php">
  						<h1><?php echo $loginTitle;?></h1>

  						<div>
  							<input type="text" name="username" class="form-control"
                  placeholder="Username" required="" />
  						</div>

  						<div>
  							<input type="password" name="password" class="form-control"
                  placeholder="Password" required="" />
  						</div>

  						<div>
  							<button type="submit" class="btn btn-primary">
                    <?php echo $loginButton;?></button>
  						</div>

  						<div class="separator"></div>
  					</form>
  				</section>
  			</div>
  		</div>
</body>
</html>
