<?php

require_once 'AppController.php';
require_once __DIR__.'//..//Models//User.php';
require_once __DIR__.'//..//Database.php';
require_once __DIR__.'//..//Repository//UserRepository.php';

class BoardController extends AppController {

    public function getLatestPhotos()
    {   
        $this->render('board');
    }
    
    public function favourites() 
    {
        $this->render('favourites');
    }

    public function bookHelcow() 
    {   
        $userRepository = new UserRepository();

            if($this->isPost()){
                if(isset($_POST['book_helcow'])) {
                    $email = $_SESSION['id'];

                    $userRepository->bookHelcow($email);                   
                }
                
            }

        $this->render('bookHelcow');
    }

    public function bookPedzichow() {
        $userRepository = new UserRepository();

            if($this->isPost()){
                if(isset($_POST['book_pedzichow'])) {
                    $email = $_SESSION['id'];

                    $userRepository->bookPedzichow($email);                   
                }
                
            }

        $this->render('bookPedzichow');
    }

    public function bookSzlak() {
        $userRepository = new UserRepository();

            if($this->isPost()){
                if(isset($_POST['book_szlak'])) {
                    $email = $_SESSION['id'];

                    $userRepository->bookSzlak($email);                   
                }
                
            }

        $this->render('bookSzlak');
    }

    public function account() {

        $this->render('account');
    }
}
