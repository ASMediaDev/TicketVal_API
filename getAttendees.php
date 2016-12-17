<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 17.12.16
 * Time: 16:37
 */

require("db/dbh_attendize.php");


$eventId = $_GET['eventId'];


$sql = "SELECT order_id, ticket_id, first_name, last_name, private_reference_number  FROM attendees WHERE event_id = '$eventId'";
$result = mysqli_query($conn, $sql);

$attendeesarray = array();
while($row =mysqli_fetch_assoc($result))
{
    $attendeesarray[] = $row;
}

echo json_encode($attendeesarray);