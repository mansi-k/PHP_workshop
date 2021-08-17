<?php
session_start();
include_once 'db_connect.php';

if(isset($_SESSION['user'])!="")
{
	header("Location: myprofile.php");
}

if((isset($_POST['btn-login'])))
{
	$user_name = $_POST['username'];
	$password = $_POST['password'];
	$res=mysqli_query($bd,"SELECT * FROM members WHERE user_name='$user_name' and password='$password'");
	$row=mysqli_fetch_array($res);
	if($row['password'] == $password && $row['user_name'] == $user_name)
	{
		$_SESSION['user'] = $row['user_name'];
		$_SESSION['class'] = $row['class'];
		header("Location: myprofile.php");
	}
	if(!isset($_SESSION['user']))
	{
	?>
    	<script>
			alert('Wrong Details');
			window.location.href = 'csi-login.php'; 
        </script> 
   	<?php
	}
}

include('navbar.php');
?>
<center>
	<br>
    <div class="form-bg">
        <h2>Login Form</h2>
        <div class="login-form">
            <form method="post">
                <label>Username</label><br><br>
                <input type="text" name="username" placeholder="Enter Username" class="input"/>
                <br /><br><br>
                <label>Password</label><br><br>
                <input type="password" name="password" placeholder="Enter Password" class="input"/><br><br><br>
                <input type="submit" name="btn-login" class="btn-login" value="Login"/>
            </form>
        </div>
    </div>
</center>
<?php
include('footer.php');
?>