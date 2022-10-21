<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Regular Expression</title>
</head>
<body>
	<h2>* Character Classes... [abc],[^abc],[a-z],[A-Z],[0-9],[a-zA-Z_0-9]</h2>
	<h3>- preg_match($pattern, $match)</h3>
	<?php 
	$pattern = "/ca[kf]e/";
	$text = "He was eat cake in Cafe";
	if (preg_match($pattern,$text)) 
		echo "Match Found in Case-Sensitive"."<br>";		
	else
		echo "Match Not Found in Case-Sensitive"."<br>";

	// i is used for case-insensitive
	$pattern = "/ca[kf]e/i";
	$text = "He was eat Cake in cafe";
	if (preg_match($pattern,$text)) 
		echo "Match Found in Case-Insensitive"."<br>";		
	else
		echo "Match Not Found in Case-Insensitive"."<br>";
	?>
	<h3>- preg_match_all($pattern, $match, $array)</h3>
	<?php 
		$pattern = "/ca[kf]e/i";
		$text = "He was eat cake in Cafe";
		$result = preg_match_all($pattern,$text);
		echo $result;
	?>

</body>
</html>