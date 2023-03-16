<?php
require_once '../config/db.php';

class UsersDAO {
    private $db;

    private $GETLASTNUSERS = "SELECT * FROM users ORDER BY id DESC LIMIT ?";
    private $INSERTUSER = "INSERT INTO users (username, email, password, full_name) VALUES (?, ?, ?, ?)";
    private $DELETEUSER = "DELETE  FROM users WHERE id = ?";
    private $SELECTBYID = "SELECT * FROM users WHERE id = ?";
    private $SELECTBYUSERNAME = "SELECT * FROM users WHERE username = ?";
    private $SELECTBYEMAIL = "SELECT * FROM users WHERE email = ?";

    public function __construct()
    {
        $this->db = DB::createInstance();
    }

    public function getLastNUsers($n)
    {
        $statement = $this->db->prepare($this->GETLASTNUSERS);
        $statement->bindValue(1, $n, PDO::PARAM_INT);

        $statement->execute();

        return $statement->fetchAll();
    }

    public function insertUser($username, $email, $password, $full_name)
    {
        $statement = $this->db->prepare($this->INSERTUSER);
        $statement->bindValue(1, $username);
        $statement->bindValue(2, $email);
        $statement->bindValue(3, $password);
        $statement->bindValue(4, $full_name);

        $statement->execute();
    }

    public function deleteUser($id)
    {
        $statement = $this->db->prepare($this->DELETEUSER);
        $statement->bindValue(1, $id);

        $statement->execute();
    }

    public function getUserById($id)
    {
        $statement = $this->db->prepare($this->SELECTBYID);
        $statement->bindValue(1, $id);

        $statement->execute();

        return $statement->fetch();
    }

    public function getUserByUsername($username)
    {
        $statement = $this->db->prepare($this->SELECTBYUSERNAME);
        $statement->bindValue(1, $username);

        $statement->execute();

        $result = $statement->fetch(PDO::FETCH_BOTH);
        return $result;
    }
    public function getUserByEmail($email)
    {
        $statement = $this->db->prepare($this->SELECTBYEMAIL);
        $statement->bindValue(1, $email);

        $statement->execute();

        return $statement->fetch();
    }
}
?>
