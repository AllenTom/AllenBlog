<?php
/**
 * Created by PhpStorm.
 * User: TakayamaAren
 * Date: 12/1/2017
 * Time: 10:16 PM
 */

/**
 * Article Controller
 *
 * @property \App\Model\Table\ArticleTable $Article
 *
 * @method \App\Model\Entity\Article[] paginate($object = null, array $settings = [])
 */
namespace App\Controller\Admin;
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
    public function editor(){

    }
}