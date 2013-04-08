<?php

class GrupoAlumnos extends Conexion {

    public $idgrupo_alumno = "";
    public $idcat_curso = "";
    public $idgrupo = "";
    public $idpersona = "";
    public $fecha_inscripcion = "";
    public $mensaje = "";
    public $bandera = "";

    public function __construct() {
        parent::conexion();
    }

    public function insert_GrupoAlumnos() {
        try {
            $this->conection->beginTransaction();
            $sql = "INSERT INTO grupo_alumnos VALUES(:idgrupo_alumno,:idcat_curso,:idgrupo,:idpersona,:fecha_inscripcion)";
            $resultSet = $this->conection->prepare($sql);
            $resultSet->bindParam(":idgrupo_alumno", $this->idgrupo_alumno);
            $resultSet->bindParam(":idcat_curso", $this->idcat_curso);
            $resultSet->bindParam(":idgrupo", $this->idgrupo);
            $resultSet->bindParam(":idpersona", $this->idpersona);
            $resultSet->bindParam(":fecha_inscripcion", $this->fecha_inscripcion);
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

    public function update_GrupoAlumnos($arrayWhere) {
        try {
            $this->conection->beginTransaction();
            $where = "";
            foreach ($arrayWhere as $key => $value):
                $where.=$key . "=" . $value . " AND ";
            endforeach;
            $where = substr($where, 0, strlen($where) - 4);
            $sql = "UPDATE grupo_alumnos SET idgrupo_alumno=:idgrupo_alumno,idcat_curso=:idcat_curso,idgrupo=:idgrupo,idpersona=:idpersona,fecha_inscripcion=:fecha_inscripcion WHERE $where";
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

    public function delete_GrupoAlumnos($arrayWhere) {
        try {
            $this->conection->beginTransaction();
            $where = "";
            foreach ($arrayWhere as $key => $value):
                $where.=$key . "=" . $value . " AND ";
            endforeach;
            $where = substr($where, 0, strlen($where) - 4);
            $sql = "DELETE FROM grupo_alumnos WHERE $where";
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
