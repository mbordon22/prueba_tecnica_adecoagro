document.addEventListener("DOMContentLoaded", function(){
    const tabla_productos_compra = document.querySelector("#tabla_productos_compra");
    const btn_agregar_producto = document.querySelector("#btn_agregar_producto");
    const inputs_productos = document.querySelector("#inputs_productos");
    const importe_total = document.querySelector("#importe_total");
    const formulario_compra = document.querySelector("#formulario_compra");
    
    btn_agregar_producto.addEventListener("click", agregarProductoTabla);
    formulario_compra.addEventListener("submit", guardarCompra);
});


function agregarProductoTabla(){
    //guardamos los datos
    const select = document.querySelector("#id_producto");
    const id_producto = select.value;
    const label_producto = select.options[select.selectedIndex].text;
    const array_producto = label_producto.split(' - $');
    const nombre_producto = array_producto[0];
    const precio_producto = parseFloat(array_producto[1]);
    const cantidad_producto = document.querySelector("#cantidad_producto").value;

    //validamos la cantidad
    if(cantidad_producto < 1){
        alert('Indique la cantidad primero');
        return true;
    }

    //validamos la que venga un producto
    if(id_producto < 1){
        alert('Debe seleccionar un producto');
        return true;
    }

    //Limpiamos los campos para una nueva carga
    document.querySelector("#id_producto").value = '';
    document.querySelector("#cantidad_producto").value = '';

    //mostramos en la tabla
    const tr = document.createElement("tr");
    const id = document.createElement("td");
    const producto = document.createElement("td");
    const cantidad = document.createElement("td");
    const importe = document.createElement("td");
    const eliminar = document.createElement("td");

    id.innerHTML = id_producto;
    producto.innerHTML = nombre_producto;
    cantidad.innerHTML = cantidad_producto;
    importe.innerHTML = '$'+(precio_producto * parseInt(cantidad_producto));
    eliminar.innerHTML = '<span style="color:red; cursor:pointer;" onclick="eliminar_producto_detalle(this)">X</span>';

    tr.appendChild(id);
    tr.appendChild(producto);
    tr.appendChild(cantidad);
    tr.appendChild(importe);
    tr.appendChild(eliminar);

    tabla_productos_compra.querySelector("tbody").appendChild(tr);

    if(importe_total.value != ''){
        const valor = (importe_total.value).replace('$','');
        const total = parseFloat(valor) + (precio_producto * parseInt(cantidad_producto));
        importe_total.value = '$' + total;
    } else {
        importe_total.value = '$' + (precio_producto * parseInt(cantidad_producto));
    }
}

function eliminar_producto_detalle(obj){
    const tr = obj.parentElement.parentElement;
    const importe = (tr.children)[3].innerHTML;

    if(importe_total.value != ''){
        const valor = (importe_total.value).replace('$','');
        const importe_producto = (importe).replace('$','');

        const total = parseFloat(valor) - parseFloat(importe_producto);
        importe_total.value = '$' + total;
    } else {
        importe_total.value = '';
    }

    tr.remove();
}


function guardarCompra(e){
    e.preventDefault();
    const data = new FormData(formulario_compra);

    const productos = tabla_productos_compra.querySelectorAll('tbody tr');
    const listado_productos = [];
    let contador = 0;

    productos.forEach(tr => {
        const list_td = tr.children;
        const id_producto = list_td[0].innerHTML;
        const cantidad = list_td[2].innerHTML;
        
        listado_productos[contador] = {
            "id_producto" : id_producto,
            "cantidad" : cantidad
        }
        contador++;
        
    });
    
    if(contador < 1){
        alert('Debe cargar al menos un producto');
        return true;
    }

    if(data.get('id_proveedor') < 1){
        alert('Debe seleccionar un proveedor');
        return true;
    }
    
    data.append("productos", JSON.stringify(listado_productos));
    data.set('importe',(data.get('importe')).replace('$',''));


    const xhr = new XMLHttpRequest();

    xhr.open("POST", formulario_compra.getAttribute("action"));
    xhr.onload = function(){
        const datos = JSON.parse(xhr.responseText);
        if(datos.status == "success" && datos.action == 'add'){
            location.href = window.location + "/.."
        } else if(datos.status == "success" && datos.action == 'edit'){
            location.href = window.location + "/../.."
        }
    };
    xhr.send(data);
    
}