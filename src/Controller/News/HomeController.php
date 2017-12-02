<?php
/**
 * Created by PhpStorm.
 * User: TakayamaAren
 * Date: 12/1/2017
 * Time: 11:09 PM
 */
namespace App\Controller\News;
use App\Model\Entity\Article;
use Cake\ORM\TableRegistry;

class HomeController extends BaseNewsController
{
    public function index(){
        $articleTable = TableRegistry::get('Article');
        $articleCount = $articleTable->find()->count();
        $page = $this->request->getParam("page",1);
        $offset = ($page - 1) * 5;
        $hasNext = $page == 1?true:false;
        $hasPrev = $page == 1?false:true;

        $this->set("articleCount",$articleCount);
        $this->set('articleList',$articleTable->find()->offset($offset)->limit(5)->toArray());
    }
}