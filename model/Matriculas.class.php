<?php

class Matriculas extends Conexion {

    public $idmatricula = "";
    public $idpersona = "";
    public $total_pagado = "";
    public $fecha_pago = "";
    public $detalle = "";
    public $idgrupo_alumno = "";
    public $pago_realizado = "";
    public $fecha_limite = "";
    public $usuario_bitacora = "";
    public $mensaje = "";
    public $bandera = "";

    public function __construct() {
        parent::conexion();
    }

    public function insert_Matriculas() {
        try {
            $this->conection->beginTransaction();
            $sql = "INSERT INTO matriculas VALUES(:idmatricula,:idpersona,:total_pagado,:fecha_pago,:detalle,:idgrupo_alumno,:pago_realizado,:fecha_limite,:usuario_bitacora)";
            $resultSet = $this->conection->prepare($sql);
            $resultSet->bindParam(":idmatricula", $this->idmatricula);
            $resultSet->bindParam(":idpersona", $this->idpersona);
            $resultSet->bindParam(":total_pagado", $this->total_pagado);
            $resultSet->bindParam(":fecha_pago", $this->fecha_pago);
            $resultSet->bindParam(":detalle", $this->detalle);
            $resultSet->bindParam(":idgrupo_alumno", $this->idgrupo_alumno);
            $resultSet->bindParam(":pago_realizado", $this->pago_realizado);
            $resultSet->bindParam(":fecha_limite", $this->fecha_limite);
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

    public function update_Matriculas($arrayWhere) {
        try {
            $this->conection->beginTransaction();
            $where = "";
            foreach ($arrayWhere as $key => $value):
                $where.=$key . "=" . $value . " AND ";
            endforeach;
            $where = substr($where, 0, strlen($where) - 4);
            $sql = "UPDATE matriculas SET idmatricula=:idmatricula,idpersona=:idpersona,total_pagado=:total_pagado,fecha_pago=:fecha_pago,detalle=:detalle,idgrupo_alumno=:idgrupo_alumno,pago_realizado=:pago_realizado,fecha_limite=:fecha_limite,usuario_bitacora=:usuario_bitacora WHERE $where";
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

    public function delete_Matriculas($arrayWhere) {
        try {
            $this->conection->beginTransaction();
            $where = "";
            foreach ($arrayWhere as $key => $value):
                $where.=$key . "=" . $value . " AND ";
            endforeach;
            $where = substr($where, 0, strlen($where) - 4);
            $sql = "DELETE FROM matriculas WHERE $where";
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
