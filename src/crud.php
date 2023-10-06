<?php 
    require_once "./src/dbConnect.php";

    //fonction getById
    function getByID ($connection,$id){
        $statement = $connection->prepare("SELECT * FROM `contacts` WHERE id = ?");
        $statement->bindParam(1,$id);
        $statement->execute();
        $data = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
    // dd(getByID($connection, 10));

    //function getByName
    function getByName ($connection,$name,$surname){
        $statement = $connection->prepare("SELECT * FROM contacts WHERE `name` = ? AND `surname` = ?");
        $statement->bindParam(1,$name);
        $statement->bindParam(2,$surname);
        $statement->execute();
        $data = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
    // dd(getByName($connection,"adam","bizien"));
   

    //fonction create
    function create($connection, $name , $surname){
        $statement = $connection->prepare("INSERT INTO `contacts` (`name`,`surname`,`status`) VALUES (?,?,'online')");
        $statement->bindParam(1,$name);
        $statement->bindParam(2,$surname);
        $statement ->execute();
    }
    // create($connection, "théo","marten");

    //fonction getAll
    function getAll($connection){
        $statement = $connection->query("SELECT * FROM contacts WHERE 1");
        $data = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $data ;
    }
    // dd(getAll($connection));
    

    // fonction delete 
    function delete($connection,$id){
        $statement = $connection->prepare("DELETE FROM `contacts` WHERE id = ?");
        $statement->bindParam(1,$id);
        $statement ->execute();
    }
    // delete($connection,10);
    

    //fonction update
    //ca sert a rien pour l'instant
    // function update($connection,$id){
    //     $statement = $connection->prepare("UPDATE FROM `contacts`SET `status`=`offline` WHERE id = ?");
    //     $statement->bindParam(1,$id);
    //     $statement ->execute();
    // }
    // update()

   
