<?php

class NotaAlumnos extends Conexion {

    public $idnota_alumno = "";
    public $idgrupo_alumno = "";
    public $fecha_calificacion = "";
    public $calificacion = "";
    public $usuario_bitacora = "";
    public $mensaje = "";
    public $bandera = "";

    public function __construct() {
        parent::conexion();
    }

    public function insert_NotaAlumnos() {
        try {
            $this->conection->beginTransaction();
            $sql = "INSERT INTO nota_alumnos VALUES(:idnota_alumno,:idgrupo_alumno,:fecha_calificacion,:calificacion,:usuario_bitacora)";
            $resultSet = $this->conection->prepare($sql);
            $resultSet->bindParam(":idnota_alumno", $this->idnota_alumno);
            $resultSet->bindParam(":idgrupo_alumno", $this->idgrupo_alumno);
            $resultSet->bindParam(":fecha_calificacion", $this->fecha_calificacion);
            $resultSet->bindParam(":calificacion", $this->calificacion);
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

    public function update_NotaAlumnos($arrayWhere) {
        try {
            $this->conection->beginTransaction();
            $where = "";
            foreach ($arrayWhere as $key => $value):
                $where.=$key . "=" . $value . " AND ";
            endforeach;
            $where = substr($where, 0, strlen($where) - 4);
            $sql = "UPDATE nota_alumnos SET idnota_alumno=:idnota_alumno,idgrupo_alumno=:idgrupo_alumno,fecha_calificacion=:fecha_calificacion,calificacion=:calificacion,usuario_bitacora=:usuario_bitacora WHERE $where";
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

    public function delete_NotaAlumnos($arrayWhere) {
        try {
            $this->conection->beginTransaction();
            $where = "";
            foreach ($arrayWhere as $key => $value):
                $where.=$key . "=" . $value . " AND ";
            endforeach;
            $where = substr($where, 0, strlen($where) - 4);
            $sql = "DELETE FROM nota_alumnos WHERE $where";
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
