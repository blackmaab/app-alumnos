<?php

class Grupos extends Conexion {

    public $idgrupo = "";
    public $idcat_curso = "";
    public $idpersona = "";
    public $idcat_aula = "";
    public $idcat_horario = "";
    public $cupo = "";
    public $estado = "";
    public $usuario_bitacora = "";
    public $mensaje = "";
    public $bandera = "";

    public function __construct() {
        parent::conexion();
    }

    public function insert_Grupos() {
        try {
            $this->conection->beginTransaction();
            $sql = "INSERT INTO grupos VALUES(:idgrupo,:idcat_curso,:idpersona,:idcat_aula,:idcat_horario,:cupo,:estado,:usuario_bitacora)";
            $resultSet = $this->conection->prepare($sql);
            $resultSet->bindParam(":idgrupo", $this->idgrupo);
            $resultSet->bindParam(":idcat_curso", $this->idcat_curso);
            $resultSet->bindParam(":idpersona", $this->idpersona);
            $resultSet->bindParam(":idcat_aula", $this->idcat_aula);
            $resultSet->bindParam(":idcat_horario", $this->idcat_horario);
            $resultSet->bindParam(":cupo", $this->cupo);
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

    public function update_Grupos($arrayWhere) {
        try {
            $this->conection->beginTransaction();
            $where = "";
            foreach ($arrayWhere as $key => $value):
                $where.=$key . "=" . $value . " AND ";
            endforeach;
            $where = substr($where, 0, strlen($where) - 4);
            $sql = "UPDATE grupos SET idgrupo=:idgrupo,idcat_curso=:idcat_curso,idpersona=:idpersona,idcat_aula=:idcat_aula,idcat_horario=:idcat_horario,cupo=:cupo,estado=:estado,usuario_bitacora=:usuario_bitacora WHERE $where";
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

    public function delete_Grupos($arrayWhere) {
        try {
            $this->conection->beginTransaction();
            $where = "";
            foreach ($arrayWhere as $key => $value):
                $where.=$key . "=" . $value . " AND ";
            endforeach;
            $where = substr($where, 0, strlen($where) - 4);
            $sql = "DELETE FROM grupos WHERE $where";
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
