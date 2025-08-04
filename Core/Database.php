<?php  

namespace Core;

//Conncet to the database, and execute a Query
class Database { 
      public $connection;
      //En el statemen se almacena el resultado de la consulta
      protected $statement;

      //Creo el Constructor
      public function __construct($config, $usuario = 'root', $contrasena = 'Amorto5337.') 
      {
      //Defino los datos de la base de datos    
      $dsn = 'mysql:' . http_build_query($config, '', ';'); //example.com?host=localhost&port=3386&dbname=myapp&charset=utf8mb4
      //Connect to our MySql database
      $dsn = "mysql:host={$config['host']};port={$config['port']};dbname={$config['dbname']};charset={$config['charset']}";
      //Defino los datos del servidor...
      $this->connection = new PDO($dsn, $usuario, $contrasena, [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
      ]);
      }
//Ejecuto la consulta
      public function query($query, $params = []) 
      {
      //LLamo a la base de datos
      $this->statement = $this->connection->prepare($query);
      $this->statement->execute($params);
      //Retorno el resultado de la consulta
      return $this;
      }
//!Hasta que no agregue este get y lo cambie en "notes.php" no funciono el codigo por un "error Fetch"
//Retorna todos los resultados
      public function get() {
return $this->statement->fetchAll();
      }
//Retorna el primer resultado
      public function find() 
      {
      return $this->statement->fetch();
      }
//Retorna el primer resultado
      public function findOrFail() {
        $result = $this-> find();
        if (! $result) {
          abort();
        }
        return $result;
      }
    }    