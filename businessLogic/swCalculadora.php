<?php

include ('../dataAccess/dataAccessLogic/Calculadora.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $numeroUno = $_POST['base'];
    $numeroDos = $_POST['altura'];
    $operacion = $_POST['operacion']; 
    $resultado = $_POST['resultado'];


    $objConexion = new ConexionDB();
    $objCalculadora = new Calculadora($objConexion);

//llamar a la funcion 
    $objCalculadora->setNumeroUno($numeroUno);
    $objCalculadora->setNumeroDos($numeroDos);
    $objCalculadora->setOperacion($operacion);
    $objCalculadora->setResultado($resultado);



    $objCalculadora->agregarNumeros();
    exit();


  /*  switch ($operacion){
        case "suma": 
            $objCalculadora->setResultado($numeroUno + $numeroDos);
            break;
        case "resta":
            $objCalculadora->setResultado($numeroUno - $numeroDos);
            break;
        case "area":
            $objCalculadora->setResultado(( $numeroUno * $numeroDos ) / 2);
            break;
        case "division":
            if($numeroDos!=0){
                $objCalculadora->setResultado($numeroUno / $numeroDos);
            } else {
                echo json_encode(['error' => 'No se puede dividir por cero']);
                exit();
            }
            break;
        case "porcentaje":
            $objCalculadora->setResultado(($numeroUno * $numeroDos) / 100);
            break;
        case "exponencial":
            $objCalculadora->setResultado(pow($numeroUno, $numeroDos));
            break;
        case "raiz":
            if($numeroDos>0){
                $objCalculadora->setResultado(pow($numeroUno, 1/$numeroDos));
            } else {
                echo json_encode(['error' => 'No se puede calcular la raíz con un exponente negativo']);
                exit();
            }
            break;
        
        default:
        echo json_encode(['error' => 'Operación no válida']);
        exit();
    }
*/

}

else if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $objConexion = new ConexionDB();
    $objCalculadora = new Calculadora($objConexion);
    $array = $objCalculadora->listarDatos();
    echo json_encode($array);
    exit;
}

elseif ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
    $objConexion = new ConexionDB();
    $objCalculadora = new Calculadora($objConexion);

    // Verificar si se proporciona un ID o si se desea eliminar todo
    if (isset($_GET['id'])) {
        $id = intval($_GET['id']);
        $objCalculadora->setId($id);
        $objCalculadora->eliminarCalculo();
        $response = array('success' => true, 'message' => 'Cálculo eliminado correctamente');
    } elseif (isset($_GET['delete_all']) && $_GET['delete_all'] == 'true') {
        $objCalculadora->eliminarTodos();
        $response = array('success' => true, 'message' => 'Todos los cálculos eliminados correctamente');
    }
    echo json_encode($response);
    exit();
}