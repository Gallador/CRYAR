<?php

require_once "Repository.php";
require_once __DIR__.'//..//Models//User.php';
require_once __DIR__.'//..//Models//Post.php';
require_once __DIR__."//..//Database.php";


class UserRepository extends Repository {


    public function getUser(string $email): ?User 
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM cryar WHERE Email = :Email
        ');
        
        $stmt->bindParam(':Email', $email, PDO::PARAM_STR);
        
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if($user == false) {
            return null;
        }

        return new User(
            $user['Email'],
            $user['Password'],
            $user['Name'],
            $user['Surname'],
            $user['id']
            );
    }
    
    public function registerUser(string $name, string $surname, string $email, string $password)
    {
        
        $stmt = $this->database->connect()->prepare('
            INSERT INTO cryar (Name, Surname, Email, Password) VALUES (:Name, :Surname, :Email, :Password)
        ');
        
        $stmt->bindParam(':Name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':Surname', $surname, PDO::PARAM_STR);
        $stmt->bindParam(':Email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':Password', $password, PDO::PARAM_STR);
        $stmt->execute(array(
            ':Name' => $name, 
            ':Surname' => $surname, 
            ':Email' => $email, 
            ':Password' => $password));
        
      
        
    }

    public function getUsers(string $email): ?array {
        // $result = [];
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM cryar WHERE Email != :Email;
        ');
        $stmt->bindParam(':Email', $_SESSION['id'], PDO::PARAM_STR);
        $stmt->execute();
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // foreach ($users as $user) {
        //     $result[] = new User(
        //         $user['email'],
        //         $user['password'],
        //         $user['name'],
        //         $user['surname'],
        //         $user['id']
        //     );
        // }

        return $users;
    }

    public function bookHelcow(string $email) {

        $suh = $this->database->connect()->prepare("
            SELECT cryar.id FROM cryar WHERE cryar.Email = :Email;
        ");
        $suh->bindParam(':Email', $email);
        
        $suh->execute();
      
        $stmt = $this->database->connect()->prepare("
            INSERT INTO `transaction` (`user_id`, `parking_id`, `time_start`, `time_end`) VALUES (:Email, '2', NOW(), ADDTIME(NOW(),'01:00:00'));
        ");

        $sth = $this->database->connect()->prepare("
        CREATE EVENT delete_helcow
        ON SCHEDULE AT CURRENT_TIMESTAMP + INTERVAL 1 HOUR DO 
        DELETE FROM transaction WHERE transaction.`transaction_id`;
        ");
        
        $res = $suh->fetch(PDO::FETCH_ASSOC);
        $id = $res['id'];

        //$stmt->bindParam(':Email', $id, PDO::PARAM_STR);
        $stmt->execute(array(':Email' => $id));
        $sth->execute();
        
    }

    public function bookSzlak(string $email) {

        $sus = $this->database->connect()->prepare("
            SELECT cryar.id FROM cryar WHERE cryar.Email = :Email;
        ");
        $sus->bindParam(':Email', $email);
        
        $sus->execute();

        $stmt = $this->database->connect()->prepare("
            INSERT INTO `transaction` (`user_id`, `parking_id`, `time_start`, `time_end`) VALUES (:Email, '1', NOW(), ADDTIME(NOW(),'01:00:00'));
        ");
        $sts = $this->database->connect()->prepare("
        CREATE EVENT delete_szlak
        ON SCHEDULE AT CURRENT_TIMESTAMP + INTERVAL 1 HOUR DO 
        DELETE FROM transaction WHERE transaction.`transaction_id`;
        ");
        
        $res = $sus->fetch(PDO::FETCH_ASSOC);
        $id = $res['id'];

        //$stmt->bindParam(':Email', $id, PDO::PARAM_STR);
        $stmt->execute(array(':Email' => $id));
        $sts->execute();
        
    }

    public function bookPedzichow(string $email) {

        $sup = $this->database->connect()->prepare("
            SELECT cryar.id FROM cryar WHERE cryar.Email = :Email;
        ");
        $sup->bindParam(':Email', $email);
        
        $sup->execute();

        $stmt = $this->database->connect()->prepare("
            INSERT INTO `transaction` (`user_id`, `parking_id`, `time_start`, `time_end`) VALUES (:Email, '3', NOW(), ADDTIME(NOW(),'01:00:00'));
        ");
        $stp = $this->database->connect()->prepare("
        CREATE EVENT delete_pedzichow
        ON SCHEDULE AT CURRENT_TIMESTAMP + INTERVAL 1 HOUR DO 
        DELETE FROM transaction WHERE transaction.`transaction_id`;
        ");
        
        $res = $sup->fetch(PDO::FETCH_ASSOC);
        $id = $res['id'];

        //$stmt->bindParam(':Email', $id, PDO::PARAM_STR);
        $stmt->execute(array(':Email' => $id));
        $stp->execute();
        
    }

}