<?php 
require 'dbconnection.php';
require_once 'vendor/autoload.php';
if(isset($_POST['submit']))
{
	$name = $_POST['name'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$client   = new QuickEmailVerification\Client('5e85217cc8f24601c774b698502e4217a7295728b28b7c2ef2672aab249d');
	$quickemailverification  = $client->quickemailverification();
	try {
	// PRODUCTION MODE
	  $response = $quickemailverification->verify($_POST['email']);
	  //print_r($response);
	  // echo gettype($response);
	  $array = (array) $response;
	  echo $array['body']['result'];
	  if ($array['body']['result'] == 'valid') 
	  {
	  	$query = "INSERT INTO User(`name`, `email`, `password`) VALUES ('$name', '$email', '$password')";
		$res = mysqli_query($con, $query);
		if($res)
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
	  else
	  {
	  	?>
		<script type="text/javascript">
			alert("Invalid Email");
			window.location = 'phpproject.php';
		</script>
		<?php
	  }

	// SANDBOX MODE
	 // $response = $quickemailverification->sandbox($_POST['email']);
	 //  echo "yes".'<br>';
	 //  print_r($response);
	}
	catch (Exception $e) {
	  echo "Code: " . $e->getCode() . " Message: " . $e->getMessage();
	}
	
	exit();


	
}

?>