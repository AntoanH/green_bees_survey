<?php

$con = mysqli_connect("51.75.249.227", "bee1", "12345", "green_it_survey") or die("Error " . mysqli_error($connection));
if ($con->connect_errno) {
    die('Connect Error (' . $con->connect_errno . ') '. $con->connect_error);
}