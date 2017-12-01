<?php
/**
 * Created by PhpStorm.
 * User: TakayamaAren
 * Date: 11/18/2017
 * Time: 9:30 AM
 */

namespace App\Controller;


use App\Model\Entity\Article;
use Cake\ORM\TableRegistry;

class BlogController extends AppController
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
    public function articleDetail($id){
        $this->set('data',TableRegistry::get('Article')->find()->where(['id'=>$id])->toArray()[0]);
    }
}
