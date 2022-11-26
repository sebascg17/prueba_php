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

        $precio_real = (float)$precio/(float)$stock;
        $totalcompra = 0;
    }
}

if (isset($_POST['btnVenderProducto'])){
    
    $producto = $id;
    $cantidad = $_POST['txtCantidadVendida'];
    $valor = $_POST['txtValor'];

    $query = "INSERT INTO ventas(producto, vendidos, valor)
    VALUES ('$producto','$cantidad','$valor')";
    $result = mysqli_query($conn, $query);

    $_SESSION['message'] = 'Producto vendido exitosamente';
    $_SESSION['message_type'] = 'success';

    header("Location: ../vender_producto.php");
}
?>

<?php include("../includes/header.php") ?>

<script src="../js/cantidadVentas.js" defer></script>
<div class="row justify-content-center">
    <div class="col-8">
        <br>
        <div class="card text-center">

            <form action="vender.php?id=<?php echo $_GET['id']; ?>">

                <div class="card-header text-bg-primary">
                    <p name="txtNombre_producto"><?php echo $nombre_producto ?></p>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Precio:</h5>
                    <p id="precio" class="card-text" name="txtPrecio"><?php echo $precio_real ?></p>

                    <h6 class="card-subtitle">Stock</h6>
                    <p id="cantDisp" class="card-text" name="txtStock"><?php echo $stock ?></p>
                    
                    <div class="row text-center">
                        <div class="col-4">
                            <button id="disabledBtn" class="btn btn-secondary"
                            onclick="addValueFunction(this);return false" value="decrease">
                                -
                            </button>
                        </div>
                        <div class="col-4">
                            <div class="value_cont">
                                <h3 id="amount" value="" name="txtCantidadVendida">0</h3>
                            </div>
                        </div>
                        <div class="col-4">
                            <button class="btn btn-secondary" onclick="addValueFunction(this);return false"
                            value="increase">
                                +
                            </button>
                        </div>
                    </div>
                    <br>
                    <hr>
                    <h3 class="card-subtitle">Total:</h3>
                    <h1 id="total" class="card-text" name="txtValor"><?php echo $totalcompra ?></h1>
                </div>
                <div class="card-footer">
                    <div class="text-center">
                        <a href="../vender_producto.php" class="btn btn-danger">
                            Cancelar
                        </a>
                        <input type="submit" class="btn btn-success btn-block" name="btnVenderProducto" value="Realizar Venta">
                    </div>
                </div>
            </form>
            
        </div>
    </div>
</div>