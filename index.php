<?php

$conn = mysqli_connect("localhost","root","Shahharsh21","dsm_system_clean");
$diamond  = "SELECT * FROM `diamonds` WHERE diamond_type = 'Certified'";
$diamondResult = mysqli_query($conn, $diamond);

$resultType = mysqli_fetch_all(mysqli_query($conn, "SELECT DISTINCT(`diamond_type`) FROM `diamonds`"));

$resultTypeShape = mysqli_fetch_all(mysqli_query($conn, "SELECT DISTINCT(`attribute_name`) FROM attributes, diamonds WHERE attribute_id = diamond_shape_id"));

require 'index.view.php';
