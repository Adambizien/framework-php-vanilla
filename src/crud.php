<?php 
    require_once "./src/dbConnect.php";

    //fonction getById
    // function getByID ($connection){
    //     $statement = $connection->query("SELECT * FROM contacts WHERE id = 2");
    //     $data = $statement->fetchAll(PDO::FETCH_ASSOC);
    //     // $statement = $connection->query("SELECT * FROM contacts WHERE id = '".htmlspecialchars($_GET['id']));
    //     // $data = $statement->fetchAll(PDO::FETCH_ASSOC);
    // }
    // function getByName ($connection){
    //     $statement = $connection->query("SELECT * FROM contacts WHERE `name` = ? AND `surname` = ?");
    //     $statement->bindParam(1,$_GET['name']);
    //     $statement->bindParam(2,$_GET['surname']);
    //     $data = $statement->fetchAll(PDO::FETCH_ASSOC);
    //     // $statement = $connection->query("SELECT * FROM contacts WHERE id = '".htmlspecialchars($_GET['id']));
    //     // $data = $statement->fetchAll(PDO::FETCH_ASSOC);
    // }
   

    // //fonction create
    // function create($connection){
    //     $statement = $connection->prepare("INSERT INTO `contacts` (`name`,`surname`,`status`) VALUES (?,?,'online')");
    //     $statement->bindParam(1,$_GET['name']);
    //     $statement->bindParam(2,$_GET['surname']);
    //     $statement ->execute();
    // }
    

    // //fonction getAll
    // function getAll($connection){
    //     $statement = $connection->query("SELECT * FROM contacts WHERE 1");
    //     $data = $statement->fetchAll(PDO::FETCH_ASSOC);
    // }
    

    // // fonction delete 
    // function delete($connection){
    //     $statement = $connection->prepare("DELETE FROM `contacts` WHERE id = ?");
    //     $id = 1;
    //     $statement->bindParam(1,$id);
    //     $statement ->execute();
     
    // }
    

    // //fonction update
    // function update($connection){
    //     $statement = $connection->prepare("UPDATE FROM `contacts`SET `status`=`offline` WHERE id = ?");
    //     $id = 4;
    //     $statement->bindParam(1,$id);
    //     $statement ->execute();

    // }
   
