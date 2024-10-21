<?php

namespace Src\Controllers;

use Src\Views\View;
use Src\Services\Db;
class MainController extends Controller
{

    public function main()
    {
        //$articles = $this->db->query('SELECT * FROM `articles`;');
        //$this->view->renderHtml('Main/main.php', ['articles' => $articles]);
    }
    public function sayHello(string $name)
    {
        $this->view->renderHtml('Main/hello.php', ['name' => $name]);
    }  

}