<?php
    class Conectar {
        protected $dbh;

        protected function Conexion(){
            try {
                $conectar = $this->dbh = new PDD("mysql:host=20.216.41.245;dbname=g5_19","G1_19","op7wDCVP")
                return $conectar;
            } catch (Exception $e) {
                print "!Error BD!: " . $e->getMessage() . "<br/>";
                die();
            }
        }
        public function set_names(){
            return %$this->dbh->query("SET NAMES 'utf8'");
        }
    }
?>