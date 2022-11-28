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
                    <th>Precio</th>
                    <th>Peso</th>
                    <th>Categoría</th>
                    <th>Stock</th>
                    <th>Estado</th>
                    <th>Fecha Creación</th>
                    <th>Accion</th>
                    <tbody>
                    <?php
                        $por_pagina=10;

                        if(isset($_GET['pagina'])){            
                            $pagina=$_GET['pagina'];
                        }else{
                            $pagina=1;
                        }
                        $empieza=($pagina-1) * $por_pagina;
                        $query = "SELECT * FROM producto p INNER JOIN categorias c on categoria = idCategoria 
                        LIMIT $empieza,$por_pagina";
                        $result_producto = mysqli_query($conn, $query);

                        while($row = mysqli_fetch_array($result_producto)){                             
                            $precio = $row['precio'];
                            $stock = $row['stock'];                            
                            $estado = $row['estado'];
                            if($estado==1){
                                (string)$estado = 'Disponible';
                            }else{
                                (string)$estado = '<span class="text-danger">Agotado</span>';
                            }
                            ?>
                        
                            <tr>
                                <td><?php echo $row['nombre_producto'] ?></td>
                                <td><?php echo $row['referencia'] ?></td>
                                <td>$<?php echo $row['precio']?></td>
                                <td><?php echo $row['peso'] ?>kg</td>
                                <td><?php echo $row['descripcion'] ?></td>
                                <td><?php echo $row['stock'] ?></td>
                                <td><?php echo $estado ?></td>
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
            
            <?php
                $query="SELECT * FROM producto p INNER JOIN categorias c on categoria = idCategoria";
                $resultado=mysqli_query($conn,$query);

                $total_registros=mysqli_num_rows($resultado);
                $total_paginas=ceil($total_registros/$por_pagina);


                echo"<center><a class='paginacion' href='index.php?pagina=1'>"  .'Anterior'. "</a>";

                for($i=1;  $i<=$total_paginas;   $i++){
                    echo"<a class='paginacion' href='index.php?pagina=".$i."'> ".$i." </a> ";
                }

                echo"<a class='paginacion' href='index.php?pagina=$total_paginas'>"  .'Siguiente'. "</a></center>";
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
