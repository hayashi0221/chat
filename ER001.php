<?php
	$dsn = 'mysql:dbname=chat;host=127.0.0.1';
	$user = 'root';
	$pw = 'H@chiouji1';
	
	$loginjouhou_sql = 'SELECT * FROM LoginId';
	
	$dbh = new PDO($dsn, $user, $pw);
	
	$loginjouhou = $dbh->prepare($loginjouhou_sql);
	$loginjouhou->execute();
	
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
	}
}
?>

<html>
<head>
	<title>Chat-Error101</title>
</head>
<body>

<form>
	<h1>Chat</h1>
	<FONT color="#ff0000">
	<h3>Error</h3>
	<?php 
	if($username == null || $user_password == null)
	{
		echo 'Plese input your id and password.';
	 }
	
	if($username_bool == false && $username !== null && $user_password !== null)
	{
		echo 'Not found id.';
	} 
	
	if($username_bool == true && $user_password_bool == false)
	{
		echo 'ID or Password is incorrect.';
	} 
	?>
	
	</FONT>
	<input type="button" onClick="location.href='WC101.php'"value="back">

</form>

</body>
</html>
