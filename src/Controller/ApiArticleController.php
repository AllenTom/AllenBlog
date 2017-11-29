<?php
/**
 * Created by PhpStorm.
 * User: TakayamaAren
 * Date: 11/18/2017
 * Time: 1:19 AM
 */

namespace App\Controller;


use App\Model\Entity\Article;
use Cake\ORM\TableRegistry;

class ApiArticleController extends AppController
{
    public function add(){
        $article = new Article();
        $article->saveToDatabase($this->request->getData('title'),$this->request->getData('content'));
        $this->redirect('/admin/articles');
    }
}