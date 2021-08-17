<?php
session_start();
include_once 'db_connect.php';
if(!isset($_SESSION['admin']))
{
	header("Location: login.php");
}
include('navbar.php');

$event=$_GET['event'];
?>
<center>
	<h2>Participants Of <?php echo $event; ?></h2>
	<table>
          <tr>
          	<th>Sr. No.</th>
            <th>Participant</th>
            <th>Date Of Participation</th>
          </tr>
          <?php
          $sql_query=mysqli_query($bd,"SELECT * FROM participants WHERE p_ename='$event' ORDER BY pdate ASC");
            if(mysqli_num_rows($sql_query)>0)
            {
				$i=1;
                while($row=mysqli_fetch_row($sql_query))
                {
					?>
                    <tr>
                    	<td><?php echo $i; ?></td>
                        <td><?php echo $row[1]; ?></td>
                        <td><?php echo $row[3]; ?></td>
                    </tr>
                    <?php
					$i++;
				}
			}?>
        </table><br><br>
</center>

<?php
include('footer.php');
?>