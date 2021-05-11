<?php include "includes/db_connection.php" ?>

<?php 
	$error = "";
	if (isset($_POST['username'])) 
	{	

		$Admin_Email = mysqli_real_escape_string($connection, $_POST['username']);
		$Admin_Password = mysqli_real_escape_string($connection, $_POST['password']);
		if (!empty($Admin_Email) && !empty($Admin_Password) ) 
		{
			$Admin_Password = sha1($Admin_Password);
			$getUser = "Select * from tbl_admin_user where Is_Active and  Admin_Email='{$Admin_Email}' and Admin_Password = '{$Admin_Password}'";
			$User = $connection->query($getUser);
			$User = $User->fetch_all(MYSQLI_ASSOC);
			if (count($User) == 0) 
			{
				$error = "Information Mismatch";
				var_dump($User);
			}
			else
			{

				session_start();

				$_SESSION['user_info'] = $User[0];
				// var_dump($_SESSION);
			}
		}
		
	}
	
?>

<?php include "includes/header.php" ?>
<body>
	<div class="login-form">
	    <form action="index.php" method="post">
			<h2 class="text-center">Member Login</h2>   
			<?php if (!empty($error)): ?>
				<div class="alert alert-info text-center"><h4><?php echo $error ?></h4></div>
			<?php endif ?>
	        <div class="form-group mt-2">
	        	<input type="text" class="form-control" name="username" placeholder="Username" required="required">
	        </div>
			<div class="form-group mt-2">
	            <input type="password" class="form-control" name="password" placeholder="Password" required="required">
	        </div>        
	        <div class="form-group d-grid gap-2 mt-2">
	            <button type="submit" class="btn btn-primary btn-lg btn-block">Sign in</button>
	        </div>
	    </form>
	</div>
</body>
<?php include "includes/footer.php" ?>