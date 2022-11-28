<?php

include("../database/db.php");

    if (isset($_GET['id'])){
        $id = $_GET['id'];

        $query = "SELECT * FROM producto INNER JOIN categorias on categoria = idCategoria WHERE id = $id";
        $result = mysqli_query($conn, $query);
        if(mysqli_num_rows($result) == 1){
            $row = mysqli_fetch_array($result);
            $nombre_producto = $row['nombre_producto'];
            $referencia = $row['referencia'];
            $precio = $row['precio'];
            $peso = $row['peso'];
            $categoria = $row['descripcion'];
            $stock = $row['stock'];

            // $precio_real = (float)$precio/(float)$stock;
        }
    }

    if(isset($_POST['btnActualizar'])){
        $id = $_GET['id'];
        $nombre_producto = $_POST['txtNombre_producto'];
        $referencia = $_POST['txtReferencia'];
        $precio = $_POST['txtPrecio'];
        $peso = $_POST['txtPeso'];
        $categoria = $_POST['ddlCategoria'];
        $stock = $_POST['txtStock'];

        // $precio_total = (float)$precio*(float)$stock;

        $query = "UPDATE producto
        SET nombre_producto = '$nombre_producto',
            referencia = '$referencia',
            precio = '$precio',
            peso = '$peso',
            stock = '$stock'
        WHERE id = $id";
        mysqli_query($conn, $query);

        $_SESSION['message'] = 'Producto actualizado exitosamente';
        $_SESSION['message_type'] = 'info';
        header("Location: ../index.php");
    }

?>

<?php include("../includes/header.php")?>

<!-- OBTENER LA LISTA DESPLEGABLE -->
<?php
    $consulta = "SELECT idCategoria, descripcion FROM categorias";
    $resultado = $conn->query($consulta);
?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
               <form action="editar.php?id=<?php echo $_GET['id']; ?>" method="POST">
                    
                    <h5 class="title">Registrar Producto</h5>
                    <hr>
                    <div class="form-group">
                        <label for=""><strong>Producto</strong><span class="text-danger">*</span></label>
                        <input type="text" name="txtNombre_producto" class="form-control"
                        value="<?php echo $nombre_producto;?>">
                    </div>
                    <br>
                    <div class="form-group">
                        <label for=""><strong>Referencia</strong><span class="text-danger">*</span></label>
                        <input type="text" name="txtReferencia" class="form-control" value="<?php echo $referencia;?>">
                    </div>
                    <br>
                    <div class="form-group">
                        <label for=""><strong>Precio</strong><span class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-text">$</span>
                            <input type="number" name="txtPrecio" class="form-control"
                            value="<?php echo $precio?>">
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for=""><strong>Peso(kg)</strong><span class="text-danger">*</span></label>
                        <input type="number" name="txtPeso" class="form-control" value="<?php echo $peso;?>">
                    </div>
                    <br>
                    <div class="form-group">
                        <label for=""><strong>Stock</strong><span class="text-danger">*</span></label>
                        <input type="number" name="txtStock" class="form-control" value="<?php echo $stock;?>">
                    </div>
                    <br>
                    <div class="text-center">
                        <button class="btn btn-success" name="btnActualizar">
                            Actualizar
                        </button>
                    </div>
               </form>
            </div>
        </div>
    </div>
</div>


<?php include("../includes/footer.php")?>
