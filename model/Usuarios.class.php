<?php

class Usuarios extends Conexion {

    public $nick = "";
    public $clave = "";
    public $pregunta = "";
    public $respuesta = "";
    public $estado = "";
    public $fecha_creacion = "";
    public $idusuario_creacion = "";
    public $rol = "";
    public $mensaje = "";
    public $bandera = "";

    public function __construct() {
        parent::conexion();
    }

    public function insert_Usuarios() {
        try {
            $this->conection->beginTransaction();
            $sql = "INSERT INTO usuarios VALUES(:nick,:clave,:pregunta,:respuesta,:estado,:fecha_creacion,:idusuario_creacion,:rol)";
            $resultSet = $this->conection->prepare($sql);
            $resultSet->bindParam(":nick", $this->nick);
            $resultSet->bindParam(":clave", $this->clave);
            $resultSet->bindParam(":pregunta", $this->pregunta);
            $resultSet->bindParam(":respuesta", $this->respuesta);
            $resultSet->bindParam(":estado", $this->estado);
            $resultSet->bindParam(":fecha_creacion", $this->fecha_creacion);
            $resultSet->bindParam(":idusuario_creacion", $this->idusuario_creacion);
            $resultSet->bindParam(":rol", $this->rol);
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

    public function update_Usuarios($arrayWhere) {
        try {
            $this->conection->beginTransaction();
            $where = "";
            foreach ($arrayWhere as $key => $value):
                $where.=$key . "=" . $value . " AND ";
            endforeach;
            $where = substr($where, 0, strlen($where) - 4);
            $sql = "UPDATE usuarios SET nick=:nick,clave=:clave,pregunta=:pregunta,respuesta=:respuesta,estado=:estado,fecha_creacion=:fecha_creacion,idusuario_creacion=:idusuario_creacion,rol=:rol WHERE $where";
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

    public function delete_Usuarios($arrayWhere) {
        try {
            $this->conection->beginTransaction();
            $where = "";
            foreach ($arrayWhere as $key => $value):
                $where.=$key . "=" . $value . " AND ";
            endforeach;
            $where = substr($where, 0, strlen($where) - 4);
            $sql = "DELETE FROM usuarios WHERE $where";
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
