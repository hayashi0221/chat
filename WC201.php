<?php
	$dsn = 'mysql:dbname=chat;host=127.0.0.1';
	$user = 'root';
	$pw = 'H@chiouji1';
	
	
	$loginjouhou_sql = 'SELECT * FROM LoginId';
	
	$chathyouji_sql = 'SELECT * FROM chat_table';
	
	
	
	

	$dbh = new PDO($dsn, $user, $pw);
	
	
	$loginjouhou = $dbh->prepare($loginjouhou_sql);
	$loginjouhou->execute();
	
	$chathyouji = $dbh->prepare($chathyouji_sql);
	$chathyouji->execute();
	
	
	
	$username_bool = false;
	$user_password_bool = false;
	
	$username = $_GET['user_id'];
	$user_password = $_GET['user_password'];
	
	



while(($login_buff = $loginjouhou->fetch()) !== false)
{
	 if($login_buff['loginid'] == $username)
	{
		$username_bool = true;
	}
	if($login_buff['password'] == $user_password)
	{
		$user_password_bool = true;
		$hyouji_username = $login_buff['dispname'];
	}
}
?>

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
	
	
	if($username_bool == false || $user_password_bool == false)
	{ ?>
		<meta http-equiv="refresh"content="0;URL=ER001.php">
	<?php }
	else if($username_bool == true && $user_password_bool == true)
	{
    	echo $hyouji_username;
    }
	?>
	<input type="text" name="user_chat">
	<?php 
		function chat_in()
		{
		$mainchat = $_REQUEST['user_chat'];
		
			/*$chattouroku_sql = 'insert into values('', $login_buff['id'])';*/
			
			/*$chattouroku_sql = 'insert into values(:mainchat, :id)';
			
			$chathyouji = $dbh->prepare($chattouroku_sql);
			
			$params = array(':mainchat' => $mainchat, ':id' => $login_buff['id']);
			
			$chathyouji->execute($params);*/
		}
	?>
	<input type="submit" value="Write">
	</p></span>
	
	<hr>
	
	<input type="button" value="Refresh">
	<br>
	
	<?php 
	while(($chat_buff = $chathyouji->fetch()) !== false)
	{
	 	
	}
	?>
	

	<hr>

	<A HREF="WC301.php" TARGET="_blank" >History</A>
	<span style="position:relative;left:100px;top:0px">
	<input type="button" onClick="location.href='WC101.php'"value="Logout">
	</span>
</form>

</body>
</html>
