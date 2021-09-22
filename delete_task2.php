<?php
    include('db.php');

    if (isset($_GET['id_marca'])) {
        $id = $_GET['id_marca'];
        $query = "DELETE FROM marca WHERE id_marca = $id"; 
        $result = mysqli_query($conn, $query);


        if (!$result) {

            die("Fail");
        }

        $_SESSION['message'] = 'Los datos se eliminaron satisfactoriamente.';
        $_SESSION['message_type'] = 'danger'; 
        header('Location: index.php');  
    }

?>

