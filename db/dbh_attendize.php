<?php

$conn = mysqli_connect("localhost", "dbuser", "Xenyx-1832", "tv_attendize");

if (!$conn){
    die("Connection failed: ".mysqli_connect_error());

}
