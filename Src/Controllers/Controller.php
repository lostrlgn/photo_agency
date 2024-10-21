<?php

namespace Src\Controllers;
use Src\Models\Users\UsersAuthService;
use Src\Views\View;

class Controller
{
    protected $user;
    protected $view;
    
    protected $layout = 'default';
    public function __construct()
    {
        $this->user = UsersAuthService::getUserByToken();
        $this->view = new View($this->layout);
        $this->view->setVar('user', $this->user);
    }
    public function getInputData(){
        return json_decode(
            file_get_contents(('php://input'), true)
        );
    }
}