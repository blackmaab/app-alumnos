<?php

class Personas extends Conexion {

    public $idpersona = "";
    public $nombres = "";
    public $apellidos = "";
    public $fecha_nacimiento = "";
    public $sexo = "";
    public $estado_civil = "";
    public $dui = "";
    public $nit = "";
    public $direccion = "";
    public $telefono_celular = "";
    public $telefono_casa = "";
    public $email = "";
    public $foto = "";
    public $nombre_padre = "";
    public $nombre_madre = "";
    public $nombre_conyugue = "";
    public $tipo_persona = "";
    public $usuario_bitacora = "";
    public $mensaje = "";
    public $bandera = "";

    public function __construct() {
        parent::conexion();
    }

    public function insert_Personas() {
        try {
            $this->conection->beginTransaction();
            $sql = "INSERT INTO personas VALUES(:idpersona,:nombres,:apellidos,:fecha_nacimiento,:sexo,:estado_civil,:dui,:nit,:direccion,:telefono_celular,:telefono_casa,:email,:foto,:nombre_padre,:nombre_madre,:nombre_conyugue,:tipo_persona,:usuario_bitacora)";
            $resultSet = $this->conection->prepare($sql);
            $resultSet->bindParam(":idpersona", $this->idpersona);
            $resultSet->bindParam(":nombres", $this->nombres);
            $resultSet->bindParam(":apellidos", $this->apellidos);
            $resultSet->bindParam(":fecha_nacimiento", $this->fecha_nacimiento);
            $resultSet->bindParam(":sexo", $this->sexo);
            $resultSet->bindParam(":estado_civil", $this->estado_civil);
            $resultSet->bindParam(":dui", $this->dui);
            $resultSet->bindParam(":nit", $this->nit);
            $resultSet->bindParam(":direccion", $this->direccion);
            $resultSet->bindParam(":telefono_celular", $this->telefono_celular);
            $resultSet->bindParam(":telefono_casa", $this->telefono_casa);
            $resultSet->bindParam(":email", $this->email);
            $resultSet->bindParam(":foto", $this->foto);
            $resultSet->bindParam(":nombre_padre", $this->nombre_padre);
            $resultSet->bindParam(":nombre_madre", $this->nombre_madre);
            $resultSet->bindParam(":nombre_conyugue", $this->nombre_conyugue);
            $resultSet->bindParam(":tipo_persona", $this->tipo_persona);
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

    public function update_Personas($arrayWhere) {
        try {
            $this->conection->beginTransaction();
            $where = "";
            foreach ($arrayWhere as $key => $value):
                $where.=$key . "=" . $value . " AND ";
            endforeach;
            $where = substr($where, 0, strlen($where) - 4);
            $sql = "UPDATE personas SET idpersona=:idpersona,nombres=:nombres,apellidos=:apellidos,fecha_nacimiento=:fecha_nacimiento,sexo=:sexo,estado_civil=:estado_civil,dui=:dui,nit=:nit,direccion=:direccion,telefono_celular=:telefono_celular,telefono_casa=:telefono_casa,email=:email,foto=:foto,nombre_padre=:nombre_padre,nombre_madre=:nombre_madre,nombre_conyugue=:nombre_conyugue,tipo_persona=:tipo_persona,usuario_bitacora=:usuario_bitacora WHERE $where";
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

    public function delete_Personas($arrayWhere) {
        try {
            $this->conection->beginTransaction();
            $where = "";
            foreach ($arrayWhere as $key => $value):
                $where.=$key . "=" . $value . " AND ";
            endforeach;
            $where = substr($where, 0, strlen($where) - 4);
            $sql = "DELETE FROM personas WHERE $where";
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
