<?php 
	session_start();

	if (isset($_SESSION['user_info'])) 
	{
		var_dump("Log in Successful");
		// session_destroy()();
	}
	else
	{
		header("Location: index.php");
	}
?>