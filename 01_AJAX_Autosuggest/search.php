<?php

include("db.php");

//$mode=$_POST['mode'];
$mode = isset($_POST['mode']) ? $_POST['mode'] : '';
$query=mysqli_query($conn,
"SELECT * FROM internship WHERE mode='$mode'");

echo "<table>";

echo "<tr>
<th>ID</th>
<th>Name</th>
<th>Email</th>
<th>Contact</th>
<th>Mode</th>
</tr>";

while($row=mysqli_fetch_assoc($query))
{
    echo "<tr>";

    echo "<td>".$row['id']."</td>";
    echo "<td>".$row['stud_name']."</td>";
    echo "<td>".$row['email']."</td>";
    echo "<td>".$row['contact']."</td>";
    echo "<td>".$row['mode']."</td>";

    echo "</tr>";
}

echo "</table>";

?>