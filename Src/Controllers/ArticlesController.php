<?php

namespace Src\Controllers;

use Src\Exceptions\NotFoundException;
use Src\Exceptions\UnauthorizedException;
use Src\Exceptions\InvalidArgumentException;
use Src\Models\Articles\Article;
use Src\Models\Users\User;


class ArticlesController extends Controller
{

    public function view(int $articleId)
    {
        $article =Article::getById($articleId);
        if ($article === null) {
            throw new NotFoundException();
        }
        
        $this->view->renderHtml('Articles/view.php', ['article' => $article]);
    }
    public function all()
    {
        $articles = Article::findAll();
        
        $this->view->renderHtml('Articles/all.php', [
            'articles' => $articles,
            
        ]);
    }  
    public function edit(int $articleId): void{
        $article = Article::getById($articleId);
        if ($article === null) {
            throw new NotFoundException();
        }
        if ($this->user === null) {
            throw new UnauthorizedException();
        }
        if (!empty($_POST)) {
            try {
                $article->updateArticle($_POST);
            } catch (InvalidArgumentException $e) {
                $this->view->renderHtml('Articles/edit.php', ['error' => $e->getMessage(), 'article' => $article]);
                return;
            } 
            header('Location: /articles/' . $article->getId(), true, 302);
            exit();
        } 
        $this->view->renderHtml('Articles/edit.php', ['article' => $article]); 
    }
    public function add(): void{
        if ($this->user === null) {
            throw new UnauthorizedException();
        }
        if (!empty($_POST)) {
            try {
                $article = Article::createArticle($_POST, $this->user);
            } catch (InvalidArgumentException $e) {
                $this->view->renderHtml('Articles/add.php', ['error' => $e->getMessage()]);
                return;
            }
            header('Location: /articles/all');
            exit();
        }
        $this->view->renderHtml('Articles/add.php');

    }
    public function delete($articleId): void{
        $article = Article::getById($articleId);
        if ($article === null) {
            throw new NotFoundException();
        }
        $article->delete();
        var_dump($article);
        header('Location: /articles/all');
    }

}