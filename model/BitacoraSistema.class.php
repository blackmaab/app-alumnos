<?php

class BitacoraSistema extends Conexion {

    public $idbitacora_sistema = "";
    public $descripcion = "";
    public $tipo_accion = "";
    public $fecha_accion = "";
    public $tabla_modificada = "";
    public $idusuario = "";
    public $mensaje = "";
    public $bandera = "";

    public function __construct() {
        parent::conexion();
    }

    public function insert_BitacoraSistema() {
        try {
            $this->conection->beginTransaction();
            $sql = "INSERT INTO bitacora_sistema VALUES(:idbitacora_sistema,:descripcion,:tipo_accion,:fecha_accion,:tabla_modificada,:idusuario)";
            $resultSet = $this->conection->prepare($sql);
            $resultSet->bindParam(":idbitacora_sistema", $this->idbitacora_sistema);
            $resultSet->bindParam(":descripcion", $this->descripcion);
            $resultSet->bindParam(":tipo_accion", $this->tipo_accion);
            $resultSet->bindParam(":fecha_accion", $this->fecha_accion);
            $resultSet->bindParam(":tabla_modificada", $this->tabla_modificada);
            $resultSet->bindParam(":idusuario", $this->idusuario);
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

    public function update_BitacoraSistema($arrayWhere) {
        try {
            $this->conection->beginTransaction();
            $where = "";
            foreach ($arrayWhere as $key => $value):
                $where.=$key . "=" . $value . " AND ";
            endforeach;
            $where = substr($where, 0, strlen($where) - 4);
            $sql = "UPDATE bitacora_sistema SET idbitacora_sistema=:idbitacora_sistema,descripcion=:descripcion,tipo_accion=:tipo_accion,fecha_accion=:fecha_accion,tabla_modificada=:tabla_modificada,idusuario=:idusuario WHERE $where";
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

    public function delete_BitacoraSistema($arrayWhere) {
        try {
            $this->conection->beginTransaction();
            $where = "";
            foreach ($arrayWhere as $key => $value):
                $where.=$key . "=" . $value . " AND ";
            endforeach;
            $where = substr($where, 0, strlen($where) - 4);
            $sql = "DELETE FROM bitacora_sistema WHERE $where";
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
