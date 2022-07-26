<?php
    class Cliente extends Conectar{

        public function get_clientes(){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM cliente ";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function get_cliente($Numero_Cliente){
            $conectar= parent::conexion();
            parent::set_names();           
            $sql="SELECT * FROM cliente WHERE Numero_Cliente = ?";          
            $sql=$conectar->prepare($sql);           
            $sql->bindValue(1, $Numero_Cliente);           
            $sql->execute();
                
            return $resultado=$sql->fetchAll(PDO:: FETCH_ASSOC);
        }

        public function insert_cliente($Numero_Cliente, $Nombres, $Apellidos, $RTN, $Fecha_Afiliacion, $Saldo_Actual,$Numero_de_Cuenta){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="INSERT INTO cliente (Numero_Cliente,Nombres,Apellidos,RTN,Fecha_Afiliacion,Saldo_Actual,Numero_de_Cuenta) 
            VALUES (?,?,?,?,?,?,?);" ;
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $Numero_Cliente);
            $sql->bindValue(2, $Nombres);
            $sql->bindValue(3, $Apellidos);
            $sql->bindValue(4, $RTN);
            $sql->bindValue(5, $Fecha_Afiliacion);
            $sql->bindValue(6, $Saldo_Actual);
            $sql->bindValue(7, $Numero_de_Cuenta);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function update_cliente($Numero_Cliente, $Nombres, $Apellidos, $RTN, $Fecha_Afiliacion, $Saldo_Actual, $Numero_de_Cuenta){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="UPDATE cliente SET Nombres=?,Apellidos=?,RTN=?,Fecha_Afiliacion=?,Saldo_Actual=?,Numero_de_Cuenta=?
            WHERE Numero_Cliente = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $Nombres);
            $sql->bindValue(2, $Apellidos);
            $sql->bindValue(3, $RTN);
            $sql->bindValue(4, $Fecha_Afiliacion);
            $sql->bindValue(5, $Saldo_Actual);
            $sql->bindValue(6, $Numero_de_Cuenta);
            $sql->bindValue(7, $Numero_Cliente);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function delete_cliente($Numero_Cliente){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="DELETE FROM cliente WHERE Numero_Cliente = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $Numero_Cliente);
            $sql->execute();

            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

    }
?>