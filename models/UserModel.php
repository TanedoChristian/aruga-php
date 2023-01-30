<?php



namespace models;
use database\Database;
use PDO;

class UserModel {

    private $connection;

    public function __construct(){
        $database = new Database;
        $this->connection = $database->getConnection();

    }

    public function getAllAccounts(){
        $query = "SELECT * from users";

        $statement = $this->connection->prepare($query);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }


    public function checkLogin($username) {
        $query = "SELECT password from users where username =:username";
        $statement = $this->connection->prepare($query);

        $data = [
            ':username' => $username
           
        ];

        $statement->execute($data);
        return $statement->fetch();
    }

    public function insertAccounts($userId, $firstname, $lastname, $adddress, $telno, $mobileno, $email, $password, $username, $type, $status){
        $query = "INSERT INTO users(user_id, firstname, lastname, address, telNo1, mobileno, email, password, username, type, status)
                  values(:userid,:firstname, :lastname, :address, :telno, :mobileno, :email, :password, :username, :type, :status)
        ";
        $statement = $this->connection->prepare($query);

        $data = [
            ':userid' => $userId,
            ':firstname' => $firstname,
            ':lastname' => $lastname,
            ':address' => $adddress,
            ':mobileno' => $mobileno,
            ':telno' => $telno,
            ':email' => $email,
            ':password' => $password,
            ':username' => $username,
            ':type' => $type,
            ':status' => $status
        ];


        $result = $statement->execute($data);

        if($result){
            return 'Success';
        } else {
            return 'Error';
        }
    }

    public function deleteAll(){
        $query = "DELETE from users where user_id != 1";
        $result =  $this->connection->query($query);

        if($result){
            return 'Success';
        } else {
            return 'Error';
        }
        
    }
}


?>