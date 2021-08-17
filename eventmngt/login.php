<?php
session_start();
include_once 'db_connect.php';

if(isset($_SESSION['user'])!="")
{
	header("Location: myprofile.php");
}
else if(isset($_SESSION['admin'])!="")
{
	header("Location: adminprofile.php");
}

if(isset($_POST['btn-login']))
{
	$_SESSION['category'] = $_POST['logincat'];
	$user_name = $_POST['username'];
	$password = $_POST['password'];
	if($_POST['logincat']=="user")
	{
		$res=mysqli_query($bd,"SELECT * FROM users WHERE uname='$user_name' and password='$password'");
		$row=mysqli_fetch_array($res);
		if($row['password'] == $password && $row['uname'] == $user_name)
		{
			$_SESSION['user'] = $row['uname'];
			header("Location: myprofile.php");
		}
		if(!isset($_SESSION['user']))
		{
		echo mysqli_error($bd);
		?>
			<script>
				alert('Wrong Details');
				window.location.href = 'login.php'; 
			</script> 
		<?php
		}
	}
	else if($_POST['logincat']=="admin")
	{
		if($user_name=="admin123" && $password=="admin123pw")
		{
			$_SESSION['admin'] = "admin123";
			header("Location: adminprofile.php");
		}
		if(!isset($_SESSION['admin']))
		{
		echo mysqli_error($bd);
		?>
			<script>
				alert('Wrong Details');
				window.location.href = 'login.php'; 
			</script> 
		<?php
		}
	}
}

include('navbar.php');
?>

<br><br />
<div class="form-bg">
    <h2>Login Form</h2>
    <div class="login-form">
        <form method="post">
        	<label>Login Category</label><br /><br />
        	<select class="logincat" name="logincat" required="required">
                <option value="user">User</option>
                <option value="admin">Admin</option>
            </select> <br /><br /><br />
            <label>Username</label><br><br>
            <input type="text" name="username" placeholder="Enter Username" class="input" required/>
            <br /><br><br>
            <label>Password</label><br><br>
            <input type="password" name="password" placeholder="Enter Password" class="input" required/><br><br><br>
            <input type="submit" name="btn-login" class="btn-login" value="Login"/>
        </form>
    </div>
</div><br />
<center>
    <h3>New User?</h3>
    <a href="register.php"><button type="button" class="btn-b">Register Here</button></a><br /><br />	
</center>
<?php
include('footer.php');
?>