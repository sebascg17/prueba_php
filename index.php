<?php include("database/db.php") ?>
<?php include("includes/header.php") ?>
<?php include("includes/nav.php") ?>

<div class="container p-4">
    <div class="row" >
        <div class="col-12" id="dvInventario">
            <?php include("includes/alerta.php") ?>
            <h5 class="title">Productos registrados</h5>
            <hr>
            <table class="table table-bordered">
                <thead>
                    <th>Producto</th>
                    <th>Referencia</th>
                    <th>Precio Unidad</th>
                    <th>Precio Total</th>
                    <th>Peso</th>
                    <th>Categoría</th>
                    <th>Stock</th>
                    <th>Fecha Creación</th>
                    <th>Accion</th>
                    <tbody>
                    <?php
                        $query = "SELECT * FROM producto p INNER JOIN categorias c on categoria = idCategoria";
                        $result_producto = mysqli_query($conn, $query);

                        while($row = mysqli_fetch_array($result_producto)){                             
                            $precio = $row['precio'];
                            $stock = $row['stock'];
                            $precio_unidad = (float)$precio/(float)$stock;
                            
                            ?>
                        
                            <tr>
                                <td><?php echo $row['nombre_producto'] ?></td>
                                <td><?php echo $row['referencia'] ?></td>
                                <td>$<?php echo $precio_unidad?></td>
                                <td>$<?php echo $row['precio']?></td>
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