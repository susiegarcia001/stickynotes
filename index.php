<?php
	// Error reporting:
	error_reporting(E_ALL^E_NOTICE);

	// Including the DB connection file:
	require('connect.php');

	$sql = "SELECT name, text, color, xyz, dt FROM notes";
	$results = mysqli_query($conn, $sql);
	
	// print_r($result);
	
	// while($row = mysqli_fetch_array($result)) {
	// 	print_r($row);
	// }
	
	//$result = $conn->mysql_query($sql);

	if ($result->num_rows > 0) {
  //output data of each row
    while($row = $result->fetch_assoc()) {
        echo "author: " . $row["author"]. " body: " . $row["body"].  "<br>";
    }
	 } else {
 	//echo "0 results";
	 }

	// Removing notes that are older than an hour:
	//mysqli_query("DELETE FROM notes WHERE id>3 AND dt<SUBTIME(NOW(),'0 1:0:0')");

	 $sql = "SELECT * FROM notes ORDER BY id DESC";

	$notes = '';
	$left='';
	$top='';
	$zindex='';

	while ($row = mysqli_fetch_array($results))
	{
		//The xyz column holds the position and z-index in the form 200x100x10:
		list($left,$top,$zindex) = explode('x',$row['xyz']);

		$notes .= '
			<div class="note '
				.$row['color'].'" 
				style="left:'.$left.
				'px;top:'.$top.
				'px;z-index:'.$zindex.'">
				'.htmlspecialchars($row['text']).'
				<div class="author">'.htmlspecialchars($row['name']).'</div>
				<span class="data">'.$row['id'].'</span>
			</div>';
	}

?>

<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Sticky Notes</title>

	<link rel="stylesheet" type="text/css" href="styles.css" />
	<link rel="stylesheet" type="text/css" href="fancybox/jquery.fancybox-1.2.6.css" media="screen" />

	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.0/jquery.min.js"></script>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/jquery-ui.min.js"></script>
	<script type="text/javascript" src="fancybox/jquery.fancybox-1.2.6.pack.js"></script>

	<script type="text/javascript" src="script.js"></script>

</head>

<body>

	<h1>Sticky Notes</h1>
		<h2><a href=""></a></h2>


<div id="main">
	<a id="addButton" class="green-button" href="add_note.html">Add a note</a>
    
	<?php echo $notes; ?>
    
</div>

<p class=""><a href=""></a><a href=""></a></p>


</body>
</html>