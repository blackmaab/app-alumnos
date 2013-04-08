<?php

/**
 * Nombre de Archivo: GenerarClass.class.php
 * Fecha Creación: 04-07-2013 
 * Hora: 03:06:51 PM
 * @author Mario Alvarado
 */
include_once 'Conexion.class.php';

class GenerarClass extends Conexion {

    public function __construct() {
        parent::conexion();
    }

    public function generar_modelo($directorio) {

        $sql = "SELECT TABLE_NAME FROM INFORMATION_SCHEMA.TABLES ";
        $sql.="WHERE table_schema = '" . $this->database . "'";


        $resultSet = $this->conection->prepare($sql);
        $resultSet->execute();
        while ($row = $resultSet->fetch(PDO::FETCH_OBJ)):
            //armar el nombre de la clase
            $partir = explode('_', $row->TABLE_NAME);
            $nombre_class = "";

            for ($i = 0; $i < count($partir); $i++):
                $nombre_class .= strtoupper(substr($partir[$i], 0, 1)) . substr($partir[$i], 1);
            endfor;
            $nombre_archivo = $nombre_class . ".class.php";
            //CREACION DEL ARCHIVO
            $archivo = fopen($directorio . $nombre_archivo, "w+"); //archivo de lectura y escritura
            fclose($archivo); //cerrando el archivo
            //escribiendo el archivos
            $escribir_archivo = fopen($directorio . $nombre_archivo, "a");
            fwrite($escribir_archivo, "<?php" . PHP_EOL);
            fwrite($escribir_archivo, "class $nombre_class extends Conexion {" . PHP_EOL);

            //recorrer cada una de las campos de la tabla           

            $sql_table = "SELECT COLUMN_NAME FROM information_schema.COLUMNS";
            $sql_table.=" WHERE TABLE_SCHEMA  = '" . $this->database . "'";
            $sql_table.=" AND TABLE_NAME = '" . $row->TABLE_NAME . "'";

            $resultSetTable = $this->conection->prepare($sql_table);
            $resultSetTable->execute();

            //array para el insert y update
            $array_save = [];

            while ($row_table = $resultSetTable->fetch(PDO::FETCH_OBJ)):
                //creacion de propiedades
                fwrite($escribir_archivo, "public $" . $row_table->COLUMN_NAME . "=\"\";" . PHP_EOL);
                $array_save[] = array(":$row_table->COLUMN_NAME", "\$this->$row_table->COLUMN_NAME");
            endwhile;

            //creacion de propiedades extras
            fwrite($escribir_archivo, "public \$mensaje=\"\";" . PHP_EOL);
            fwrite($escribir_archivo, "public \$bandera=\"\";" . PHP_EOL);

            /* CREACION DE METODOS */
            //creacion de constructor
            $construct = "public function __construct() {
                parent::conexion();
            }";
            fwrite($escribir_archivo, $construct . PHP_EOL);


            //creacion del metodo insert
            fwrite($escribir_archivo, "public function insert_" . $nombre_class . "(){" . PHP_EOL);
            fwrite($escribir_archivo, "try{" . PHP_EOL);
            fwrite($escribir_archivo, "\$this->conection->beginTransaction();" . PHP_EOL);
            //generar bindig
            $bindig = "";

            foreach ($array_save as $key => $value):
                $bindig.=$value[0];
            endforeach;
            $bindig = str_replace(":", ",:", $bindig);
            $bindig = substr($bindig, 1);

            fwrite($escribir_archivo, "\$sql=\"INSERT INTO $row->TABLE_NAME VALUES($bindig)\";" . PHP_EOL);
            fwrite($escribir_archivo, "\$resultSet = \$this->conection->prepare(\$sql);" . PHP_EOL);

            //cast bindg
            foreach ($array_save as $key => $value):
                fwrite($escribir_archivo, "\$resultSet->bindParam(\"$value[0]\", $value[1]);" . PHP_EOL);
            endforeach;

            fwrite($escribir_archivo, "\$resultSet->execute();" . PHP_EOL);
            fwrite($escribir_archivo, "\$this->conection->commit();" . PHP_EOL);
            fwrite($escribir_archivo, "\$this->mensaje=\"Registro Guardado con Exito\";" . PHP_EOL);
            fwrite($escribir_archivo, "\$this->bandera=1;" . PHP_EOL);

            fwrite($escribir_archivo, "}catch (PDOException \$e){" . PHP_EOL);
            fwrite($escribir_archivo, "\$this->conection->rollBack();" . PHP_EOL);
            fwrite($escribir_archivo, "\$this->mensaje=\"Error: \".\$e->getMessage();" . PHP_EOL);
            fwrite($escribir_archivo, "\$this->bandera=0;" . PHP_EOL);
            //cierre de try
            fwrite($escribir_archivo, "}" . PHP_EOL);
            //cierre de metodo
            fwrite($escribir_archivo, "}" . PHP_EOL);



            /* CREACION DEL METODO UPDATE */
            fwrite($escribir_archivo, "public function update_" . $nombre_class . "(\$arrayWhere){" . PHP_EOL);
            fwrite($escribir_archivo, "try{" . PHP_EOL);
            fwrite($escribir_archivo, "\$this->conection->beginTransaction();" . PHP_EOL);

            //generar bindig SET
            $bindig = "";
            foreach ($array_save as $key => $value):
                $bindig.=substr($value[0], 1) . "=" . $value[0] . ",";
            endforeach;
            //$bindig = str_replace(":", ",:", $bindig);
            $bindig = substr($bindig, 0, strlen($bindig) - 1);

            fwrite($escribir_archivo, "\$where = \"\";" . PHP_EOL);
            fwrite($escribir_archivo, "foreach (\$arrayWhere as \$key => \$value):" . PHP_EOL);
            fwrite($escribir_archivo, "\$where.=\$key . \"=\" . \$value . \" AND \";" . PHP_EOL);
            fwrite($escribir_archivo, "endforeach;" . PHP_EOL);
            fwrite($escribir_archivo, "\$where = substr(\$where, 0, strlen(\$where) - 4);" . PHP_EOL);

            fwrite($escribir_archivo, "\$sql=\"UPDATE $row->TABLE_NAME SET $bindig WHERE \$where\";" . PHP_EOL);
            fwrite($escribir_archivo, "\$resultSet = \$this->conection->prepare(\$sql);" . PHP_EOL);

            //recorrer param
            fwrite($escribir_archivo, "foreach (\$arrayWhere as \$key => \$value):" . PHP_EOL);
            $param = "\$resultSet->bindParam(\"\$key\",\$value);";
            fwrite($escribir_archivo, $param . PHP_EOL);
            fwrite($escribir_archivo, "endforeach;" . PHP_EOL);


            fwrite($escribir_archivo, "\$resultSet->execute();" . PHP_EOL);
            fwrite($escribir_archivo, "\$this->conection->commit();" . PHP_EOL);
            fwrite($escribir_archivo, "\$this->mensaje=\"Registro Actualizado con Exito\";" . PHP_EOL);
            fwrite($escribir_archivo, "\$this->bandera=1;" . PHP_EOL);

            fwrite($escribir_archivo, "}catch (PDOException \$e){" . PHP_EOL);
            fwrite($escribir_archivo, "\$this->conection->rollBack();" . PHP_EOL);
            fwrite($escribir_archivo, "\$this->mensaje=\"Error: \".\$e->getMessage();" . PHP_EOL);
            fwrite($escribir_archivo, "\$this->bandera=0;" . PHP_EOL);
            //cierre de try
            fwrite($escribir_archivo, "}" . PHP_EOL);
            //cierre de metodo
            fwrite($escribir_archivo, "}" . PHP_EOL);




            /* CREACION DEL METODO DELETE */
            fwrite($escribir_archivo, "public function delete_" . $nombre_class . "(\$arrayWhere){" . PHP_EOL);
            fwrite($escribir_archivo, "try{" . PHP_EOL);
            fwrite($escribir_archivo, "\$this->conection->beginTransaction();" . PHP_EOL);
            fwrite($escribir_archivo, "\$where = \"\";" . PHP_EOL);
            fwrite($escribir_archivo, "foreach (\$arrayWhere as \$key => \$value):" . PHP_EOL);
            fwrite($escribir_archivo, "\$where.=\$key . \"=\" . \$value . \" AND \";" . PHP_EOL);
            fwrite($escribir_archivo, "endforeach;" . PHP_EOL);
            fwrite($escribir_archivo, "\$where = substr(\$where, 0, strlen(\$where) - 4);" . PHP_EOL);

            fwrite($escribir_archivo, "\$sql=\"DELETE FROM $row->TABLE_NAME WHERE \$where\";" . PHP_EOL);
            fwrite($escribir_archivo, "\$resultSet = \$this->conection->prepare(\$sql);" . PHP_EOL);

            //recorrer param
            fwrite($escribir_archivo, "foreach (\$arrayWhere as \$key => \$value):" . PHP_EOL);
            $param = "\$resultSet->bindParam(\"\$key\",\$value);";
            fwrite($escribir_archivo, $param . PHP_EOL);
            fwrite($escribir_archivo, "endforeach;" . PHP_EOL);


            fwrite($escribir_archivo, "\$resultSet->execute();" . PHP_EOL);
            fwrite($escribir_archivo, "\$this->conection->commit();" . PHP_EOL);
            fwrite($escribir_archivo, "\$this->mensaje=\"Registro Eliminado con Exito\";" . PHP_EOL);
            fwrite($escribir_archivo, "\$this->bandera=1;" . PHP_EOL);

            fwrite($escribir_archivo, "}catch (PDOException \$e){" . PHP_EOL);
            fwrite($escribir_archivo, "\$this->conection->rollBack();" . PHP_EOL);
            fwrite($escribir_archivo, "\$this->mensaje=\"Error: \".\$e->getMessage();" . PHP_EOL);
            fwrite($escribir_archivo, "\$this->bandera=0;" . PHP_EOL);
            //cierre de try
            fwrite($escribir_archivo, "}" . PHP_EOL);
            //cierre de metodo
            fwrite($escribir_archivo, "}" . PHP_EOL);

            //creacion del destructor
            $destruct = "public function __destruct() {
                         parent::conexion();       
            }";
            fwrite($escribir_archivo, $destruct . PHP_EOL);

            //cerrando clase
            fwrite($escribir_archivo, "}" . PHP_EOL);
            fwrite($escribir_archivo, "?>" . PHP_EOL);
            //cerrando archivo
            fclose($escribir_archivo);
        endwhile;
        echo "Clases Generadas";
    }

    public function __destruct() {
        parent::conexion();
    }

}

?>
