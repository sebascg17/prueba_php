<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/5d806abd7f.js" crossorigin="anonymous"></script>
<script type="text/javascript">
    var separador = document.getElementById('separadorMiles');

    separador.addEventListener('keyup', (e) => {
        var entrada = e.target.value.split('.').join('');
        entrada = entrada.split('').reverse();
        
        var salida = [];
        var aux = '';
        
        var paginador = Math.ceil(entrada.length / 3);
        
        for(let i = 0; i < paginador; i++) {
            for(let j = 0; j < 3; j++) {
                "123 4"
                if(entrada[j + (i*3)] != undefined) {
                    aux += entrada[j + (i*3)];
                }
            }
            salida.push(aux);
            aux = '';
        
            e.target.value = salida.join('.').split("").reverse().join('');
        }
    }, false);

    $('#combo').on('change',function(){
        var valor = this.value;
        var texto = $(this).find('option:selected').text();

        // alert
    });

    $('li a').click(function(e) {
        //e.preventDefault();
        $('a').removeClass('active');
        $(this).addClass('active');
    });
</script>
</body>
</html>