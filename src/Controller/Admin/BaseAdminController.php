<?php

/**
 * Created by PhpStorm.
 * User: TakayamaAren
 * Date: 12/1/2017
 * Time: 10:19 PM
 */

namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

abstract class BaseAdminController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $token = $this->Cookie->read('token');
        if ($token == null) {
            return $this->redirect('login');
        }
        $userId = TableRegistry::get('Auth')->find()->where(["token_key" => $this->Cookie->read('token')])->toArray()[0]->user;
        $user = TableRegistry::get('User')->find()->where(['id' => $userId])->toArray()[0];
        $this->set("username", $user->username);
        $this->set("tabIndex", $this->getSideTag());
        return null;

    }

    /**
     * 侧边栏标签
     * @return string 标签名
     */
    abstract function getSideTag();
}