<?php 
require 'dbconnection.php';
if(isset($_POST['submit']))
{
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