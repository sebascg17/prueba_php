let starValue = 0;
let cantidad = document.getElementById("cantDisp").textContent;
let precio = document.getElementById("precio").textContent;
let total = document.getElementById("total").textContent;
let disabledBtn = document.getElementById("disabledBtn");
let btnVenderProducto = document.getElementById("btnVenderProducto");
disabledBtn.disabled = true;


function addValueFunction(valuePar) {
    document.getElementById("amount").value;

    if (valuePar.value == 'increase') {
        starValue++;
        cantidad--;
        total = parseFloat(precio) * starValue;
    } else {
        starValue--;
        cantidad++;
        total = precio * starValue;
    }
    document.getElementById("amount").textContent = starValue;
    document.getElementById("cantDisp").textContent = cantidad;
    document.getElementById("total").textContent = '$' + total;

    if (starValue == 0) {
        disabledBtn.disabled = true;
    } else {
        disabledBtn.disabled = false;
    }
    if (cantidad == 0) {
        btnVenderProducto.disabled = true;
    } else {
        btnVenderProducto.disabled = false;
    }
}