<?php

namespace Src\Controllers\Api;

use Src\Controllers\Controller;
use Src\Exceptions\NotFoundException;
use Src\Models\Articles\Article;
// use Src\Models\Articles\Article;
use Src\Exceptions\InvalidArgumentException;
use Src\Models\Users\User;

class ArticlesApiController extends Controller {
    public function view($articleId){
        $article = Article::getById($articleId);
        if($article === null){
            throw new NotFoundException();
        }
        $this->view->displayJson([
            'articles' => [$article]
        ]);
    }
    public function all(){
        $articles = Article::findAll();
        if($articles === null){
            throw new NotFoundException();
        }
        $this->view->displayJson([
            'articles' => [$articles]
        ]);
    }
    
    public function add(){
        $input = $this->getInputData();
        
        // Преобразуем объект в массив, если это необходимо
        $inputArray = json_decode(json_encode($input), true);

        if (empty($inputArray['articles'][0])) {
            throw new \Exception('No article data found in request.');
        }
        
        $articleFromRequest = $inputArray['articles'][0];

        if (empty($articleFromRequest['author_id'])) {
            throw new \Exception('Author ID is missing.');
        }
    
        $authorId = $articleFromRequest['author_id'];
        $author = User::getById($authorId);

        $article = Article::createArticle($articleFromRequest, $author);

        header('Location: /api/articles/' . $article->getId(), true, 302);   
    }
    
    public function edit($articleId)
    {
        // Проверяем метод запроса
        $method = $_SERVER['REQUEST_METHOD'];
        if ($method !== 'PUT') {
            throw new \Exception('Неподдерживаемый метод запроса.');
        }

        $article = Article::getById($articleId);
        if ($article === null) {
            throw new NotFoundException();
        }

        $inputData = file_get_contents('php://input'); // Чтение данных из PUT-запроса
        $fields = json_decode($inputData, true); // Преобразование JSON в массив

        if (!empty($fields)) {
            try {
                $article->updateArticle($fields);
            } catch (InvalidArgumentException $e) {
                $this->view->displayJson([
                    'articles' => [$article]
                ]);
                return;
            }
            header('Location: api/articles/' . $article->getId(), true, 302);
            exit();
        }
    }

    public function delete($articleId): void{
        $article = Article::getById($articleId);
        if ($article === null) {
            throw new NotFoundException();
        }
        $article->delete();
        var_dump($article);
    }


}