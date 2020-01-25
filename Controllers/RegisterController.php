<?php

require_once 'AppController.php';
require_once __DIR__.'//..//Database.php';
require_once __DIR__.'//..//Repository//UserRepository.php';
require_once __DIR__.'//..//Models//User.php';

class RegisterController extends AppController {

    public function register()
    {
        $userRepository = new UserRepository();

        if ($this->isPost()&&isset($_POST['aaa'])) {
            $name = $_POST['Name'];
            $surname = $_POST['Surname'];
            $email = $_POST['Email'];
            $password = $_POST['Password'];
            

            $user = $userRepository->getUser($name, $surname, $email, $password);
            

            if (!$user) {
                $this->render('register', ['messages' => ['User with this email already exist!']]);
                return;
            }

            $userRepository->registerUser($name, $surname, $email, $password);

            

            $url = "http://$_SERVER[HTTP_HOST]/";
            header("Location: {$url}?page=registerAcception");
            return;
        }

        $this->render('register');
        
    }

    public function registerAcception()
    {   
        $this->render('registerAcception');
    }
}