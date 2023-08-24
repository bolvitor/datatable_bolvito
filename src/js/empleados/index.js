import { Dropdown } from "bootstrap";
import Swal from "sweetalert2";
import { validarFormulario, Toast, confirmacion} from "../funciones";
import Datatable from "datatables.net-bs5";
import { lenguaje  } from "../lenguaje";
let contador = 1;
const datatable = new Datatable('#tablaEmpleados', {
    language : lenguaje,
    data : null,
    columns: [
        {
            title : 'NO',
            render : () => contador ++
            
        },
        {
            title : 'NOMBRE',
            data: 'empleado_nombre'
        },
        {
            title : 'DPI',
            data: 'empleado_dpi',
        },
        {
            title : 'EDAD',
            data: 'empleado_edad'
        },
        {
            title : 'SEXO',
            data: 'empleado_sexo'
        },
        {
            title : 'MODIFICAR',
            data: 'empleado_id',
            searchable : false,
            orderable : false,
            render : (data, type, row, meta) => `<button class="btn btn-warning" data-id='${data}' data-nombre='${row["empleado_nombre"]}' data-dpi='${row["empleado_dpi"]}' data-edad='${row["empleado_edad"]}' data-sexo='${row["empleado_sexo"]}'>Modificar</button>`
        },
        {
            title : 'ELIMINAR',
            data: 'empleado_id',
            searchable : false,
            orderable : false,
            render : (data, type, row, meta) => `<button class="btn btn-danger" data-id='${data}' >Eliminar</button>`
        },

    ]
})

const buscar = async () => {

  
    const url = `/datatable_bolvito/API/empleados/buscar`;
    const config = {
        method : 'GET'
    }

    try {
        const respuesta = await fetch(url, config)
        const data = await respuesta.json();

        console.log(data);
        datatable.clear().draw()
        if(data){
            datatable.rows.add(data).draw();
        }else{
            Toast.fire({
                title : 'No se encontraron registros',
                icon : 'info'
            })
        }
       
    } catch (error) {
        console.log(error);
    }
}

const traeDatos = (e) => {
    const button = e.target;
    const id = button.dataset.id
    const nombre = button.dataset.nombre
    const precio = button.dataset.precio

    console.log(id, nombre, precio);
}


const eliminar = e => {
    const button = e.target;
    const id = button.dataset.id
    alert(id);
}
buscar();


datatable.on('click','.btn-warning', traeDatos )
datatable.on('click','.btn-danger', eliminar )




const formulario = document.querySelector('form')
const btnGuardar = document.getElementById('btnGuardar');
const btnBuscar = document.getElementById('btnBuscar');

const guardar = async (evento) => {
    evento.preventDefault();
    if(!validarFormulario(formulario, ['empleado_id'])){
        Toast.fire({
            icon: 'info',
            text: 'Debe llenar todos los datos'
        })
        return 
    }

    const body = new FormData(formulario)
    body.delete('empleado_id')
    const url = '/datatable_bolvito/API/empleados/guardar';
    const config = {
        method : 'POST',
        body
    }

    try {
        const respuesta = await fetch(url, config)
        const data = await respuesta.json();

        console.log(data);
        // return
        
        const {codigo, mensaje,detalle} = data;
        let icon = 'info'
        switch (codigo) {
            case 1:
                formulario.reset();
                icon = 'success'
                buscar();
                break;
        
            case 0:
                icon = 'error'
                console.log(detalle)
                break;
        
            default:
                break;
        }

        Toast.fire({
            icon,
            text: mensaje
        })

    } catch (error) {
        console.log(error);
    }
}
formulario.addEventListener('submit', guardar )
btnBuscar.addEventListener('click', buscar)

// const tablaempleados = document.getElementById('tablaEmpleados');

// const btnModificar = document.getElementById('btnModificar');

// const btnCancelar = document.getElementById('btnCancelar');
// const divTabla = document.getElementById('divTabla');

// btnModificar.disabled = true
// btnModificar.parentElement.style.display = 'none'
// btnCancelar.disabled = true
// btnCancelar.parentElement.style.display = 'none'


// const buscar = async () => {

//     let empleado_nombre = formulario.empleado_nombre.value;
//     let empleado_dpi = formulario.empleado_dpi.value;
//     let empleado_edad = formulario.empleado_edad.value;
//     let empleado_sexo = formulario.empleado_sexo.value;
    
//     const url = `/datatable_bolvito/API/empleados/buscar?empleado_nombre=${empleado_nombre}&empleado_dpi=${empleado_dpi}&empleado_edad=${empleado_edad}&empleado_sexo=${empleado_sexo}`;
//     const config = {
//         method : 'GET'
//     }

//     try {
//         const respuesta = await fetch(url, config)
//         const data = await respuesta.json();
        
//         tablaEmpleados.tBodies[0].innerHTML = ''
//         const fragment = document.createDocumentFragment();
//         console.log(data);
//         // return;
//         if(data.length > 0){
//             let contador = 1;
//             data.forEach( empleado => {
//                 // CREAMOS ELEMENTOS
//                 const tr = document.createElement('tr');
//                 const td1 = document.createElement('td')
//                 const td2 = document.createElement('td')
//                 const td3 = document.createElement('td')
//                 const td4 = document.createElement('td')
//                 const td5 = document.createElement('td')
//                 const td6 = document.createElement('td')
//                 const td7 = document.createElement('td')
//                 const buttonModificar = document.createElement('button')
//                 const buttonEliminar = document.createElement('button')

//                 // CARACTERISTICAS A LOS ELEMENTOS
//                 buttonModificar.classList.add('btn', 'btn-warning')
//                 buttonEliminar.classList.add('btn', 'btn-danger')
//                 buttonModificar.textContent = 'Modificar'
//                 buttonEliminar.textContent = 'Eliminar'

//                 buttonModificar.addEventListener('click', () => colocarDatos(empleado))
//                 buttonEliminar.addEventListener('click', () => eliminar(empleado.empleado_id))

//                 td1.innerText = contador;
//                 td2.innerText = empleado.empleado_nombre
//                 td3.innerText = empleado.empleado_dpi
//                 td4.innerText = empleado.empleado_edad;
//                 td5.innerText = empleado.empleado_sexo;
                
                
//                 // ESTRUCTURANDO DOM
//                 td6.appendChild(buttonModificar)
//                 td7.appendChild(buttonEliminar)
//                 tr.appendChild(td1)
//                 tr.appendChild(td2)
//                 tr.appendChild(td3)
//                 tr.appendChild(td4)
//                 tr.appendChild(td5)
//                 tr.appendChild(td6)
//                 tr.appendChild(td7)
                
//                 fragment.appendChild(tr);

//                 contador++;
//             })
//         }else{
//             const tr = document.createElement('tr');
//             const td = document.createElement('td')
//             td.innerText = 'No existen registros'
//             td.colSpan = 7
//             tr.appendChild(td)
//             fragment.appendChild(tr);
//         }

//         tablaEmpleados.tBodies[0].appendChild(fragment)
//     } catch (error) {
//         console.log(error);
//     }
// }

// const colocarDatos = (datos) => {
//     formulario.empleado_nombre.value = datos.empleado_nombre
//     formulario.empleado_dpi.value = datos.empleado_dpi
//     formulario.empleado_edad.value = datos.empleado_edad
//     formulario.empleado_sexo.value = datos.empleado_sexo
//     formulario.empleado_id.value = datos.empleado_id

//     btnGuardar.disabled = true
//     btnGuardar.parentElement.style.display = 'none'
//     btnBuscar.disabled = true
//     btnBuscar.parentElement.style.display = 'none'
//     btnModificar.disabled = false
//     btnModificar.parentElement.style.display = ''
//     btnCancelar.disabled = false
//     btnCancelar.parentElement.style.display = ''
//     divTabla.style.display = 'none'

//     // modalEjemploBS.show();
// }

// const cancelarAccion = () => {
//     btnGuardar.disabled = false
//     btnGuardar.parentElement.style.display = ''
//     btnBuscar.disabled = false
//     btnBuscar.parentElement.style.display = ''
//     btnModificar.disabled = true
//     btnModificar.parentElement.style.display = 'none'
//     btnCancelar.disabled = true
//     btnCancelar.parentElement.style.display = 'none'
//     divTabla.style.display = ''
// }

// const modificar = async () => {
//     if(!validarFormulario(formulario)){
//         alert('Debe llenar todos los campos');
//         return 
//     }

//     const body = new FormData(formulario)
//     const url = '/datatable_bolvito/API/empleados/modificar';
//     const config = {
//         method : 'POST',
//         body
//     }

//     try {
//         // fetch(url, config).then( (respuesta) => respuesta.json() ).then(d => data = d)
//         const respuesta = await fetch(url, config)
//         const data = await respuesta.json();
        
//         const {codigo, mensaje,detalle} = data;
//         let icon = 'info'
//         switch (codigo) {
//             case 1:
//                 formulario.reset();
//                 icon = 'success'
//                 buscar();
//                 cancelarAccion();
//                 break;
        
//             case 0:
//                 icon = 'error'
//                 console.log(detalle)
//                 break;
        
//             default:
//                 break;
//         }

//         Toast.fire({
//             icon,
//             text: mensaje
//         })

//     } catch (error) {
//         console.log(error);
//     }
// }

// const eliminar = async (id) => {
//     if(await confirmacion('warning','¿Desea eliminar este registro?')){
//         const body = new FormData()
//         body.append('empleado_id', id)
//         const url = '/datatable_bolvito/API/empleados/eliminar';
//         const config = {
//             method : 'POST',
//             body
//         }
//         try {
//             const respuesta = await fetch(url, config)
//             const data = await respuesta.json();
//             console.log(data)
//             const {codigo, mensaje,detalle} = data;
    
//             let icon = 'info'
//             switch (codigo) {
//                 case 1:
//                     icon = 'success'
//                     buscar();
//                     break;
            
//                 case 0:
//                     icon = 'error'
//                     console.log(detalle)
//                     break;
            
//                 default:
//                     break;
//             }
    
//             Toast.fire({
//                 icon,
//                 text: mensaje
//             })
    
//         } catch (error) {
//             console.log(error);
//         }
//     }
// }
// buscar();


// btnCancelar.addEventListener('click', cancelarAccion)
// btnModificar.addEventListener('click', modificar)