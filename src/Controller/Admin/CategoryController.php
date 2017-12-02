<?php
/**
 * Created by PhpStorm.
 * User: TakayamaAren
 * Date: 12/1/2017
 * Time: 11:04 PM
 */

namespace App\Controller\Admin;

/**
 * Category Controller
 *
 * @property \App\Model\Table\CategoryTable $Category
 *
 * @method \App\Model\Entity\Category[] paginate($object = null, array $settings = [])
 */
class CategoryController extends BaseAdminController
{
    public function index()
    {
        $category = $this->paginate($this->Category);

        $this->set(compact('category'));
        $this->set('_serialize', ['category']);
    }

    function getSideTag()
    {
        return 'category';
    }
}