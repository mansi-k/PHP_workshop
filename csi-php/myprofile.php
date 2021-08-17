<?php
session_start();
if(!isset($_SESSION['user']))
{
	header("Location: csi-login.php");
}

include('navbar.php');
?>
<center>
	<h1>Welcome To <br>Your Profile!</h1>
    <h3>
    	Your Name : <?php echo $_SESSION['user']; ?>
		<br /><br>
		Your Class : <?php echo $_SESSION['class']; ?>
    </h3><br>
    <a class="logout" href="csi-home.php?logout">
    	<input type="button" name="btn-logout" class="btn-login" value="Logout"/>
    </a><br>
</center>
<?php
include('footer.php');
?>