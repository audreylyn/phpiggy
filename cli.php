<?php

include __DIR__ . "/src/Framework/Database.php";
use Framework\Database;


$db = new Database(
    'mysql',
    [
        'host' => 'localhost',
        'port' => 3306,
        'dbname' => 'phpiggy'
    ],
    'root',
    ''
);

try{
    $db->connection->beginTransaction();
    $db->connection->query("INSERT INTO products VALUES(99, 'Gloves')");
    $search = "Shirts";
    $query = "SELECT * FROM products WHERE name=:name";
    $stmt = $db->connection->prepare($query);
    $stmt->bindValue('name', 'Gloves', PDO::PARAM_STR);
    $stmt->execute();

    $db->connection->commit();

    var_dump($stmt->fetchAll(PDO::FETCH_OBJ));
}catch(Exception $error){
    if($db->connection->inTransaction()){
        $db->connection->rollBack();
    }
    echo "Transaction Failed";
}
