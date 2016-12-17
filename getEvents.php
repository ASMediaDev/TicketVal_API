<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 17.12.16
 * Time: 16:37
 */

require("db/dbh_attendize.php");



$sql = "SELECT id, title, start_date, end_date, organiser_id FROM events";
$result = mysqli_query($conn, $sql);

$eventarray = array();
while($row =mysqli_fetch_assoc($result))
{
    $eventarray[] = $row;
}

echo json_encode($eventarray);