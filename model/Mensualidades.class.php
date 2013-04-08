<?php

class Mensualidades extends Conexion {

    public $idmensualidad = "";
    public $idmatricula = "";
    public $cuota = "";
    public $estado_pago = "";
    public $fecha_limite = "";
    public $fecha_pago = "";
    public $mora = "";
    public $usuario_bitacora = "";
    public $mensaje = "";
    public $bandera = "";

    public function __construct() {
        parent::conexion();
    }

    public function insert_Mensualidades() {
        try {
            $this->conection->beginTransaction();
            $sql = "INSERT INTO mensualidades VALUES(:idmensualidad,:idmatricula,:cuota,:estado_pago,:fecha_limite,:fecha_pago,:mora,:usuario_bitacora)";
            $resultSet = $this->conection->prepare($sql);
            $resultSet->bindParam(":idmensualidad", $this->idmensualidad);
            $resultSet->bindParam(":idmatricula", $this->idmatricula);
            $resultSet->bindParam(":cuota", $this->cuota);
            $resultSet->bindParam(":estado_pago", $this->estado_pago);
            $resultSet->bindParam(":fecha_limite", $this->fecha_limite);
            $resultSet->bindParam(":fecha_pago", $this->fecha_pago);
            $resultSet->bindParam(":mora", $this->mora);
            $resultSet->bindParam(":usuario_bitacora", $this->usuario_bitacora);
            $resultSet->execute();
            $this->conection->commit();
            $this->mensaje = "Registro Guardado con Exito";
            $this->bandera = 1;
        } catch (PDOException $e) {
            $this->conection->rollBack();
            $this->mensaje = "Error: " . $e->getMessage();
            $this->bandera = 0;
        }
    }

    public function update_Mensualidades($arrayWhere) {
        try {
            $this->conection->beginTransaction();
            $where = "";
            foreach ($arrayWhere as $key => $value):
                $where.=$key . "=" . $value . " AND ";
            endforeach;
            $where = substr($where, 0, strlen($where) - 4);
            $sql = "UPDATE mensualidades SET idmensualidad=:idmensualidad,idmatricula=:idmatricula,cuota=:cuota,estado_pago=:estado_pago,fecha_limite=:fecha_limite,fecha_pago=:fecha_pago,mora=:mora,usuario_bitacora=:usuario_bitacora WHERE $where";
            $resultSet = $this->conection->prepare($sql);
            foreach ($arrayWhere as $key => $value):
                $resultSet->bindParam("$key", $value);
            endforeach;
            $resultSet->execute();
            $this->conection->commit();
            $this->mensaje = "Registro Actualizado con Exito";
            $this->bandera = 1;
        } catch (PDOException $e) {
            $this->conection->rollBack();
            $this->mensaje = "Error: " . $e->getMessage();
            $this->bandera = 0;
        }
    }

    public function delete_Mensualidades($arrayWhere) {
        try {
            $this->conection->beginTransaction();
            $where = "";
            foreach ($arrayWhere as $key => $value):
                $where.=$key . "=" . $value . " AND ";
            endforeach;
            $where = substr($where, 0, strlen($where) - 4);
            $sql = "DELETE FROM mensualidades WHERE $where";
            $resultSet = $this->conection->prepare($sql);
            foreach ($arrayWhere as $key => $value):
                $resultSet->bindParam("$key", $value);
            endforeach;
            $resultSet->execute();
            $this->conection->commit();
            $this->mensaje = "Registro Eliminado con Exito";
            $this->bandera = 1;
        } catch (PDOException $e) {
            $this->conection->rollBack();
            $this->mensaje = "Error: " . $e->getMessage();
            $this->bandera = 0;
        }
    }

    public function __destruct() {
        parent::conexion();
    }

}

?>
