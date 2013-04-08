<?php

class Alumnos extends Conexion {

    public $idalumno = "";
    public $lugar_estudio = "";
    public $nivel_estudio = "";
    public $idpersona = "";
    public $mensaje = "";
    public $bandera = "";

    public function __construct() {
        parent::conexion();
    }

    public function insert_Alumnos() {
        try {
            $this->conection->beginTransaction();
            $sql = "INSERT INTO alumnos VALUES(:idalumno,:lugar_estudio,:nivel_estudio,:idpersona)";
            $resultSet = $this->conection->prepare($sql);
            $resultSet->bindParam(":idalumno", $this->idalumno);
            $resultSet->bindParam(":lugar_estudio", $this->lugar_estudio);
            $resultSet->bindParam(":nivel_estudio", $this->nivel_estudio);
            $resultSet->bindParam(":idpersona", $this->idpersona);
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

    public function update_Alumnos($arrayWhere) {
        try {
            $this->conection->beginTransaction();
            $where = "";
            foreach ($arrayWhere as $key => $value):
                $where.=$key . "=" . $value . " AND ";
            endforeach;
            $where = substr($where, 0, strlen($where) - 4);
            $sql = "UPDATE alumnos SET idalumno=:idalumno,lugar_estudio=:lugar_estudio,nivel_estudio=:nivel_estudio,idpersona=:idpersona WHERE $where";
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

    public function delete_Alumnos($arrayWhere) {
        try {
            $this->conection->beginTransaction();
            $where = "";
            foreach ($arrayWhere as $key => $value):
                $where.=$key . "=" . $value . " AND ";
            endforeach;
            $where = substr($where, 0, strlen($where) - 4);
            $sql = "DELETE FROM alumnos WHERE $where";
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
