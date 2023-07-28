<?php

//conexión a la base de datos

session_start();

$conn = mysqli_connect(
  'localhost',
  'root',
  '',
  'test'
) or die(mysqli_error($mysqli));

?>
