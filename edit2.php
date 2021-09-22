<?php
include("db.php");
$marca= '';  

if  (isset($_GET['id_marca'])) {
  $id_marca = $_GET['id_marca'];
  
  $query = "SELECT * FROM marca WHERE id_marca=$id_marca";
  
  $result = mysqli_query($conn, $query);

  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $marca=$row['marca'];
  }
}

if (isset($_POST['update'])) {
  $id_marca = $_GET['id_marca'];
  $marca=$_POST['marca'];
  $query = "UPDATE marca set marca = '$marca' WHERE id_marca = $id_marca";  
  
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
      <form action="edit2.php?id_marca=<?php echo $_GET['id_marca']; ?>" method="POST">
        <div class="form-group">
          <p>
            <input type="text" name="marca" class="form-control" placeholder="marca" autofocus>
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