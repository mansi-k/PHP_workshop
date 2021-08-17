<?php
session_start();
if(isset($_GET['logout']))
{
	session_destroy();
	unset($_SESSION['user']);
	unset($_SESSION['admin']);
	unset($_SESSION['category']);
}
include('navbar.php');
?>
<center><br />
	<h1 class="welcome">Welcome<br> To<br> <span><img src="elogo.png" /></span></h1>
    <br /><br /><br /><br /><br />
</center>
<?php
include('footer.php');
?>