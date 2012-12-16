<?php

//
// MySQL library for php PDO DataProvider for baseplane/data layer
//

class CommandType {
    const Text = 0;
    const StoredProcedure = 1;
    // etc.
}

class DataProvider { 

    private static $instance; 

    public static function Instance() { 
    
        if(!self::$instance) { 
            self::$instance = new self(); 
        } 
        
        return self::$instance; 
    
    }
    
    public $connection_string = "mysql:host=localhost;dbname=platform;port=3307;";
    public $connection_string_name = "";
    public $conn = NULL;
    public $cur = NULL;
    public $user = "platform";
    public $pass = "platform";

    public function __construct() {    
        $this->reset();
    }
    
    public function reset() { 
    }
    
    public function __destruct() {
    //$stmt = $dbh->prepare("SELECT * FROM REGISTRY where name = ?");
    //if ($stmt->execute(array($_GET['name']))) {
    //  while ($row = $stmt->fetch()) {
    //    print_r($row);
    //  }
    //}
    }
    
    public function log_util($key, $val) {
        echo "\r\n<!--";
        echo "\r\n";
        echo $key;
        echo "\r\n ";
        echo $val;
        echo "\r\n-->\r\n";
    }   
        
    public function connect() {
        //'mysql:host=localhost;dbname=test'
        $this->conn = new PDO($this->connection_string, $this->user, $this->pass);
        
        $this->log_util("data_provider::connect: ", $this->connection_string);
    }
    
    public function commit() {
        
    }
    
    public function close() {
        $this->conn = null;
        $this->log_util("data_provider::close: ","");
    }
    
    public function execute_results($connection_string
        , $command_type
        , $sql
        , $params) {
        
        $result = array();
        
        $this->log_util("data_provider::execute_results: ",$sql);
        
        try {
            $this->connect();
            
            //$stmt = $dbh->prepare("SELECT * FROM REGISTRY where name = ?");
            $stmt = $this->conn->prepare($sql);            
                        
            $this->log_util("data_provider::execute_results: params ", $params);
            var_dump($params);
            
            if($params != null) {
                if ($stmt->execute($params)) {
                  while ($row = $stmt->fetch()) {
                    $result[] = $row;
                    
                    $this->log_util("data_provider::execute_results:row: ",$row);
                    //var_dump($row);
                  }
                }
            }
            else {
                
                $this->log_util("data_provider::execute_results:noparams ", "");
                if ($stmt->execute()) {
                    $this->log_util("data_provider::execute_results:execute ", "");
                  while ($row = $stmt->fetch()) {
                    $result[] = $row;
                    
                    $this->log_util("data_provider::execute_results:row: ",$row);
                    //var_dump($row);
                  }
                }
            }
        }
        catch (PDOException $e) {
            $this->log_util("Error!: ", $e->getMessage());
            die();
        }
        
        $this->close();
        
        return $result;
    }
    
    public function execute_scalar($connection_string
        , $command_type
        , $sql
        , $params) {
            
        $result = NULL;
        
        try {
            $this->connect();
            
            //$stmt = $dbh->prepare("SELECT * FROM REGISTRY where name = ?");
            $stmt = $this->conn->prepare($sql);
            if($params != null) {
                if ($stmt->execute($params)) {
                  while ($row = $stmt->fetch()) {
                    $result = $row[0];
                  }
                }
            }
            else {
                if ($stmt->execute()) {
                  while ($row = $stmt->fetch()) {
                    $result = $row[0];
                  }
                }
            }
        }
        catch (PDOException $e) {
            $this->log_util("Error!: ", $e->getMessage());
            die();
        }
        
        $this->close();
        
        return $result;
    }
    
    public function execute_no_results($connection_string
        , $command_type
        , $sql
        , $params) {
        
        $result = FALSE;
        
        try {
            $this->connect();
            
            //$stmt = $dbh->prepare("SELECT * FROM REGISTRY where name = ?");
            $stmt = $this->conn->prepare($sql);
            if($params != null) {
                if ($stmt->execute($params)) {
                     $result = TRUE;
                }
            }
            else {
                if ($stmt->execute()) {
                     $result = TRUE;
                }
            }
        }
        catch (PDOException $e) {
            $this->log_util("Error!: ", $e->getMessage());
            die();
        }
        
        $this->close();
        
        return $result;
    }
  
}

?>