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
use Psy\Util\Json;

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
            $articleJson = utf8_encode(Json::encode($article));
            $this->set("article", $article);
            $this->set("articleJson", $articleJson);
        } else {
            $this->set("article", null);
        }
        $categoryList = TableRegistry::get("Category")->find()->toArray();
        $this->set("categoryList", $categoryList);

    }

    public function save()
    {
        $articleAction = $this->request->getData("articleAction");
        $table = TableRegistry::get("Article");
        if ($articleAction == "create") {
            $article = new Article();
            $table->patchEntity($article, $this->request->getData());
            $article->createAt = date("Y-m-d h:i:s");
            $article->updateAt = date("Y-m-d h:i:s");
            $token = TableRegistry::get('Auth')->find()->where(["token_key" => $this->Cookie->read('token')])->toArray()[0];
            $article->author = $token->user;
            $table->save($article);
        }elseif ($articleAction == 'modify'){
            $table->query()
                ->update()
                ->set([
                    "title"=>$this->request->getData("title"),
                    "content"=>$this->request->getData("content"),
                    "category"=>$this->request->getData("category")
                ])
                ->where(['id'=>$this->request->getData("id")])
                ->execute();

        }
        return $this->redirect("/admin/article");

    }

    /**
     * 获取内容JSON
     */
    public function getContent(){
        $id = $this->request->getParam("id");
        $article = $this->Article->find()->where(["id" => $id])->first();
        return $this->response->withStringBody(Json::encode($article))->withType("application/json");

    }
    public function delete(){

        $id = $this->request->getParam("id");
        $query = TableRegistry::get('Article')->query();
        $query->delete()
            ->where(['id' => $id])
            ->execute();
        return $this->redirect("admin/article");
    }
}