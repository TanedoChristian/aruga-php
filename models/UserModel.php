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
        $query = "SELECT * from accounts";

        $statement = $this->connection->prepare($query);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }


    public function checkLogin($username) {
        $query = "SELECT password from accounts where username =:username";
        $statement = $this->connection->prepare($query);

        $data = [
            ':username' => $username
           
        ];

        $statement->execute($data);
        return $statement->fetch();
    }

    public function insertAccounts($firstname, $lastname, $adddress, $mobileno, $email, $password, $username){
        $query = "INSERT INTO accounts(firstname, lastname, address, mobileno, email, password, username)
                  values(:firstname, :lastname, :address, :mobileno, :email, :password, :username)
        ";
        $statement = $this->connection->prepare($query);

        $data = [
            ':firstname' => $firstname,
            ':lastname' => $lastname,
            ':address' => $adddress,
            ':mobileno' => $mobileno,
            ':email' => $email,
            ':password' => $password,
            ':username' => $username,
        ];


        $result = $statement->execute($data);

        if($result){
            return 'Success';
        } else {
            return 'Error';
        }
    }
}


?>