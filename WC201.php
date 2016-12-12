<html>
<head>
	<title>Chat</title>
</head>
<body>

<form action="WC201.php">
	<h1>Chat</h1>
	<span style="position:relative;left:20px;top:0px">
	<p>
	<?php
	$username = $_GET['user'];
	if($username == null)
	{ ?>
		<meta http-equiv="refresh"content="0;URL=ER001.php">
	<?php }
	else if($username != null)
	{
    	echo $username;
    	/*$LOG_FILE_NAME = chmod('chat.txt', 0666);
    	$fp = fopen($LOG_FILE_NAME, "r+");
    	fwrite($fp, "test");
    	fclose($fp);*/
    }
	?>
	<input type="text" name="user_chat">
	<input type="submit" value="Write">
	</p></span>
	
	<hr>
	
	<input type="button" value="Refresh">
	<br>

	<hr>

	<A HREF="WC301.php" TARGET="_blank" >History</A>
	<span style="position:relative;left:100px;top:0px">
	<input type="button" onClick="location.href='WC101.php'"value="Logout">
	</span>
</form>

</body>
</html>
