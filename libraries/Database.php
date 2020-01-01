<?php 

class Database{  
private $host = DB_HOST;  
private $user = DB_USER;  
private $pass = DB_PASS;  
private $dbname = DB_NAME;

private $dbh;  
private $error;

public function __construct(){  
// Set DSN  
$dsn = "mysql:host=$this->host;dbname=$this->dbname";  
// Set options  
$options = array(  
PDO::ATTR_PERSISTENT => true,  
PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION  
);  
// Create a new PDO instanace  
try{  
$this->dbh = new PDO($dsn, $this->user, $this->pass, $options);  
}  
// Catch any errors  
catch(PDOException $e){  
$this->error = $e->getMessage();  
}  
}  



// prepare function
public function query($query){  
$this->stmt = $this->dbh->prepare($query);  
}  


//binding method
public function bind($param, $value, $type = null){  
if (is_null($type)) {  
switch (true) {  
case is_int($value):  
$type = PDO::PARAM_INT;  
break;  
case is_bool($value):  
$type = PDO::PARAM_BOOL;  
break;  
case is_null($value):  
$type = PDO::PARAM_NULL;  
break;  
default:  
$type = PDO::PARAM_STR;  
}  
}  
$this->stmt->bindValue($param, $value, $type);  
}  


//executing the query
public function execute(){  
return $this->stmt->execute();  
}


//fetching data
public function resultset(){  
$this->execute();  
return $this->stmt->fetchAll(PDO::FETCH_ASSOC);  
}  




//fetching single required line or row
public function single(){  
$this->execute();  
return $this->stmt->fetch(PDO::FETCH_ASSOC);  
} 


//count number of rows in table
public function rowCount(){  
return $this->stmt->rowCount();  
} 

//The Last Insert Id method returns the last inserted Id as a string. This method uses the PDO method PDO::lastInsertId.
public function lastInsertId(){  
return $this->dbh->lastInsertId();  
}  


/**
 * Transactions allows you to run multiple changes to a database all in one batch to ensure that your work will not be accessed incorrectly or there will be no outside interferences before you are finished. If you are running many queries that all rely upon each other, if one fails an exception will be thrown and you can roll back any previous changes to the start of the transaction.
 */
//to begin a transaction
public function beginTransaction(){  
return $this->dbh->beginTransaction();  
}  


/**
 * to end a transaction
 */
public function endTransaction(){  
return $this->dbh->commit();  
}  

//to cancel transaction
public function cancelTransaction(){  
return $this->dbh->rollBack();  
}


/**
 * The Debut Dump Parameters methods dumps the the information that was contained in the Prepared Statement. This method uses the PDOStatement::debugDumpParams PDO Method.
 */
public function debugDumpParams(){  
return $this->stmt->debugDumpParams();  
} 


}  

 

 ?>