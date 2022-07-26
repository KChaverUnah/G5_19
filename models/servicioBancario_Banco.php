<?php
    class Bancos extends Conectar{

        public function get_bancos(){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="SELECT* FROM banco";
        $sql=$conectar->prepare($sql);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function get_banco($CodigoBanco){
            $conectar= parent::conexion();
            parent::set_names();           
            $sql="SELECT * FROM banco WHERE CodigoBanco = ?";          
            $sql=$conectar->prepare($sql);           
            $sql->bindValue(1, $CodigoBanco);           
            $sql->execute();
                
            return $resultado=$sql->fetchAll(PDO:: FETCH_ASSOC);
        }

        public function insert_banco($CodigoBanco, $NombreBanco, $OficinaPrincipal, $CantidadSucursales, $FechaFundación, $pais, $RTN){
            $conectar= parent::conexion();           
            parent::set_names();
            $sql="INSERT INTO banco(CodigoBanco,NombreBanco,OficinaPrincipal,CantidadSucursales,FechaFundación,pais,RTN)
            VALUES (?,?,?,?,?,?,?);";       
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $CodigoBanco);        
            $sql->bindValue(2, $NombreBanco);
            $sql->bindValue(3, $OficinaPrincipal);   
            $sql->bindValue(4, $CantidadSucursales);
            $sql->bindValue(5, $FechaFundación);
            $sql->bindValue(6, $pais);
            $sql->bindValue(7, $RTN);
            $sql->execute();
            
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function update_banco($CodigoBanco,$NombreBanco,$OficinaPrincipal, $CantidadSucursales, $FechaFundación,$pais,$RTN){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="UPDATE banco SET NombreBanco=?,OficinaPrincipal=?,CantidadSucursales=?,FechaFundación=?,pais=?,RTN=?
           WHERE CodigoBanco = ?";
             $sql=$conectar->prepare($sql);   
             $sql->bindValue(1, $NombreBanco);
             $sql->bindValue(2, $OficinaPrincipal);   
             $sql->bindValue(3, $CantidadSucursales);
             $sql->bindValue(4, $FechaFundación);
             $sql->bindValue(5, $pais);
             $sql->bindValue(6, $RTN);
             $sql->bindValue(7, $CodigoBanco);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);

        }

  
         public function delete_banco($CodigoBanco){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="DELETE FROM banco WHERE CodigoBanco = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $CodigoBanco);
            $sql->execute();

            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);

        }

    }
?>
