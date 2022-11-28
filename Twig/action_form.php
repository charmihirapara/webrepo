<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>

</body>
</html>
<?php 
require 'dbconnection.php';
require_once 'vendor/autoload.php';

if(isset($_POST['submit']))
{
	echo 'yes from free'."<br><br>";

	$name = $_POST['name'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	echo $email;

	$client = new QuickEmailVerification\Client('c0e41088053ddec2edf603ed190fc7e0ce5a871e9cba5ec0fe91f7b3d809'); 
	$quickemailverification = $client->quickemailverification();


	try {
		$response = $quickemailverification->verify($email); 
		}
	catch (Exception $e) {
	  echo "Code: " . $e->getCode() . " Message: " . $e->getMessage();
	}
}

if (isset($_POST['file_submit'])) 
{
	echo 'Yes From Paid'."<br><br>";
	$file = $_FILES['file']['name'];
	$path = $_FILES['file']['tmp_name'];
	echo "File Name : ".$file;

	$headers = array();
	$headers[] = "Authorization:token c0e41088053ddec2edf603ed190fc7e0ce5a871e9cba5ec0fe91f7b3d809"; 
	$headers[] = "X-QEV-Filename:mail.csv"; // Set the display name of file to upload (optional)
	$headers[] = 'X-QEV-Callback:http://www.phpproject.com/qev-callback'; // Set your callback URL (optional)

	$post = array('upload' => $path);
	// echo file_get_contents($file);

	$CSVfp = fopen($path, "r") or die("Unable to open file!");
	if ($CSVfp !== FALSE) 
	{
		?>	        
		<table border="1">
	        <tbody>
		    <?php
		    while (! feof($CSVfp)) 
		    {
	        	$data = fgetcsv($CSVfp, 1000, ",");
	        	if (! empty($data)) 
	        	{
	            ?>
            	<tr>
                	<td><?php echo $data[0]; ?></td>
                	<td><?php echo $data[1]; ?></td>
                	<td><?php echo $data[2]; ?></td>
                	<td><?php echo $data[3]; ?></td>
		    	</tr>
				<?php
				}
			}?>
			</tbody>
        </table>
        <?php
	}
	fclose($CSVfp);

	$ch = curl_init("https://vrp.api.evm.222.aum/v1/bulk-verify");
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 15);
	curl_setopt($ch, CURLOPT_TIMEOUT, 30); 
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
	$result = curl_exec($ch);
	$jsonToArray = json_decode($result, true);
 	curl_close($ch);
 	print_r($result);

}
?>