<?php
include_once 'classes/db1.php';
$result = mysqli_query($conn,"SELECT * FROM staff_coordinator s ,event_info ef ,student_coordinator st,events e where e.event_id= ef.event_id and e.event_id= s.event_id and e.event_id= st.event_id");
?>
<!DOCTYPE html>
<html>

<head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>cems</title>
        <title></title>
        <?php require 'utils/styles.php'; ?><!--css links. file found in utils folder-->
        
    </head>

<body>
<div class = "content">
<div class = "container">
<h1>Event Details</h1>
<?php
if (mysqli_num_rows($result) > 0) {
?>
 <table class="table table-hover" >
  <thread>
  <tr>
    <th>Event Name</th>
    <th>No. of Participants</th>
    <th>Price</th>
    <th>Student Co-ordinator</th>
    <th>Staff Co-ordinator</th>
    <th>Date</th>                    
    <th>Time</th>
    <th>location </th>
  </tr>
</thead>
<?php
$i=0;
while($row = mysqli_fetch_array($result)) {
?>
<tr>
    <td><?php echo $row["event_title"]; ?></td>
    <td><?php echo $row["participants"]; ?></td>
    <td><?php echo $row["event_price"]; ?></td>
    <td><?php echo $row["st_name"]; ?></td>
    <td><?php echo $row["name"]; ?></td>
    <td><?php echo $row["Date"]; ?></td>
    <td><?php echo $row["time"]; ?></td>
    <td><?php echo $row["location"]; ?></td>
    <td> <?php echo '<a class="delete" href="deleteEvent.php?id='.$row['event_id'].'">Delete</a>'?></td> 
</tr>
<?php
$i++;
}
?>
</table>
<?php
}
?>             
<td> <?php echo '<a class="btn btn-default" href = "createEventForm.php">Create Event</a>'?></td><!--register button-->
        </div>
    </div>
 </body> 
</html>