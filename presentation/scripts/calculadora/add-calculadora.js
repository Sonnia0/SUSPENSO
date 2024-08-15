console.log("Sonnia");
document.addEventListener('DOMContentLoaded', function () {
    const calculadoraForm = document.getElementById('operacionForm');
    calculadoraForm.addEventListener('submit', async (event) => {
        event.preventDefault();
        const base = parseFloat(document.getElementById('numeroUno').value);
        const altura = parseFloat(document.getElementById('numeroDos').value);
        const operacion = document.getElementById('operacion').value;
        
        const resultado = await realizarOperacion(base, altura, operacion);
        document.getElementById('resultado').innerText = `Resultado: ${resultado}`;
    });

    async function realizarOperacion(base, altura, operacion) {
        let resultado;
        
        switch (operacion) {
            case 'suma':
                resultado = base + altura;
                break;
            case 'resta':
                resultado = base - altura;
                break;
            case 'area':
                resultado = (base * altura) / 2;
                break;
            case 'division':
                resultado = base / altura;
                break;
            case 'multiplicacion':
                resultado = base * altura;
                break;
            case 'porcentaje':
                resultado = (base * altura) / 100;
                break;
            case 'exponencial':
                resultado = base ** altura;
                break;
            case 'raiz':
                resultado = Math.sqrt(base);
                break;
            default:
                alert('Operación no válida');
                return null;
        }

        const formData = new FormData();
        formData.append('base', base);
        formData.append('altura', altura);
        formData.append('operacion', operacion);
        formData.append('resultado', resultado);

        try {
            const response = await fetch('http://suspenso.test/businessLogic/swCalculadora.php', {
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
});
