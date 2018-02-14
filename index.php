<?php

$conn = mysqli_connect("localhost","root","Shahharsh21","dsm_system_clean");
$diamond  = "SELECT * FROM `diamonds` WHERE diamond_type = 'Certified' AND `diamond_size` >= 0.90 LIMIT 500";
$diamondResult = mysqli_query($conn, $diamond);

require 'index.view.php';
