// Función asincrónica para obtener los cálculos desde el servidor
async function getCalculos() {
    try {
        const response = await fetch('http://suspenso.test/businessLogic/swEdad.php');
        const data = await response.json();

        const calculos = data;
        const tableBody = document.querySelector('#table-calculo tbody');
        tableBody.innerHTML = ''; // Limpiar el contenido de la tabla
        let cont = 1; // Contador para el número de fila

        calculos.forEach(calculo => {
            // Crear una fila de tabla
            const row = document.createElement('tr');

            // Crear celdas para cada propiedad del cálculo
            const id = document.createElement('td');
            id.classList.add('py-3', 'px-6', 'text-left', 'whitespace-nowrap');
            id.textContent = cont++;
            
            const nombre = document.createElement('td');
            nombre.classList.add('py-3', 'px-6', 'text-left', 'whitespace-nowrap');
            nombre.textContent = calculo.nombre;
            
            const edad = document.createElement('td');
            edad.classList.add('py-3', 'px-6', 'text-left', 'whitespace-nowrap');
            edad.textContent = calculo.edad;

            const resultado= document.createElement('td');
            resultado.classList.add('py-3', 'px-6', 'text-left', 'whitespace-nowrap');
            resultado.textContent = calculo.resultado;


            // Crear celda de acciones con iconos
            const actionsCell = document.createElement('td');

            // Ícono de eliminación
            const deleteIcon = document.createElement('i');
            deleteIcon.classList.add('fas', 'fa-trash-alt', 'text-red-500', 'cursor-pointer', 'mr-2');
            deleteIcon.setAttribute('title', 'Eliminar');
            deleteIcon.addEventListener('click', () => deleteCalculo(calculo.id));

            // Agregar los iconos a la celda de acciones
            actionsCell.appendChild(deleteIcon);

            // Agregar las celdas a la fila
            row.appendChild(id);
            row.appendChild(nombre);
            row.appendChild(edad);
            row.appendChild(resultado);

            // Agregar la fila al cuerpo de la tabla
            tableBody.appendChild(row);
        });
    } catch (error) {
        console.error('Error al obtener cálculos:', error);
    }
}

// Función para eliminar un cálculo
async function deleteCalculo(calculoId) {
    const confirmDelete = confirm('¿Estás seguro de que deseas eliminar este cálculo?');
    if (confirmDelete) {
        try {
            await fetch(`http://suspenso.test/businessLogic/swEdad.php?id=${calculoId}`, {
                method: 'DELETE'
            });
            getCalculos(); // Recargar los datos después de eliminar un cálculo
        } catch (error) {
            console.error('Error al eliminar el cálculo:', error);
        }
    }
}

// Función para eliminar todos los cálculos
async function deleteAllCalculos() {
    const confirmDelete = confirm('¿Estás seguro de que deseas eliminar todos los cálculos?');
    if (confirmDelete) {
        try {
            await fetch('http://suspenso.test/businessLogic/swEdad.php?delete_all=true', {
                method: 'DELETE'
            });
            getCalculos(); // Volver a cargar los cálculos después de eliminar todos
        } catch (error) {
            console.error('Error al eliminar todos los cálculos:', error);
        }
    }
}

// Ejecutar la función getCalculos cuando el documento esté completamente cargado
document.addEventListener('DOMContentLoaded', getCalculos);

// Añadir evento al botón de "Eliminar Todos"
document.addEventListener('DOMContentLoaded', () => {
    const deleteAllButton = document.querySelector('#delete-all-button');
    deleteAllButton.addEventListener('click', deleteAllCalculos);
});