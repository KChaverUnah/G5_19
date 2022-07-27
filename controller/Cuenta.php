<?php
    if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: POST, GET, DELETE, PUT, PATCH, OPTIONS');
        header('Access-Control-Allow-Headers: token, Content-Type');
        header('Access-Control-Max-Age: 1728000');
        header('Content-Length: 0');
        header('Content-Type: text/plain');
        die();
    }

    header('Access-Control-Allow-Origin: *');  
    header('Content-Type: application/json');

    require_once("../config/conexion.php");
    require_once("../models/Cuenta.php");

    $cuenta = new Cuenta();

    $body = json_decode(file_get_contents("php://input"), true);

    switch($_GET["opc"]){

        case "GetCuentas":
            $datos=$cuenta->get_cuentas();
            echo json_encode($datos);
        break;
            
        case "GetCuenta":
            $datos=$cuenta->get_cuenta($body["Numero_Cuenta"]);
            echo json_encode($datos);
        break;

        case "InsertCuenta":
            $datos=$cuenta->insert_cuenta($body["Numero_Cuenta"],$body["Nombre_Cuenta"],$body["Numero_Cliente"],$body["Fecha_Apertura"],$body["Saldo_Actual"],$body["Saldo_Retenido"],$body["Tipo_Moneda"]);
            echo json_encode("¡Cuenta Agregada!");
        break;

        case "UpdateCuenta":
            $datos=$cuenta->update_cuenta($body["Numero_Cuenta"],$body["Nombre_Cuenta"],$body["Numero_Cliente"],$body["Fecha_Apertura"],$body["Saldo_Actual"],$body["Saldo_Retenido"],$body["Tipo_Moneda"]);
            echo json_encode("¡Cuenta Actualizada!");
        break;

        case "DeleteCuenta":
            $datos=$cuenta->delete_cuenta($body["Numero_Cuenta"]);
            echo json_encode("¡Cuenta Eliminada!");
        break;
    }
?>