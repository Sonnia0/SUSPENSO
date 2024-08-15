<?php

include("../dataAccess/dataAccessLogic/Edad.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {  
    $edad = $_POST['edad'];
    $nombre = $_POST['nombre'];
    $resultado = $_POST['resultado'];

    $objConexion = new ConexionDB();
    $objEdad = new Edad($objConexion);

    $objEdad->setEdad($edad);
    $objEdad->setNombre($nombre);
    $objEdad->setResultado($edad * 7);


    $objEdad->agregarNumeros();
    exit();


}

else if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $objConexion = new ConexionDB();
    $objEdad = new Edad($objConexion);
    $array = $objEdad->listarDatos();
    echo json_encode($array);
    exit;
}

elseif ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
    $objConexion = new ConexionDB();
    $objEdad = new Edad($objConexion);

    // Verificar si se proporciona un ID o si se desea eliminar todo
    if (isset($_GET['id'])) {
        $id = intval($_GET['id']);
        $objEdad->setId($id);
        $objEdad->eliminarCalculo();
        $response = array('success' => true, 'message' => 'Cálculo eliminado correctamente');
    } elseif (isset($_GET['delete_all']) && $_GET['delete_all'] == 'true') {
        $objEdad->eliminarTodos();
        $response = array('success' => true, 'message' => 'Todos los cálculos eliminados correctamente');
    }
    echo json_encode($response);
    exit();
}

