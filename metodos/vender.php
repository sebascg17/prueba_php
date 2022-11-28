<?php 
include("../database/db.php");

if (isset($_GET['id'])){
    $id = $_GET['id'];    
    $query = "SELECT * FROM producto WHERE id = $id";
    $result = mysqli_query($conn, $query);
    if(mysqli_num_rows($result) == 1){
        $row = mysqli_fetch_array($result);
        $nombre_producto = $row['nombre_producto'];
        $precio = $row['precio'];
        $stock = $row['stock'];
        $estado = $row['estado'];
    }
}

if (isset($_POST['btnVender'])){
    
    $producto = $id;
    $vendidos = $_POST['txtCantidadVendida'];
    $total = $precio*$vendidos;
    $valor = $total;
    $estado=1;

    $restanteStock = $stock-$vendidos;
    if($restanteStock==0){
        $estado=0;
    }
    
    if($restanteStock<=0){
        

        $_SESSION['message'] = 'La cantidad a vender no puede superar el stock';
        $_SESSION['message_type'] = 'danger';

        // header("Location: vender.php?id=$id");
        // echo 'Se supero el stock';
    }else{
        $query = "INSERT INTO ventas(id_producto, vendidos, valor)
        VALUES ('$producto','$vendidos','$total')";   
    
        $result = mysqli_query($conn, $query);
        
        if($result){            

            $_SESSION['message'] = 'Producto guardada exitosamente';
            $_SESSION['message_type'] = 'success';

            $actualizar = "UPDATE producto SET stock = '$restanteStock', estado = '$estado' WHERE id = $id";
            mysqli_query($conn, $actualizar);

            header("Location: ../vender_producto.php");
        }
    }       
}
?>

<?php include("../includes/header.php") ?>

<div class="row justify-content-center">
    
    <div class="col-8">
        <br>
    <?php include("../includes/alerta.php") ?>
        <div class="card text-center">

            <form action="vender.php?id=<?php echo $_GET['id']; ?>" method="POST">

                <div class="card-header text-bg-primary">
                    <p name="txtNombre_producto"><?php echo $nombre_producto ?></p>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Precio:</h5>
                    <p id="precio" class="card-text" name="txtPrecio"><?php echo $precio ?></p>

                    <h6 class="card-subtitle">Stock</h6>
                    <p id="cantDisp" class="card-text" name="txtStock"><?php echo $stock ?></p>
                    
                    <div class="row justify-content-center">
                        <h6 class="card-subtitle">Cantidad:</h6>
                        <div class="col-4">
                            <div class="value_cont">
                                <input class="form-control text-center" type="text" id="amount" value="" name="txtCantidadVendida">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="text-center">
                        <a href="../vender_producto.php" class="btn btn-danger">
                            Cancelar
                        </a>
                        <input type="submit" name="btnVender" class="btn btn-success" value="Vender producto">
                        <!-- <button class="btn btn-success" name="btnVender">
                            Vender
                        </button> -->
                    </div>
                </div>
            </form>
            
        </div>
    </div>
</div>
