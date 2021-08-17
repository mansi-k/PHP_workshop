<?php
session_start();
include_once 'db_connect.php';
if(!isset($_SESSION['admin']))
{
	header("Location: login.php");
}

if((isset($_POST['btn-create'])))
{
	$evname=$_POST['evname'];
	$edate=$_POST['edate'];
	$edesc=$_POST['edesc'];
	$elim=$_POST['elim'];
	$ab=mysqli_query($bd,"INSERT INTO events(eid, ename, date, edesc, elimit) VALUES('','$evname','$edate','$edesc','$elim')");
	if($ab)
	{
		?>
		<script>alert('Successfully created!');
		window.location.href='adminprofile.php';</script> 
		<?php
	}
	else
	{
		?>
		<script>alert('Could not create!');</script> 
		<?php
	}
}

include('navbar.php');
?>
<br><br />
<div class="form-bg">
    <h2>New Event</h2>
    <div class="login-form">
        <form method="post">
            <label>Event Name</label><br><br>
            <input type="text" name="evname" class="input" placeholder="Enter Name" required/>
            <br /><br><br>
            <label>Date (YYYY-MM-DD)</label><br><br>
            <input type="text" name="edate" class="input" placeholder="YYYY-MM-DD" required /><br><br><br>
            <label>Description</label><br><br>
            <textarea type="text" name="edesc" class="input" placeholder="Describe Event" rows="3" required /></textarea><br><br><br>
            <label>Participation Limit</label><br><br>
            <input type="text" name="elim" class="input" placeholder="Enter Limit" required /><br><br><br>
            <input type="submit" name="btn-create" class="btn-login" />
        </form>
    </div>
</div><br />
<?php
include('footer.php');
?>