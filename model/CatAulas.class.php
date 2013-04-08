<?php

class CatAulas extends Conexion {

    public $idcat_aula = "";
    public $descripcion = "";
    public $estado = "";
    public $usuario_bitacora = "";
    public $mensaje = "";
    public $bandera = "";

    public function __construct() {
        parent::conexion();
    }

    public function insert_CatAulas() {
        try {
            $this->conection->beginTransaction();
            $sql = "INSERT INTO cat_aulas VALUES(:idcat_aula,:descripcion,:estado,:usuario_bitacora)";
            $resultSet = $this->conection->prepare($sql);
            $resultSet->bindParam(":idcat_aula", $this->idcat_aula);
            $resultSet->bindParam(":descripcion", $this->descripcion);
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

    public function update_CatAulas($arrayWhere) {
        try {
            $this->conection->beginTransaction();
            $where = "";
            foreach ($arrayWhere as $key => $value):
                $where.=$key . "=" . $value . " AND ";
            endforeach;
            $where = substr($where, 0, strlen($where) - 4);
            $sql = "UPDATE cat_aulas SET idcat_aula=:idcat_aula,descripcion=:descripcion,estado=:estado,usuario_bitacora=:usuario_bitacora WHERE $where";
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

    public function delete_CatAulas($arrayWhere) {
        try {
            $this->conection->beginTransaction();
            $where = "";
            foreach ($arrayWhere as $key => $value):
                $where.=$key . "=" . $value . " AND ";
            endforeach;
            $where = substr($where, 0, strlen($where) - 4);
            $sql = "DELETE FROM cat_aulas WHERE $where";
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
