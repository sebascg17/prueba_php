<?php include("database/db.php") ?>
<?php include("includes/header.php") ?>
<?php include("includes/nav.php") ?>

<script src="js/cantidadVentas.js" defer></script>

<div class="container p-4">
    <div class="row">
    <?php
        $query = "SELECT * FROM producto p INNER JOIN categorias c on categoria = idCategoria";
        $result_producto = mysqli_query($conn, $query);


        while($row = mysqli_fetch_array($result_producto)){ 
            
            ?>
            <div class="col-md-4 col-sm-12">
                <div class="card text-center">
                    <div class="card-header text-bg-primary">
                        <?php echo $row['nombre_producto'] ?>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Precio:</h5>
                        <p class="card-text">$<?php echo $row['precio'] ?></p>

                        <h6 class="card-subtitle">Cantidad disponible</h6>
                        <p id="cantDisp" class="card-text"><?php echo $row['stock'] ?></p>
                    </div>
                    <div class="card-footer">
                        <div class="text-center">
                            <a href="metodos/vender.php?id=<?php echo $row['id'] ?>" class="btn btn-success btn-block" name="btnVender">
                                Vender
                            </a>
                        </div>
                    </div>
                </div>
            </div>

    <?php } ?>
        
    </div>
    <br>
    <div class="row" >
        <div class="col-12">
            <?php include("includes/alerta.php") ?>
            <h5 class="title">Productos registrados</h5>
            <hr>
            <table class="table table-bordered">
                <thead>
                    <th>Producto</th>
                    <th>Referencia</th>
                    <th>Precio</th>
                    <th>Peso</th>
                    <th>Categoría</th>
                    <th>Stock</th>
                    <th>Fecha Creación</th>
                    <th>Accion</th>
                    <tbody>
                        <?php
                        $query = "SELECT * FROM ventas";
                        $result_producto = mysqli_query($conn, $query);

                        while($row = mysqli_fetch_array($result_producto)){ ?>
                            <tr>
                                <td><?php echo $row['vendidos'] ?></td>
                                <td><?php echo $row['referencia'] ?></td>
                                <td>$<?php echo $row['precio'] ?></td>
                                <td><?php echo $row['peso'] ?>kg</td>
                                <td><?php echo $row['descripcion'] ?></td>
                                <td><?php echo $row['stock'] ?></td>
                                <td><?php echo $row['fecha_c'] ?></td>
                                <td class="text-center">
                                    <a href="metodos/editar.php?id=<?php echo $row['id'] ?>"
                                    class="btn btn-secondary"
                                    name="editar_producto">
                                        <i class="fas fa-solid fa-pen"></i>
                                    </a>
                                    <a href="metodos/eliminar.php?id=<?php echo $row['id'] ?>" 
                                    class="btn btn-danger" 
                                    name="eliminar_producto">
                                        <i class="fas fa-trash-alt"></i>
                                    </a>
                                </td>
                            </tr>

                        <?php } ?>
                    </tbody>
                </thead>
            </table>
        </div>
    </div>
</div>

<?php include("includes/footer.php") ?>