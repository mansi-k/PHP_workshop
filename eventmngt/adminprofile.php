<?php
session_start();
include_once 'db_connect.php';
if(!isset($_SESSION['admin']))
{
	header("Location: login.php");
}

if((isset($_POST['delete'])))
{
	$event = $_POST['delete'];
	$ab=mysqli_query($bd,"DELETE FROM events WHERE ename='$event'");
	$cd=mysqli_query($bd,"DELETE FROM participants WHERE p_ename='$event'");
	$ef=mysqli_query($bd,"DELETE FROM wait_list WHERE w_ename='$event'");	
	if(!$ab || !$cd || !$ef){echo mysqli_error($bd);}
	else 
	{
		?>
        <script>alert("Successfully deleted event");
        window.location.href='adminprofile.php';</script>
        <?php
	}
}

include('navbar.php');
?>

<center>
	<h1>Admin Profile</h1>
    <h2 style="color:#000066;">All Events</h2>
    <form method="post" name="aevents">
        <table>
          <tr>
            <th>Event</th>
            <th>Date</th>
            <th>Description</th>
            <th>P-Limit</th>
            <th>N.O.P</th>
            <th>Check</th>
            <th>Update</th>
            <th>Delete</th>
          </tr>
          <?php
          $sql_query=mysqli_query($bd,"SELECT * FROM events ORDER BY date ASC");
            if(mysqli_num_rows($sql_query)>0)
            {
                while($row=mysqli_fetch_row($sql_query))
                {
                    $ename = $row[1];
                    ?>
                    <tr>
                        <td><?php echo $row[1]; ?></td>
                        <td><?php echo $row[2]; ?></td>
                        <td><?php echo $row[3]; ?></td>
                        <td><?php echo $row[4]; ?></td>
                        <?php 
                        $abc=mysqli_query($bd,"SELECT * FROM participants WHERE p_ename='$ename'");
                        $npe=mysqli_num_rows($abc);
                        ?>
                        <td><?php echo $npe ?></td>
                        <td><a href="admincheck.php?event=<?php echo $ename;?>">
                            <button type="button" name="check" class="btn-a">Check</button></a>
                        </td>
                        <td><a href="adminupdate.php?event=<?php echo $ename;?>">
                            <button type="button" name="update" class="btn-a">Update</button></a>
                        </td>
                        <td>
                            <button type="submit" name="delete" class="btn-d" onClick="return confirmDel()" value="<?php echo $ename;?>">Delete</button>
                        </td>
                	</tr><?php
                }
            }?>
        </table>
    </form><br><br>
    <a href="admincreate.php">
    	<input type="button" class="btn-b" value="Create New Event"/>
    </a><br><br /><br />
    <a class="logout" href="index.php?logout">
    	<input type="button" name="btn-logout" class="btn-login" value="Logout"/>
    </a><br><br /><br />
</center>
<?php
include('footer.php');
?>
<script type="text/javascript">

function confirmDel()
{
	if (confirm('Are you sure you want to save this thing into the database?')) 
	{
    	document.aevents.submit();
		return true;
	} 
	else {
		return false;
	}

}

</script>