<?php
/**
 * Created by PhpStorm.
 * User: TakayamaAren
 * Date: 12/1/2017
 * Time: 11:04 PM
 */


/**
 * Category Controller
 *
 * @property \App\Model\Table\CategoryTable $Category
 *
 * @method \App\Model\Entity\Category[] paginate($object = null, array $settings = [])
 *
 */

namespace App\Controller\Admin;

use App\Model\Entity\Category;
use Cake\ORM\TableRegistry;

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

    public function modify()
    {
        $id = $this->request->getParam("id");
        $name = $this->request->getData("name");
        $query = TableRegistry::get("Category")->query();
        $query->update()
            ->set(['name' => $name])
            ->where(['id' => $id])
            ->execute();
        $this->redirect('admin/category');
    }

    public function add()
    {
        $name = $this->request->getData('name');
        if ($name == null) {
            $this->Flash->error("请输入分类名");
            $this->redirect('admin/category');

        }

        $table = TableRegistry::get("Category");
        $category = new Category(["name" => $name]);
        if ($table->save($category)) {
            return $this->redirect("admin/category");
        }
        return $this->redirect("admin/category");
    }

    public function delete()
    {
        $id = $this->request->getParam("id");
        $query = TableRegistry::get('Category')->query();
        $query->delete()
            ->where(['id' => $id])
            ->execute();
        return $this->redirect("admin/category");
    }
}