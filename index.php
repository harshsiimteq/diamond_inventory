<?php

$conn = mysqli_connect("localhost","root","Shahharsh21","dsm");
$diamond  = "SELECT * FROM `diamonds` WHERE diamond_type = 'Fancy' AND `diamond_size` >= 0.90 LIMIT 200";
$diamondResult = mysqli_query($conn, $diamond);

require 'index.view.php';