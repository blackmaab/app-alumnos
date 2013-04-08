<?php

class Empleados extends Conexion {

    public $idempleado = "";
    public $titulo_academico = "";
    public $experiencia = "";
    public $isss = "";
    public $empresa_afp = "";
    public $afp = "";
    public $tipo_empleado = "";
    public $idpersona = "";
    public $mensaje = "";
    public $bandera = "";

    public function __construct() {
        parent::conexion();
    }

    public function insert_Empleados() {
        try {
            $this->conection->beginTransaction();
            $sql = "INSERT INTO empleados VALUES(:idempleado,:titulo_academico,:experiencia,:isss,:empresa_afp,:afp,:tipo_empleado,:idpersona)";
            $resultSet = $this->conection->prepare($sql);
            $resultSet->bindParam(":idempleado", $this->idempleado);
            $resultSet->bindParam(":titulo_academico", $this->titulo_academico);
            $resultSet->bindParam(":experiencia", $this->experiencia);
            $resultSet->bindParam(":isss", $this->isss);
            $resultSet->bindParam(":empresa_afp", $this->empresa_afp);
            $resultSet->bindParam(":afp", $this->afp);
            $resultSet->bindParam(":tipo_empleado", $this->tipo_empleado);
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

    public function update_Empleados($arrayWhere) {
        try {
            $this->conection->beginTransaction();
            $where = "";
            foreach ($arrayWhere as $key => $value):
                $where.=$key . "=" . $value . " AND ";
            endforeach;
            $where = substr($where, 0, strlen($where) - 4);
            $sql = "UPDATE empleados SET idempleado=:idempleado,titulo_academico=:titulo_academico,experiencia=:experiencia,isss=:isss,empresa_afp=:empresa_afp,afp=:afp,tipo_empleado=:tipo_empleado,idpersona=:idpersona WHERE $where";
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

    public function delete_Empleados($arrayWhere) {
        try {
            $this->conection->beginTransaction();
            $where = "";
            foreach ($arrayWhere as $key => $value):
                $where.=$key . "=" . $value . " AND ";
            endforeach;
            $where = substr($where, 0, strlen($where) - 4);
            $sql = "DELETE FROM empleados WHERE $where";
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
