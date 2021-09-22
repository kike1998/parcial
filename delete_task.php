<?php
    include('db.php');

    if (isset($_GET['id_producto'])) {
        $id = $_GET['id_producto'];
        $query = "DELETE FROM productos WHERE id_producto = $id"; 
        $result = mysqli_query($conn, $query);


        if (!$result) {

            die("Fail");
        }

        $_SESSION['message'] = 'Los datos se eliminaron satisfactoriamente.';
        $_SESSION['message_type'] = 'danger'; 
        header('Location: index.php');  
    }

?>

