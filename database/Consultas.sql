SELECT * FROM producto as t1 where t1.stock=(select max(stock) from producto);
SELECT * FROM ventas as t1 where t1.vendidos=(select max(vendidos) from ventas);
