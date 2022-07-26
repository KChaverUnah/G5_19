<?php
if($_SERVER['REQUEST_METHOD']==='OPTIONS'){
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: POST, GET, DELETE, PUT, PATCH, OPTIONS');
    header('Access-Control-Allow-Headers: token, Content-Type');
    header('Access-Control-Allow-Max-Age: 1728000');
    header('Content-Length: 0');
    header('Content-Type: text/plain');
    die();
}

header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    require_once("../config/Conexion.php");
    require_once("../models/Transaccion.php");
    $transaccion = new Transaccion();

    $body=json_decode(file_get_contents("php://input"),true);
    
    switch($_GET["opc"]){
        case "GetTransacciones":
            $datos=$transaccion->get_Transacciones();
            echo json_encode($datos);
        break;
        case "GetTransaccion":
            $datos=$transaccion->get_Transaccion($body["Codigo_de_Transaccion"]);
            echo json_encode($datos);
        break;
        
        case "InsertTransaccion":
            $datos=$transaccion->insert_Transaccion($body["Codigo_de_Transaccion"],$body["Tipo_de_Transaccion"],$body["Codigo_de_Cliente"],$body["Fecha_de_Transaccion"],$body["Monto_de_Transaccion"],$body["Sucursal"],$body["Numero_de_Cuenta"]);
            echo json_encode("-> Transaccion agregada con éxito!");
        break;

        case "UpdateTransaccion":
            $datos=$transaccion->update_Transaccion($body["Codigo_de_Transaccion"],$body["Tipo_de_Transaccion"],$body["Codigo_de_Cliente"],$body["Fecha_de_Transaccion"],$body["Monto_de_Transaccion"],$body["Sucursal"],$body["Numero_de_Cuenta"]);
            echo json_encode("-> La Transaccion ha sido actualizada con éxito!");
        break;

        case "DeleteTransaccion":
            $datos=$transaccion->delete_Transaccion($body["Codigo_de_Transaccion"]);
            echo json_encode("La Transaccion ha sido eliminada con éxito!");
        break;
    }
?>