<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
	</head>
	<body>
<?php
	
	
	$uzenetek = Array();
	if(!isset($_POST['nev']))
	{
		$uzenetek[] = "Hiányzó név";
	}
	else if(strlen($_POST['nev']) < 5)
	{
		$uzenetek[] = "Hibás név: ".$_POST['nev'];		
	}

	$re = '/^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/';
	if(!isset($_POST['email']))
	{
		$uzenetek[] = "Hiányzó e-mail";
	}
	else if(!preg_match($re,$_POST['email']))
	{
		$uzenetek[] = "Hibás email: ".$_POST['email'];
	}

	if(!isset($_POST['szoveg']))
	{
		$uzenetek[] = "Hiányzó üzenet";
	}
	else if(empty($_POST['szoveg']))
	{
		$uzenetek[] = "Üres üzenet! ".$_POST['szoveg'];
	}
	
	echo "Üzenetek:<br>";
	echo "<ul>";
	foreach($uzenetek as $uzenet)
		echo "<li>$uzenet</li>";
	echo "</ul>";

	echo "Kapott értékek: ";
	echo "<pre>";
	var_dump($_POST);
	echo "</pre>";
?>
	</body>
</html>
