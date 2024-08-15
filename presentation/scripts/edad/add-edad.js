console.log("Sonnia");
document.addEventListener('DOMContentLoaded', function () {
    const perrosForm = document.getElementById('perrosForm');
    perrosForm.addEventListener('submit', async (event) => {
        event.preventDefault();
        const edad = parseInt(document.getElementById('edad').value);
        const nombre = document.getElementById('nombre').value;

        // Log the values to check correctness
        console.log(`Edad: ${edad}, Nombre: ${nombre}`);

        const resultado = await realizarOperacion(edad, nombre);
        document.getElementById('resultado').innerText = `Resultado: ${resultado}`;
    });

    async function realizarOperacion(edad, nombre) {
        let resultado;

        // Calculate the dog's age in dog years using the new function
        resultado = calcularEdadPerro(edad);

        const formData = new FormData();
        formData.append('nombre', nombre);
        formData.append('edad', edad);
        formData.append('resultado', resultado);

        // Log formData to see what is being sent
        console.log(`FormData: nombre=${nombre}, edad=${edad}, resultado=${resultado}`);

        try {
            const response = await fetch('http://suspenso.test/businessLogic/swEdad.php', {
                method: 'POST',
                body: formData
            });
            /* Uncomment this block if you want to handle the server response
            const result = await response.json();
            if (result.success) {
                document.getElementById('resultado').innerText = `Resultado: ${result.resultado}`;
            } else {
                alert('Error al realizar la operación: ' + result.error);
            }
            */
        } catch (error) {
            console.error('Error al realizar la operación:', error);
        }

        return resultado;
    }

    // Function to calculate dog's age in dog years
    function calcularEdadPerro(edad) {
        return edad * 7;
    }
});
