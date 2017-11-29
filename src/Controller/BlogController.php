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
        $this->set('articleList',TableRegistry::get('Article')->find()->toArray());
    }
    public function articleDetail($id){
        $this->set('data',TableRegistry::get('Article')->find()->where(['id'=>$id])->toArray()[0]);
    }
}
