<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora</title>
    <link href="../../styles/tailwind.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex flex-col min-h-screen">

    <!-- Header -->
    <header class="bg-red-600 text-white py-4">
        <div class="container mx-auto px-4">
            <h1 class="text-3xl font-bold">Calculadora Matemática</h1>
        </div>
    </header>

    <!-- Main Content -->
    <main class="flex-grow">
        <div class="container mx-auto max-w-2xl py-8">
            <div class="bg-white shadow-md rounded px-16 pt-6 pb-8 mb-4">
                <h1 class="text-3xl font-bold text-gray-800">Realizar Operación Matemática</h1>
                <form id="operacionForm">
                    <div class="mb-4">
                        <label for="numeroUno" class="block text-gray-700 text-sm font-bold mb-2">Primer número:</label>
                        <input type="number" id="numeroUno" name="numeroUno" placeholder="Ingrese el primer número"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </div>
                    <div class="mb-4">
                        <label for="numeroDos" class="block text-gray-700 text-sm font-bold mb-2">Segundo número:</label>
                        <input type="number" id="numeroDos" name="numeroDos" placeholder="Ingrese el segundo número"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </div>
                    <div class="mb-4">
                        <label for="operacion" class="block text-gray-700 text-sm font-bold mb-2">Operación:</label>
                        <select id="operacion" name="operacion"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            <option value="suma">Suma</option>
                            <option value="resta">Resta</option>
                            <option value="area">Área</option>
                            <option value="multiplicacion">Multiplicación</option>
                            <option value="division">División</option>
                            <option value="porcentaje">Porcentaje</option>
                            <option value="exponencial">Exponencial</option>
                            <option value="raiz">Raíz</option>
                        </select>
                    </div>
                    <div class="flex items-center justify-between mb-4">
                        <button type="submit"
                            class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Calcular</button>
                    </div>
                </form>
                <div id="resultado" class="text-lg font-bold text-gray-800"></div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-red-600 text-white py-4">
        <div class="container mx-auto px-4 text-center">
            <p>&copy; 2024 Calculadora Matemática. Todos los derechos reservados.</p>
            <p><a href="#" class="hover:underline">Política de privacidad</a> | <a href="#" class="hover:underline">Términos de servicio</a></p>
        </div>
    </footer>

    <script src="../../scripts/calculadora/add-calculadora.js"></script>
</body>
</html>
