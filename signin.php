<?php

require ("db/dbh.php");

$returnValue = array();

if(empty($_REQUEST["userName"]) || empty($_REQUEST["userPassword"]))
{
    $returnValue["status"]="400";
    $returnValue["message"]="Missing required information";
    echo json_encode($returnValue);
    return;

}


$userName = htmlentities($_REQUEST["userName"]);
$userPassword = htmlentities($_REQUEST["userPassword"]);

$sql = "SELECT * FROM users WHERE uid='$userName' AND pwd='$userPassword'";
$result = mysqli_query($conn, $sql);

if (!$row = mysqli_fetch_assoc($result)){
    $returnValue["status"]="403";
    $returnValue["message"]="User not found";
    echo json_encode($returnValue);
    return;
}

else
    {
        $result = mysqli_query($conn, $sql);

        while($row = mysqli_fetch_array($result)) {

        $returnValue["status"]="200";
        $returnValue["userFirstName"] = $row['first'];
        $returnValue["userLastName"] = $row['last'];
        $returnValue["userEmail"] = $row['mail'];
        $returnValue["userId"] = $row['uid'];

        }

        echo json_encode($returnValue);
        return;
}
