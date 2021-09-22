<?php include("db.php"); ?>

<?php include('includes/header.php'); ?>

<main class="container p-4">
  <div class="row">
    
    <div class="col-md-4">
      
      <!-- MESSAGES -->

      <?php if (isset($_SESSION['message'])) { ?>
      <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message']?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php session_unset(); } ?>

      <!-- ADD TASK FORM -->
      <div class="card card-body">
        <form action="save_task.php" method="POST">
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
          <input type="submit" name="save_task" class="btn btn-success btn-block" value="Guardar">
        </form>
      </div>
    </div>

    
    <div class="col-md-8">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Producto</th>
            <th>Marca</th>
            <th>Descripcion</th>
            <th>Precio Costo</th>
            <th>Precio Venta</th>
            <th>Existencia</th>
            <th>Acción</th>
          </tr>
        </thead>
        <tbody>

          <?php
          $query = "SELECT * FROM productos";
          $result_tasks = mysqli_query($conn, $query);    

          while($row = mysqli_fetch_assoc($result_tasks)) { 

          ?>
          <tr>
          <td> <?php echo $row['producto']; ?> </td>
          <td> <?php echo $row['id_marca']; ?> </td>
          <td> <?php echo $row['descripcion']; ?> </td>
          <td> <?php echo $row['precio_costo']; ?> </td>
          <td> <?php echo $row['precio_venta']; ?> </td>
          <td> <?php echo $row['existencia']; ?> </td>
          
            <td>
              <a href="edit.php?id_producto=<?php echo $row['id_producto']?>" class="btn btn-secondary">
                <i class="fas fa-marker"></i>
              </a>
              <a href="delete_task.php?id_producto=<?php echo $row['id_producto']?>" class="btn btn-danger">
                <i class="far fa-trash-alt"></i>
              </a>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>


    <!-- CRUD MARCA -->
    <div class="col-md-12">
      </br>
      </br>
      </br>
      <h5> CRUD MARCA </h5>
    </div>
    
    <div class="col-md-4">
      <!-- MESSAGES -->

      <?php if (isset($_SESSION['message'])) { ?>
      <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message']?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php session_unset(); } ?>

      <!-- ADD TASK FORM -->
      <div class="card card-body">
        <form action="save_task2.php" method="POST">
          <div class="form-group">
            <p>
              <input type="text" name="marca" class="form-control" placeholder="marca" autofocus>
            </p>
          </div>
          <input type="submit" name="save_task2" class="btn btn-success btn-block" value="Guardar">
        </form>
      </div>
    </div>
    <div class="col-md-8">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Marca</th>
            <th>Acción</th>
          </tr>
        </thead>
        <tbody>

          <?php
          $query = "SELECT * FROM marca";
          $result_tasks = mysqli_query($conn, $query);    

          while($row = mysqli_fetch_assoc($result_tasks)) { 

          ?>
          <tr>
          <td> <?php echo $row['marca']; ?> </td>
          
            <td>
              <a href="edit2.php?id_marca=<?php echo $row['id_marca']?>" class="btn btn-secondary">
                <i class="fas fa-marker"></i>
              </a>
              <a href="delete_task2.php?id_marca=<?php echo $row['id_marca']?>" class="btn btn-danger">
                <i class="far fa-trash-alt"></i>
              </a>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</main>

<?php include('includes/footer.php'); ?>
