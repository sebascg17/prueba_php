GUIA PARA INSTALAR EL PROYECTO
-Descargar el proyecto por GITHUB

-Instalar xamp
  -configurar el archivo Apache (httpd.conf))
    -buscar listen 80, y reemplazarlo por Listen 8080
    -buscar localhost 80, y reemplazarlo por localhost 8080
    
  -configurar el archivo Apache (httpd.ssl))
    -buscar listen 443, y reemplazarlo por Listen 4433
    
  -Iniciar MYSQL y Apache
-Navegador
  -Ir a: localhost:8080
  -Ir a phpMyAdmin y exportar la base de datos 
  -Exportar bases de datos desde la carpeta database/pruebaphp.bd
  -Ir a localhost:8080/prueba_php
  
