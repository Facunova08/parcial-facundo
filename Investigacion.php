<?php
// Declara la clase encargada del acceso a datos para la entidad Investigacion
class Investigacion{
    // llamamos a la base de datos, para poder ejecutar las consultas sobre la base de datos
    private $db;

    // Método constructor (medio dificil de explicar, busquen en internet)
    public function __construct($con)
    {
        // $con es el recurso de conexión que se le pasa al crear una instancia de esta clase, y se asigna a la propiedad $db para su uso en los métodos posteriores
        $this->db = $con;
    }

    // Trae todos los datos de la tabla una vez
    public function getALL()
    {
        // Almacena la instrucción en lenguaje SQL para seleccionar todas las columnas de la tabla Investigacion
        $sql = "select * from Investigacion"; // creamos una consulta 
        //query se utiliza para ejecutar una consulta SQL en la base de datos, y devuelve un objeto mysqli_result con los resultados obtenidos
        $rs = $this->db->query($sql); // ejecutamos la consulta
        // Devuelve lo que te traiga query
        return $rs;
    }

    // Trae por fila por fil segun el ID que se le pase
    public function getByID($dato)
    {
        // Llama a los elemetos donde (WHERE=donde) el id de la tabla sea igual al dato que se le paso
        $sql = "SELECT * FROM `Investigacion` WHERE `Investigacion`.`id` = " . $dato;
        // Ejecuta la consulta estructurada en el motor de la base de datos
        $rs = $this->db->query($sql);
        // Devuelve el resultado de la consulta con la fila encontrada
        return $rs;
    }

   // Método para añadir nuevas filas a la tabla
   public function insert($datos)
   {
    // INSERT agrega los vlores que les pasemos
    $sql = "INSERT INTO `Investigacion` (
        `actividad`,   //estos son los valores que se le  van a psar a la tabla (borra este comentario antes de ejcutar)
        `lugar`, 
        `fecha`, 
        `horario`, 
        `horas_sumadas` 
    ) VALUES (
        '" . $datos['actividad'] . "',  //estos son los valores dentro del array que se le pasan a la funcion insert, que se van a insertar en la tabla (borra este comentario antes de ejecutar)
        '" . $datos['lugar'] . "', 
        '" . $datos['fecha'] . "',
        '" . $datos['horario'] . "', 
        '" . $datos['horas_sumadas'] . "'
    )";
    // Ejecuta la inserción en la base de datos y retorna un valor booleano indicando el estado del proceso
    return $this->db->query($sql);
}
    // Método para guardar la edicion
    public function update($datos)
    {

        // UPDATE modifica los valores de las columnas que le indiquemos, en este caso, se le pasan los nuevos valores a cada columna, y se le indica que solo modifique la fila donde el id sea igual al id del dato que se le paso (borra este comentario antes de ejecutar)
        $sql = "UPDATE `Investigacion` SET 
        `id` = '" . $datos['id'] . "', 
        `actividad` = '" . $datos['actividad'] . "', 
        `lugar` = '" . $datos['lugar'] . "',
        `fecha` = '" . $datos['fecha'] . "',  
        `horario` = '" . $datos['horario'] . "',
        `horas_sumadas` = '" . $datos['horas_sumadas'] . "' 
        
        WHERE `Investigacion`.`id`    = " . $datos['id']; // Cláusula de restricción indispensable para actualizar únicamente la fila deseada

        // Ejecuta la sentencia UPDATE guardando el resultado y retornándolo en la misma instrucción
        return $rs = $this->db->query($sql);
    }
    // Método para borrar de la tabla según su ID
    public function delete($dato)
    {
        //Ejemplo:
        //DELETE FROM `Investigacion` WHERE `Investigacion`.`id` = 7 borra el usuario con id 7
        $sql = "DELETE FROM `Investigacion` WHERE `Investigacion`.`id` = " . $dato;
        // Lanza la ejecución de borrado físico sobre el gestor relacional y devuelve la respuesta
        return $rs = $this->db->query($sql);
    }
}