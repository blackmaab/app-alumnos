<?php

class CatCursos extends Conexion {

    public $idcat_curso = "";
    public $titulo = "";
    public $descripcion = "";
    public $fecha_inicio = "";
    public $fecha_fin = "";
    public $estado = "";
    public $usuario_bitacora = "";
    public $mensaje = "";
    public $bandera = "";

    public function __construct() {
        parent::conexion();
    }

    public function insert_CatCursos() {
        try {
            $this->conection->beginTransaction();
            $sql = "INSERT INTO cat_cursos VALUES(:idcat_curso,:titulo,:descripcion,:fecha_inicio,:fecha_fin,:estado,:usuario_bitacora)";
            $resultSet = $this->conection->prepare($sql);
            $resultSet->bindParam(":idcat_curso", $this->idcat_curso);
            $resultSet->bindParam(":titulo", $this->titulo);
            $resultSet->bindParam(":descripcion", $this->descripcion);
            $resultSet->bindParam(":fecha_inicio", $this->fecha_inicio);
            $resultSet->bindParam(":fecha_fin", $this->fecha_fin);
            $resultSet->bindParam(":estado", $this->estado);
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

    public function update_CatCursos($arrayWhere) {
        try {
            $this->conection->beginTransaction();
            $where = "";
            foreach ($arrayWhere as $key => $value):
                $where.=$key . "=" . $value . " AND ";
            endforeach;
            $where = substr($where, 0, strlen($where) - 4);
            $sql = "UPDATE cat_cursos SET idcat_curso=:idcat_curso,titulo=:titulo,descripcion=:descripcion,fecha_inicio=:fecha_inicio,fecha_fin=:fecha_fin,estado=:estado,usuario_bitacora=:usuario_bitacora WHERE $where";
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

    public function delete_CatCursos($arrayWhere) {
        try {
            $this->conection->beginTransaction();
            $where = "";
            foreach ($arrayWhere as $key => $value):
                $where.=$key . "=" . $value . " AND ";
            endforeach;
            $where = substr($where, 0, strlen($where) - 4);
            $sql = "DELETE FROM cat_cursos WHERE $where";
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
