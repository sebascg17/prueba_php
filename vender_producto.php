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
                        $por_pagina=10;

                        if(isset($_GET['pagina'])){            
                            $pagina=$_GET['pagina'];
                        }else{
                            $pagina=1;
                        }
                        $empieza=($pagina-1) * $por_pagina;
                        $query = "SELECT nombre_producto, referencia, vendidos, valor 
                        FROM ventas v INNER JOIN producto p on v.id_producto = p.id  
                        order by idVenta DESC LIMIT $empieza,$por_pagina";
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
            <?php 

                $query="SELECT * FROM ventas";
                $resultado=mysqli_query($conn,$query);

                $total_registros=mysqli_num_rows($resultado);
                $total_paginas=ceil($total_registros/$por_pagina);


                echo"<center><a class='paginacion' href='vender_producto.php?pagina=1'>"  .'Anterior'. "</a>";

                for($i=1;  $i<=$total_paginas;   $i++){
                    echo"<a class='paginacion' href='vender_producto.php?pagina=".$i."'> ".$i." </a> ";
                }

                echo"<a class='paginacion' href='vender_producto.php?pagina=$total_paginas'>"  .'Siguiente'. "</a></center>";
            ?>
        </div>
    </div>
</div>

<?php include("includes/footer.php") ?>

<style>
.paginacion{
 padding:15px;
 margin-left:8px;
 color: white;
 text-decoration: none;
 background: black;
 display: inline-block;
 box-sizing: border-box;
 opacity:0.8;
 border-radius: 5px;
}
a:hover {
    opacity:1;
}
</style>
