<?php
include("db.php");
$producto= '';  
$id_marca= '';
$descripcion= '';
$precio_costo= ''; 
$precio_venta= '';
$existencia= '';

if  (isset($_GET['id_producto'])) {
  $id_producto = $_GET['id_producto'];
  
  $query = "SELECT * FROM productos WHERE id_producto=$id_producto";
  
  $result = mysqli_query($conn, $query);

  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $producto=$row['producto'];
    $id_marca=$row['id_marca'];
    $descripcion=$row['descripcion'];
    $precio_costo=$row['precio_costo']; 
    $precio_venta=$row['precio_venta'];
    $existencia=$row['existencia'];
  }
}

if (isset($_POST['update'])) {
  $id_producto = $_GET['producto'];
  $producto=$_POST['producto'];
  $id_marca=$_POST['id_marca'];
  $descripcion=$_POST['descripcion'];
  $precio_costo=$_POST['precio_costo']; 
  $precio_venta=$_POST['precio_venta'];
  $existencia=$_POST['existencia'];
  $query = "UPDATE productos set producto = '$producto', id_marca = '$id_marca', descripcion = '$descripcion', precio_costo = '$precio_costo',  precio_venta= '$precio_venta', existencia = '$existencia' WHERE id_producto =$id_producto";  
  
  mysqli_query($conn, $query);
  $_SESSION['message'] = 'El registro fue actualizado correctamente';
  $_SESSION['message_type'] = 'warning';
  header('Location: index.php');
} 

?>
<?php include('includes/header.php'); ?>
<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
      <form action="edit.php?producto=<?php echo $_GET['id_producto']; ?>" method="POST">
        <div class="form-group">
        <p>
            <input type="text" name="producto" class="form-control" placeholder="producto" autofocus>
        </p>
        <p>
            <select class="form-control" name="id_marca" placeholder="Marca" autofocus>
              <option value=0>--- Marca ---</option>
                <?php
                    $query = "SELECT id_marca as id , marca FROM marca";
                    $result_usuario = mysqli_query($conn, $query);
                    while($fila = $result_usuario->fetch_assoc()){
                        echo "<option value=".$fila['id'].">".$fila['marca']."</option>";
                    }
                ?>
            </select>
        </p>
        <p>
            <input type="text" name="descripcion" class="form-control" placeholder="Descripcion" autofocus>
        </p>
        <p>
            <input type="double" name="precio_costo" class="form-control" placeholder="Precio_Costo" autofocus>
        </p>
        <p>
            <input type="double" name="precio_venta" class="form-control" placeholder="Precio_Venta" autofocus>
        </p>
        <p>
            <input type="int" name="existencia" class="form-control" placeholder="Existencia" autofocus>
        </p>

        
        </div>
        <button class="btn-success" name="update">
          Update
</button>
      </form>
      </div>
    </div>
  </div>
</div>
<?php include('includes/footer.php'); ?>