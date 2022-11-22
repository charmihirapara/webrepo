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

if (isset($_POST['file_submit'])) 
{
	$file = $_POST['file'];

	$headers = array();
	$headers[] = "Authorization:token c0e41088053ddec2edf603ed190fc7410a2b8bdca69f7922436dffada56e"; // Replace API_KEY with your API Key
	// $headers[] = "X-QEV-Filename:mail.csv"; // Set the display name of file to upload (optional)
	// $headers[] = 'X-QEV-Callback:http://www.phpproject.com'; // Set your callback URL (optional)

	// This is a path to your file to upload
	$post = array('upload' => $file);
	

	$ch = curl_init("https://vrp.api.evm.222.aum/v1/bulk-verify");
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 15);
	curl_setopt($ch, CURLOPT_TIMEOUT, 30); 
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
	$result = curl_exec($ch);
	print_r($ch);
	$jsonToArray = json_decode($result, true);
	print_r($result);
 	curl_close($ch);
}
?>