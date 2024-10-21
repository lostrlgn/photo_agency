<?php

namespace Src\Controllers;

use Src\Exceptions\InvalidArgumentException;
use Src\Models\Users\User;
USE Src\Models\Users\UsersAuthService;

class UsersController extends Controller{
    public function signUp()
    {
        if (!empty($_POST)) {
            try {
                $user = User::signUp($_POST);
            } catch (InvalidArgumentException $e) {
                $this->view->renderHtml('Users/signUp.php', ['error' => $e->getMessage()]);
                return;
            }
    
            if ($user instanceof User) {
                $this->view->renderHtml('Users/signUpSuccessful.php');
                return;
            }
        }
    
        $this->view->renderHtml('Users/signUp.php');
    
    }

    public function login()
    {
        if (!empty($_POST)) {
            try {
            $user = User::login($_POST);
            UsersAuthService::createToken($user);
            header('Location: /articles/all');
            exit();

            }catch (InvalidArgumentException $e) {
                $this->view->renderHtml('Users/login.php', ['error' => $e->getMessage()]);
                return;
            }
        }
        $this->view->renderHtml('Users/login.php');
    }

    public function logout(){
        setcookie('token', '', -1, '/', '', false, true);
        header('Location: /articles/all');
        exit();
    }

}