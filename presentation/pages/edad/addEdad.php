<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de Edad</title>
    <link href="../../styles/tailwind.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex flex-col min-h-screen">

    <!-- Header -->
    <header class="bg-blue-600 text-white py-4">
        <div class="container mx-auto px-4">
            <h1 class="text-3xl font-bold">Calculadora de Edad</h1>
        </div>
    </header>

    <!-- Main Content -->
    <main class="flex-grow flex items-start justify-between py-8 px-4">
        <div class="container mx-auto flex flex-wrap space-x-">

            <!-- Formulario para Agregar -->
            <div class="w-full md:w-1/2 bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                <h1 class="text-3xl font-bold text-gray-800 text-center mb-6">Edades</h1>
                <form id="perrosForm" class="flex flex-col items-center">
                    <div class="min-w-full">
                        <label for="nombre" class="block text-gray-700 text-sm font-bold mb-2">Nombre del perro:</label>
                        <input type="text" id="nombre" name="nombre" placeholder="Ingrese el nombre del perro"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </div>
                    <div class="min-w-full">
                        <label for="edad" class="block text-gray-700 text-sm font-bold mb-2">Edad en años:</label>
                        <input type="number" id="edad" name="edad" placeholder="Ingrese la edad del perro"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </div>
                    
                    <div class="flex items-center justify-between mb-4">
                        <button type="submit"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Calcular</button>
                    </div>
                </form>
                <div id="resultado" class="text-lg font-bold text-gray-800 text-center"></div>
            </div>

            <!-- Contenedor para Listar -->
            <div class="w-full md:w-1/2 bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                <h1 class="text-3xl font-bold text-gray-800 text-center mb-6">Lista de Edades</h1>
                <?php include("./listEdad.php"); ?>
            </div>

        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-blue-600 text-white py-4">
        <div class="container mx-auto px-4 text-center">
            <p>&copy; 2024 Calculadora Matemática. Todos los derechos reservados.</p>
            <p><a href="#" class="hover:underline">Política de privacidad</a> | <a href="#" class="hover:underline">Términos de servicio</a></p>
        </div>
    </footer>

    <script src="../../scripts/edad/add-edad.js"></script>
</body>
</html>
