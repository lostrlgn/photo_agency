<?php

namespace Src\Views;

class View{
    private $layout;

    private $extraVars = [];
    public function __construct(string $layout)
    {
        $this->layout = $layout;
    }
    public function setVar(string $name, $value): void
    {
        $this->extraVars[$name] = $value;
    }
    public function renderHtml(string $viewName, array $vars = [], int $code = 200){
        http_response_code($code);
        
        extract($vars);
        $layoutFile =  "Layouts/{$this->layout}.php";
        $content = $this->renderFile($viewName,$vars);
        echo $this->renderFile($layoutFile,['content'=>$content]);
    }
    private function renderFile(string $fileName, array $vars){
        extract($this->extraVars);
        extract($vars);
        $fileName = __DIR__ .'/'.$fileName;
        if (file_exists($fileName)) {
            ob_start();
                include $fileName;
                $buffer = ob_get_contents();
            ob_get_clean();
            return $buffer;
        }else{
            echo "Не найден файл по пути $fileName"; die();
        }

    }
    public function displayJson($data, int $code = 200){
        header('Content-type: application/json; charset=unf-8');
        http_response_code($code);
        echo json_encode($data);
    }
    // public function updateArticle($articleid, $changes){

    //     $article->
    //     $sql = 'UPDATE "articles"' . ' SET ' . implode($changes) . ' WHERE id = ' . $articleid;

    // }
}