<?php

include('db.php');

if(isset($_POST['save_task2'])) { 
  $marca=$_POST['marca'];

  $query="INSERT INTO marca(marca) VALUES ('$marca')"; 
  $result=mysqli_query($conn, $query);

  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Task Saved Successfully';
  $_SESSION['message_type'] = 'success';
  header('Location: index.php');

}

?>
