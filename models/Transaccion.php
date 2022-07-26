<?php


class Transaccion extends Conectar {

    public function get_Transacciones(){
    $conectar = parent::conexion();
    parent::set_names();
    $sql= "SELECT * FROM g5_19.transaccion";
    $sql=$conectar ->prepare($sql);
    $sql->execute();
    return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);

}

public function get_Transaccion($Codigo_de_Transaccion){
    $conectar=parent::conexion();
    parent::set_names();
    $sql="SELECT * FROM g5_19.transaccion WHERE Codigo_de_Transaccion=?";
    $sql=$conectar->prepare($sql);
    $sql->bindValue(1,$Codigo_de_Transaccion);
    $sql->execute();
    return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
}

public function insert_Transaccion($Codigo_de_Transaccion,$Tipo_de_Transaccion,$Codigo_de_Cliente,$Fecha_de_Transaccion,$Monto_de_Transaccion,$Sucursal,$Numero_de_Cuenta){
    $conectar= parent:: conexion();
    parent::set_names();
    $sql="INSERT INTO g5_19.transaccion(Codigo_de_Transaccion,Tipo_de_Transaccion,Codigo_de_Cliente,Fecha_de_Transaccion,Monto_de_Transaccion,Sucursal,Numero_de_Cuenta)
    VALUES (?,?,?,?,?,?,?);";
    $sql=$conectar->prepare($sql);
    $sql->bindValue(1,$Codigo_de_Transaccion);
    $sql->bindValue(2,$Tipo_de_Transaccion);
    $sql->bindValue(3,$Codigo_de_Cliente);
    $sql->bindValue(4,$Fecha_de_Transaccion);
    $sql->bindValue(5,$Monto_de_Transaccion);
    $sql->bindValue(6,$Sucursal);
    $sql->bindValue(7,$Numero_de_Cuenta);
    $sql->execute();
    return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
}
public function update_Transaccion($Codigo_de_Transaccion,$Tipo_de_Transaccion,$Codigo_de_Cliente,$Fecha_de_Transaccion,$Monto_de_Transaccion,$Sucursal,$Numero_de_Cuenta){
    $conectar= parent:: conexion();
    parent::set_names();
    $sql="UPDATE g5_19.transaccion SET Tipo_de_Transaccion=?, Codigo_de_Cliente=?, Fecha_de_Transaccion=?, Monto_de_Transaccion=?, Sucursal=?, Numero_de_Cuenta=? 
    WHERE Codigo_de_Transaccion=?";
    $sql=$conectar->prepare($sql);
    $sql->bindValue(1,$Tipo_de_Transaccion);
    $sql->bindValue(2,$Codigo_de_Cliente);
    $sql->bindValue(3,$Fecha_de_Transaccion);
    $sql->bindValue(4,$Monto_de_Transaccion);
    $sql->bindValue(5,$Sucursal);
    $sql->bindValue(6,$Numero_de_Cuenta);
    $sql->bindValue(7,$Codigo_de_Transaccion);
    $sql->execute();
    return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
}
public function delete_Transaccion($Codigo_de_Transaccion){
    $conectar= parent:: conexion();
    parent::set_names();
    $sql="DELETE FROM g5_19.transaccion  WHERE Codigo_de_Transaccion=?";
    $sql=$conectar->prepare($sql);
    $sql->bindValue(1,$Codigo_de_Transaccion);
    $sql->execute();
    return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
}

}
?>