<?php include("database/db.php") ?>
<?php include("includes/header.php") ?>
<?php include("includes/nav.php") ?>
<style type="text/css">
</style>
<script src="js/variables.js"></script>
<div class="container p-4">
    <div class="row">
    <?php
        $query = "SELECT * FROM producto p INNER JOIN categorias c on categoria = idCategoria where estado=1";
        $result_producto = mysqli_query($conn, $query);
        // if($result_producto){

        // }

        while($row = mysqli_fetch_array($result_producto)){ 
            
            $precio = $row['precio'];
            $stock = $row['stock'];
            
            // if($stock==0){
                
            // }
            // $precio_unidad = (float)$precio/$stock;
            ?>
            
            <div class="col-md-4 col-sm-12">
                <div name="dvProducto" id="dvProducto" class="card text-center">
                    <div class="card-header text-bg-primary">
                        <?php echo $row['nombre_producto'] ?>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Precio:</h5>
                        <p class="card-text">$<?php echo $precio ?></p>

                        <h6 class="card-subtitle">Cantidad disponible</h6>
                        <p id="cantDisp" class="card-text"><?php echo $row['stock'] ?></p>
                    </div>
                    <div class="card-footer">
                        <div class="text-center">
                            <a id="idBtnVender" href="metodos/vender.php?id=<?php echo $row['id'] ?>" class="btn btn-success btn-block" name="idBtnVender">
                                Vender
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            
            <script type="text/javascript">
                btnVenderProducto = document.getElementById("idBtnVender");
                cantidad = "<?php $stock?>";
                producto = document.getElementById("dvProducto");
                disabledBtn = document.getElementById("idBtnVender");
                disabledBtn.disabled = true;
                producto.style.display='none';

                cantidad = parseInt(cantidad);

                if (cantidad < 1) {
                    btnVenderProducto.disabled = true;
                } else {
                    btnVenderProducto.disabled = false;
                }

                if(cantidad < 1 ){
                    producto.style.display='none';
                }else{    
                    producto.style.display='';
                }
            </script>
            
    <?php } ?>
    </div>
    <br>
    <div class="row" >
        <div class="col-12">
            <?php include("includes/alerta.php") ?>
            <h5 class="title">Productos Vendidos</h5>
            <hr>
            <table class="table table-bordered">
                <thead>
                    <th>Producto</th>
                    <th>Cantidad vendida</th>
                    <th>Total Vendido</th>
                    <tbody>
                        <?php
                        $query = "SELECT nombre_producto, referencia, vendidos, valor FROM ventas v INNER JOIN producto p on v.id_producto = p.id";
                        $result_producto = mysqli_query($conn, $query);

                        while($row = mysqli_fetch_array($result_producto)){ ?>
                            <tr>
                                <td><?php echo $row['nombre_producto'] ?></td>
                                <td><?php echo $row['vendidos'] ?></td>
                                <td>$<?php echo $row['valor'] ?></td>
                            </tr>

                        <?php } ?>
                    </tbody>
                </thead>
            </table>
        </div>
    </div>
</div>

<?php include("includes/footer.php") ?>
