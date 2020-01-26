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
    
    public function registerUser(string $name, string $surname, string $email, string $password): ?User
    {
        
        $stmt = $this->database->connect()->prepare('
            INSERT INTO `cryar` (`Name`, `Surname`, `Email`, `Password`) VALUES (:Name, :Surname, :Email, :Password);
        ');
        
        //$stmt->bindParam(':Name', $name, PDO::PARAM_STR);
        //$stmt->bindParam(':Surname', $surname, PDO::PARAM_STR);
        //$stmt->bindParam(':Email', $email, PDO::PARAM_STR);
        //$stmt->bindParam(':Password', $password, PDO::PARAM_STR);
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

        $res = $suh->fetch(PDO::FETCH_ASSOC);
        $id = $res['id'];
        $stmt->execute(array(':Email' => $id));

        $get_transaction_id = $this->database->connect()->prepare("
            SELECT transaction_id FROM transaction WHERE transaction.user_id = :Email AND transaction.parking_id = '2';
        ");
        $get_transaction_id->bindParam(':Email', $id);
        $get_transaction_id->execute();
        $transaction_id = $get_transaction_id->fetch(PDO::FETCH_ASSOC);
        $tran_id = $transaction_id['transaction_id'];

        $sth = $this->database->connect()->prepare("
        CREATE EVENT `:transaction_id`
        ON SCHEDULE AT CURRENT_TIMESTAMP + INTERVAL 1 HOUR DO 
        DELETE FROM transaction WHERE transaction.`transaction_id` = :transaction_id;
        ");
        
        

        //$stmt->bindParam(':Email', $id, PDO::PARAM_STR);
        
        $sth->execute(array(':transaction_id' => $tran_id));
        
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

        $res = $sus->fetch(PDO::FETCH_ASSOC);
        $id = $res['id'];
        $stmt->execute(array(':Email' => $id));

        $get_transaction_id = $this->database->connect()->prepare("
            SELECT transaction_id FROM transaction WHERE transaction.user_id = :Email AND transaction.parking_id = '1';
        ");
        $get_transaction_id->bindParam(':Email', $id);
        $get_transaction_id->execute();
        $transaction_id = $get_transaction_id->fetch(PDO::FETCH_ASSOC);
        $tran_id = $transaction_id['transaction_id'];

        $sts = $this->database->connect()->prepare("
        CREATE EVENT `:transaction_id`
        ON SCHEDULE AT CURRENT_TIMESTAMP + INTERVAL 1 HOUR DO 
        DELETE FROM transaction WHERE transaction.`transaction_id` = :transaction_id;
        ");
        
        

        //$stmt->bindParam(':Email', $id, PDO::PARAM_STR);
        
        $sts->execute(array(':transaction_id' => $tran_id));
        
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

        $res = $sup->fetch(PDO::FETCH_ASSOC);
        $id = $res['id'];
        $stmt->execute(array(':Email' => $id));

        $get_transaction_id = $this->database->connect()->prepare("
            SELECT transaction_id FROM transaction WHERE transaction.user_id = :Email AND transaction.parking_id = '3';
        ");
        $get_transaction_id->bindParam(':Email', $id);
        $get_transaction_id->execute();
        $transaction_id = $get_transaction_id->fetch(PDO::FETCH_ASSOC);
        $tran_id = $transaction_id['transaction_id'];

        $stp = $this->database->connect()->prepare("
        CREATE EVENT `:transaction_id`
        ON SCHEDULE AT CURRENT_TIMESTAMP + INTERVAL 1 HOUR DO 
        DELETE FROM transaction WHERE transaction.`transaction_id` = :transaction_id;
        ");
        
        

        //$stmt->bindParam(':Email', $id, PDO::PARAM_STR);
        
        $stp->execute(array(':transaction_id' => $tran_id));
        
    }

}