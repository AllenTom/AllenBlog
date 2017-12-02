<?php
/**
 * Created by PhpStorm.
 * User: TakayamaAren
 * Date: 12/1/2017
 * Time: 10:16 PM
 */


namespace App\Controller\Admin;

use App\Model\Entity\Article;
use Cake\ORM\TableRegistry;

/**
 * Article Controller
 *
 * @property \App\Model\Table\ArticleTable $Article
 *
 * @method \App\Model\Entity\Article[] paginate($object = null, array $settings = [])
 */
class ArticleController extends BaseAdminController
{
    public function index()
    {
        $article = $this->paginate($this->Article);
        $this->set(compact('article'));
        $this->set('_serialize', ['article']);
    }

    function getSideTag()
    {
        return 'article';
    }

    public function editor()
    {
        $id = $this->request->getParam("id");
        if ($id != null) {
            $article = $this->Article->find()->where(["id" => $id])->first();
            $this->set("article", $article);
        }else{
            $this->set("article",null);
        }
        $categoryList = TableRegistry::get("Category")->find()->toArray();
        $this->set("categoryList", $categoryList);

    }

    public function save()
    {
        $table = TableRegistry::get("Article");
        $article = new Article();
        $table->patchEntity($article, $this->request->getData());
        $article->createAt = date("Y-m-d h:i:s");
        $article->updateAt = date("Y-m-d h:i:s");
        $token = TableRegistry::get('Auth')->find()->where(["token_key" => $this->Cookie->read('token')])->toArray()[0];
        $article->author = $token->user;
        $table->save($article);
        return $this->redirect("/admin/article");

    }
}