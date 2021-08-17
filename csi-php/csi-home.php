<?php
session_start();
if(isset($_GET['logout']))
{
	session_destroy();
	unset($_SESSION['user']);
}
include('navbar.php');
?>
<center>
	<h1>Welcome<br> To<br> CSI-VESIT!</h1>
</center>
<?php
include('footer.php');
?>