<?php

include("../database/db.php");

if (isset($_GET['id'])){
    $id = $_GET['id'];;

    $query = "DELETE FROM producto WHERE id = $id";
    $result = mysqli_query($conn, $query);
    if(!$result){
        die("Query fallido");
    }

    $_SESSION['message'] = 'Producto eliminado exitosamente';
    $_SESSION['message_type'] = 'danger';


    header("Location: ../index.php");
}

?>