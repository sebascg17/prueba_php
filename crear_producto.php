<?php include("database/db.php") ?>
<?php include("includes/header.php") ?>
<?php include("includes/nav.php") ?>

<div class="container">
    <div class="row">
        <div class="col-12">

            <?php include("includes/alerta.php") ?>
            
            <?php
                $consulta = "SELECT idCategoria, descripcion FROM categorias";
                $resultado = $conn->query($consulta);
            ?>

            <br>
            <div class="card card-body">
                <form action="metodos/guardar.php" method="POST">
                    <h5 class="title">Registrar Producto</h5>
                    <hr>
                    <div class="form-group">
                        <label for=""><strong>Producto</strong><span class="text-danger">*</span></label>
                        <input type="text" name="txtNombre_producto" class="form-control" autofocus>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for=""><strong>Referencia</strong><span class="text-danger">*</span></label>
                        <input type="text" name="txtReferencia" class="form-control" autofocus>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for=""><strong>Precio</strong><span class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-text">$</span>
                            <input type="number"  name="txtPrecio" class="form-control" autofocus>
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for=""><strong>Peso(kg)</strong><span class="text-danger">*</span></label>
                        <input type="number" name="txtPeso" class="form-control" autofocus>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for=""><strong>Categoría</strong><span class="text-danger">*</span></label>
                        <select id="combo" class="form-select" aria-label="Default select example" name="ddlCategoria">
                            <option selected>Elija una opción</option>
                                <?php WHILE($row = $resultado->fetch_assoc()) { ?>
                                <option value="<?php echo $row['idCategoria']; ?>"><?php echo $row['descripcion']; ?>
                            </option>
                                <?php
                                    }
                                ?>
                        </select>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for=""><strong>Stock</strong><span class="text-danger">*</span></label>
                        <input type="number" name="txtStock" class="form-control" autofocus>
                    </div>
                    <br>
                    <div class="text-center">
                        <input type="submit" class="btn btn-success btn-block"
                        name="btnGuardar_producto" value="Guardar producto">
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>



<?php include("includes/footer.php") ?>