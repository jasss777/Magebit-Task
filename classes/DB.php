<?php
class DB {

    /**
    * $_instance - not setted db instance.
    */ 
    private static $_instance = null;

    private $_pdo, 
            $_query, 
            $_error = false, 
            $_results, 
            $_count = 0;
    
    /**
    * method __construct - connect to database, if not success throw error.
    * $this->_pdo - set in $_pdo connection to DB.
    */ 
    private function __construct() {
        try {
            $this->_pdo = new PDO('mysql:host=' . Config::get('mysql/host') . ';dbname=' . Config::get('mysql/db'), Config::get('mysql/username'), Config::get('mysql/password'));
        } catch(PDOException $e) {
            die($e->getMessage());
        }
    }

    /**
    * method getInstance - check if $_instance is not set, if not than set it.
    * (allow connect to db only once)
    */ 
    public static function getInstance(){
        if (!isset(self::$_instance)) {
            self::$_instance = new DB();
        }
        return self::$_instance;
    }

    /**
    * method query:
    * 1) set $_error false, to return only this method errors.
    * 2) check if query is succes
    * 3) check if $params have given value, if yes than run sql query foreach values.
    * 4) check if query execute, if yes than set to $_results query results in object and set $_count how many rows query return.
    * 5) if query not execute return $_error = true.
    */ 
    public function query($sql, $params = array()){
        $this->_error = false;
        if ($this->_query = $this->_pdo->prepare($sql)) {
            $x = 1;
            if (count($params)) {
                foreach($params as $param){
                    $this->_query->bindValue($x, $param);
                    $x++;
                }
            }
            if ($this->_query->execute()) {
                $this->_results = $this->_query->fetchAll(PDO::FETCH_OBJ);
                $this->_count = $this->_query->rowCount();
            } else{
                $this->_error = true;
            }
        }
        return $this;
    }

    /**
    * method action:
    * 1) check if $where array have 3 values ($field, $operator, $value)
    * 2) if yes than give $operators values in array.
    * 3) set $field,$operator,$value using given values from $where array.
    * 4) check if in $operators array have $operator value.
    * 5) if yes than create sql query using given data.
    * 6) if query run, return result, else return error.
    */ 
    public function action($action, $table, $where = array()){
        if (count($where) === 3) {
            $operators = array('=', '>', '<', '>=', '<=');

            $field    = $where[0];
            $operator = $where[1];
            $value    = $where[2];

            if (in_array($operator, $operators)) {
                $sql = "{$action} FROM {$table} WHERE {$field} {$operator} ?";

                if (!$this ->query($sql, array($value))->error()) {
                    return $this;
                }
            }
        }
        return false;
    }

    /**
    *  method get - run action method with given data('SELECT *', $table, $where)
    */ 
    public function get($table, $where){
        return $this->action('SELECT *', $table, $where);
    }

    /**
    *  method delete - run action method with given data('DELETE *', $table, $where)
    */ 
    public function delete($table, $where){
        return $this->action('DELETE', $table, $where);
    }

    /**
    *  method insert:
    * 1) check if in $fields have any data
    * 2) if yes than create $keys array and give data from $fields array, create var $values, and counter $x.
    * 3) check how many $fields we have using foreach and seperate each field by '?, '
    * 4) create $sql query INSERT INTO users by given data.
    * 5) if $sql query run without errors, return true.
    * ) if no return false
    */ 
    public function insert($table, $fields = array()){
        if (count($fields)) {
            $keys = array_keys($fields);
            $values = null;
            $x = 1;

            foreach ($fields as $field){
                $values .="?";
                if ($x < count($fields)) {
                    $values .= ', ';
                }
                $x++;
            }
            
            $sql = "INSERT INTO users(`" . implode('`, `', $keys) . "`) VALUES ({$values})";
            
            if (!$this->query($sql, $fields)->error()) {
                return true;
            }
        }
        return false;
    }

    /**
    *  method update :
    * 1) required values ($table = db table, $id = db row id, $fields = db fields)
    * 2) create var $set = '' (in this var we will insert values) and counter $x.
    * 3) run foreach $fields and insert in $set given values.
    * 4) check if in $fields array have more than 1 value, seperate them by ,
    * 5) create $sql query UPDATE, by given data
    * 6) if query run without errors return true, else return false.
    */ 
    public function update($table, $id, $fields){
        $set = '';
        $x = 1;

        foreach($fields as $name => $value){
            $set .= "{$name} = ?";
            if ($x < count($fields)) {
                $set .= ', ';
            }
            $x++;
        }
        $sql = "UPDATE {$table} SET {$set} WHERE id = {$id}";
        
        if (!$this->query($sql, $fields)->error) {
            return true;
        }
        return false;
    }

    public function results(){
        return $this->_results;
    }

    public function first(){
        return $this->results()[0];
    }

    public function error(){
        return $this->_error;
    }

    public function count(){
        return $this->_count;
    }
}
