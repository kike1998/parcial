<?php

include('db.php');

if(isset($_POST['save_task'])) { 
  $producto=$_POST['producto'];
  $id_marca=$_POST['id_marca'];
  $descripcion=$_POST['descripcion'];
  $precio_costo=$_POST['precio_costo']; 
  $precio_venta=$_POST['precio_venta'];
  $existencia=$_POST['existencia'];

  $query="INSERT INTO productos(producto, id_marca, descripcion, precio_costo, precio_venta, existencia) VALUES ('$producto', '$id_marca', '$descripcion', '$precio_costo', '$precio_venta', '$existencia')"; 
  $result=mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Task Saved Successfully';
  $_SESSION['message_type'] = 'success';
  header('Location: index.php');

}

?>
