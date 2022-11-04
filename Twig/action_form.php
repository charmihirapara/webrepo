<?php 
require 'dbconnection.php';
require_once 'vendor/autoload.php';
if(isset($_POST['submit']))
{
	// $client = new QuickEmailVerification\Client('5e85217cc8f24601c774b698502e4217a7295728b28b7c2ef2672aab249d');
	// $quickemailverification = $client->quickemailverification();
	// $response = $quickemailverification->verify($_POST['email']);
	// echo $response;
	// exit();

	$name = $_POST['name'];
	$email = $_POST['email'];
	$password = $_POST['password'];

	$query = "INSERT INTO User(`name`, `email`, `password`) VALUES ('$name', '$email', '$password')";
	$res = mysqli_query($con, $query);

	if ($res) 
	{
		?>
		<script type="text/javascript">
			alert("Inserted Successfully");
			window.location = 'phpproject.php';
		</script>
		<?php
	}
	else
	{
		?>
		<script type="text/javascript">
			alert("Not Inserted Successfully");
			window.location.href = "phpproject.php?status=NO";
		</script>
		<?php
	}
}

?>