<?php 
    require_once "./src/dbConnect.php";

    // //fonction getById
    // function getByID ($connection,$id){
    //     $statement = $connection->prepare("SELECT * FROM `contacts` WHERE id = ?");
    //     $statement->bindParam(1,$id);
    //     $statement->execute();
    //     $data = $statement->fetchAll(PDO::FETCH_ASSOC);
    //     return $data;
    // }
    // // dd(getByID($connection, 10));

    // //function getByName
    // function getByName ($connection,$name,$surname){
    //     $statement = $connection->prepare("SELECT * FROM contacts WHERE `name` = ? AND `surname` = ?");
    //     $statement->bindParam(1,$name);
    //     $statement->bindParam(2,$surname);
    //     $statement->execute();
    //     $data = $statement->fetchAll(PDO::FETCH_ASSOC);
    //     return $data;
    // }
    // // dd(getByName($connection,"adam","bizien"));
   

    // //fonction create
    // function create($connection, $name , $surname){
    //     $statement = $connection->prepare("INSERT INTO `contacts` (`name`,`surname`,`status`) VALUES (?,?,'online')");
    //     $statement->bindParam(1,$name);
    //     $statement->bindParam(2,$surname);
    //     $statement ->execute();
    // }
    // // create($connection, "théo","marten");

    // //fonction getAll
    // function getAll($connection){
    //     $statement = $connection->query("SELECT * FROM contacts WHERE 1");
    //     $data = $statement->fetchAll(PDO::FETCH_ASSOC);
    //     return $data ;
    // }
    // // dd(getAll($connection));
    

    // // fonction delete 
    // function delete($connection,$id){
    //     $statement = $connection->prepare("DELETE FROM `contacts` WHERE id = ?");
    //     $statement->bindParam(1,$id);
    //     $statement ->execute();
    // }
    // // delete($connection,10);
    

    // //fonction update
    // //ca sert a rien pour l'instant
    // function update($connection,$id,$valeur,$column){
    //     $statement = $connection->prepare("UPDATE `contacts` SET `".$column."` = ? WHERE id = ?");
    //     $statement->bindParam(1,$valeur);
    //     $statement->bindParam(2,$id);
    //     $statement ->execute();
    // }
    // // update($connection,9,"try","name");


function queryBuilder($method, $table, ...$payload){
    $query ="";
    switch ($method) {
        case 'c':
            $query .= "INSERT INTO ";
            break;
        case 'r':
            $query .= "SELECT * FROM ";
            break;
        case 'u':
            $query .= "UPDATE ";
            break;
        case 'd':
            $query .= "DELETE ";
            break;
        default:

            die("ERROR : Prepared query method not defined");
            break;
    }

    $query .= '`'.  htmlspecialchars($table) . '` ';
    if($method ==='u'){
        $query .= "SET ";


    }
    if($method ==="c"){
        $columnParse  = '(';
        $valueParse  = '(';
        foreach ($payload as $index => $column) {
            foreach ($column as $key => $value) {
                if(is_string($value)){
                    $value = "\"" . $value. "\"";
                }
                $columnParse .= "`" . $key . "`"; 
                 if(!(count($payload) == ($index + 1 ))){
                $columnParse .= ", ";
            }
            }

        }
        $columnParse.= ")";
             foreach ($payload as $index => $column) {
            foreach ($column as $key => $value) {
                if(is_string($value)){
                    $value = "\"" . $value. "\"";
                }
                $valueParse .= $value ; 
                 if(!(count($payload) == ($index + 1 ))){
                $valueParse .= ", ";
            }
            }

        }
        $valueParse.= ")";
        $query .= $columnParse . " VALUES " . $valueParse;
    }
    if($method ==='u'){
        foreach ($payload as $index => $filter) {
            foreach ($filter as $key => $value) {
                if($key !== "id"){
                    if(is_string($value)){
                        $value = "\"" . $value. "\"";
                    }

                    $query .= "`" . $key . "` = ". $value .' ' ; 

                    if(!(count($payload) == ($index + 2 ))){
                        $query .= ", ";
                    }
                }
            }

        }
    }
    if($method !=='c' && $method !== "u" && count($payload)){
        $query .= "WHERE ";
        foreach ($payload as $index => $filter) {
            foreach ($filter as $key => $value) {
                if(is_string($value)){
                    $value = "\"" . $value. "\"";
                }
                $query .= "`" . $key . "` = ". $value . " AND "; 
            }
            if(count($payload) == ($index + 1 ) && $method !=='r'){
                $query .= "1";
            } else if(count($payload) == ($index + 1 )) {
                $query .= '`status` = "online"';
            }
        }
    } else if($method === "u"){
        $idFound = false;
        foreach ($payload as $index => $filter) {
            foreach ($filter as $key => $value) {
                if($key === "id"){
                    $idFound = true;

                    $query .= "WHERE ";
                    $query .= "`" . $key . "` = ". $value;
                } 
            }
        }
        if(!$idFound){
            die("ERROR : Not id to update");
        }
    }

   return $query;

} 
// dd(queryBuilder("c", "voiture", ["modele" =>"Ferrari"], ["couleur" => "rouge" ], ["test" => "taste"]));
// dd(queryBuilder("r", "contacts",  ["name" => "Delaistre" ]));
// dd(queryBuilder("u", "voiture", ["modele" => "Ferrari" ], ["couleur" => "rouge" ], ["id" => 2]));
// dd(queryBuilder("d", "voiture", ["modele" => "Ferrari" ], ["couleur" => "rouge" ]));

   
