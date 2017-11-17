<?php
/**
 * Created by PhpStorm.
 * User: TakayamaAren
 * Date: 11/17/2017
 * Time: 5:49 PM
 */

namespace App\Controller;


use App\Model\Entity\User;
use App\Model\Table\UserTable;
use Cake\Datasource\ConnectionManager;
use Cake\ORM\TableRegistry;
use DateTime;

class ApiUserController extends AppController
{
    public function add()
    {

        $table = TableRegistry::get('User');
        $tableEntity = $table->newEntity();
        $tableEntity->username = $this->request->getData('username');
        $tableEntity->password = $this->request->getData('password');
        $table->save($tableEntity);
        return $this->redirect(
            '/login'
        );
    }

    public function login()
    {
        $query = TableRegistry::get('User')->find();
        $result = $query
            ->where(['username' => $this->request->getData('username'), 'password' => $this->request->getData('password')])
            ->toArray();
        if (empty($result)){
            return $this->redirect('/login');
        }else{
            return $this->redirect('/admin');
        }


    }
}