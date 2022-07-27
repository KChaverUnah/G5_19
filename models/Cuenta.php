<?php
    class Cuenta extends Conectar{

        public function get_cuentas(){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM cuenta ";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function get_cuenta($Numero_Cuenta){
            $conectar= parent::conexion();
            parent::set_names();           
            $sql="SELECT * FROM cuenta WHERE Numero_Cuenta = ?";          
            $sql=$conectar->prepare($sql);           
            $sql->bindValue(1, $Numero_Cuenta);           
            $sql->execute();
                
            return $resultado=$sql->fetchAll(PDO:: FETCH_ASSOC);
        }

        public function insert_cuenta($Numero_Cuenta, $Nombre_Cuenta, $Numero_Cliente, $Fecha_Apertura, $Saldo_Actual, $Saldo_Retenido, $Tipo_Moneda){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="INSERT INTO cuenta(Numero_Cuenta, Nombre_Cuenta, Numero_Cliente, Fecha_Apertura, Saldo_Actual, Saldo_Retenido, Tipo_Moneda) 
            VALUES (?,?,?,?,?,?,?);";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $Numero_Cuenta);
            $sql->bindValue(2, $Nombre_Cuenta);
            $sql->bindValue(3, $Numero_Cliente);
            $sql->bindValue(4, $Fecha_Apertura);
            $sql->bindValue(5, $Saldo_Actual);
            $sql->bindValue(6, $Saldo_Retenido);
            $sql->bindValue(7, $Tipo_Moneda);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function update_cuenta($Numero_Cuenta, $Nombre_Cuenta, $Numero_Cliente, $Fecha_Apertura, $Saldo_Actual, $Saldo_Retenido, $Tipo_Moneda){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="UPDATE cuenta SET Nombre_Cuenta=?, Numero_Cliente=?, Fecha_Apertura=?, Saldo_Actual=?, Saldo_Retenido=?, Tipo_Moneda=? 
            WHERE Numero_Cuenta=?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $Nombre_Cuenta);
            $sql->bindValue(2, $Numero_Cliente);
            $sql->bindValue(3, $Fecha_Apertura);
            $sql->bindValue(4, $Saldo_Actual);
            $sql->bindValue(5, $Saldo_Retenido);
            $sql->bindValue(6, $Tipo_Moneda);
            $sql->bindValue(7, $Numero_Cuenta);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function delete_cuenta($Numero_Cuenta){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="DELETE FROM cuenta WHERE Numero_Cuenta = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $Numero_Cuenta);
            $sql->execute();

            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }
    }
?>