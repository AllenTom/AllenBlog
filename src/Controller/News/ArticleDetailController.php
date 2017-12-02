<?php
/**
 * Created by PhpStorm.
 * User: TakayamaAren
 * Date: 12/2/2017
 * Time: 11:38 AM
 */

namespace App\Controller\News;


use Cake\ORM\TableRegistry;

class ArticleDetailController extends BaseNewsController
{
    public function index($id = null)
    {
        $id = $this->request->getParam("id");
        $this->set('data', TableRegistry::get('Article')->find()->where(['id' => $id])->toArray()[0]);
    }
}