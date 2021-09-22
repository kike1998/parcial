<?php
session_start();

$conn = mysqli_connect(
  'localhost',
  'root',
  '',
  'parcial'
) or die(mysqli_erro($mysqli));

?>
