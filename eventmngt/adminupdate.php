<?php
session_start();
include_once 'db_connect.php';
if(!isset($_SESSION['admin']))
{
	header("Location: login.php");
}

$event=$_GET['event'];

if((isset($_POST['btn-update'])))
{
	$evname=$_POST['evname'];
	$edate=$_POST['edate'];
	$edesc=$_POST['edesc'];
	$elim=$_POST['elim'];
	$sql_query=mysqli_query($bd,"UPDATE events SET ename='$evname', date='$edate', edesc='$edesc', elimit='$elim' WHERE ename='$event'");
	$sql1=mysqli_query($bd,"UPDATE participants SET p_ename='$evname' WHERE p_ename='$event'");
	$sql2=mysqli_query($bd,"UPDATE wait_list SET w_ename='$evname' WHERE w_ename='$event'");
	if($sql_query && $sql1 && sql2)
	{
		?>
		<script>alert('Successfully updated!');
		window.location.href='adminprofile.php';</script> 
		<?php
	}
	else
	{
		?>
		<script>alert('Could not update!');</script> 
		<?php
	}
}

include('navbar.php');

$abc=mysqli_query($bd,"SELECT * FROM events WHERE ename='$event'");
$row=mysqli_fetch_row($abc)
?>
<br><br />
<div class="form-bg">
    <h2>Update Event</h2>
    <div class="login-form">
        <form method="post">
            <label>Event Name</label><br><br>
            <input type="text" name="evname" class="input" value="<?php echo $row[1];?>" required/>
            <br /><br><br>
            <label>Date (YYYY-MM-DD)</label><br><br>
            <input type="text" name="edate" class="input" value="<?php echo $row[2];?>" required /><br><br><br>
            <label>Description</label><br><br>
            <textarea type="text" name="edesc" class="input" rows="3" required /><?php echo $row[3];?></textarea><br><br><br>
            <label>Participation Limit</label><br><br>
            <input type="text" name="elim" class="input" placeholder="Enter Limit" required /><br><br><br>
            <input type="submit" name="btn-update" class="btn-login" value="Update"/>
        </form>
    </div>
</div><br />
<?php
include('footer.php');
?>