<?php

	// Error reporting
	error_reporting(E_ALL^E_NOTICE);

	require("../connect.php");

	// Checking whether all input variables are in place:
	//if(!is_numeric($_POST['zindex']) || !isset($_POST['author']) || !isset($_POST['body']) || !in_array($_POST['color'],array('yellow','green','blue')));
	//die("0");

	// if(ini_get('magic_quotes_gpc'))
	// {
	// // If magic_quotes setting is on, strip the leading slashes that are automatically added to the string:
	// $_POST['author']=stripslashes($_POST['author']);
	// $_POST['body']=stripslashes($_POST['body']);
	// }

	// Escaping the input data:

	// $author = mysql_real_escape_string(strip_tags($_POST['author']));
	// $body = mysql_real_escape_string(strip_tags($_POST['body']));
	// $color = mysql_real_escape_string($_POST['color']);
	// $zindex = (int)$_POST['zindex'];
	
	$author = strip_tags($_POST['author']);
	$body = strip_tags($_POST['body']);
	$color = $_POST['color'];
	$zindex = (int)$_POST['zindex'];


	/* Inserting a new record in the notes DB: */
	mysqli_query($conn, 'INSERT INTO notes (text,name,color,xyz) VALUES ("'.$body.'", "'.$author.'", "'.$color.'", "0x0x'.$zindex.'")');

	//echo json_encode();

	//echo 'INSERT INTO notes (text, name, color, xyz) VALUES ("'.$body.'", "'.$author.'", "'.$color.'", "0x0x'.$zindex.'")';
	//exit;


	// if(mysql_affected_rows($conn)==1)
	// {
	// // Return the id of the inserted row:
	// echo mysql_insert_id($conn);
	// }
	// else echo '0';

?>