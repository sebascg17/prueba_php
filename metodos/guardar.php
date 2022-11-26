<?php

include("../database/db.php");

if (isset($_POST['btnGuardar_producto'])){
    $nombre_producto = $_POST['txtNombre_producto'];
    $referencia = $_POST['txtReferencia'];
    $precio = $_POST['txtPrecio'];
    $peso = $_POST['txtPeso'];
    $categoria = $_POST['ddlCategoria'];
    $stock = $_POST['txtStock'];

    //Da el valor del producto multiplcada la cantidad
    $precio_total=(float)$precio*(float)$stock;

    $query = "INSERT INTO producto(nombre_producto, referencia, precio, peso, categoria, stock)
    VALUES ('$nombre_producto','$referencia','$precio_total','$peso','$categoria','$stock')";
    $result = mysqli_query($conn, $query);
    if(!$result){
        die("Query fallido");
    }

    $_SESSION['message'] = 'Producto guardada exitosamente';
    $_SESSION['message_type'] = 'success';


    header("Location: ../index.php");
}  

?>
