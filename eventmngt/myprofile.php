<?php
session_start();
include_once 'db_connect.php';
if(!isset($_SESSION['user']) && $_SESSION['category']!='user')
{
	header("Location: login.php");
}
else 
	$uname=$_SESSION['user'];
	
if((isset($_POST['part'])))
{
	$ename = $_POST['part'];
	$ab=mysqli_query($bd,"INSERT INTO participants(pid, p_uname, p_ename, pdate) VALUES('','$uname','$ename',CURDATE())");
	if(!$ab){echo mysqli_error($bd);}
	else 
	{
		?>
        <script>alert("Successfully participated");
        window.location.href='myprofile.php';</script>
        <?php
	}
}

if((isset($_POST['wait'])))
{
	$ename = $_POST['wait'];
	$ab=mysqli_query($bd,"INSERT INTO wait_list(wid, w_uname, w_ename, wdate) VALUES('','$uname','$ename',CURDATE())");
	if(!$ab){echo mysqli_error($bd);}
	else 
	{
		?>
        <script>alert("Successfully waiting");
        window.location.href='myprofile.php';</script>
        <?php
	}
}

if((isset($_POST['nopart'])))
{
	$ename = $_POST['nopart'];
	$ab=mysqli_query($bd,"DELETE FROM participants WHERE p_uname='$uname' AND p_ename='$ename'");
	$cd=mysqli_query($bd,"SELECT * FROM wait_list WHERE w_ename='$ename' ORDER BY wdate ASC LIMIT 1");
	if(mysqli_num_rows($cd)>0)
	{
		$wrow=mysqli_fetch_row($cd);
		$ef=mysqli_query($bd,"INSERT INTO participants(pid, p_uname, p_ename, pdate) VALUES('','$wrow[1]','$wrow[2]','$wrow[3]')");
		if($ef)
			$gh=mysqli_query($bd,"DELETE FROM wait_list WHERE w_uname='$wrow[1]' AND w_ename='$wrow[2]'");
	}
	if(!$ab){echo mysqli_error($bd);}
	else 
	{
		?>
        <script>alert("Successfully cancelled");
        window.location.href='myprofile.php';</script>
        <?php
	}
}

if((isset($_POST['w-nopart'])))
{
	$ename = $_POST['w-nopart'];
	$ab=mysqli_query($bd,"DELETE FROM wait_list WHERE w_uname='$uname' AND w_ename='$ename'");
	if(!$ab){echo mysqli_error($bd);}
	else 
	{
		?>
        <script>alert("Successfully cancelled wait");
        window.location.href='myprofile.php';</script>
        <?php
	}
}

include('navbar.php');
?>
<center>
	<h1>Welcome <?php echo $_SESSION['user'] ?>!</h1>
    <h2 style="color:#000066;">Upcoming Events</h2>
    <form method="post">
        <table>
          <tr>
            <th>Event</th>
            <th>Date</th>
            <th>Description</th>
            <th>P-Limit</th>
            <th>N.O.P</th>
            <th>Participation</th>
          </tr>
          <?php
          $sql_query=mysqli_query($bd,"SELECT * FROM events WHERE date>CURDATE()");
			if(mysqli_num_rows($sql_query)>0)
			{
				while($row=mysqli_fetch_row($sql_query))
				{
					$ename = $row[1];
					$elim = $row[4];
					?>
					<tr>
            		<td><?php echo $row[1]; ?></td>
            		<td><?php echo $row[2]; ?></td>
            		<td><?php echo $row[3]; ?></td>
                    <td><?php echo $elim ; ?></td>
                    <?php 
					$abc=mysqli_query($bd,"SELECT * FROM participants WHERE p_ename='$ename'");
					$npe=mysqli_num_rows($abc);
					$def=mysqli_query($bd,"SELECT * FROM wait_list WHERE w_uname='$uname' AND w_ename='$ename'");
					?>
                    <td><?php echo $npe ?></td>
                    <?php
                    $res=mysqli_query($bd,"SELECT * FROM participants WHERE p_uname='$uname' AND p_ename='$ename'");
					if($npe<$elim && mysqli_num_rows($res)==0)
					{?>
            			<td>
                    		<button type="submit" name="part" class="btn-p" value="<?php echo $ename;?>">Participate</button>
                    	</td>
					<?php 
					}
					else if($npe==$elim && mysqli_num_rows($res)==0 && mysqli_num_rows($def)==0)
					{?>
            			<td>
                    		<button type="submit" name="wait" class="btn-p" value="<?php echo $ename;?>">Wait</button>
                    	</td>
					<?php 
					}
					else if(mysqli_num_rows($def)>0)
					{?>
						<td>
                    		<button type="submit" name="w-nopart" class="btn-np" value="<?php echo $ename;?>">Cancel Wait</button>
                   		</td>
					<?php 
					}
					else
					{?>
						<td>
                    		<button type="submit" name="nopart" class="btn-np" value="<?php echo $ename;?>">Cancel</button>
                   		</td>
					<?php 
					}?>
                    </tr>
                    <?php
				}
             }?>
        </table><br /><br /><br />
        </form>
    <a class="logout" href="index.php?logout">
    	<input type="button" name="btn-logout" class="btn-login" value="Logout"/>
    </a><br><br /><br />	
</center>
<?php
include('footer.php');
?>